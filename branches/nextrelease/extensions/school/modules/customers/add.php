<?php
/*
* Script: add.php
* 	Customers add page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-19
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$customFieldLabel = getCustomFieldLabels();

//if valid then do save
if ($_POST['name'] != "" ) {

	include("./extensions/school/modules/customers/save.php");

}



$pageActive = "customers";
$smarty->assign('pageActive', $pageActive);
$smarty -> assign('customFieldLabel',$customFieldLabel);

/*Place of enrolment function*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

/*Relationship function*/
$sql_rel = "select * from ".TB_PREFIX."student_relation"; 
$rel_sql = sql2array($sql_rel);
$smarty -> assign('relation',$rel_sql);

/* Gender */
$smarty->assign('gender', array('Male','Female'));

?>
