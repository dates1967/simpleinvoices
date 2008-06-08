<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert product
$saved = false;

if (  $op === 'insert_teacher' ) {
	
	function insertTeacher() {
		
		$sql = "INSERT INTO ".TB_PREFIX."teacher 
					(
					
						last_name,
						first_name,
						middle_name,
						place_of_registration,
						place_of_lesson,
						street_address,
						street_address2,
						city,
						state, 
						post_code,
						country,
						home_phone,
						cell_phone,
						fax,
						email,
						note,
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
						passport_issued_on
				
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
						'$_POST[post_code]',
						'$_POST[country]',
						'$_POST[home_phone]', 
						'$_POST[mobile_phone]', 
						'$_POST[fax]', 
						'$_POST[email]', 
						'$_POST[note]', 
						'$_POST[custom_field1]', 
						'$_POST[custom_field2]', 
						'$_POST[custom_field3]', 
						'$_POST[custom_field4]', 
						'$_POST[enabled]',
						
						'$_POST[date]',
						'$_POST[birthday_year]-$_POST[birthday_month]-$_POST[birthday_day]', 
						'$_POST[gender]',
						'$_POST[passport_number]',
						'$_POST[passport_issued_at]',
						'$_POST[passport_issued_on_year]-$_POST[passport_issued_on_month]-$_POST[passport_issued_on_day]'
						
					)
				";
		
		return mysqlQuery($sql);
		
	}
	if( insertTeacher() ) {
 		$saved = true;
 	}
}

if ($op === 'edit_product' ) {
	$insertProductClass = new product;
	if (isset($_POST['save_product']) && $insertProductClass->updateProduct()) {
		$saved = true;
//		updateCustomFieldValues($_POST['categorie'],$_GET['id']);
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
//$smarty->assign('pageActive', $pageActive);
$smarty->assign('saved',$saved);
//$smarty -> assign('display_block',$display_block); 
//$smarty -> assign('refresh_total',$refresh_total); 

?>
