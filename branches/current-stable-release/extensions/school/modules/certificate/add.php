<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();


#get custom field labels
$customFieldLabel = getCustomFieldLabels();

//if valid then do save
if ($_POST['date'] != "" ) {
	include("./extensions/school/modules/certificate/save.php");
}
$pageActive = "certificate";

$student = school_invoice::getActiveCustomers();
$smarty -> assign('student',$student);

$course = school_product::getCourses();
$smarty -> assign('course',$course);

/*grade*/
$sql = "select * from ".TB_PREFIX."grade"; 
$grade_sql = sql2array($sql);
$smarty -> assign('grade',$grade_sql);

/*branch*/
$sql_branch = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql_branch);
$smarty -> assign('branch',$branch_sql);

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('customFieldLabel',$customFieldLabel);
$smarty -> assign('save',$save);
?>
