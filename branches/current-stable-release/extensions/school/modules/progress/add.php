<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();


#get custom field labels
$customFieldLabel = getCustomFieldLabels();

$student = school_invoice::getActiveCustomers();
$course = school_product::getCourses();
/*Place of enrolment function*/
$sql = "select * from ".TB_PREFIX."test"; 
$test_sql = sql2array($sql);
$smarty -> assign('test',$test_sql);

//if valid then do save
if ($_POST['name'] != "" ) {
	include("./extensions/school/modules/progress/save.php");
}
$pageActive = "school";

$smarty -> assign('student',$student);
$smarty -> assign('course',$course);
$smarty -> assign('pageActive', $pageActive);
$smarty -> assign('customFieldLabel',$customFieldLabel);
$smarty -> assign('save',$save);
?>
