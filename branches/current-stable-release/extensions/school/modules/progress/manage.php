<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

	$search_sql ="";
	$i = 0;
if (!empty($_GET['action']))
{
	$search_sql =" WHERE";
}
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$search_sql .= " id = $id ";
		$i++;
	}
	if (!empty($_GET['name'])) {
		$i == 1 ? $and = "AND" : $and="";
		$search_sql .= " $and name like '%".$_GET['name']."%'";
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
		GROUP BY 
			pgid
";

$module = sql2array($sql) or die(mysql_error());

$pageActive = "school";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("module",$module);

getRicoLiveGrid("rico_product","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
