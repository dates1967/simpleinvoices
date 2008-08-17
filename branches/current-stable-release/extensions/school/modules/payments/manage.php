<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

if($auth_session->role_name == "branch_administrator")
{
	$limit = " AND ap.branch_id = ".$auth_session->user_domain;
}

$payments = null;
#if coming from another page where you want to filter by just one invoice
if (!empty($_GET['id'])) {
	$payments = school_payment::getInvoicePayments($_GET['id']);
}
#if coming from another page where you want to filter by just one customer
elseif (!empty($_GET['c_id'])) {
	$payments = school_payment::getCustomerPayments($_GET['c_id']);
}
#if you want to show all invoices - no filters
else {
	$payments = school_payment::getPayments($limit);
}

getRicoLiveGrid("rico_payment","{ type:'number', decPlaces:0, ClassName:'alignleft' },{ type:'number', decPlaces:0, ClassName:'alignleft' },,,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

$pageActive = "payments";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("payments",$payments);

?>
