<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

if($auth_session->role_name == "branch_administrator")
{
	//$limit = " AND branch_id = ".$auth_session->user_domain;
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
	if (!empty($_GET['course_id'])) {
		$search_sql .= " AND id = ".$_GET['course_id'];
		$course_id = $_GET['course_id'];
		$course_search = getProduct($course_id);
	}
	if (!empty($_GET['branch_id'])) {
		$search_sql .= " AND branch_id = ".$_GET['branch_id'];

		$sql = "select * from ".TB_PREFIX."branch where id = ".$_GET['branch_id'];; 
		$branch_sql = sql2array($sql);
		$smarty -> assign('branch_search',$branch_sql);

	}
	$search_sql .= $limit;
	$courses = school_product::getCourses($search_sql);
}


$pageActive = "course";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("course_search",$course_search);
$smarty -> assign("courses",$courses);

getRicoLiveGrid("rico_courses","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
