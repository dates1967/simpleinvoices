<?php
include_once 'Var_Dump.php';
require_once(SIX_LIB_DIR . '/six.module.class.php');

class SIXReports extends SIXModule {

	protected $default = "";
	protected $request = "";
	protected $query_string = "";
	protected $title = "";
	protected $report_wording = "";
	private $number = "";
	private $date = "";
	private $due_date = "";
	private $currency = "";
	private $type = "";
	protected $filter = false;
	protected $paramsString = "";
	protected $params = array();

	public function __construct($report_wording = 'Reports'){
		parent::__construct();
// 		module=reports&view=show&request=price_list&param=A
		$this->default = $this->template_dir . '/' . $this->module . '/default.tpl';
		if(!empty($_REQUEST['request'])){
			$this->request = $_REQUEST['request'];
			if($this->request == 'financial'){
				$this->financial();
			}
		} else {
			$this->templates->set('module', $this->default);
			$this->renderDefault();
		}

		$this->query_string = $_SERVER[QUERY_STRING];
		$this->filter = isset($_REQUEST['filter'])?$_REQUEST['filter']:false;
		$this->getParams();
		$this->date = date("M-d-Y");
		$this->due_date = date("M-d-Y", strtotime($this->date) + 2592000);
		$this->currency = "US Dollars";
		$this->report_wording = $report_wording;
		$this->number = $this->getNextInvoiceNumber();

		$this->engine->assign('module_wording', $this->report_wording);
		$this->engine->assign('date', $this->date);
		$this->engine->assign('due_date', $this->due_date);
		$this->engine->assign('currency', $this->currency);
		$this->engine->assign('number', $this->number);
		$this->engine->assign('template_dir', $this->template_dir);
		$this->engine->assign('title', $this->report_wording);
		# Preview & PDF URI's
		$preview = str_replace("view=show", "view=preview", $this->query_string);
		$this->url_preview = "index.php?$preview";
		$this->url_pdf = $_SERVER[HTTP_HOST] . $_SERVER[PHP_SELF] . '?' . $preview;
		$this->url_pdf_encoded = urlencode($this->url_pdf);
		$this->url_for_pdf = "./pdf2/demo/html2ps.php?process_mode=single&renderfields=1&renderlinks=1&renderimages=1&scalepoints=1&pixels={$this->pdf_screen_size}&media={$this->pdf_paper_size}&leftmargin={$this->pdf_left_margin}&rightmargin={$this->pdf_right_margin}&topmargin={$this->pdf_top_margin}&bottommargin={$this->pdf_bottom_margin}&transparency_workaround=1&imagequality_workaround=1&output=1&smartpagebreak=1&pdfname={$this->number}&URL={$this->url_pdf_encoded}";
		$this->engine->assign('url_preview', $this->url_preview);
		$this->engine->assign('url_for_pdf', $this->url_for_pdf);

		try {

		} catch(Exception $e) {
			echo <<<EOD
				<p style="color:red;font-weight:bold">Problema, Exception: </p>
				<p style="color:green">{$e->getMessage()}</p>
EOD;
		}
	}

	public function renderDefault(){
		$this->setupScripts('calendar');
		//$this->logger->alert();
	}

	public function financial(){
		//request=financial&type=sales&from_date=2007-08-16&to_date=2007-08-16&param=detailed
		$this->type = $_REQUEST['type']?$_REQUEST['type']:'complete';
		if($this->type == 'sales'){

		}
	}
	public function render_info(){
		$info = $this->getInfo('bank');
		if($this->view == 'preview'){
			$this->templates->lock($this->template_dir . '/' . $this->module . '/info.tpl');
			$this->engine->assign('css', './templates/default/reports/bank.css');
		}
		$this->engine->assign('info', $info);
	}
	private function getParams(){
		$pattern = "/param=(\w+)/";
		$test_regexp = preg_match_all($pattern, $this->query_string, $matches);
		$this->params = $matches[1];
		foreach($this->params as $param){
			$this->paramsString .= "&param=$param";
		}
	}
}

class SIXFinancialReport extends SIXReports {
	const REPORT_WORDING = "Financial Report";
	function __construct(){
		parent::__construct(self::REPORT_WORDING);
		// Primero financial report grouped by invoices
		$this->engine->assign("financial", true);
		$data = $this->getSalesData("invoices");
		$totalAmount = 0;
		$totalCost = 0;
		$totalProfit = 0;
		foreach($data as $num => $line){
			$profit = number_format($line['amount'] - $line['cost'], 2);
			$profit_percentage = round(($line['amount'] - $line['cost']) * 100 / $line['amount'], 2);
			$data[$num]['profit'] = $profit;
			$data[$num]['profit_percentage'] = number_format($profit_percentage, 2);
			$totalAmount += $line['amount'];
			$totalCost += $line['cost'];
			$totalProfit += $line['amount'] - $line['cost'];
		}
		$totals['totalAmount'] = number_format($totalAmount, 2);
		$totals['totalCost'] = number_format($totalCost, 2);
		$totals['totalProfit'] = number_format($totalProfit, 2);
		$this->engine->assign("totals", $totals);
		$this->engine->assign("data", $data);
		if($this->view == 'preview'){
			$this->templates->lock($this->template_dir . '/' . $this->module . '/sales.tpl');
			$this->lines_per_page = 30;
			$this->engine->assign('css', './templates/default/reports/sales.css');
			$this->engine->assign('pages', $this->getPages($data));
			$this->engine->assign('max', $this->lines_per_page);
		}

		// $this->dump($data);
	}
	protected function getSalesData($criteria){
		$sql = <<<EOD
SELECT i.invoice_number, i.date, c.name AS customer, 
sum(l.quantity*p.last_unit_cost) AS cost, 
sum(l.quantity*l.unit_price) AS amount
	FROM genlu_sales_invoices AS i
		LEFT JOIN genlu_sales_invoice_lines AS l
	ON i.id = l.invoice_id
		LEFT JOIN genlu_products AS p
	ON l.product_id = p.id
		LEFT JOIN genlu_customers as c
	ON i.customer_id = c.id

EOD;
		switch($criteria){
		case "invoices":
			$sql .= "GROUP BY i.invoice_number";
			break;
		case "customers":
			$sql .= "GROUP BY c.name";
			break;
		default:
			//
		}
		
		$salesData = $this->queryAll($sql);
		return $salesData;
	}

	protected function getCostOfSales(){
		$sql = <<<EOD
SELECT i.invoice_number, sum(l.quantity*p.last_unit_cost) AS 'Cost of Sales'
	FROM genlu_sales_invoices AS i
		LEFT JOIN genlu_sales_invoice_lines AS l
	ON i.id = l.invoice_id
		LEFT JOIN genlu_products AS p
	ON l.product_id = p.id
GROUP BY i.invoice_number;
EOD;
		$costOfSales = $this->queryAll($sql);
		return $costOfSales;
	}
}
class SIXPriceList extends SIXReports {
	const REPORT_WORDING = "Price List";
	private $table = 'genlu_products';
	private $valid_fields = array(
		'A' => 'price_level_a',
		'B' => 'price_level_b',
		'C' => 'price_level_c',
		'D' => 'price_level_d',
		'cost' => 'last_unit_cost',
		'usretail' => 'us_retail',
		'qty' => 'qty_hand'
	);
	private $prices = array(
		'prepaid' 	=> null,
		'credit'	=> null
	);
	private $fields = null;
	private $sql = "";
	private $data = null;
	private $report_lines = array();
	private $credit_modifier = 1.15;

	function __construct(){
		parent::__construct(self::REPORT_WORDING);
		$this->processParams();
		$this->getPriceList();
		$this->prepareLines();
		if($this->view == 'preview'){
			$this->lines_per_page = 32;
			$this->css_export = "./templates/default/reports/export.css";
 			$this->templates->lock($this->template_dir . '/' . $this->module . '/' . $this->view . '.tpl');
			$this->engine->assign('pages', $this->getPages($this->data));
			$this->engine->assign('css', $this->css_export);
			//$this->engine->assign('css_print', "./templates/invoices/preview/print.css");
		}
		$this->engine->assign('report_lines', $this->data);
		$this->engine->assign('max', $this->lines_per_page);
//$this->dump($this);

	}

	private function processParams(){
		foreach($this->params as $param){
			foreach($this->valid_fields as $key => $field){
				if($param == $key){
					$this->fields[] = $field;
				}
			}
		}
	}

	private function prepareLines(){
		# report_lines[reference, description, qty(inventory), prepaid, credit]
		foreach($this->data as $num => $item){
			$this->data[$num]['prepaid_price'] = $this->data[$num][$this->fields[0]];
			$this->data[$num]['credit_price'] = number_format($this->data[$num][$this->fields[0]]*$this->credit_modifier, 2);
		}
		if(in_array('qty_hand', $this->fields)) {
			$this->engine->assign('qty', 1);
		} else {
			$this->engine->assign('qty', 0);
		}
// 		if(count($this->params) > 1){
// 		} elseif(count($this->params) == 1) {
// 		}
	}

	private function getPriceList(){
		$this->sql = "SELECT id, reference, description, ";
		foreach($this->fields as $key => $field){
			if($key == count($this->fields) - 1){
				$this->sql .= "$field ";
			} else {
				$this->sql .= "$field, ";
			}
		}
		$this->sql .= "FROM $this->table";
		if($this->filter){
			//TODO: mas flexibilidad
			$this->sql .= " WHERE type = '{$this->filter}'";
		}
		$this->data = $this->queryAll($this->sql);
		//$this->dump($this->data);
	}

	public function parseRequest(){
		//filter=swiss&price_level=price_level_B&filter=qty
		//header('location: http://www.example.com/');
		if($this->view == 'redirect'){

		}
		$location = 'http://' . $_SERVER[HTTP_HOST] . '/' . $_SERVER[PHP_SELF] . '?' . "module={$six->focus->module}&view=show&filter=";
	}
}
?>
