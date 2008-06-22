<?php
/*
* Script: details.php
* 	invoice details page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-19
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */
#table

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$master_invoice_id = $_GET['invoice'];

$invoice = invoice::getInvoice($master_invoice_id);
$invoiceItems = getInvoiceItems($master_invoice_id);
$customers = getActiveCustomers();
$preference = getPreference($invoice['preference_id']);
$billers = getActiveBillers();
$taxes = getActiveTaxes();
$preferences = getActivePreferences();
$products = getActiveProducts();


for($i=1;$i<=4;$i++) {
	$customFields[$i] = show_custom_field("invoice_cf$i",$invoice["custom_field$i"],"write",'',"details_screen",'','','');
}

$pageActive = "invoices";

$smarty -> assign('pageActive', $pageActive);
$smarty -> assign("invoice",$invoice);
$smarty -> assign("invoiceItems",$invoiceItems);
$smarty -> assign("customers",$customers);
$smarty -> assign("preference",$preference);
$smarty -> assign("billers",$billers);
$smarty -> assign("taxes",$taxes);
$smarty -> assign("preferences",$preferences);
$smarty -> assign("products",$products);
$smarty -> assign("customFields",$customFields);
$smarty -> assign("lines",count($invoiceItems));

/*Start reason*/
$sql_start = "select * from ".TB_PREFIX."course_start_reason"; 
$start_sql = sql2array($sql_start);
$smarty -> assign('start_reasons',$start_sql);

/*Dropped reason*/
$sql_drop = "select * from ".TB_PREFIX."course_dropped_reason"; 
$drop_sql = sql2array($sql_drop);
$smarty -> assign('dropped_reasons',$drop_sql);
?>
