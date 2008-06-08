<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

function getTeachers()
{
	global $LANG;
			$sql = "SELECT * FROM ".TB_PREFIX."teacher ORDER BY last_name";
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
$teachers = getTeachers();
$pageActive = "teacher";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("teachers",$teachers);

getRicoLiveGrid("rico_teacher","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
