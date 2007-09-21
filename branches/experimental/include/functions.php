<?php

include("./include/sql_queries.php");

/**
 * returns an array with all files (filenames) in Dir.
 * -- good for include_once :)
 */
function dir_files($dir){
	$files = null;
	if (is_dir($dir)) {
		if ($handle = opendir($dir)) {
			while (false !== ($file = readdir($handle))){
				if(!preg_match('/^\./', $file)){
					$files[] = $dir . '/' . $file;
				}
			}
		}
		closedir($handle);
	}
	return $files;
}

function checkLogin() {
	if (!defined("BROWSE")) {
		echo "You Cannot Access This Script Directly, Have a Nice Day.";
		exit();
	}
}

function getCompoundAddress($id){
	$customer = getCustomer($id);
	$compound = "";
	if (!empty($customer['city'])) {
		$compound = $customer['city'];
		if (!empty($customer['state'])) {
			$compound .= " - " . $customer['state'];
			if (!empty($customer['zip_code'])) {
				$compound .= ", " . $customer['zip_code'];
			}
		}
		if (!empty($customer['country'])) {
			$compound .= " (" . $customer['country'] . ")";
		}
	} elseif (!empty($customer['country'])) {
		$compound = $customer['country'];
	}
	return $compound;
}

function getCompoundShipping($id){
	$customer = getCustomer($id);
	$compound = "";
	if (!empty($customer['shipping_city'])) {
		$compound = $customer['shipping_city'];
		if (!empty($customer['shipping_state'])) {
			$compound .= " - " . $customer['shipping_state'];
			if (!empty($customer['shipping_zip_code'])) {
				$compound .= ", " . $customer['shipping_zip_code'];
			}
		}
		if (!empty($customer['shipping_country'])) {
			$compound .= " (" . $customer['shipping_country'] . ")";
		}
	} elseif (!empty($customer['shipping_country'])) {
		$compound = $customer['shipping_country'];
	}
	return $compound;
}

function displayCustomerDetails($id){
	$customer = getCustomer($id);
	$display = "";
	$valid_tags = array("name" => "Name",
		"customer_short_id" => "Customer ID",
		"attention" => "Contact",
		"street_address" => "Address",
		"street_address2" => "",
		"compound" => "",
		"shipping_address" => "Shipping Address",
		"shipping" => "",
		"phone" => "Phone",
		"fax" => "Fax",
		"email" => "Email");
	$compound_address = getCompoundAddress($id);
	$compound_shipping = getCompoundShipping($id);

	if(!empty($customer)) {
		foreach($valid_tags as $tag => $tag_name){
			if($tag == "compound") {
					$display .= <<<EOD
					<tr>
						<td class="customer_col_1"></td>
						<td class="customer_col_2">{$compound_address}</td>
					</tr>
EOD;
			} elseif($tag == "shipping"){
				$display .= <<<EOD
					<tr>
						<td class="customer_col_1"></td>
						<td class="customer_col_2">{$compound_shipping}</td>
					</tr>
EOD;
			}
			# assignment
			if($val = $customer[$tag]){
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

# TODO: implementar esto
function displayAccountBalance($id){
	$customer = getCustomer($id);
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

function displayInvoiceDetails($id){
	$invoice_lines = get_invoice_lines($id);
	$totals = get_invoice_totals($id);
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
		$qty	= number_format($line['qty']);
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

function display_note($id){
	$invoice = get_invoice($id);
	if ( !empty($invoice['note']) ) {
		$note = $invoice['note'];
		$display_note = <<<EOD
			<table class="summary_table">
				<tr>
					<td class="header">Notes:</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2">{$note}</td>
				</tr>
			</table>
EOD;
	} else {
		$display_note = <<<EOD
			<table class="summary_table">
				<tr>
					<td class="header">Notes:</td>
					<td></td>
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

function display_totals($id){
	$totals = get_invoice_totals($id);
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
				<td><br /></td><td></td>
			</tr>
			<tr class="null">
				<td><br /></td><td></td>
			</tr>
			<tr class="null">
				<td><br /></td><td></td>
			</tr>
			<tr>
				<td class="total_qty_col1">Total Items:</td>
				<td class="total_qty_col2">{$totals['total_qty']}</td>
			</tr>
		</table>
EOD;
return $display;
}

function get_invoice_totals($id){
	# TODO: add tax stuff
	$totals = array();
	$totals['total_qty'] = get_total_qty($id);
	$totals['subtotal']	= calc_invoice_total($id);
	$totals['freight'] 	= get_invoice_freight($id);
	$totals['tax']		= 0.00;
	$totals['total']	= $totals['subtotal'] + $totals['tax'] + $totals['freight'];
	foreach($totals as $key => $amount) {
		$totals[$key] = number_format($amount,2);
	}
	return $totals;
}

function get_total_qty($id){
	$qty_sql = "SELECT sum(quantity) FROM genlu_invoice_lines WHERE invoice_id=$id";
	$result = mysqlQuery($qty_sql);
	$qty = mysql_result($result,0);
	return $qty;
}

function get_invoice_date($id){
	$date_sql = "SELECT date FROM genlu_invoices WHERE id=$id";
	$result = mysqlQuery($date_sql);
	$date = mysql_result($result,0);
	return $date;
}

function getLogoList() {
	$dirname="./templates/invoices/logos";
	$ext = array("jpg", "png", "jpeg", "gif");
	$files = array();
	if($handle = opendir($dirname)) {
		while(false !== ($file = readdir($handle)))
		for($i=0;$i<sizeof($ext);$i++)
		if(stristr($file, ".".$ext[$i])) //NOT case sensitive: OK with JpeG, JPG, ecc.
		$files[] = $file;
		closedir($handle);
	}

	sort($files);

	return $files;
}

function getLogo($biller) {
	if(!empty($biller['logo'])) {
		return "./templates/invoices/logos/$biller[logo]";
	}
	else {
		return "./templates/invoices/logos/_default_blank_logo.png";
	}
}

function calc_invoice_total($invoice_id) {

	include('./config/config.php');
	ob_start();
	include("./lang/$language.inc.php");
	ob_end_clean();

	$conn = mysql_connect( $db_host, $db_user, $db_password );
	mysql_select_db( $db_name, $conn );

	$total_sql = "SELECT sum(unit_price * quantity) as total from genlu_invoice_lines where invoice_id=$invoice_id";
	$total = mysqlQuery($total_sql, $conn) or die(mysql_error());

	$invoice_total = mysql_result($total, 0);

	return $invoice_total;
}

function get_invoice_freight($id){
	$freight_sql = "SELECT freight FROM genlu_invoices WHERE id=$id";
	$result = mysqlQuery($freight_sql);
	$freight = mysql_result($result, 0);
	return $freight;
}

function calc_invoice_paid($inv_idField) {

	include('./config/config.php');
	ob_start();
	include("./lang/$language.inc.php");
	ob_end_clean();

	$conn = mysql_connect( $db_host, $db_user, $db_password );
	mysql_select_db( $db_name, $conn );

#amount paid calc - start
$x1 = "SELECT IF ( isnull(sum(ac_amount)) , '0', sum(ac_amount)) AS amount FROM {$tb_prefix}account_payments WHERE ac_inv_id = $inv_idField";
	$result_x1 = mysqlQuery($x1, $conn) or die(mysql_error());
	while ($result_x1Array = mysql_fetch_array($result_x1)) {
		$invoice_paid_Field = $result_x1Array['amount'];
		$invoice_paid_Field_format = number_format($result_x1Array['amount'],2);
#amount paid calc - end
	return $invoice_paid_Field;
	}
}

function calc_customer_total($id) {

	include('./config/config.php');
	ob_start();
	include("./lang/$language.inc.php");
	ob_end_clean();

	$conn = mysql_connect( $db_host, $db_user, $db_password );
	mysql_select_db( $db_name, $conn );

	$customer_total_sql = "SELECT sum(l.quantity*l.unit_price)+inv.freight as total FROM genlu_invoice_lines AS l JOIN genlu_invoices AS inv ON inv.id = l.invoice_id where inv.customer_id=$id GROUP BY inv.customer_id";

	$result = mysqlQuery($customer_total_sql, $conn) or die(mysql_error());
	if(mysql_num_rows($result) > 0){
		$customer_total = mysql_result($result, 0);
	} else {
		$customer_total = 0;
	}
	return $customer_total;
}

function calc_customer_paid($c_idField) {

	include('./config/config.php');
	ob_start();
	include("./lang/$language.inc.php");
	ob_end_clean();

	$conn = mysql_connect( $db_host, $db_user, $db_password );
	mysql_select_db( $db_name, $conn );


#amount paid calc - start
        $x2 = "
		SELECT
			IF ( isnull( sum(ac_amount)) ,  '0', sum(ac_amount)) as amount
		FROM
			{$tb_prefix}account_payments, {$tb_prefix}invoices
		WHERE
			{$tb_prefix}account_payments.ac_inv_id = {$tb_prefix}invoices.id
		AND
			{$tb_prefix}invoices.customer_id = $c_idField";

        $result_x2 = mysqlQuery($x2, $conn) or die(mysql_error());
        while ($result_x2Array = mysql_fetch_array($result_x2)) {
                $invoice_paid_Field_customer = $result_x2Array['amount'];
	}
	return $invoice_paid_Field_customer;
}



/**
* Function: calc_invoice_tax
*
* Calculates the total tax for a given invoices
*
* Arguments:
* invoice_id		- The name of the field, ie. Custom Field 1, etc..
**/
function calc_invoice_tax($master_invoice_id) {

	include('./config/config.php');
	ob_start();
	include("./lang/$language.inc.php");
	ob_end_clean();

	$conn = mysql_connect( $db_host, $db_user, $db_password );
	mysql_select_db( $db_name, $conn );

	#invoice total tax
	$print_invoice_total_tax ="select sum(tax_amount) as total_tax from {$tb_prefix}invoice_lines where invoice_id =$master_invoice_id";
	$result_print_invoice_total_tax = mysqlQuery($print_invoice_total_tax, $conn) or die(mysql_error());

	while ($Array_tax = mysql_fetch_array($result_print_invoice_total_tax)) {
                $invoice_total_taxField = $Array_tax['total_tax'];
	}
	return $invoice_total_taxField;
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

?>
