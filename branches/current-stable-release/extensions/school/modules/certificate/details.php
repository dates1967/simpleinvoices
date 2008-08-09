<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$id = $_GET['id'];

function getCertificate($id) {
	
	global $LANG;
	$sql = "SELECT * FROM ".TB_PREFIX."certificate WHERE id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());
	$product = mysql_fetch_array($query);
	//	$product['wording_for_enabled'] = $product['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $product;
}
$getCert = getCertificate($id);
$pageActive = "certificate";

/*Place of enrolment function*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

$sql_sel = "select * from ".TB_PREFIX."branch where id = ".$getCert['branch_id']; 
$branch_sql_sel = sql2array($sql_sel);
$smarty -> assign('branch_sel',$branch_sql_sel);

//grade
$sql_grade = "select * from ".TB_PREFIX."grade"; 
$grade_sql = sql2array($sql_grade);
$smarty -> assign('grade',$grade_sql);

$sql_grade_sel = "select * from ".TB_PREFIX."grade where id = ".$getCert['grade_id']; 
$grade_sql_sel = sql2array($sql_grade_sel);
$smarty -> assign('grade_sel',$grade_sql_sel);

//student
$sql_student = "select * from ".TB_PREFIX."customers where id = ".$getCert['student_id']; 
$student_sql_sel = sql2array($sql_student);
$smarty -> assign('student_sel',$student_sql_sel);

$student = school_invoice::getActiveCustomers();
$smarty -> assign('student',$student);

//course
$courses = school_product::getCourses();
$smarty -> assign('courses',$courses);

$sql_course = "select * from ".TB_PREFIX."products where id = ".$getCert[0]['course_id']; 
$course_sql = mysql_fetch_object(mysqlQuery($sql_course));
$smarty -> assign('course_sel',$course_sql);

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('certificate',$getCert);
$smarty -> assign('customFieldLabel',$customFieldLabel);

?>
