<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

			$sql = "SELECT * FROM ".TB_PREFIX."teacher ORDER BY last_name";
			$query = mysqlQuery($sql) or die(mysql_error());
			
			$teachers = null;
			
			for($i=0;$teachers = mysql_fetch_array($query);$i++) {
				
				if ($teacher['enabled'] == 1) {
					$teacher['enabled'] = $LANG['enabled'];
				} else {
					$teacher['enabled'] = $LANG['disabled'];
				}

				$teachers[$i] = $teacher;
			}
			

$pageActive = "teacher";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("teachers",$teachers);

getRicoLiveGrid("rico_product","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
