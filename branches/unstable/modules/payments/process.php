<?php


//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$maxInvoice = maxInvoice();

jsBegin();
jsFormValidationBegin("frmpost");
#jsValidateifNum("ac_inv_id",$LANG['invoice_id']);
jsPaymentValidation("ac_inv_id",$LANG['invoice_id'],1,$maxInvoice['maxId']);
jsValidateifNum("ac_amount",$LANG['amount']);
jsValidateifNum("ac_date",$LANG['date']);
jsFormValidationEnd();
jsEnd();


/* end validataion code */

$today = date("Y-m-d");

$master_invoice_id = $_GET['invoice'];
$invoice = null;

if(isset($_GET['invoice'])) {
	$invoice = getInvoice($master_invoice_id);
}
else {
	$query = mysqlQuery("SELECT * FROM ".TB_PREFIX."invoices");
	$invoice = mysql_fetch_array($query);
}
$customer = getCustomer($invoice['customer_id']);
$biller = getBiller($invoice['biller_id']);
$defaults = getSystemDefaults();
$pt = getPaymentType($defaults['payment_type']);

$paymentTypes = getActivePaymentTypes();

$smarty -> assign("paymentTypes",$paymentTypes);
$smarty -> assign("defaults",$defaults);
$smarty -> assign("biller",$biller);
$smarty -> assign("customer",$customer);
$smarty -> assign("invoice",$invoice);
$smarty -> assign("today",$today);

?>