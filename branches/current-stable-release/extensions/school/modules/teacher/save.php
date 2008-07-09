<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert product
$saved = false;

if (  $op === 'insert_teacher' ) {
	
	function insertTeacher() {
		
		$sql = "INSERT INTO ".TB_PREFIX."customers 
					(
					
						name,
						first_name,
						middle_name,
						place_of_registration,
						place_of_lesson,
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
						
						date,
						birthday,
						gender,
						passport_number,
						passport_issued_at,
						passport_issued_on,
						person_type
				
					)
					VALUES 
					(
						
						
						'$_POST[last_name]',
						'$_POST[first_name]',
						'$_POST[middle_name]',
						'$_POST[place_of_registration]',
						'$_POST[place_of_lesson]',
						'$_POST[street_address]',
						'$_POST[street_address2]',
						'$_POST[city]',
						'$_POST[state]',
						'$_POST[zip_code]',
						'$_POST[country]',
						'$_POST[phone]', 
						'$_POST[mobile_phone]', 
						'$_POST[fax]', 
						'$_POST[email]', 
						'$_POST[note]', 
						'$_POST[custom_field1]', 
						'$_POST[custom_field2]', 
						'$_POST[custom_field3]', 
						'$_POST[custom_field4]', 
						'$_POST[enabled]',
						
						'$_POST[date_year]-$_POST[date_month]-$_POST[date_day]',
						'$_POST[birthday_year]-$_POST[birthday_month]-$_POST[birthday_day]', 
						'$_POST[gender]',
						'$_POST[passport_number]',
						'$_POST[passport_issued_at]',
						'$_POST[passport_issued_on_year]-$_POST[passport_issued_on_month]-$_POST[passport_issued_on_day]',
						'2'
						
					)
				";
		
		return mysqlQuery($sql);
		
	}
	if( insertTeacher() ) {
 		$saved = true;
 	}
}

if ($op === 'edit_teacher' ) {

	function editTeacher() {
		
		$sql = "UPDATE ".TB_PREFIX."customers 
					SET
						name = '$_POST[name]',
						first_name = '$_POST[first_name]',
						middle_name = '$_POST[middle_name]',
						place_of_registration = '$_POST[place_of_registration]',
						place_of_lesson = '$_POST[place_of_lesson]',
						street_address = '$_POST[street_address]',
						street_address2 = '$_POST[street_address2]',
						city = '$_POST[city]',
						state =  '$_POST[state]',
						zip_code = '$_POST[zip_code]',
						country = '$_POST[country]',
						phone = '$_POST[phone]',
						mobile_phone = '$_POST[mobile_phone]',
						fax = '$_POST[fax]', 
						email = '$_POST[email]',
						notes = '$_POST[note]', 
						custom_field1 = '$_POST[custom_field1]',
						custom_field2 = '$_POST[custom_field2]',
						custom_field3 = '$_POST[custom_field3]',
						custom_field4 = '$_POST[custom_field4]',
						enabled = '$_POST[enabled]',
						
						date = '$_POST[date_year]-$_POST[date_month]-$_POST[date_day]',
						birthday = '$_POST[birthday_year]-$_POST[birthday_month]-$_POST[birthday_day]',
						gender = '$_POST[gender]',
						passport_number = '$_POST[passport_number]',
						passport_issued_at = '$_POST[passport_issued_at]',
						passport_issued_on = '$_POST[passport_issued_on_year]-$_POST[passport_issued_on_month]-$_POST[passport_issued_on_day]',
						person_type = '2'
					WHERE
						id = " . $_GET['id'];
		
		return mysqlQuery($sql);
		
	}
	if( editTeacher() ) {
 		$saved = true;
 	}
}



/*if (mysqlQuery($sql, $conn)) {
	$display_block = $LANG['save_product_success'];
	 saveCustomFieldValues($_POST['categorie'],mysql_insert_id());

} else {
	$display_block = $LANG['save_product_failure'];
}

	$refresh_total = "<META HTTP-EQUIV=REFRESH CONTENT=1;URL=index.php?module=products&view=manage>";
}



/*#edit product

else if (  $op === 'edit_product' ) {


	if (isset($_POST['save_product'])) {
		
		if (mysqlQuery($sql, $conn)) {
			 updateCustomFieldValues($_POST['categorie'],mysql_insert_id());

			$display_block = $LANG['save_product_success'];
		} else {
			$display_block = $LANG['save_product_failure'];
		}

		$refresh_total = "<META HTTP-EQUIV=REFRESH CONTENT=0;URL=index.php?module=products&view=manage>";
		}

	else if (isset($_POST['cancel'])) {
	
		$refresh_total = "<META HTTP-EQUIV=REFRESH CONTENT=0;URL=index.php?module=products&view=manage>";
	}
}*/


$refresh_total = isset($refresh_total) ? $refresh_total : '&nbsp';


$pageActive = "teacher";
$smarty->assign('pageActive', $pageActive);
$smarty->assign('saved',$saved);
//$smarty -> assign('display_block',$display_block); 
//$smarty -> assign('refresh_total',$refresh_total); 

?>
