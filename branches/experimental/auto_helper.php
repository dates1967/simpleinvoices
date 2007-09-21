<?php
require_once 'Log.php';
$conf = array('buffering' => false, 'append' => true);
$logger = &Log::singleton('file', 'log/out.log', 'auto_helper', $conf);

if(!defined('SIX_ROOT')) {
	define('SIX_ROOT', dirname(__FILE__));
};
if(!defined('SIX_LIB_DIR')) {
	define('SIX_LIB_DIR', SIX_ROOT . '/lib');
};
/* Start */
if(isset($_REQUEST)) {

	$logger->log($_REQUEST);
	require_once(SIX_LIB_DIR . '/six.class.php');
	require_once(SIX_ROOT . "/modules/core/module.class.php");
	$six = new SIXModule();

	if($_REQUEST['ask'] == 'products'){
		$sql = "SELECT id, reference, description, price_level_a FROM genlu_products";
		$references = $six->query($sql);
		$edata =json_encode($references);
		echo $edata;

	} elseif($_REQUEST['ask'] == 'all_products') {
		$sql = "SELECT * FROM genlu_products";
		$references = $six->query($sql);
		$edata =json_encode($references);
		echo $edata;

	} elseif($_REQUEST['ask'] == 'customer'){
		if(!empty($_REQUEST['name'])){
			$six->module = 'sales';
			$customer = $six->giveCompany($_REQUEST['name']);
			echo json_encode($customer);
		}

	} elseif($_REQUEST['ask'] == 'vendor') {
		# Se pasan los datos de la compañía (biller)
		if(!empty($_REQUEST['name'])){
			$six->module = 'purchases';
			$vendor = $six->giveCompany($_REQUEST['name']);
			$info = $six->giveInfo();
			$info['id'] = $vendor['id'];
			echo json_encode($info);
		}
	} elseif($_REQUEST['ask'] == 'customers') {
		$six->module = 'sales';
		$customers = array();
		foreach($six->giveCompanyNames() as $value){
			$customers[] = $value['name'];
		}
		echo json_encode($customers);

	} elseif($_REQUEST['ask'] == 'vendors') {
		$six->module = 'purchases';
		$vendors = array();
		foreach($six->giveCompanyNames() as $value){
			$vendors[] = $value['name'];
		}
		echo json_encode($vendors);

	} elseif($_REQUEST['ask'] == 'shipping_methods') {
		$methods = $six->giveShippingMethods();
		echo json_encode($methods);
	}
}
?>