<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();
$menu=false;
//TODO
/*validation code*/
jsBegin();
jsFormValidationBegin("frmpost");
jsValidateRequired("name","Biller name");
jsFormValidationEnd();
jsEnd();
/*end validation code*/

//$payment = school_payment::getPayment($_GET['id']);
$invoice_id = $_GET['id'];

/*Code to get the Invoice preference - so can link from this screen back to the invoice - START */
$invoice = invoice::getInvoice($invoice_id);
$invoiceItems = school_invoice::getInvoiceItems($invoice_id);
$invoiceType = getInvoiceType($invoice['type_id']);
//$paymentType = getPaymentType($payment['ac_payment_type']);

$preference = getPreference($invoice['preference_id']);

//$smarty -> assign("payment",$payment);
$smarty -> assign("invoice",$invoice);
$smarty -> assign("invoiceItems",$invoiceItems);
$smarty -> assign("invoiceType",$invoiceType);
//$smarty -> assign("paymentType",$paymentType);

$invoice_total_ru =  num2str($invoice['total']);
$smarty -> assign("invoice_total_ru",$invoice_total_ru);
$smarty -> assign("preference",$preference);

$customer = getCustomer($invoice['customer_id']);
$biller = getBiller($invoice['biller_id']);
$smarty -> assign("customer",$customer);
$smarty -> assign("biller",$biller);

?>
