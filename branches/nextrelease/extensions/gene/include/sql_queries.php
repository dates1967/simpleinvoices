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

		function getInvoiceTotal($invoice_id) {
			global $LANG;
			
			$sql ="SELECT SUM(total) AS total FROM ".TB_PREFIX."invoice_items WHERE invoice_id = $invoice_id";
			$query = mysqlQuery($sql);
			$res = mysql_fetch_array($query);
			//echo "TOTAL".$res['total'];
			
			$sql2 ="SELECT custom_field1 FROM ".TB_PREFIX."invoices WHERE id = $invoice_id";
			$query2 = mysqlQuery($sql2);
			$res2 = mysql_fetch_array($query2);

			$invoice_total = $res['total'] + $res2['custom_field1'];
			return $invoice_total;
		}

		function getInvoice($id) {

				global $config;

				$sql = "SELECT * FROM ".TB_PREFIX."invoices WHERE id = $id";
				//echo $sql;

				$query  = mysqlQuery($sql) or die(mysql_error());

				//print_r($query);
				$invoice = mysql_fetch_array($query);

				//print_r($invoice);
				//exit();

				$invoice['date'] = date( $config['date_format'], strtotime( $invoice['date'] ) );
				$invoice['calc_date'] = date('Y-m-d', strtotime( $invoice['date'] ) );
				$invoice['total'] = gene_invoice::getInvoiceTotal($invoice['id']);
				$invoice['total_format'] = round($invoice['total'],2);
				$invoice['paid'] = calc_invoice_paid($invoice['id']);
				$invoice['paid_format'] = round($invoice['paid'],2);
				$invoice['owing'] = $invoice['total'] - $invoice['paid'];


				#invoice total tax
				$sql ="SELECT SUM(tax_amount) AS total_tax, SUM(total) AS total FROM ".TB_PREFIX."invoice_items WHERE invoice_id =$id";
				$query = mysqlQuery($sql) or die(mysql_error());
				$result = mysql_fetch_array($query);
				//$invoice['total'] = round($result['total'],2);
				$invoice['total_tax'] = round($result['total_tax'],2);

				return $invoice;
		}

		function getInvoices(&$query) {
			global $config;
			$invoice = null;

			if($invoice =  mysql_fetch_array($query)) {

				$invoice['calc_date'] = date( 'Y-m-d', strtotime( $invoice['date'] ) );
				$invoice['date'] = date( $config['date_format'], strtotime( $invoice['date'] ) );
					
				#invoice total total - start
				$invoice['total'] = gene_invoice::getInvoiceTotal($invoice['id']);
				$invoice['total_format'] = round($invoice['total'],2);
				#invoice total total - end
				
				#amount paid calc - start
				$invoice['paid'] = calc_invoice_paid($invoice['id']);
				$invoice['paid_format'] = round($invoice['paid'],2);
				#amount paid calc - end
				
				#amount owing calc - start
				$invoice['owing'] = $invoice['total'] - $invoice['paid'];
				$invoice['owing_format'] = round($invoice['total'] - $invoice['paid'],2);
				#amount owing calc - end
			}
			return $invoice;
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
		function updateQty($invoice_id,$item_id,$product_id,$product_qty,$preference_id,$action,$flag)
		{

			//echo "<br>#######<br>Invoice If:".$invoice_id."Item ID:".$item_id."Prod:".$product_id."Qty:".$product_qty."Pref ID:".$preference_id."Action:".$action."Flag:".$flag."<br>";
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
					if ( ($preference_id==5) && ($flag=="Received") )
					{
						$newQty = $product['qty'] + $product_qty;
					}
                    
                    /*if new po and not received then skip sql*/
                    if (($flag == "Not Received") AND ($preference_id=="5"))
                    {
                        $skipSql = "true";
                    }

                    if ($skipSql != "true")
                    {
                    $sql = "UPDATE ".TB_PREFIX."products
						SET
							qty = '$newQty'
						WHERE
							id = '$product_id'";
					return mysqlQuery($sql);
	                }
			}
			/*If editing invoice/po*/
			if ($action == "edit")
			{

			$invoice = getInvoice($invoice_id);
			$orig_flag_value = $invoice['custom_field2'];
			//echo "Orig Flag:".$orig_flag_value."<br>";
				/*	
				* If invoice edited and qty adjusted add or substract the difference between old qty and new qty to the product qty record
				*/

				$invoiceItem = gene_invoice::getInvoiceItem($item_id);
				$origItemQty = $invoiceItem['quantity'];

				/*
				* If edited an product changed, reduce qty by the original amount for that product, then do the normal stuff for the new product
				*/
				//TODO code this section

				//invoiceItems[product-id] = old product id, product_id = new product
				if ( $invoiceItem['product_id'] != $product_id )
				{
					//echo "New Product added in edit<br>";
					$productOrig = getProduct($invoiceItem['product_id']);
					$productOrigQty = $productOrig['qty'];
					//echo "orig Prod Qty : productorigQty :".$productOrigQty."<br>";
					//echo "orig Item Qty : origItemQty:".$origItemQty."<br>";
					
					//Update the original items qty
					if ($preference_id=="1")
                    {
						//TODO - think about this and test - its + code right????????
						$newProductQty = $productOrigQty + $origItemQty ;
						$sql = "UPDATE ".TB_PREFIX."products
							SET
								qty = $newProductQty
							WHERE
								id = ".$invoiceItem['product_id']."";
					
					}
					if ($preference_id=="5")
                    {
						$newProductQty = $productOrigQty - $origItemQty ;
						$sql = "UPDATE ".TB_PREFIX."products
							SET
								qty = $newProductQty
							WHERE
								id = ".$invoiceItem['product_id']."";
					}
					mysqlQuery($sql);
					
					//get NEW prod orig tqy then add new qty to it

					if ($preference_id=="1")
					{
                        $newQty = $product['qty'] - $product_qty;					
                        //   echo "Code For the new product into the line item<br>";
                        //   echo "Requested Product qty for this item : product_qty:".$product_qty."<br>";
                        //   echo "Items Orig Product qty : product[qty] :".$product['qty']."<br>";
                        //   echo "Product new qty : newQty:".$newQty."<br>";
					}
					if ( ($preference_id=="5") && ($flag =="Received") && ($orig_flag_value=="Not Received") )
					{
						$newQty = $product['qty'] + $product_qty;					
					}
					$sql2 = "UPDATE ".TB_PREFIX."products
						SET
							qty = '$newQty'
						WHERE
							id = '$product_id'";
	
					return mysqlQuery($sql2);
				}
					
				/*
				* If invoice edited and product not changes (which is good :) ) the do this
				*/
				if ($invoiceItem['product_id'] == $product_id)
				{

					//echo "No Product added in edit<br>";

					/*if invoice reduce qty*/
					if ($preference_id=="1")
                    {
                      //     echo "Invoice : prod = prod<br>";
						$differenceQty = $product_qty - $origItemQty;
						$newQty = $product['qty'] - $differenceQty ;
					}
					/*if po increase qty*/
					if ( $preference_id=="5" AND $flag === "Received" AND $orig_flag_value === "Received" )
					{
						//echo "Recevied & REceived<br>";
						$differenceQty = $product_qty - $origItemQty;
						$newQty = $product['qty'] + $differenceQty ;
					}
					if ( $preference_id== "5" AND $flag === "Received" AND $orig_flag_value === "Not Received" )
					{
						//echo "Recevied & Not Received<br>";
						$newQty = $product['qty'] + $product_qty ;
					}
					$sql = "UPDATE ".TB_PREFIX."products
						SET
							qty = '$newQty'
						WHERE
							id = '$product_id'";
	
			        //echo "test<br>";
                    //echo "Pref:".$preference_id."Orig Prod ID:".$invoiceItem['product_id']."New Prod ID:".$product_id."Item ID:".$item_id."Orig Item Qty:".$origItemQty."Product Orig Qty:".$product['qty']."Requested Item Qty:".$product_qty."Differ Qty:".$differenceQty." New Qty:".$newQty."<br>";
                    
                    return mysqlQuery($sql);
				}

			}
		


		}

}

?>
