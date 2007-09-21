<?php
class SIXTemplate {
	public $header = "";
	public $variable = "";
	public $menu = "";
	public $main = "";
	public $module = "";
	public $footer = "";
	protected $variable_path = '/var/www/genlu/templates/default/variable.tpl';
	private $unique = "";
	private $extra = array();
	private $valid_templates = array('header', 'variable', 'menu', 'main', 'module', 'footer');
	private $print_lock = false;

	public function __construct(){

	}

	public function getTemplates(){
		$array = array();
		if($this->print_lock){
			$array[] = $this->unique;
		} else {
			$this->makeVariableHeader();
			$array[0] = $this->header;
			$array[1] = $this->variable;
			$array[2] = $this->menu;
			$array[3] = $this->main;
			$array[4] = $this->module;
			$array[5] = $this->footer;
		}
		return $array;
	}

	public function set($template, $source){
		if(in_array($template, $this->valid_templates)){
			$this->$template = $source;
		}
	}

	public function insertScript($script){
		$this->extra[] = $script . "\n";
	}

	public function lock($unique){
		$this->print_lock = true;
		$this->unique = $unique;
	}

	private function makeVariableHeader(){
		if(!empty($this->extra)){
			if(!$handle = fopen($this->variable_path, 'w+')) {
				echo "Cannot open file.";
			} else {
				foreach($this->extra as $script) {
					if (fwrite($handle, $script) === FALSE) {
						echo "Cannot write to file.";
					}
				}
				fclose($handle);
			}
		} else {
			unlink($this->variable_path);
			touch($this->variable_path);
		}
		$this->variable = $this->variable_path;
	}

	private function setupInlineScript($body, $type = 'js'){
		$str = "";
		if($type == 'js'){
			$str .= '<script type="text/javascript">';
			$str .= '//<![CDATA[';
			$str .= $body;
			$str .= '//]]>';
			$str .= '</script>';
		} elseif($type == 'css'){
			$str .= '<style type="text/css">';
			$str .= '<![CDATA[';
			$str .= $body;
			$str .= ']]>';
			$str .= '</style>';
		}
		return $str;
	}
}
?>
