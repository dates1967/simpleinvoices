<?php

class school_student extends customer {

function insertCustomer() {
	
	extract( $_POST );
	$sql = "INSERT INTO ".TB_PREFIX."customers VALUES (NULL,'$attention', '$name','$street_address','$street_address2','$city','$state','$zip_code','$country','$phone', '$mobile_phone', '$fax', '$email', '$notes', '$custom_field1', '$custom_field2', '$custom_field3', '$custom_field4', '$enabled')";
	
	return mysqlQuery($sql);
	
}
		/*	
			
			
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
		*/	
}

?>
