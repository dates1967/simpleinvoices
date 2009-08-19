<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$id = $_GET['id'];

$enrollment = school_enrol::getEnrollment($id);
$student = school_student::getCustomer($enrollment[0]["student_id"]);
$students = school_invoice::getActiveCustomers();

$pageActive = "enrollment";

$courses = school_product::getCourses();

/*Start reason*/
$sql_start = "select * from ".TB_PREFIX."course_start_reason"; 
$start_sql = sql2array($sql_start);
$smarty -> assign('start_reasons',$start_sql);

/*Dropped reason*/
$sql_drop = "select * from ".TB_PREFIX."course_dropped_reason"; 
$drop_sql = sql2array($sql_drop);
$smarty -> assign('dropped_reasons',$drop_sql);

/* Date */
$smarty -> assign('year',$year = year());
$smarty -> assign('year_now',$year_now = date('Y') );
$smarty -> assign('month',$month = month());
$smarty -> assign('day',$day = day());


$smarty->assign('pageActive', $pageActive);
$smarty -> assign('enrollment',$enrollment);
$smarty -> assign('student',$student);
$smarty -> assign('students',$students);
$smarty -> assign('courses',$courses);





?>
