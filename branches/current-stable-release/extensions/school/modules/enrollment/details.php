<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$id = $_GET['id'];

$enrollment = school_enrol::getEnrollment($id);
$student = school_student::getCustomer($enrollment[0]["student_id"]);

$pageActive = "enrollment";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('enrollment',$enrollment);
$smarty -> assign('student',$student);

?>
