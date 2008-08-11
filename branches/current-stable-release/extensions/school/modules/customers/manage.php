<?php
/*
* Script: manage.php
* 	Customers manage page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-19
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

if($auth_session->role_name == "branch_administrator")
{
	$limit = " AND branch_id = ".$auth_session->user_domain;
}

if (empty($_GET['action']))
{
	$customers = school_student::getCustomers($limit);

} else {
	//$search_sql =" AND ";
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$search_sql .= " AND id = $id ";
	}
	if (!empty($_GET['student_id'])) {
		$student_id = $_GET['student_id'];
		$search_sql .= " AND id = $student_id ";
	}
	if (!empty($_GET['first_name'])) {
		$search_sql .= " AND first_name like '%".$_GET['first_name']."%'";
	}
	if (!empty($_GET['middle_name'])) {
		$search_sql .= " AND middle_name like '%".$_GET['middle_name']."%'";
	}
	if (!empty($_GET['name'])) {
		$search_sql .= " AND name like '%".$_GET['name']."%'";
	}
	if (!empty($_GET['course_id'])) {
		$extra = "c, si_course_enrol e, si_products p";
		$search_sql .= " AND c.id = e.student_id and e.course_id = p.id AND p.id = ".$_GET['course_id'];
		$course_id = $_GET['course_id'];
		$courses_search = getProduct($course_id);
		$smarty -> assign("courses_search",$courses_search);
	}
	$search_sql .=  $limit;
	$customers = school_student::getCustomers($search_sql,$extra);
}

$pageActive = "customers";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("customers",$customers);

getRicoLiveGrid("rico_customer","	{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' },{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
