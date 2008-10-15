<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
$menu = false;
checkLogin();

#get the invoice id
$id = $_GET['id'];
unset($LANG);
$print_language = (!empty($_GET['lang'])) ?  $_GET['lang'] : "en-gb" ;
$LANG=getLanguageArray("$print_language");
$smarty -> assign('LANG',$LANG);

function getCertificate($id) {
	
	global $LANG;
	global $config;
	$sql = "SELECT * FROM ".TB_PREFIX."certificate WHERE id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());
	$product = mysql_fetch_array($query);
	$product['date'] = date( $config->date->format, strtotime( $product['date'] ) );
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

$sql_course = "select * from ".TB_PREFIX."products where id = ".$getCert['course_id']; 
$course_sql = mysql_fetch_object(mysqlQuery($sql_course));
$course_sql->start_date = date( $config->date->format, strtotime( $course_sql->start_date ) );
$course_sql->payment_period_6_end = date( $config->date->format, strtotime( $course_sql->payment_period_6_end ) );
$smarty -> assign('course_sel',$course_sql);

//duration type
$sql_duration= "select * from ".TB_PREFIX."course_duration where id = ".$course_sql->duration_type; 
$duration_sel = mysql_fetch_object(mysqlQuery($sql_duration));
$smarty -> assign('duration_type',$duration_sel);

//subject
$sql_subject= "select * from ".TB_PREFIX."subject where id = ".$course_sql->subject_id; 
$subject_sel = mysql_fetch_object(mysqlQuery($sql_subject));
$smarty -> assign('subject_sel',$subject_sel);

//level
$sql_level = "select * from ".TB_PREFIX."level where id = ".$course_sql->level_id; 
$level_sel = mysql_fetch_object(mysqlQuery($sql_level));
$smarty -> assign('level_sel',$level_sel);

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('certificate',$getCert);
$customFieldLabel = getCustomFieldLabels();
$smarty -> assign('customFieldLabel',$customFieldLabel);

?>
