<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();


#get custom field labels

//if valid then do save
if ($_POST['last_name'] != "" ) {
	include("./extensions/school/modules/enrollment/save.php");
}
$pageActive = "enrollment";

$students = school_invoice::getActiveCustomers();
$courses = getActiveProducts();

/*Start reason*/
$sql_start = "select * from ".TB_PREFIX."course_start_reason"; 
$start_sql = sql2array($sql_start);
$smarty -> assign('start_reasons',$start_sql);

/*Dropped reason*/
$sql_drop = "select * from ".TB_PREFIX."course_dropped_reason"; 
$drop_sql = sql2array($sql_drop);
$smarty -> assign('dropped_reasons',$drop_sql);


/*Place of enrolment function*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

/* Date */
$smarty -> assign('year',$year = year());
$smarty -> assign('year_now',$year_now = date('Y') );
$smarty -> assign('month',$month = month());
$smarty -> assign('day',$day = day());

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('students',$students);
$smarty -> assign('courses',$courses);
$smarty -> assign('save',$save);
?>
