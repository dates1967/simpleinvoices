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
		 		'$_POST[q1]',
		 		'$_POST[q2]',
		 		'$_POST[q3]',
		 		'$_POST[q4]',
		 		'$_POST[q5]',
		 		'$_POST[q6]',
		 		'$_POST[q7]',
		 		'$_POST[q8]',
		 		'$_POST[q9]',
		 		'$_POST[q10]',
		 		'$_POST[q11]',
		 		'$_POST[q12]',
		 		'$_POST[q13]',
		 		'$_POST[q14]',
		 		'$_POST[q15]',
		 		'$_POST[q16]',
		 		'$_POST[q17]',
		 		'$_POST[q18]',
		 		'$_POST[q19]',
		 		'$_POST[q20]'
		 				 		
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
		 		q1 = '$_POST[q1]',
		 		q2='$_POST[q2]',
		 		q3='$_POST[q3]',
		 		q4='$_POST[q4]',
		 		q5='$_POST[q5]',
		 		q6='$_POST[q6]',
		 		q7='$_POST[q7]',
		 		q8='$_POST[q8]',
		 		q9='$_POST[q9]',
		 		q10='$_POST[q10]',
		 		q11='$_POST[q11]',
		 		q12='$_POST[q12]',
		 		q13='$_POST[q13]',
		 		q14='$_POST[q14]',
		 		q15='$_POST[q15]',
		 	    q16='$_POST[q16]',
		 		q17='$_POST[q17]',
		 		q18='$_POST[q18]',
		 		q19='$_POST[q19]',
		 		q20='$_POST[q20]'
			where 
				id = \"$_GET[id]\" ";
	// Execute our query
	if (mysqlQuery($sql)) $saved=true;
}

$refresh_total = isset($refresh_total) ? $refresh_total : '&nbsp';


$pageActive = "school";
$smarty->assign('pageActive', $pageActive);
$smarty->assign('saved',$saved);
//$smarty -> assign('display_block',$display_block); 
//$smarty -> assign('refresh_total',$refresh_total); 

?>
