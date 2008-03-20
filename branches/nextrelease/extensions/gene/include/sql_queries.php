<?php

class gene_invoice extends invoice {

function insertInvoiceItem($invoice_id,$quantity,$product_id,$tax_id,$description="",$unit_price) {
	
	$tax = getTaxRate($tax_id);
	//$product = getProduct($product_id);
	//print_r($product);
	$actual_tax = $tax['tax_percentage']  / 100 ;
	$total_invoice_item_tax = $unit_price * $actual_tax;
	$tax_amount = $total_invoice_item_tax * $quantity;
	$total_invoice_item = $total_invoice_item_tax + $unit_price ;	
	$total = $total_invoice_item * $quantity;
	$gross_total = $unit_price  * $quantity;
	
	$sql = "INSERT INTO ".TB_PREFIX."invoice_items (invoice_id,quantity,product_id,unit_price,tax_id,tax,tax_amount,gross_total,description,total) VALUES ($invoice_id,$quantity,$product_id,$unit_price,'$tax[tax_id]',$tax[tax_percentage],$tax_amount,$gross_total,'$description',$total)";

	//echo $sql;
	return mysqlQuery($sql);

}
function updateInvoiceItem($id,$quantity,$product_id,$tax_id,$description) {

	$product = getProduct($product_id);
	$tax = getTaxRate($tax_id);
	
	$total_invoice_item_tax = $product['unit_price'] * $tax['tax_percentage'] / 100;	//:100?
	$tax_amount = $total_invoice_item_tax * $quantity;
	$total_invoice_item = $total_invoice_item_tax + $product['unit_price'];
	$total = $total_invoice_item * $quantity;
	$gross_total = $product['unit_price'] * $quantity;
	
	
	
	$sql = "UPDATE ".TB_PREFIX."invoice_items 
	SET `quantity` =  '$quantity',
	`product_id` = '$product_id',
	`unit_price` = '$product[unit_price]',
	`tax_id` = '$tax_id',
	`tax` = '$tax[tax_percentage]',
	`tax_amount` = '$tax_amount',
	`gross_total` = '$gross_total',
	`description` = '$description',
	`total` = '$total'			
	WHERE  `id` = '$id'";
	
	//echo $sql;
		
	return mysqlQuery($sql);
}

}
?>
