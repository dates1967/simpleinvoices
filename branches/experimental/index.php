<?php

//stop browsing to files directly - all viewing to be handled by index.php
//if browse not defined then the page will exit
define("BROWSE","browse");
ini_set('include_path',ini_get('include_path').':'.SIX_ROOT.'/include/pear:');

if(!defined('SIX_ROOT')) {
	define('SIX_ROOT', dirname(__FILE__));
};
if(!defined('SIX_LIB_DIR')) {
	define('SIX_LIB_DIR', SIX_ROOT . '/lib');
};

require_once(SIX_LIB_DIR . '/six.class.php');
require_once(SIX_LIB_DIR . '/sixinvoice.class.php');
require_once(SIX_LIB_DIR . '/sixcustomers.class.php');
require_once(SIX_LIB_DIR . '/sixproducts.class.php');
require_once(SIX_LIB_DIR . '/sixpayments.class.php');
require_once(SIX_LIB_DIR . '/six.module.class.php');
include_once(SIX_LIB_DIR . "/sixreports.class.php");

$module = isset($_GET['module'])?$_GET['module']:null;
$view = isset($_GET['view'])?$_GET['view']:null;
$action = isset($_GET['case'])?$_GET['case']:null;

$six = new Six();

if(isset($module)){
	if($six->module == 'reports'){
		if(!empty($_REQUEST['request'])){
			if($_REQUEST['request'] == 'price_list'){
				$six->focus = new SIXPriceList();
			} elseif($_REQUEST['request'] == 'bank_info'){
				$six->focus = new SIXReports();
				$six->focus->render_info();
			} elseif($_REQUEST['request'] == 'financial'){
				$six->focus = new SIXFinancialReport(); 
			} else {
				$six->focus = new SIXReports();
			}
		} else {
			$six->focus = new SIXReports();
			//$six->focus->parseRequest();
		}
		//$six->focus = new SIXReports();
		//$six->focus->run();
	} elseif($six->module == 'sales' || $six->module == 'purchases') {
		$six->focus = new SIXInvoice();

	} elseif($six->module == 'customers'){
		$six->focus = new SIXCustomers();

	} elseif($six->module == 'products'){
		$six->focus = new SIXProducts();

	} elseif($six->module == 'payments') {
		$six->focus = new SIXPayment();

	} else {

	}
	// $six->dump($six);
	$six->focus->run();
	// $six->run();
} else {
	// header("Location: index.php?module=sales&view=manage");
	// exit();
	$six->run();
}
?>
