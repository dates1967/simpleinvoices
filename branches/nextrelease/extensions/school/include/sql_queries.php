<?php

class school_student extends customer {

function insertCustomer() {
	
	extract( $_POST );
	$sql = "INSERT 
				INTO ".TB_PREFIX."customers 
				(
					attention,
					name,
					street_address,
					street_address2,
					city,
					state, 
					zip_code,
					country,
					phone,
					mobile_phone,
					fax,
					email,
					notes,
					custom_field1,
					custom_field2,
					custom_field3,
					custom_field4,
					enabled,
					
					place_of_enrolment,
					place_of_lesson,
					date,
					first_name,
					middle_name,
					last_name,
					birthday,
					gender,
					age, 
					passport_number,
					passport_issued_at,
					passport_issued_on, 
					cell_phone,
								
								
				
					guardian1_relationship,
					guardian1_first_name,
					guardian1_middle_name,
					guardian1_last_name,
					guardian1_home_phone,
					guardian1_cell_phone,
					guardian1_email,
					guardian1_passport_number,
					guardian1_passport_issued_at,
					guardian1_passport_issued_on,
					guardian1_address,
					guardian2_relationship,
					guardian2_first_name,
					guardian2_middle_name,
					guardian2_last_name,
					guardian2_home_phone,
					guardian2_cell_phone,
					guardian2_email,
					guardian2_passport_number,
					guardian2_passport_issued_at,
					guardian2_passport_issued_on,
					guardian2_address
					
			
				)
				VALUES 
				(
					
					'$attention', 
					'$name',
					'$street_address',
					'$street_address2',
					'$city',
					'$state',
					'$zip_code',
					'$country',
					'$phone', 
					'$mobile_phone', 
					'$fax', 
					'$email', 
					'$notes', 
					'$custom_field1', 
					'$custom_field2', 
					'$custom_field3', 
					'$custom_field4', 
					'$enabled',
					
					'$place_of_enrolment',
					'$place_of_lesson',
					'$date',
					'$first_name',
					'$middle_name',
					'$last_name',
					'$birthday',
					'$gender',
					'$age', 
					'$passport_number',
					'$passport_issued_at',
					'$passport_issued_on', 
					'$cell_phone',
								
								
				
					'$guardian1_relationship',
					'$guardian1_first_name',
					'$guardian1_middle_name',
					'$guardian1_last_name',
					'$guardian1_home_phone',
					'$guardian1_cell_phone',
					'$guardian1_email',
					'$guardian1_passport_number',
					'$guardian1_passport_issued_at',
					'$guardian1_passport_issued_on',
					'$guardian1_address',
					'$guardian2_relationship',
					'$guardian2_first_name',
					'$guardian2_middle_name',
					'$guardian2_last_name',
					'$guardian2_home_phone',
					'$guardian2_cell_phone',
					'$guardian2_email',
					'$guardian2_passport_number',
					'$guardian2_passport_issued_at',
					'$guardian2_passport_issued_on',
					'$guardian2_address'
				)
			";
	
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
