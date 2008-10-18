<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

//branch admin can only see there stuff
$smarty->assign('role_name', $auth_session->role_name);
if($auth_session->role_name == "branch_administrator")
{
	$limit = " AND c.branch_id = ".$auth_session->user_domain;
}


	$search_sql ="";
	$i = 0;
if (!empty($_GET['action']))
{
	$search_sql =" AND";
}
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$search_sql .= " c.id like '%$id%' ";
		$i++;
	}
	if (!empty($_GET['student_id'])) {
		$i == 1 ? $and = "AND" : $and="";
		$search_sql .= " $and s.id = '".$_GET['student_id']."'";

		$sql_student = "select * from ".TB_PREFIX."customers where id = ".$_GET['student_id']; 
		$student_sel = sql2array($sql_student);
		$smarty -> assign('student_sel',$student_sel);
	}
	if (!empty($_GET['course_id'])) {
		$search_sql .= "AND p.id = ".$_GET['course_id'];

		$sql_course = "select * from ".TB_PREFIX."products where id = ".$_GET['course_id']; 
		$course_sel = sql2array($sql_course);
		$smarty -> assign('course_sel',$course_sel);
	}

	$search_sql .= $limit;
//$sql = "SELECT * FROM ".TB_PREFIX."certificate $search_sql ORDER BY id";
$sql = "select 
			c.id as id, 
			b.name as branch, 
			s.name as name, 
			s.first_name as first_name , 
			c.date as date, 
			p.description as course
		from 
			".TB_PREFIX."certificate c, 
			".TB_PREFIX."branch b, 
			".TB_PREFIX."customers s, 
			".TB_PREFIX."products p 
		where 
			c.branch_id = b.id 
			and 
			c.student_id = s.id 
			and 
			c.course_id = p.id  
			$search_sql 
		order by 
			c.id";

$certificate = sql2array($sql) or die(mysql_error());

$pageActive = "certificate";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("certificate",$certificate);

getRicoLiveGrid("rico_product","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
