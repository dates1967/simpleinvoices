<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();
/*
function getTeachers($search_sql="")
{
	global $LANG;
			$sql = "SELECT * FROM ".TB_PREFIX."customers WHERE person_type ='2' $search_sql ORDER BY name";
			$query = mysqlQuery($sql) or die(mysql_error());
			
	$teahers = null;
	
	for($i=0;$teacher = mysql_fetch_array($query);$i++) {
		
  		if ($teacher['enabled'] == 1) {
  			$teacher['enabled'] = $LANG['enabled'];
  		} else {
  			$teacher['enabled'] = $LANG['disabled'];
  		}
		$teachers[$i] = $teacher;
	}
	
	return $teachers;

}
*/

	$search_sql ="";

if($auth_session->role_name == "branch_administrator")
{
	$search_sql .= " AND c.place_of_registration = ".$auth_session->user_domain;
}

	if (!empty($_GET['student_id'])) {
		$student_id = $_GET['student_id'];
		$search_sql .= " AND e.student_id = $student_id ";
		$student_id = $_GET['student_id'];
		$student = school_student::getCustomer($student_id);
	}
	if (!empty($_GET['course_id'])) {
		$course_id = $_GET['course_id'];
		$search_sql .= " AND e.course_id = $course_id ";
		$course_id = $_GET['course_id'];
		$course = getProduct($course_id);
	}


$enrollments = school_enrol::searchStudentEnrollments($search_sql);
/*$enrollments = school_enrol::getStudentEnrollments();*/

$pageActive = "enrollment";


#get the invoice id

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("enrollments",$enrollments);
$smarty -> assign("course",$course);
$smarty -> assign("student",$student);

getRicoLiveGrid("rico_teacher","");

?>
