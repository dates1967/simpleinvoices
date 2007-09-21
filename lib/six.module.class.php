<?php
require_once(SIX_LIB_DIR . '/six.class.php');
require_once(SIX_LIB_DIR . '/sixreports.class.php');
require_once(SIX_LIB_DIR . '/sixtemplates.class.php');
/**
 * Core class for all modules
 */
class SIXModule extends Six {

	private $company_lang = array(
		'company',
		'company_account',
		'company_add',
		'company_contact',
		'company_details',
		'company_edit',
		'company_id',
		'company_name',
		'companys'
	);
	private $type = "";
	protected $id	= "";

	private $pages = 0;
	private $css = "";
	private $css_print = "";
	protected $url_pdf = "";
	protected $url_pdf_encoded = "";
	protected $url_for_pdf = "";
	protected $url_preview = "";
	private $options = array();
	protected $PDF = null;
	private $pdfOrientation = 'P';
	private $pdfUnit = 'mm';
	private $pdfFormat = 'LETTER';

	/**
	 * constructor
	 */
	public function __construct(){
		parent::__construct();
		if(!empty($_GET['submit'])){
			$this->id = $_GET['submit'];
		}
		# General assignments
		$this->options['spreadsheet'] = $this->spreadsheet;
		$this->options['word_processor'] = $this->word_processor;

		$this->setCompanyWording();
		$this->PDF = null;

	}

	/**
	 * destructor
	 */
	public function __destruct() {

	}
	public function giveInfo(){
		$info = $this->getInfo('basic');
		$info['compound'] = $this->getCompound($info);
		return $info;
	}
	public function giveCompany($name){
		if($this->module == 'purchases'){
			$tbl = 'genlu_vendors';
		} elseif($this->module == 'sales'){
			$tbl = 'genlu_customers';
		}
		$sql = "SELECT * FROM $tbl WHERE name = '$name'";
		$co = $this->queryRow($sql);
		$co['compound'] = $this->getCompound($co);
		//$this->dump($co);
		return $co;
	}
	public function giveCompanyNames(){
		if($this->module == 'purchases'){
			$tbl = 'genlu_vendors';
		} elseif($this->module == 'sales'){
			$tbl = 'genlu_customers';
		}
		$sql = "SELECT name FROM $tbl";
		$companys = $this->queryAll($sql);
		return $companys;
	}
	public function giveShippingMethods(){
		$sql = "SELECT method FROM genlu_shipping_methods ORDER BY method DESC";
		$result = $this->queryAll($sql);
		$methods = array();
		foreach($result as $method){
			$methods[] = $method['method'];
		}
		return $methods;
	}
	/** protected methods */

	protected function toPDF($data){
		require_once(SIX_LIB_DIR . '/six.pdf.class.php');
		$pdf = new SIX_PDF();
		$pdf->AliasNbPages();
		$pdf->setData($data);
		$pdf->AddPage();
		$pdf->showLines();
		$pdf->Output();
		exit();
	}

	/* Schedule predefined script & css 'combos' to be loaded */
	protected function setupScripts($param = false){
		$scripts = array();
		if($param == 'autocomplete'){
			$scripts[] = '<script type="text/javascript" src="./include/js/autocomplete/dimensions.js"></script>';
			$scripts[] = '<script type="text/javascript" src="./include/js/autocomplete/jquery.bgiframe.min.js"></script>';
			$scripts[] = '<script type="text/javascript" src="./include/js/autocomplete/jquery.autocomplete.js"></script>';
			$scripts[] = '<link rel="stylesheet" type="text/css" href="./include/js/autocomplete/main.css" />';
			$scripts[] = '<link rel="stylesheet" type="text/css" href="./include/js/autocomplete/jquery.autocomplete.css" />';

		} elseif($param == 'calendar'){
			$scripts[] = '<script type="text/javascript" src="./include/js/calendar/jquery-calendar.pack.js"></script>';
			$scripts[] = '<script type="text/javascript" src="./include/js/calendar/jquery-calendar-conf.js"></script>';
			$scripts[] = '<link rel="stylesheet" type="text/css" href="./include/js/calendar/jquery-calendar.css" />';

		} elseif($param == 'validation') {

			$scripts[] = '<script type="text/javascript" src="./include/js/jquery.metadata.js"></script>';
			$scripts[] = '<script type="text/javascript" src="./include/js/jquery.validate.pack.js"></script>';
			// $scripts[] = '<script type="text/javascript" src="./include/js/js.sources/jquery.validate.js"></script>';
			$scripts[] = '<script type="text/javascript" src="./include/js/invoices.validation.js"></script>';

		}
		foreach($scripts as $script){
			$this->templates->insertScript($script);
		}
	}

	protected function getCompany(){
		if($this->module == 'purchases'){
			$tbl = 'genlu_purchase_invoices';
			$field = 'vendor_id';
		} elseif($this->module == 'sales'){
			$tbl = 'genlu_sales_invoices';
			$field = 'customer_id';
		}
		$sql = "SELECT $field FROM $tbl WHERE id = $this->id";
		$company_id = $this->queryOne($sql);
		if($this->module == "purchases"){
			return $this->getVendor($company_id);
		} elseif($this->module == "sales"){
			return $this->getCustomer($company_id);
		}
		return false;
	}

	protected function getCompanyName($module, $id){
		if($module == 'purchases'){
			$tbl = 'genlu_vendors';
		} elseif($module == 'sales'){
			$tbl = 'genlu_customers';
		}
		$sql = "SELECT name FROM $tbl WHERE id = $id";
		return $this->queryOne($sql);
	}

	protected function getCustomer($id){
		$sql = "SELECT * FROM genlu_customers WHERE id = $id";
		$customer = $this->queryRow($sql);
		return $customer;
	}

	protected function getCustomers(){
		$sql = "SELECT * FROM genlu_customers ORDER BY name";
		$result =& $this->db->query($sql);
		$customers = null;
		while($row = $result->fetchRow()){
			$customers[] = $row;
		}
		$result->free();
		return $customers;
	}

	protected function getVendor($id){
		$sql = "SELECT * FROM genlu_vendors WHERE id = $id";
		$vendor = $this->queryRow($sql);
		return $vendor;
	}

	protected function getVendors(){
		$sql = "SELECT * FROM genlu_vendors ORDER BY name";
		$result =& $this->db->query($sql);
		$vendors = null;
		while($row = $result->fetchRow()){
			$vendors[] = $row;
		}
		$result->free();
		return $vendors;
	}

	protected function getProduct($id){
		$sql = "SELECT * FROM genlu_products WHERE id = $id";
		$result =& $this->db->query($sql);
		$product = $result->fetchRow();
		$result->free();
		return $product;
	}

	protected function getProducts(){
		$sql = "SELECT * FROM genlu_products ORDER BY reference";
		$result =& $this->db->query($sql);
		$products = null;
		while($row = $result->fetchRow()){
			$products[] = $row;
		}
		$result->free();
		return $products;
	}

	/**
	* display all invoices in database of type 'type'
	* @param (string) $type (sales|purchase)
	* @param (string) $id invoice ID
	* @return (assoc-array) invoice details
	*/
	protected function getInvoice(){
		if($this->module == 'purchases'){
			$tbl = 'genlu_purchase_invoices';
		} elseif($this->module == 'sales'){
			$tbl = 'genlu_sales_invoices';
		}
		$sql = "SELECT * FROM $tbl WHERE id = $this->id";
		$invoice = $this->queryRow($sql);
		return $invoice;
	}

	/**
	* display all invoices in database of type 'type'
	* @param (string) $type (sales|purchase)
	* @return (assoc-array) all invoices in database
	*/
	protected function getInvoices(){
		if($this->module == 'purchases'){
			$tbl	= 'genlu_purchase_invoice_totals';
		} elseif($this->module == 'sales'){
			$tbl	= 'genlu_sales_invoice_totals';
		}
		$sql = "SELECT * FROM $tbl ORDER BY invoice_number DESC";
		$invoices = $this->queryAll($sql);
		return $invoices;
	}

	protected function getInvoiceLines() {
		if($this->module == 'purchases'){
			$tbl	= 'genlu_purchase_invoice_lines';
		} elseif($this->module == 'sales'){
			$tbl	= 'genlu_sales_invoice_lines';
		}
		$sql = "SELECT * FROM $tbl WHERE invoice_id = $this->id";
		// echo $sql;
		// Todo: pasar esto a $this->queryAll($sql)
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
		}
		$invoiceLines = null;
		while($row = $result->fetchRow()){
			$sql2 = "SELECT * FROM genlu_products WHERE id = {$row['product_id']}";
			$result2 =& $this->db->query($sql2);
			if(MDB2::isError($result2)){
				echo <<<EOD
				<p style='color:red;font-weight:bold'>
				{$result->getMessage()}
				</p>
				<p style='color:blue;font-weight:bold'>
				{$result->getUserinfo()}
				</p>
EOD;
				exit();
			}
			$row['product'] = $result2->fetchRow();
			$invoiceLines[] = $row;
			$result2->free();
		}
		$result->free();
		if($invoiceLines){
			foreach($invoiceLines as $num => $line){
				foreach($line as $key => $val){
					if($key == 'unit_price' || $key == 'unit_cost'){
						$invoiceLines[$num]['price'] = $invoiceLines[$num][$key];
						unset($invoiceLines[$num][$key]);
					}
					$invoiceLines[$num]['amount'] = number_format($invoiceLines[$num]['price']*$invoiceLines[$num]['quantity'],2);
				}
			}
		}
		return $invoiceLines;
	}

	protected function getInvoicePages(){
		if($this->module == 'purchases'){
			$tbl	= 'genlu_purchase_invoice_lines';
		} elseif($this->module == 'sales'){
			$tbl	= 'genlu_sales_invoice_lines';
		}
		$sql = "SELECT * FROM $tbl WHERE invoice_id = $this->id";
		$result =& $this->db->query($sql);
		if(MDB2::isError($result)){
			echo $result->getMessage() . ' -- ' . $result->getUserinfo();
			exit();
		}
		$lines = $result->numRows();
		$pages = ceil($lines/$this->lines_per_page);
		return $pages;
	}

	protected function getPages($data){
		$lines = count($data);
		$pages = ceil($lines/$this->lines_per_page);
		return $pages;
	}


	protected function setCompanyWording(){
		foreach($this->company_lang as $key){
			$this->lang[$key] = $this->lang['module_' . $this->module][$key];
		}
		$this->engine->assign("LANG", $this->lang);
	}

	/**
	* display table-rows with company details, company being customer or vendor
	* @param (string) $type (sales|purchases)
	* @param (string) $id customer/vendor id
	* @return (string) $display: several <tr> (table rows) with details,
	* 	one for each 'valid tag' specified plus the special 'compound' tags.
	*	sample: <tr>
	*				<td class="customer_col_1">tag name</td>
	*				<td class="customer_col_2">tag value</td>
	*			</tr>
	*/
	protected function displayCompanyDetails($id){
		if ($this->module == "sales") {
			$company = $this->getCustomer($id);
			$company['tags'] = array(
				"name" => "Name",
				"customer_short_id" => "Customer ID",
				"attention" => "Contact",
				"street_address" => "Address",
				"street_address2" => "",
				"compound" => "",
				"shipping_address" => "Shipping Address",
				"shipping" => "",
				"phone" => "Phone",
				"fax" => "Fax",
				"email" => "Email"
			);
		} elseif ($this->module == "purchases") {
			$company = $this->getVendor($id);
			$company['tags'] = array(
				"name" => "Name",
				"attention" => "Contact",
				"street_address" => "Address",
				"street_address2" => "",
				"compound" => "",
				"phone" => "Phone",
				"fax" => "Fax",
				"email" => "Email"
			);
		} else {
			die("Invalid type.");
		}
		$compound = array(
			'city' 		=> $company['city'],
			'state' 	=> $company['state'],
			'zip_code' 	=> $company['zip_code'],
			'country'	=> $company['country']
		);
		$compound2 = array(
			'shipping_city' 	=> $company['shipping_city'],
			'shipping_state' 	=> $company['shipping_state'],
			'shipping_zip_code' => $company['shipping_zip_code'],
			'shipping_country' 	=> $company['shipping_country']
		);
		$compound_address  = $this->getCompound($compound);
		$compound_shipping = $this->getCompound($compound2);

		$display = "";
		if(!empty($company)) {
			foreach($company['tags'] as $tag => $tag_name){
				if ($tag == "compound") {
					$display .= <<<EOD
						<tr>
							<td class="customer_col_1"></td>
							<td class="customer_col_2">{$compound_address}</td>
						</tr>
EOD;
				} elseif ($tag == "shipping") {
					# never reached by vendors
					$display .= <<<EOD
						<tr>
							<td class="customer_col_1"></td>
							<td class="customer_col_2">{$compound_shipping}</td>
						</tr>
EOD;
				}
				# assignment -.- (testing for non-empty values)
				if ($val = $company[$tag]) {
					$display .= <<<EOD
						<tr>
							<td class="customer_col_1">{$tag_name}</td>
							<td class="customer_col_2">{$val}</td>
						</tr>
EOD;
				}
			}
		}
		return $display;
	}

	function getNextInvoiceNumber() {
		if($this->module == 'purchases'){
			$tbl	= 'genlu_purchase_invoices';
			$field 	= 'invoice_number';
		} elseif($this->module == 'sales'){
			$tbl	= 'genlu_sales_invoices';
			$field 	= 'invoice_number';
		} elseif($this->module == 'reports'){
			$tbl	= 'genlu_reports';
			$field 	= 'number';
		}
		$sql = "SELECT $field FROM $tbl ORDER BY $field DESC LIMIT 1";
		$result =& $this->db->query($sql);
		if(MDB2::isError($result)){
			$last = 0;
		} else {
			$last = $result->fetchOne();	// 00010A0012
			$result->free();
		}
		$prefix = substr($last, 0, 6);
		$number = substr($last, -4);
		$number++;

		$invoice_number = $prefix . str_pad($number, 4, 0, STR_PAD_LEFT);
		return $invoice_number;
	}

	/** private methods */

	private function getCompound($data){
		$compound = "";
		if (!empty($data['city'])) {
			$compound = $data['city'];
			if (!empty($data['state'])) {
				$compound .= " - " . $data['state'];
				if (!empty($data['zip_code'])) {
					$compound .= ", " . $data['zip_code'];
				}
			}
			if (!empty($data['country'])) {
				$compound .= " (" . $data['country'] . ")";
			}
		} elseif (!empty($data['country'])) {
			$compound = $data['country'];
		}
		return $compound;
	}

	/** Performs the Save operation of the forms defined by $type
	 *	@param (string) $type (purchases|sales)
	 */
	protected function process_form(){
		$this->logger->setIdent('SIXModule::process_form');
		$this->logger->debug("##########################################");
		$this->logger->debug("Processing Invoice (Inserting or Editing).");
		$this->logger->debug("Module: {$this->module}\nView: {$this->view}\nAction: {$this->action}");
		//$this->dump($_REQUEST);

		if($this->module == "purchases"){
			$invoice_tbl = "genlu_purchase_invoices";
			$lines_tbl = "genlu_purchase_invoice_lines";
			$price = 'i_unit_cost';
			$db_price_field = 'unit_cost';
			$company_id = 'vendor_id';
			$sql = "INSERT INTO $invoice_tbl (
				id,
				invoice_number,
				vendor_invoice_number,
				date,
				vendor_id,
				tax_id,
				freight,
				note,
				terms,
				shipping_method
			)
			VALUES (
				'',
				'$_POST[invoice_number]',
				'$_POST[vendor_invoice_number]',
				'$_POST[date]',
				'$_POST[company_id]',
				'$_POST[tax_id]',
				'$_POST[freight]',
				'$_POST[note]',
				'$_POST[terms]',
				'$_POST[shipping_method]'
			)";
		} elseif($this->module == "sales"){
			$invoice_tbl = "genlu_sales_invoices";
			$lines_tbl = "genlu_sales_invoice_lines";
			$company_id = 'customer_id';
			$price = 'i_unit_price';
			$db_price_field = 'unit_price';
			$shipping_info = addslashes(serialize(array(
				$_POST['shipping_name'],
				$_POST['shipping_address'],
				$_POST['shipping_address2'],
				$_POST['shipping_compound'],
				$_POST['shipping_phone'],
				$_POST['shipping_fax'],
				$_POST['shipping_email']
			)));
			$sql = "INSERT INTO $invoice_tbl (
				id,
				invoice_number,
				customer_id,
				shipping_info,
				tax_id,
				freight,
				date,
				note,
				terms,
				shipping_method
			)
			VALUES (
				'',
				'$_POST[invoice_number]',
				'$_POST[company_id]',
				'$shipping_info',
				'$_POST[tax_id]',
				'$_POST[freight]',
				'$_POST[date]',
				'$_POST[note]',
				'$_POST[terms]',
				'$_POST[shipping_method]'
			)";
		}
		if($this->action == 'update'){
			# TODO agregar el vendor invoice number
			$sql = "UPDATE $invoice_tbl SET
				invoice_number = '$_POST[invoice_number]',
				date = '$_POST[date]',
				$company_id = '$_POST[company_id]',
				tax_id = '$_POST[tax_id]',
				freight = '$_POST[freight]',
				terms = '$_POST[terms]',
				shipping_method = '$_POST[shipping_method]',
				note = '$_POST[note]'
				WHERE id = $_POST[invoice_id]";
		}
		$this->logger->debug("SQL: $sql");
		# exec devuelve (int) o Error
		$result =& $this->db->exec($sql);
		if(MDB2::isError($result)){
			$this->logger->err($result->getMessage() . $result->getUserinfo());
			die($result->getMessage() . $result->getUserinfo());
		} else {
			$display_block = $LANG['save_invoice_success'];
		}
		#get the invoice id from the last insert
		if($this->action == 'update'){
			$invoice_id = $_POST['invoice_id'];
		} else {
			$invoice_id = $this->db->lastInsertID($invoice_tbl, 'id');
		}
		$this->logger->log("Invoice ID: $invoice_id");
		if($this->action == 'update'){
			$delete_sql = "DELETE FROM $lines_tbl WHERE invoice_id = $_POST[invoice_id]";
			$res =& $this->db->exec($delete_sql);
			if(MDB2::isError($result2)){
				$this->logger->err($result2->getMessage() . $result2->getUserinfo());
				die($result2->getMessage() . $res->getUserinfo());
			}
			$this->logger->debug("Deleting lines (we will update)");
			$this->logger->debug("DELETE SQL: $delete_sql");
		}
		$this->logger->debug("Processing Lines.");
		for($i=0;$_POST["qty$i"];$i++){
			$qty 					= $_POST["qty$i"];
			$product_id 			= $_POST["id$i"];

			$product_description 	= utf8_encode($_POST["desc$i"]);
			$product_price		 	= $_POST["price$i"];
			# Insert record in invoice_items table
			$row_sql = "INSERT INTO $lines_tbl VALUES (
				'',
				'$invoice_id',
				'$product_id',
				'$product_description',
				'$qty',
				'$product_price'
			)";
			$result2 =& $this->db->exec($row_sql);
			if(MDB2::isError($result2)){
				$this->logger->err($result2->getMessage() . $result2->getUserinfo());
				die($result2->getMessage() . $result2->getUserinfo());
			} else {
				$display_block = 'save_invoice_success';
			}
			### Inventory Control
			$sql = "";
			if($this->module == "purchases"){
				$diff = $qty;
				$sql = "UPDATE genlu_products SET
					qty_hand=qty_hand+$diff,
					last_unit_cost=$product_price
					WHERE id=$product_id";
			} elseif($this->module == "sales"){
				$diff = -1*$qty;
				$sql = "UPDATE genlu_products SET
					qty_hand=qty_hand+$diff
					WHERE id=$product_id";
			}
			$result3 =& $this->db->exec($sql);
			if(MDB2::isError($result2)){
				$this->logger->err($result3->getMessage() . $result3->getUserinfo());
				die($result3->getMessage() . $result3->getUserinfo());
			}
			### End Inventory Control
			$this->logger->debug("Row_SQL: $row_sql\nInventory SQL: $sql");
		}
		//$this->dump($_POST);
		$refresh = "<META HTTP-EQUIV=REFRESH CONTENT=1;URL=index.php?module=$this->module&view=quick_view&submit=$invoice_id>";
		echo <<<EOD
			{$refresh}
			<br>
			{$display_block}
EOD;
	}

	/**TODO: cambiar la forma en que se toman los datos del invoice (implementar Views)*/
	/** Performs the Quick View of an Invoice
	*/
	function quick_view(){
		include_once(SIX_LIB_DIR . '/quick_view.php');
		return $display;
	}

	function displayAccountBalance(){
		$display = "";
		$display .= <<<EOD
					<tr>
						<td class="left">Debit</td>
						<td class="right">$0.00</td>
					</tr>
					<tr>
						<td class="left">Credit</td>
						<td class="right">$0.00</td>
					</tr>
					<tr>
						<td class="left">Balance</td>
						<td class="right">$0.00</td>
					</tr>
EOD;
		return $display;
	}

	/**
	* Shows invoice summary
	* @param (string) $type (purchases|sales)
	* @param (string) $id Invoice ID
	*/
	function displayInvoiceSummary(){
		$date = $this->convertDate($this->data['invoice']['date']);
		$due_date = $this->getDueDate($this->data['invoice']['date']);
		$totals = $this->getInvoiceTotals();
		$display = <<<EOD
			<table class="summary_right">
				<tr>
					<td class="info_header" colspan="2">Invoice Summary</td>
				</tr>
				<tr>
					<td class="left">Number</td>
					<td class="right">{$this->data['invoice']['invoice_number']}</td>
				</tr>
				<tr>
					<td class="left">Date</td>
					<td class="right">{$date}</td>
				</tr>
				<tr>
					<td class="left">Due Date</td>
					<td class="right">{$due_date}</td>
				</tr>
				<tr>
					<td class="left">Total Amount</td>
					<td class="right">\${$totals['total']}</td>
				</tr>
			</table>
EOD;
		return $display;
	}

	function convertDate($date){
		$timestamp = strtotime($date);
		$date = date("m-d-Y", strtotime($date));
		return $date;
	}

	function getDueDate($date){
		$timestamp = strtotime($date);
		$due_stamp = $timestamp + 2592000;
		$due_date  = date("m-d-Y", $due_stamp);
		return $due_date;
	}

	function displayInvoiceDetails(){
		if($this->module == 'purchases'){
			$tbl	= 'genlu_purchase_invoices';
		} elseif($this->module == 'sales'){
			$tbl	= 'genlu_sales_invoices';
		}
		$invoice_lines = $this->getInvoiceLines();
		$totals = $this->getInvoiceTotals();

		$display = "";
		$display = <<<EOD
			<table class="invoice_header_center">
			<tr class="light">
				<td class="reference">Reference</td>
				<td class="description">Description</td>
				<td class="qty">Qty</td>
				<td class="unit_price">Unit Price</td>
				<td class="amount">Amount</td>
			</tr>
EOD;
		foreach($invoice_lines as $num => $line){
			$ref	= $line['product']['reference'];
			$desc	= $line['product']['description'];
			$qty	= number_format($line['quantity']);
			$price	= number_format($line['price'],2);
			$amount = number_format(($qty * $price),2);
			$display .= <<<EOD
				<tr>
					<td class="totals" style="padding:0px 5px">$ref</td>
					<td class="totals" style="padding:0px 5px">$desc</td>
					<td class="totals numeric" style="padding:0px 5px">$qty</td>
					<td class="totals numeric" style="padding:0px 5px">$price</td>
					<td class="totals numeric" style="padding:0px 5px">$amount</td>
				</tr>
EOD;
		}
		$display .= "</table>";
		$display .= <<<EOD
			<table class="invoice_totals">
				<tr>
					<td class="totals bold">Subtotal</td>
					<td class="totals numeric">{$totals['subtotal']}</td>
				</tr>
				<tr>
					<td class="totals bold">Tax</td>
					<td class="totals numeric">{$totals['tax']}</td>
				</tr>
				<tr>
					<td class="totals bold">Freight</td>
					<td class="totals numeric">{$totals['freight']}</td>
				</tr>
				<tr>
					<td class="totals bold">TOTAL</td>
					<td class="totals bold numeric">\${$totals['total']}</td>
				</tr>
			</table>
			<table class="invoice_total_qty">
				<tr class="null">
					<td class="totals"><br /></td><td></td>
				</tr>
				<tr class="null">
					<td class="totals"><br /></td><td></td>
				</tr>
				<tr class="null">
					<td class="totals"><br /></td><td></td>
				</tr>
				<tr>
					<td class="totals bold">Total Items:</td>
					<td class="totals bold numeric">{$totals['total_qty']}</td>
				</tr>
			</table>
EOD;
		return $display;
	}

	function displayNote(){
		$note = $this->data['invoice']['note'];
		if(!empty($note)){
			$display_note = <<<EOD
				<table class="summary_table">
					<tr>
						<td class="header">Notes:</td>
						<td class="header right">
							<a href='#' class="show-notes" onClick="$('.notes').show();$('.show-notes').hide();">(hide)</a>
							<a href='#' class="notes" onClick="$('.notes').hide();$('.show-notes').show();">(show)</a>
						</td>
					</tr>
					<tr class="show-notes">
						<td colspan="2">{$note}</td>
					</tr>
				</table>
EOD;
		} else {
			$display_note = <<<EOD
				<table class="summary_table">
					<tr>
						<td class="header">Notes:</td>
						<td class="header right"></td>
					</tr>
					<tr>
						<td>No notes attached to this invoice</td>
						<td></td>
					</tr>
				</table>
EOD;
		}
		return $display_note;
	}

	function displayTotals(){
		$totals = $this->getInvoiceTotals();
		$display = "";
		$display .= <<<EOD
		<table class="invoice_totals">
				<tr>
					<td class="total_col1">Subtotal</td>
					<td class="total_col2">{$totals['subtotal']}</td>
				</tr>
				<tr>
					<td class="total_col1">Tax</td>
					<td class="total_col2">{$totals['tax']}</td>
				</tr>
				<tr>
					<td class="total_col1">Freight</td>
					<td class="total_col2">{$totals['freight']}</td>
				</tr>
				<tr>
					<td class="total_col1">TOTAL</td>
					<td class="total_col2" style="font-weight: bold">{$totals['total']}</td>
				</tr>
			</table>
			<!-- Total Qty -->
			<table class="invoice_total_qty">
				<tr class="null">
					<td>&nbsp</td><td></td>
				</tr>
				<tr class="null">
					<td>&nbsp</td><td></td>
				</tr>
				<tr class="null">
					<td>&nbsp</td><td></td>
				</tr>
				<tr>
					<td class="total_qty_col1">Total Items:</td>
					<td class="total_qty_col2">{$totals['total_qty']}</td>
				</tr>
			</table>
EOD;
	return $display;
	}

	function getInvoiceTotals(){
		# TODO: add tax stuff
		$totals = array();
		$totals['total_qty']	= $this->getTotalQty();
		$totals['total']		= $this->calcInvoiceTotal();
		$totals['freight'] 		= $this->getInvoiceFreight();
		$totals['tax']			= 0.00;
		$totals['subtotal']	= $totals['total'] - $totals['tax'] - $totals['freight'];
		foreach($totals as $key => $amount) {
			if($key == 'total_qty'){
				$totals[$key] = number_format($amount,0);
			} else {
				$totals[$key] = number_format($amount,2);
			}
		}
		return $totals;
	}

	function getTotalQty(){
		if($this->module == 'purchases'){
			$tbl	= 'genlu_purchase_invoice_lines';
		} elseif($this->module == 'sales'){
			$tbl	= 'genlu_sales_invoice_lines';
		}
		$sql = "SELECT sum(quantity) FROM $tbl WHERE invoice_id=$this->id";
		$result =& $this->db->query($sql);
		$qty = $result->fetchOne();
		$result->free();
		return $qty;
	}

	function calcInvoiceTotal() {
		if($this->module == 'purchases'){
			$tbl	= 'genlu_purchase_invoice_totals';
		} elseif($this->module == 'sales'){
			$tbl	= 'genlu_sales_invoice_totals';
		}
		//$sql = "SELECT total from $tbl where invoice_number='" . $this->data['invoice']['invoice_number'] . "'";
		$sql = "SELECT total from $tbl where id=$this->id";
		$total = $this->queryOne($sql);
		return $total;
	}

	function getInvoiceFreight(){
		if($this->module == 'purchases'){
			$tbl	= 'genlu_purchase_invoices';
		} elseif($this->module == 'sales'){
			$tbl	= 'genlu_sales_invoices';
		}
		$sql = "SELECT freight FROM $tbl WHERE id=$this->id";
		$result =& $this->db->query($sql);
		$freight = $result->fetchOne();
		$result->free();
		return $freight;
	}

	function calc_customer_total($id) {

		include('./config/config.php');
		ob_start();
		include("./lang/$language.inc.php");
		ob_end_clean();

		$conn = mysql_connect( $db_host, $db_user, $db_password );
		mysql_select_db( $db_name, $conn );

		$customer_total_sql = "SELECT sum(l.quantity*l.unit_price)+inv.freight as total FROM genlu_invoice_lines AS l JOIN genlu_invoices AS inv ON inv.id = l.invoice_id where inv.customer_id=$this->id GROUP BY inv.customer_id";

		$result = mysqlQuery($customer_total_sql, $conn) or die(mysql_error());
		if(mysql_num_rows($result) > 0){
			$customer_total = mysql_result($result, 0);
		} else {
			$customer_total = 0;
		}
		return $customer_total;
	}

	function getRicoLiveGrid($name, $columnSpecs) {

		echo <<<EOD
		<script src="./modules/include/js/lgplus/js/rico.js" type="text/javascript"></script>
		<script type='text/javascript'>
		Rico.loadModule('LiveGrid');
		Rico.loadModule('LiveGridMenu');
EOD;

		setStyle();
		setLang();

		echo <<<EOD
		Rico.onLoad( function() { var opts = {
EOD;

	GridSettingsScript();

	echo <<<EOD
	, columnSpecs : [ , $columnSpecs ] };
	var menuopts =
EOD;

	GridSettingsMenu();

	echo <<<EOD
	; new Rico.LiveGrid ('$name', new Rico.GridMenu(menuopts), new
	Rico.Buffer.Base($('$name').tBodies[0]), opts); });
	</script>

	<!--[if gte IE 5.5]>
	<link rel="stylesheet" type="text/css" href="./templates/default/css/iehacks.css" media="all"/>
	<![endif]-->
EOD;
	}

	protected function queryRow($sql){
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
			$one = $result->fetchOne();
			$result->free();
		}
		return $one;
	}
	/** PRIVATE */
}


?>
