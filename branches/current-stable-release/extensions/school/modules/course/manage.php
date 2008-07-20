<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

if($auth_session->role_name == "branch_administrator")
{
	$limit = " AND branch_id = ".$auth_session->user_domain;
}

if (empty($_GET['action']))
{
	$courses = school_product::getCourses($limit);
} else {
	//$search_sql =" AND ";
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$search_sql .= " AND id = $id ";
	}
	if (!empty($_GET['name'])) {
		$search_sql .= " AND description like '%".$_GET['name']."%'";
	}
	$search_sql .= $limit;
	$courses = school_product::getCourses($search_sql);
}


$pageActive = "course";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("courses",$courses);

getRicoLiveGrid("rico_courses","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
