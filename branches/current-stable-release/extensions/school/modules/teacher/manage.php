<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

function getTeachers($search_sql="")
{
	global $LANG;
			$sql = "SELECT * FROM ".TB_PREFIX."customers WHERE person_type ='2' $search_sql ORDER BY last_name";
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
	$search_sql ="";
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$search_sql .= " AND id = $id ";
	}
	if (!empty($_GET['first_name'])) {
		$search_sql .= " AND first_name like '%".$_GET['first_name']."%'";
	}
	if (!empty($_GET['middle_name'])) {
		$search_sql .= " AND middle_name like '%".$_GET['middle_name']."%'";
	}
	if (!empty($_GET['last_name'])) {
		$search_sql .= " AND last_name like '%".$_GET['last_name']."%'";
	}
$teachers = getTeachers($search_sql);
$pageActive = "teacher";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("teachers",$teachers);

getRicoLiveGrid("rico_teacher","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
