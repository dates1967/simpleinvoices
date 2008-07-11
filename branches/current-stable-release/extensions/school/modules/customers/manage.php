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

if (empty($_GET['action']))
{
	$customers = school_student::getCustomers();

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
	$customers = school_student::getCustomers($search_sql);
}

$pageActive = "customers";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("customers",$customers);

getRicoLiveGrid("rico_customer","	{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' },{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
