<?php

/*
* Script: save.php
* 	Invoice save file
*
* License:
*	 GPL v3 or above
*	 
* Website:
* 	http://www.simpleinvoices.org
*/


//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$pageActive = "invoices";

$smarty->assign('pageActive', $pageActive);

# Deal with op and add some basic sanity checking


if(!isset( $_POST['type']) && !isset($_POST['action'])) {
	exit("no save action");
}

$saved = false;
$type = $_POST['type'];

if ($_POST['action'] == "insert" ) {
	
	if(school_invoice::insertInvoice($type)) {
		$invoice_id = mysql_insert_id();
//		saveCustomFieldValues($_POST['categorie'],$invoice_id);
		$saved = true;
	}

	/*
	* 1 = Total Invoices
	*/
	if($type==1) {
		product::insertProduct(0,0);
		$product_id = mysql_insert_id();

		if (invoice::insertInvoiceItem($invoice_id,1,$product_id,$_POST['tax_id'],$_POST['description'])) {
			//$saved = true;
		}
		else {
			die(mysql_error());
		}
	}
	else {
		for($i=0;!empty($_POST["quantity$i"]) && $i < $_POST['max_items']; $i++) {

		/*
		* If an extension has set an alternate class name use that - else use the stardard class of invoice
		*/
		//$invoice_class_name = empty($extension['invoice_class_name']) ? "invoice" : $extension['invoice_class_name'] ;
		$insertII = new invoice;
			if ($insertII->insertInvoiceItem($invoice_id,$_POST["quantity$i"],$_POST["products$i"],$_POST['tax_id'],$_POST["description$i"]) ) {
				//$saved = true;
			} else {
				die(mysql_error());
			}
		}
	}
}


if ( $_POST['action'] == "edit") {

	//Get type id - so do add into redirector header

	$invoice_id = $_POST['invoice_id'];
	
	if (school_invoice::updateInvoice($_POST['invoice_id'])) {
//		updateCustomFieldValues($_POST['categorie'],$_POST['invoice_id']);
		$saved = true;
	}

	if($type == 1) {
		$sql = "UPDATE ".TB_PREFIX."products SET `unit_price` = $_POST[unit_price], `description` = '$_POST[description0]' WHERE id = $_POST[products0]";
		mysqlQuery($sql);
	}

	for($i=0;(!empty($_POST["quantity$i"]) && $i < $_POST['max_items']);$i++) {
		
		if (invoice::updateInvoiceItem($_POST["id$i"],$_POST["quantity$i"],$_POST["products$i"],$_POST['tax_id'],$_POST["description$i"])) {
			//$saved =  true;
		}
		else {
			die(mysql_error());
		}
	}

}

//Get type id - so do add into redirector header
$smarty->assign('type', $type);
$smarty->assign('saved', $saved);
$smarty->assign('invoice_id', $invoice_id);

?>
