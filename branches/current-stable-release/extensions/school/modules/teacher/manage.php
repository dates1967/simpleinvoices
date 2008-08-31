<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

function getTeachers($search_sql="")
{
	global $LANG;
			$sql = "SELECT 
						c.id,
						c.name,
						c.first_name,
						c.middle_name,
						c.enabled,
						b.name as branch
			 
					FROM 
						".TB_PREFIX."customers c,
						".TB_PREFIX."branch b 
					WHERE 
						c.person_type ='2' 
						AND
						c.branch_id = b.id
						$search_sql
					 ORDER BY 
						c.name";
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

	if($auth_session->role_name == "branch_administrator")
	{
		$search_sql .= " AND branch_id = ".$auth_session->user_domain;
	}

	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$search_sql .= " AND id = $id ";
	}
	if (!empty($_GET['branch_id'])) {
		$branch_id = $_GET['branch_id'];
		$search_sql .= " AND branch_id = $branch_id ";
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
