<?php

class gene_invoice extends invoice {

		function insertInvoiceItem($invoice_id,$quantity,$product_id,$tax_id,$description="",$unit_price, $unit_cost, $unit_load_cost) {
			
			$tax = getTaxRate($tax_id);
			$product = getProduct($product_id);
			
			/*
			* If a unit cost or price is empty then get from products table
			*/
			empty($unit_price) ? $unit_price = $product['unit_price'] : $unit_price = $unit_price;
			empty($unit_cost) ? $unit_cost = $product['unit_cost'] :  $unit_cost = $unit_cost;
			empty($unit_load_cost) ? $unit_load_cost = $product['unit_cost'] :  $unit_load_cost = $unit_load_cost;

			$actual_tax = $tax['tax_percentage']  / 100 ;
			$total_invoice_item_tax = $unit_price * $actual_tax;
			$tax_amount = $total_invoice_item_tax * $quantity;
			$total_invoice_item = $total_invoice_item_tax + $unit_price ;	
			$total = $total_invoice_item * $quantity;
			$gross_total = $unit_price  * $quantity;

			
			$sql = "INSERT INTO ".TB_PREFIX."invoice_items (invoice_id,quantity,product_id,unit_price,unit_cost,unit_load_cost,tax_id,tax,tax_amount,gross_total,description,total) VALUES ($invoice_id,$quantity,$product_id,$unit_price,$unit_cost,$unit_load_cost,'$tax[tax_id]',$tax[tax_percentage],$tax_amount,$gross_total,'$description',$total)";

			//echo $sql;
			return mysqlQuery($sql);

		}

		function updateInvoiceItem($id,$quantity,$product_id,$tax_id,$description,$unit_price,$unit_cost,$unit_load_cost) {

			$product = getProduct($product_id);
			$tax = getTaxRate($tax_id);
			
			/*
			* If a unit cost or price is empty then get from products table
			*/
			empty($unit_price) ? $unit_price = $product['unit_price'] : $unit_price = $unit_price;
			empty($unit_cost) ? $unit_cost = $product['unit_cost'] :  $unit_cost = $unit_cost;
			empty($unit_load_cost) ? $unit_load_cost = $product['unit_cost'] :  $unit_load_cost = $unit_load_cost;
			
			$total_invoice_item_tax = $product['unit_price'] * $tax['tax_percentage'] / 100;	//:100?
			$tax_amount = $total_invoice_item_tax * $quantity;
			$total_invoice_item = $total_invoice_item_tax + $product['unit_price'];
			$total = $total_invoice_item * $quantity;
			$gross_total = $product['unit_price'] * $quantity;
			
			
			
			$sql = "UPDATE ".TB_PREFIX."invoice_items 
			SET `quantity` =  '$quantity',
			`product_id` = '$product_id',
			`unit_price` = '$unit_price',
			`unit_cost` = '$unit_cost',
			`unit_load_cost` = '$unit_load_cost',
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


		function getInvoiceItem($id) {
			
			$sql = "SELECT * FROM ".TB_PREFIX."invoice_items WHERE id =$id";
			$query = mysqlQuery($sql);
			return mysql_fetch_array($query);
		}


}
class gene_product{

		function insertProduct($enabled=1,$visible=1) {
			if(isset($_POST['enabled'])) {
				$enabled=$_POST['enabled'];
			}
			
			$sql = "INSERT into
					".TB_PREFIX."products
				(	
					id,
					description,
					unit_price,
					unit_cost,
					custom_field1,
					custom_field2,
					custom_field3,
					custom_field4,
					notes,
					enabled,
					visible
				)			
				VALUES
					(	
						NULL,
						'$_POST[description]',
						'$_POST[unit_price]',
						'$_POST[unit_cost]',
						'$_POST[custom_field1]',
						'$_POST[custom_field2]',
						'$_POST[custom_field3]',
						'$_POST[custom_field4]',
						'$_POST[notes]',
						'$enabled',
						'$visible'
					)";
			return mysqlQuery($sql);
		}


		function updateProduct() {
			
			$sql = "UPDATE ".TB_PREFIX."products
					SET
						description = '$_POST[description]',
						enabled = '$_POST[enabled]',
						notes = '$_POST[notes]',
						custom_field1 = '$_POST[custom_field1]',
						custom_field2 = '$_POST[custom_field2]',
						custom_field3 = '$_POST[custom_field3]',
						custom_field4 = '$_POST[custom_field4]',
						unit_price = '$_POST[unit_price]',
						unit_cost = '$_POST[unit_cost]'
					WHERE
						id = '$_GET[id]'";

			return mysqlQuery($sql);
		}
					
/*
* Function: updateQty
* Description: Basic inventory function for Simple Invoices. Created for the Gene extension
* Parameters:
* - $product_id: the id of the product 
* - $product_qty: the quantity of the product
* - $preference_id: the invoice preference used for this invoice
* -- different actions are based on different invoice preferences - ie. purchase Orders get handled differently then Invoices
* - $action: this details from what type of page the user came from, ie. edit invoice or new invoice creation. 
*
*/		
		function updateQty($item_id,$product_id,$product_qty,$preference_id,$action)
		{

			echo "Item ID:".$item_id."Prod:".$product_id."Qty:".$product_qty."Pref ID:".$preference_id."Action:".$action."<br>";
			$product = getProduct($product_id);
			//echo "Existing Qty:".$product['qty']."<br>" ;
			/*If coming from new invoice/po screen*/
			if ($action == "creation")
			{
					/*if invoice reduce qty*/
					if ($preference_id==1)
					{
						 $newQty = $product['qty'] - $product_qty;
					}
					/*if po increase qty*/
					if ($preference_id==5)
					{
						$newQty = $product['qty'] + $product_qty;
					}
			}
			/*If editing invoice/po*/
			if ($action == "edit")
			{



				/*	
				* If invoice edited and qty adjusted add or substract the difference between old qty and new qty to the product qty record
				*/

				$invoiceItem = gene_invoice::getInvoiceItem($item_id);
				$origItemQty = $invoiceItem['quantity'];

				/*
				* If edited an product changed, reduce qty by the original amount for that product
				*/
				//TODO code this section
				if ($invoiceItem['product'] != $product_id)
				{

				}
					
				/*
				* If invoice edited and product not changes (which is good :) ) the do this
				*/
				if ($invoiceItem['product'] == $product_id)
				{


					/*if invoice reduce qty*/
					if ($preference_id=="1")
					{
						$differenceQty = $product_qty - $origItemQty;
						$newQty = $product['qty'] - $differenceQty ;
					}
					/*if po increase qty*/
					if ($preference_id=="5")
					{
						$differenceQty = $product_qty - $origItemQty;
						$newQty = $product['qty'] + $differenceQty ;
					}
				}

			}
		
			echo "Pref:".$preference_id."Item ID:".$item_id."Orig Qty:".$origItemQty."Differ Qty:".$differenceQty." New Qty:".$newQty."<br>";

			$sql = "UPDATE ".TB_PREFIX."products
					SET
						qty = '$newQty'
					WHERE
						id = '$product_id'";

			return mysqlQuery($sql);

		}

}

?>
