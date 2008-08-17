<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert product
$saved = false;

if (  $op === 'insert_certificate' ) 
{
	$sql = "insert into 
			".TB_PREFIX."certificate 
			(
				id, 
				branch_id, 
				date, 
				student_id, 
				course_id,
				grade_id,
				custom_field1,
				custom_field2,
				custom_field3,
				custom_field4,
				text
			) 
			VALUES 
			(
				NULL,
				'$_POST[branch_id]',
				'$_POST[date]',
				'$_POST[student_id]',
				'$_POST[course_id]',
				'$_POST[grade_id]',
				'$_POST[custom_field1]',
				'$_POST[custom_field2]',
				'$_POST[custom_field3]',
				'$_POST[custom_field4]',
				'$_POST[text]'

			)";
	// Execute our query
	if (mysqlQuery($sql)) $saved=true;
}

if ($op === 'edit_certificate' ) 
{
	$sql = "update 
			".TB_PREFIX."certificate 
			set
				 branch_id = \"$_POST[branch_id]\",
				 date = \"$_POST[date]\",
				 student_id = \"$_POST[student_id]\",
				 course_id = \"$_POST[course_id]\",
				 grade_id = \"$_POST[grade_id]\",
				 custom_field1 = \"$_POST[custom_field1]\",
				 custom_field2 = \"$_POST[custom_field2]\",
				 custom_field3 = \"$_POST[custom_field3]\",
				 custom_field4 = \"$_POST[custom_field4]\",
				 text = \"$_POST[text]\"
			where 
				id = \"$_GET[id]\" ";
	// Execute our query
	if (mysqlQuery($sql)) $saved=true;
}

$refresh_total = isset($refresh_total) ? $refresh_total : '&nbsp';


$pageActive = "certificate";
$smarty->assign('pageActive', $pageActive);
$smarty->assign('saved',$saved);
//$smarty -> assign('display_block',$display_block); 
//$smarty -> assign('refresh_total',$refresh_total); 

?>
