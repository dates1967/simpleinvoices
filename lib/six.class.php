<?php

require_once(SIX_ROOT . '/include/smarty/Smarty.class.php');
require_once(SIX_LIB_DIR . '/sixtemplates.class.php');
require_once 'MDB2.php';
include_once 'Var_Dump.php';
require_once 'Log.php';

class Six {

	public
		$module = "",
		$view = "",
		$language = "/lang/english_UK.inc.php",
		$spreadsheet = "xls",
		$focus = null,
		$word_processor = "doc";

	protected
		$db = null,
		$logger = null,
		$includes = array(),
		$lang = null,
		$home = "",
		$template_dir = '/templates/default',
		$print_template_dir = '/templates/invoices',
		$css_export = "",

		$lines_per_page = 22,
		$pdf_screen_size = 800,
		$pdf_paper_size = "Letter",
		$pdf_left_margin = 10,
		$pdf_right_margin = 10,
		$pdf_top_margin = 10,
		$pdf_bottom_margin = 10,
		$engine = null,
		$templates = null,
		$debugger = null,
		$debugger_options = array(
			'HTML_DIV_images_path' => 'data/PHP_Debug/images',
			'HTML_DIV_css_path' => 'data/PHP_Debug/css',
			'HTML_DIV_js_path' => 'data/PHP_Debug/js',
			'DEBUG_replace_errorhandler' => true
		),
		$common_templates = array(
			'header' 	=> 'header.tpl',
			'menu'		=> 'menu.tpl',
			'main'		=> 'main.tpl',
			'footer' 	=> 'footer.tpl'
		);

	private
		$dsn = "",
		$dsn_base = "",
		$db_host = "debian",
		$db_name = null,
		$db_production = "genluStable",
		$db_testing = "genluTest",
		$db_user = "german",
		$db_pass = "2921",
		$tb_prefix = "genlu_",
		$db_type = 'mysqli',
		$engine_class = 'Smarty',
		$engine_compile_dir = '/cache',
		$testing = false;

	/** constructor */
	function __construct(){

		/* Includes */
		$this->includes[] = SIX_ROOT . $this->language;
		foreach($this->get_includes() as $file){
			include("$file");
		}
		$this->module = isset($_GET['module']) ? $_GET['module'] : null;
		$this->view	= isset($_GET['view']) ? $_GET['view'] : null;
		$this->lang = $LANG; // included 

		/* Engine */
		$this->engine = new $this->engine_class;
		$this->engine->compile_dir = SIX_ROOT . $this->engine_compile_dir;
		$this->engine->assign("LANG", $this->lang);
		$this->engine->assign("enabled",array($this->lang['disabled'],$this->lang['enabled']));
		// $this->engine->debugging = true;

		/* Database */
		$this->dsn_base = $this->db_type . '://' . $this->db_user . ':' . $this->db_pass . '@' . $this->db_host;
		if($this->testing){
			# Use Testing database
			# TODO hay que arreglar esto
			$this->dsn = $this->dsn_base . '/' . $this->db_testing;
		} else {
			# Use Production database
			$this->dsn = $this->dsn_base . '/' . $this->db_production;
		}
		$this->db =& MDB2::factory($this->dsn);
		if (PEAR::isError($this->db))
			die (__LINE__.$this->db->getMessage());
		$this->db->setFetchMode(MDB2_FETCHMODE_ASSOC);

		/* Logger */
 		$conf = array('buffering' => false, 'append' => true);
 		$this->logger = &Log::singleton('file', 'log/six.log', 'SIX', $conf);

		/* Templates */
		$this->template_dir = SIX_ROOT . $this->template_dir;
		$this->print_template_dir = SIX_ROOT . $this->print_template_dir;
		$this->home = $this->template_dir . '/home.tpl';
		$this->templates = new SIXTemplate();
		$this->setupTemplates();	

	}

	public function setTestingDB(){
		if($this->testing){
			return;
		} else {
			$this->testing = true;
		}
	}
	public function setProductionDB(){
		if($this->testing){
			$this->testing = false;	
		} else {
			return;
		}
	}

	public function setDB($new_db){
		$this->db->disconnect();
		$this->dsn = $this->dsn_base . "/$new_db";
		$this->db =& MDB2::factory($this->dsn);
		if (MDB2::isError($this->db)) {
			die (__LINE__.$this->db->getMessage());
		}
	}

	public function getDBname(){
		$sql = "SELECT DATABASE()";
		return $this->queryOne($sql);
	}

	protected function get_includes(){
		return $this->includes;
	}

	public function run(){
		foreach($this->templates->getTemplates() as $template){
			if(file_exists($template)){
				$this->engine->display($template);
			}
		}
		// $this->dump($this->templates);
	}

	public function reconnect() {
		$this->db->disconnect();
		$this->db =& MDB2::factory($this->dsn);
		if (MDB2::isError($this->db)) {
			die (__LINE__.$this->db->getMessage());
		}
	}


	public function dump($mixed = null) {
		Var_Dump::displayInit(array('display_mode' => 'HTML4_Table'));
		Var_Dump::display($mixed);
	}

	/** destructor */
	function __destruct(){
		$this->db->disconnect();
	}

	public function query($sql){
		# public wrapper for queryAll
		return $this->queryAll($sql);
	}

	private function setupTemplates(){
		$this->templates->header = $this->template_dir . '/' . $this->common_templates['header'];
		$this->templates->menu = $this->template_dir . '/' . $this->common_templates['menu'];
		$this->templates->main = $this->template_dir . '/' . $this->common_templates['main'];
		$this->templates->footer = $this->template_dir . '/' . $this->common_templates['footer'];
		if($this->module && $this->view){
			$tmpl = $this->template_dir . '/' . $this->module . '/' . $this->view . '.tpl';
			$this->templates->set('module', $tmpl);
		} else {
			$this->templates->set('module', $this->home);
			$this->engine->assign("title", "Welcome");
		}
	}

	protected function getInfo($param = false){
		if($param == 'bank'){
			$sql = "SELECT name, bank_name, bank_account_number, bank_aba, bank_swift FROM genlu_info LIMIT 1";
			$res = $this->queryRow($sql);
			$info = array();
			$info['Name'] = $res['name'];
			$info['Bank'] = $res['bank_name'];
			$info['Account Number'] = $res['bank_account_number'];
			$info['ABA'] = $res['bank_aba'];
			$info['Swift Code'] = $res['bank_swift'];
			return $info;
		} elseif($param == 'basic') {
			$sql = "SELECT * FROM genlu_info LIMIT 1";
			$res = $this->queryRow($sql);
			$info = array();
			$info['name'] = $res['name'];
			$info['street_address'] = $res['street_address'];
			$info['street_address2'] = $res['street_address2'];
			$info['city'] = $res['city'];
			$info['state'] = $res['state'];
			$info['zip_code'] = $res['zip_code'];
			$info['country'] = $res['country'];
			$info['phone'] = $res['phone'];
			$info['fax'] = $res['fax'];
			$info['email'] = $res['email'];
			return $info;
		}
	}

	protected function queryAll($sql){
		$all = array();
		$sql = utf8_encode($sql);
//         echo "original SQL: $sql<br />";
//         echo "encoded SQL: " . utf8_encode($sql) . "<br />";
		$result =& $this->db->query($sql);
		if(MDB2::isError($result)){
			echo <<<EOD
			<p style='color:red;font-weight:bold'>
			{$result->getMessage()}
			</p>
			<p style='color:blue;font-weight:bold'>
			{$result->getUserinfo()}
			</p>
EOD;
			exit();
		} else {
			while($row = $result->fetchRow()){
				$all[] = $row;
			}
			$result->free();
		}
		return $all;
	}

	protected function queryRow($sql){

		$sql = utf8_encode($sql);
		$result =& $this->db->query($sql);
		if(MDB2::isError($result)){
			echo <<<EOD
			<p style='color:red;font-weight:bold'>
			{$result->getMessage()}
			</p>
			<p style='color:blue;font-weight:bold'>
			{$result->getUserinfo()}
			</p>
EOD;
			exit();
		} else {
			$row = $result->fetchRow();
			$result->free();
		}
		return $row;
	}

	protected function queryOne($sql){

		$sql = utf8_encode($sql);
		$result =& $this->db->query($sql);
		if(MDB2::isError($result)){
			echo <<<EOD
			<p style='color:red;font-weight:bold'>
			{$result->getMessage()}
			</p>
			<p style='color:blue;font-weight:bold'>
			{$result->getUserinfo()}
			</p>
EOD;
			$this->logger->err($result->getMessage() . "\n" . $result->getUserinfo());
			exit();
		} else {
			$one = $result->fetchOne();
			$this->logger->debug("QueryOne:\nSQL: $sql\nResult: " . print_r($one));
			$result->free();
			if(!$result->numRows() == 1){
				$this->logger->warning("More than 1 result in queryOne.");
			}
		}
		return $one;
	}
}

?>
