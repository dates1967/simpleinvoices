<?php
/*
* Script: add_invoice_item.php
* 	add new invoice item in edit page
*
* Authors:
*	 Nicolas Ruflin
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


if(isset($_POST['submit'])) 
{
	$product = getProduct($_POST['product']);
	
	/*
	* If a unit cost or price is empty then get from products table
	*/
	empty($unit_price) ? $unit_price = $product['unit_price'] : $unit_price = $unit_price;
	empty($unit_cost) ? $unit_cost = $product['unit_cost'] :  $unit_cost = $unit_cost;
	empty($unit_load_cost) ? $unit_load_cost = $product['unit_cost'] :  $unit_load_cost = $unit_load_cost;

	$invoice = getInvoice($_POST['invoice_id']);

	gene_product::updateQty($_POST['invoice_id'],$_POST["id$i"],$_POST["product"],$_POST["quantity"],$invoice["preference_id"],"creation",$invoice["custom_field2"]);
	$insertII = new gene_invoice;
	//$insertII->insertInvoiceItem($_POST['invoice_id'],$_POST['quantity'],$_POST['product'],$_POST['tax_id'],$_POST['description']);
	  $insertII->insertInvoiceItem($_POST['invoice_id'],$_POST['quantity'],$_POST['product'],$_POST['tax_id'],$_POST['description'],$unit_price,$unit_cost,$unit_load_cost);
}
else {

$products = getActiveProducts();


$smarty -> assign("products",$products);
}

$type = $_GET[type];
$pageActive = "invoices";
$smarty->assign('pageActive', $pageActive);
$smarty -> assign("type",$type);
?>
