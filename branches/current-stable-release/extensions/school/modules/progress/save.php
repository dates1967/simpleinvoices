<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert product
$saved = false;

if (  $op === 'insert_progress' ) 
{
	$sql = "insert into ".TB_PREFIX."progress
		 	(
		 		id, 
		 		date,
		 		course_id,
		 		student_id,
		 		test_id,
		 		1,
		 		2,
		 		3,
		 		4,
		 		5,
		 		6,
		 		7,
		 		8,
		 		9,
		 		10,
		 		11,
		 		12,
		 		13,
		 		14,
		 		15,
		 		16,
		 		17,
		 		18,
		 		19,
		 		20
		 	
		 	) 
		 	
		 	VALUES 
		 	(
		 		NULL,
		 		'$_POST[date]',
		 		'$_POST[course_id]',
		 		'$_POST[student_id]',
		 		'$_POST[test_id]',
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
	$sql = "update ".TB_PREFIX."progress set name = \"$_POST[name]\" where id = \"$_GET[id]\" ";
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
