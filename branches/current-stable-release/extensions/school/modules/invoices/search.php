<?php
/*
* Script: manage.php
* 	Manage Invoices page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin, Ap.Muthu
*
* Last edited:
* 	 2008-01-03
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$pageActive = "invoices";

$smarty -> assign('pageActive', $pageActive);


$sql_start = "select * from ".TB_PREFIX."customers where person_type = 1"; 
$students = sql2array($sql_start);
$smarty -> assign('students', $students);

$sql_start = "select * from ".TB_PREFIX."biller"; 
$billers = sql2array($sql_start);
$smarty -> assign('billers', $billers);

$sql_branch = "select * from ".TB_PREFIX."branch"; 
$branches = sql2array($sql_branch);
$smarty -> assign('branches', $branches);


$smarty -> assign('invoice_id', $_POST['invoice_id']);
$smarty -> assign('student_id', $_POST['student_id']);
$smarty -> assign('biller_id', $_POST['biller_id']);
$smarty -> assign('branch_id', $_POST['branch_id']);
?>
