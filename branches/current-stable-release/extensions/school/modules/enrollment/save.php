<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert product
$saved = false;

if (  $op === 'insert_enrollment' ) {
	
	function insertEnrollment() {
		
		$sql = "INSERT INTO ".TB_PREFIX."course_enrol 
					(
						course_id,
						student_id,
						dropped_reason_id,
						start_reason_id
					)
					VALUES 
					(
						'$_POST[course_id]',
						'$_POST[student_id]',
						'$_POST[dropped_reason_id]',
						'$_POST[start_reason_id]'
					)
				";
		
		return mysqlQuery($sql);
		
	}
	if( insertEnrollment() ) {
 		$saved = true;
 	}
}

if ($op === 'edit_enrollment' ) {

	function updateEnrollment() {
		
		if(!empty($_POST['date']))
		{
			$date = "dropped_date = '$_POST[date]',";

		} 
		$sql = "UPDATE ".TB_PREFIX."course_enrol 
				SET
					course_id = $_POST[course_id],
					student_id = $_POST[student_id],
					$date
					dropped_reason_id = $_POST[dropped_reason_id],
					start_reason_id = $_POST[start_reason_id]
				WHERE id =  " . $_GET['id'];
				
		return mysqlQuery($sql);
		
	}
	if( updateEnrollment() ) {
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


$pageActive = "enrollment";
$smarty->assign('pageActive', $pageActive);
$smarty->assign('saved',$saved);
//$smarty -> assign('display_block',$display_block); 
//$smarty -> assign('refresh_total',$refresh_total); 

?>
