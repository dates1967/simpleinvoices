<?php

class school_student extends customer {

	function insertCustomer() {
		
		extract( $_POST );
		$sql = "INSERT INTO ".TB_PREFIX."customers 
					(
					
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
						birthday,
						gender,
						passport_number,
						passport_issued_at,
						passport_issued_on, 
						
									
									
					
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
						'$birthday',
						'$gender',
						'$passport_number',
						'$passport_issued_at',
						'$passport_issued_on', 
						
									
									
					
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

		function updateCustomer() {

			$sql = "
					UPDATE
						".TB_PREFIX."customers
					SET
						name = '$_POST[name]',
						street_address = '$_POST[street_address]',
						street_address2 = '$_POST[street_address2]',
						city = '$_POST[city]',
						state = '$_POST[state]', 
						zip_code = '$_POST[zip_code]',
						country = '$_POST[country]',
						phone = '$_POST[phone]',
						mobile_phone = '$_POST[mobile_phone]',
						fax = '$_POST[fax]',
						email = '$_POST[email]',
						notes = '$_POST[notes]',
						custom_field1 = '$_POST[custom_field1]',
						custom_field2 = '$_POST[custom_field2]',
						custom_field3 = '$_POST[custom_field3]',
						custom_field4 = '$_POST[custom_field4]',
						enabled = '$_POST[enabled]',
						
						place_of_enrolment = '$_POST[place_of_enrolment]',
						place_of_lesson = '$_POST[place_of_lesson]',
						date = '$_POST[date]',
						first_name = '$_POST[first_name]',
						middle_name = '$_POST[middle_name]',
						birthday = '$_POST[birthday]',
						gender = '$_POST[gender]', 
						passport_number = '$_POST[passport_number]',
						passport_issued_at = '$_POST[passport_issued_at]',
						passport_issued_on = '$_POST[passport_issued_on]', 
						
									
									
					
						guardian1_relationship = '$_POST[guardian1_relationship]',
						guardian1_first_name = '$_POST[guardian1_first_name]',
						guardian1_middle_name = '$_POST[guardian1_middle_name]',
						guardian1_last_name = '$_POST[guardian1_last_name]',
						guardian1_home_phone = '$_POST[guardian1_home_phone]',
						guardian1_cell_phone = '$_POST[guardian1_cell_phone]',
						guardian1_email = '$_POST[guardian1_email]',
						guardian1_passport_number = '$_POST[guardian1_passport_number]',
						guardian1_passport_issued_at = '$_POST[guardian1_passport_issued_at]',
						guardian1_passport_issued_on = '$_POST[guardian1_passport_issued_on]',
						guardian1_address = '$_POST[guardian1_address]',
						guardian2_relationship = '$_POST[guardian2_relationship]',
						guardian2_first_name = '$_POST[guardian2_first_name]',
						guardian2_middle_name = '$_POST[guardian2_middle_name]',
						guardian2_last_name = '$_POST[guardian2_last_name]',
						guardian2_home_phone = '$_POST[guardian2_home_phone]',
						guardian2_cell_phone = '$_POST[guardian2_cell_phone]',
						guardian2_email = '$_POST[guardian2_email]',
						guardian2_passport_number = '$_POST[guardian2_passport_number]',
						guardian2_passport_issued_at = '$_POST[guardian2_passport_issued_at]',
						guardian2_passport_issued_on = '$_POST[guardian2_passport_issued_on]',
						guardian2_address = '$_POST[guardian2_address]'
						
					WHERE
						id = " . $_GET['id'];

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
