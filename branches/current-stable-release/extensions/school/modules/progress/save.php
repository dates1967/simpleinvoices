<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert product
$saved = false;

if (  $op === 'insert_progress' ) 
{
	$sql = "INSERT INTO ".TB_PREFIX."progress
		 	(
		 		course_id,
		 		test_id,
		 		student_id,
		 		date,
		 		q1,
		 		q2,
		 		q3,
		 		q4,
		 		q5,
		 		q6,
		 		q7,
		 		q8,
		 		q9,
		 		q10,
		 		q11,
		 		q12,
		 		q13,
		 		q14,
		 		q15,
		 		q16,
		 		q17,
		 		q18,
		 		q19,
		 		q20
		 	) 
		 	
		 	VALUES 
		 	(
		 		'$_POST[course_id]',
		 		'$_POST[test_id]',
		 		'$_POST[student_id]',
		 		'$_POST[date]',
		 		'$_POST[1]',
		 		'$_POST[2]',
		 		'$_POST[3]',
		 		'$_POST[4]',
		 		'$_POST[5]',
		 		'$_POST[6]',
		 		'$_POST[7]',
		 		'$_POST[8]',
		 		'$_POST[9]',
		 		'$_POST[10]',
		 		'$_POST[11]',
		 		'$_POST[12]',
		 		'$_POST[13]',
		 		'$_POST[14]',
		 		'$_POST[15]',
		 		'$_POST[16]',
		 		'$_POST[17]',
		 		'$_POST[18]',
		 		'$_POST[19]',
		 		'$_POST[20]'
		 				 		
		 	)";
	// Execute our query
	if (mysqlQuery($sql)) $saved=true;
}

if ($op === 'edit_progress' ) 
{
	$sql = "update 
				".TB_PREFIX."progress 
			set 
		 		course_id = '$_POST[course_id]',
		 		test_id = '$_POST[test_id]',
		 		student_id = '$_POST[student_id]',
		 		date = '$_POST[date]',
		 		q1 = '$_POST[1]',
		 		q2='$_POST[2]',
		 		q3='$_POST[3]',
		 		q4='$_POST[4]',
		 		q5='$_POST[5]',
		 		q6='$_POST[6]',
		 		q7='$_POST[7]',
		 		q8='$_POST[8]',
		 		q9='$_POST[9]',
		 		q10='$_POST[10]',
		 		q11='$_POST[11]',
		 		q12='$_POST[12]',
		 		q13='$_POST[13]',
		 		q14='$_POST[14]',
		 		q15='$_POST[15]',
		 	    q16='$_POST[16]',
		 		q17='$_POST[17]',
		 		q18='$_POST[18]',
		 		q19='$_POST[19]',
		 		q20='$_POST[20]'
			where 
				id = \"$_GET[id]\" ";
	// Execute our query
	if (mysqlQuery($sql)) $saved=true;
}

$refresh_total = isset($refresh_total) ? $refresh_total : '&nbsp';


$pageActive = "options";
$smarty->assign('pageActive', $pageActive);
$smarty->assign('saved',$saved);
//$smarty -> assign('display_block',$display_block); 
//$smarty -> assign('refresh_total',$refresh_total); 

?>
