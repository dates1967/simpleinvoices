<?php
/*
* Script: manage.php
* 	Manage Invoices page
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
*/

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

/*
$smarty -> assign('pageActive', $pageActive);


$sql_start = "select * from ".TB_PREFIX."customers where person_type = 1"; 
$students = sql2array($sql_start);
$smarty -> assign('students', $students);

$sql_start = "select * from ".TB_PREFIX."biller"; 
$billers = sql2array($sql_start);
$smarty -> assign('billers', $billers);
*/
$students = school_invoice::getActiveCustomers();
$courses = school_product::getCourses();
$smarty -> assign('students', $students);
$smarty -> assign('courses', $courses);

$sql_test = "select * from ".TB_PREFIX."test"; 
$tests = sql2array($sql_test);
$smarty -> assign('tests', $tests);

$smarty -> assign('id', $_POST['id']);
$smarty -> assign('name', $_POST['name']);

$pageActive = "school";
$smarty->assign('pageActive', $pageActive);

$smarty -> assign('course_id', $_POST['course_id']);
$smarty -> assign('test_id', $_POST['test_id']);
$smarty -> assign('student_id', $_POST['student_id']);
?>
