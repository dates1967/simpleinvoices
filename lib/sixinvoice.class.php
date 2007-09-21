<?php

require_once(SIX_LIB_DIR . '/six.module.class.php');

/**
 * Main class for invoices, sales invoices
 * and purchases invoices.
 *
 */
class SIXInvoice extends SIXModule {

	public $invoice_id = null;
	private $show_all = false;

	protected $request = "";
	protected $query_string = "";
	protected $title = "";
	protected $report_wording = "";
	protected $action = null;
	private $number = "";
	private $date = "";
	private $due_date = "";
	private $currency = "";
	protected $paramsString = "";
	protected $params = array();

	/** constructor */
	function __construct($id = false, $all = false){
		parent::__construct();
		if($this->module == 'sales'){
			$this->data['companys'] = $this->getCustomers();
		} elseif($this->module == 'purchases'){
			$this->data['companys'] = $this->getVendors();
		}
		$this->templates->set("module", $this->template_dir . '/' . $this->module . '/' . $this->view . '.tpl');

		$this->url_preview = "index.php?module={$this->module}&view=preview&submit={$this->id}";
		$this->url_pdf = $_SERVER[HTTP_HOST] . $_SERVER[PHP_SELF] . "?module={$this->module}&view=preview&location=pdf&submit={$this->id}";
		$this->url_pdf_encoded = urlencode($this->url_pdf);
		$this->url_for_pdf = "./pdf2/demo/html2ps.php?process_mode=single&renderfields=1&renderlinks=1&renderimages=1&scalepoints=1&pixels={$this->pdf_screen_size}&media={$this->pdf_paper_size}&leftmargin={$this->pdf_left_margin}&rightmargin={$this->pdf_right_margin}&topmargin={$this->pdf_top_margin}&bottommargin={$this->pdf_bottom_margin}&transparency_workaround=1&imagequality_workaround=1&output=1&smartpagebreak=1&pdfname={$this->number}&URL={$this->url_pdf_encoded}";

		$this->engine->assign('url_for_pdf', $this->url_for_pdf);
		$this->engine->assign('url_preview', $this->url_preview);

		if($this->view == 'create'){
			// INVOICE
			// $this->engine->debugging = true;
			$this->create();

		} elseif ($this->view == 'save'){
			$this->action = $_REQUEST['action']?$_REQUEST['action']:null;
			$this->logger->log("ACTION: " . $this->action);
			// SAVING
			$this->process();

		} elseif ($this->view == 'update'){
			// UPDATING
			$this->process();

		} elseif($this->view == 'quick_view'){
			// QICK VIEW
			$this->render_quick_view();

		} elseif($this->view == 'manage'){
			// MANAGE
			$this->manage();

		} elseif($this->view == 'preview'){
			// PREVIEW
			if(!empty($_GET['submit'])){
				$this->preview();

			}
		} elseif($this->view == 'edit'){
			// EDIT
			if(!empty($_REQUEST['submit'])){
				$this->edit();
			}

		} elseif($this->view == 'pdf'){
			// NEW PDF Engine
			// $this->dump($this);
			if(empty($this->id))
				throw new Exception(__CLASS__ . '::' . __FUNCTION__ . ' Invalid or No Invoice ID.');
			$this->pdf();

		}
		// $this->dump($this);
	}
	/**
	 *	Processes the Save Form
	 */
	public function process(){
		$this->process_form();
	}

	public function pdf(){
		$data = array();
		$this->data['invoice'] = $this->getInvoice();
		$soldTo = $this->getCompany();
		$this->data['soldTo']['name'] = $soldTo['name'];
		// Todo: hacer un compound con \n de los detalles de la direccion, etc
		// $this->data['soldTo']['details'] = $this->compound($soldTo);
		$This->data['invoice']['lines'] = $this->getInvoiceLines();
		// $shipTo = $this->getShipTo();

		$data['invoiceNumber'] = '';
		$data = array(
			'invoice' => array(
				'note' => "This is the note corresponding to this invoice\nIt has a nice layout",
				'lines' => array(

					)
				),
				'invoiceNumber' => '00010A0031',
				'date' => date('M d, Y'),
				'dueDate' => date('M d, Y'),
				'shippingMethod' => 'UPS Ground',
				'terms' => 'NET 30 Days',
				'soldTo' => array(
					'name' => 'Watch Plaza', 
					"details" => "223 East Flagler St.\nSuite 601\nMiami - FL (USA)\nPhone: 305-379-7988\nFax: 305-379-7989"
				),
				'shipTo' => array(
					'name' => 'Watch Plaza', 
					"details" => "223 East Flagler St.\nSuite 601\nMiami - FL (USA)\nPhone: 305-379-7988\nFax: 305-379-7989"
				)
		);

		parent::toPDF($data);
		exit();
	}

	public function manage(){
		if($this->module == 'sales'){
			$this->data['companys'] = $this->getCustomers();
		} elseif($this->module == 'purchases'){
			$this->data['companys'] = $this->getVendors();
		}
		$this->engine->plugins_dir[] = $this->template_dir . '/' . $this->module . '/plugins';
		$this->data['invoices'] = $this->getInvoices();

		foreach($this->data['invoices'] as $num => $invoice){
			if(!empty($invoice['customer_id'])) {
				$this->data['invoices'][$num]['company'] = $this->getCompanyName($this->module, $invoice['customer_id']);
			} elseif(!empty($invoice['vendor_id'])) {
				$this->data['invoices'][$num]['company'] = $this->getCompanyName($this->module, $invoice['vendor_id']);
			} else {
				$this->data['invoices'][$num]['company'] = null;
			}
		}
		$this->engine->assign("options", $this->options);
		$this->engine->assign("data", $this->data);
		$this->engine->assign("url_for_pdf", $this->url_for_pdf);
	}

	public function preview(){
		$this->id = $_GET['submit'];
		$this->data['invoice'] = $this->getInvoice();
		$this->templates->lock($this->print_template_dir . '/preview/template.tpl');
		if($_REQUEST['location'] == 'pdf'){
			$this->css = "./templates/invoices/preview/pdf.css";
		} else {
			$this->css = "./templates/invoices/preview/style.css";
			//$this->css_print = "./templates/invoices/preview/print.css";
		}
		if($this->module == 'purchases'){
			$this->lines_per_page = 27;
		}
		$this->engine->assign("company", $this->getCompany());
		$this->engine->assign("css", $this->css);
		//$this->engine->assign("css_print", $this->css_print);
		$invoice = $this->getInvoice();
		$invoice['display_totals'] = $this->displayTotals();
		$invoice['display_note'] = $this->displayNote();
		$this->engine->assign("invoice", $invoice);
		$this->engine->assign("invoice_lines", $this->getInvoiceLines());
		$this->engine->assign("totals", $this->getInvoiceTotals());
		$this->engine->assign("pages", $this->getInvoicePages());
		$this->engine->assign("max", $this->lines_per_page);
		$this->engine->plugins_dir[] = $this->print_template_dir . '/' . $this->view . '/plugins';
		$wording = 'module_' . $this->module . '_wording';
		$this->engine->assign("module_wording", $this->lang[$wording]);
		$this->engine->assign("module", $this->module);
		// $this->engine->debugging = true;
		// $this->dump($_SERVER);
	}

	public function render_quick_view(){
		$this->id = $_GET['submit'];

		$this->engine->assign("css", $this->css);

		$this->data['invoice'] = $this->getInvoice();
		$this->data['invoice']['summary'] = $this->displayInvoiceSummary();
		$this->data['invoice']['details'] = $this->displayInvoiceDetails();
		$this->data['invoice']['display_note'] = $this->displayNote();
		$this->data['company'] = $this->getCompany();
		$company_id = $this->data['company']['id'];
		$this->data['company']['details'] = $this->displayCompanyDetails($company_id);
		$this->data['company']['balance'] = $this->displayAccountBalance();

		// $content = $this->quick_view();
		// $this->engine->assign("content", $content);
		$this->options['module'] = $this->module;
		$this->options['url_for_pdf'] = $this->url_for_pdf;
		$this->engine->assign("options", $this->options);
	}

	public function edit(){
		if($this->module == 'sales'){
			$this->data['companys'] = $this->getCustomers();
		} elseif($this->module == 'purchases'){
			$this->data['companys'] = $this->getVendors();
			$script = "<script type='text/javascript' src='./templates/default/{$this->module}/jquery.{$this->view}.js'></script>";
			//$this->templates->insertScript($script);
			$this->data['vendor_number'] = $this->data['invoice']['vendor_invoice_number'];
		}

		$this->data['company'] = $this->getCompany();
		$this->setCompanyWording();
		$this->data['invoice'] = $this->getInvoice();
		$this->data['invoice_lines'] = $this->getInvoiceLines();
		$this->data['products'] = $this->getProducts();
		$this->data['number'] = $this->data['invoice']['invoice_number'];
		$this->data['date'] = $this->data['invoice']['date'];
		$this->engine->assign("data", $this->data);
		$this->setupScripts('autocomplete');
		$script = '<script type="text/javascript" src="./include/js/jquery.invoices.js"></script>';
		$this->templates->insertScript($script);
		$this->setupScripts('validation');
	}

	public function create(){
		$this->data['products'] = $this->getProducts();
		$this->data['number'] = $this->getNextInvoiceNumber();
		$this->engine->assign("data", $this->data);
		$this->setupScripts('autocomplete');
		$script = '<script type="text/javascript" src="./include/js/jquery.invoices.js"></script>';
		$this->templates->insertScript($script);
		$this->setupScripts('validation');
		$this->setupScripts('calendar');
		$this->engine->assign("module", $this->module);
		/* TODO: esto es un workaround, poner los templates en un mismo directorio */
		$this->templates->set("module", $this->template_dir . "/sales/create.tpl");
	}




}
?>
