<?php
include("./include/include_main.php");


function getCompound($data){
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

function get_product_details($id) {
	return $product = getProduct($id);
}

function get_client_details($id){
	return $client = getCustomer($id);
}

function get_vendor_details($id){
	return $vendor = get_vendor($id);
}

if((isset($_POST) AND sizeof($_POST)) OR (isset($_GET) AND sizeof($_GET))) {
    $handler = new JqPie();
    $handler->registerCallback('get_product_details_xml');
    $handler->registerCallback('get_product_details');
    $handler->registerCallback('get_client_details');
    $handler->processIncoming();
    exit();
}
?>