<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$id = $_GET['id'];

function getModule($id) {
	
	global $LANG;
	$sql = "SELECT 
				* ,
 sum(pg.q1 + pg.q2 +pg.q3 +pg.q4 +pg.q5 +pg.q6 +pg.q7 +pg.q8 +pg.q9 +pg.q10 +pg.q11 +pg.q12 +pg.q13 +pg.q14 +pg.q15 + pg.q16 +pg.q17 +pg.q18 +pg.q19 + pg.q20 ) as total
			FROM 
				".TB_PREFIX."progress pg
			WHERE 
				id = $id
			GROUP BY pg.id
";
	$query = mysqlQuery($sql) or die(mysql_error());
	$product = mysql_fetch_array($query);
	//	$product['wording_for_enabled'] = $product['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $product;
}

$module = getModule($id);

//test
$sql_test = "select * from ".TB_PREFIX."test where id = ".$module[test_id].""; 
$test_sql = mysql_fetch_object(mysqlQuery($sql_test));
$smarty -> assign('test_name',$test_sql->name);
$smarty -> assign('test_id',$test_sql->id);

//course
$sql_course = "select * from ".TB_PREFIX."products where id = ".$module[course_id].""; 
$course_sql = mysql_fetch_object(mysqlQuery($sql_course));
$smarty -> assign('course',$course_sql->description);
$smarty -> assign('course_id',$course_sql->id);

//student
$sql_student = "select * from ".TB_PREFIX."customers where id = ".$module[student_id].""; 
$student_sql = mysql_fetch_object(mysqlQuery($sql_student));
$smarty -> assign('name',$student_sql->name);
$smarty -> assign('middle_name',$student_sql->middle_name);
$smarty -> assign('first_name',$student_sql->first_name);
$smarty -> assign('student_id',$student_sql->id);

$pageActive = "options";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('module',$module);
$smarty -> assign('customFieldLabel',$customFieldLabel);

$student = school_invoice::getActiveCustomers();
$smarty -> assign('student',$student);
$course = school_product::getCourses();
$smarty -> assign('course',$course);
/*test*/
$sql = "select * from ".TB_PREFIX."test"; 
$test_sql = sql2array($sql);
$smarty -> assign('test',$test_sql);
?>
