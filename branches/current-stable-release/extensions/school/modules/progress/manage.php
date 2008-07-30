<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

	$search_sql ="";

if($auth_session->role_name == "branch_administrator")
{
	$search_sql .= " AND (c.branch_id = ".$auth_session->user_domain." OR pd.branch_id = ".$auth_session->user_domain.")";
}

	if (!empty($_GET['student_id'])) {
		$search_sql .= "AND pg.student_id = ".$_GET['student_id'];

		$sql_student = "select * from ".TB_PREFIX."customers where id = ".$_GET['student_id']; 
		$student_sel = sql2array($sql_student);
		$smarty -> assign('student_sel',$student_sel);

	}
	if (!empty($_GET['course_id'])) {
		$search_sql .= "AND pg.course_id = ".$_GET['course_id'];

		$sql_course = "select * from ".TB_PREFIX."products where id = ".$_GET['course_id']; 
		$course_sel = sql2array($sql_course);
		$smarty -> assign('course_sel',$course_sel);

	}
	if (!empty($_GET['test_id'])) {
		$search_sql .= "AND pg.test_id = ".$_GET['test_id'];

		$sql_test = "select * from ".TB_PREFIX."test where id = ".$_GET['test_id']; 
		$test_sel = sql2array($sql_test);
		$smarty -> assign('test_sel',$test_sel);

	}

$sql = "SELECT 
			pg.id as pgid,
			pg.date as date,
			pd.description as course,
			c.first_name as first_name,
			c.middle_name as middle_name,
			c.name as last_name,
			t.name as test,
			sum(pg.q1 + pg.q2 +pg.q3 +pg.q4 +pg.q5 +pg.q6 +pg.q7 +pg.q8 +pg.q9 +pg.q10 +pg.q11 +pg.q12 +pg.q13 +pg.q14 +pg.q15 + pg.q16 +pg.q17 +pg.q18 +pg.q19 + pg.q20 ) as total 
		FROM 
			".TB_PREFIX."progress pg,
			".TB_PREFIX."products pd,
			".TB_PREFIX."customers c,
			".TB_PREFIX."test t
		WHERE
			pg.course_id = pd.id
			AND
			pg.student_id = c.id
			AND
			pg.test_id = t.id
			".$search_sql."
		GROUP BY 
			pgid
";

$module = sql2array($sql) or die(mysql_error());

$pageActive = "school";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("module",$module);

getRicoLiveGrid("rico_product","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
