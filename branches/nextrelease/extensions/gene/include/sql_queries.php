<?php

class gene_invoice extends invoice {

		function insertInvoiceItem($invoice_id,$quantity,$product_id,$tax_id,$description="",$unit_price, $unit_cost) {
			
			$tax = getTaxRate($tax_id);
			$product = getProduct($product_id);
			
			/*
			* If a unit cost or price is empty then get from products table
			*/
			empty($unit_price) ? $unit_price = $product['unit_price'] : $unit_price = $unit_price;
			empty($unit_cost) ? $unit_cost = $product['unit_cost'] :  $unit_cost = $unit_cost;

			$actual_tax = $tax['tax_percentage']  / 100 ;
			$total_invoice_item_tax = $unit_price * $actual_tax;
			$tax_amount = $total_invoice_item_tax * $quantity;
			$total_invoice_item = $total_invoice_item_tax + $unit_price ;	
			$total = $total_invoice_item * $quantity;
			$gross_total = $unit_price  * $quantity;

			
			$sql = "INSERT INTO ".TB_PREFIX."invoice_items (invoice_id,quantity,product_id,unit_price,unit_cost,tax_id,tax,tax_amount,gross_total,description,total) VALUES ($invoice_id,$quantity,$product_id,$unit_price,$unit_cost,'$tax[tax_id]',$tax[tax_percentage],$tax_amount,$gross_total,'$description',$total)";

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
					
}
?>
