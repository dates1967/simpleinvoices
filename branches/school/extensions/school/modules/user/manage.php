<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

function getUsers()
{
	global $LANG;
	global $auth_session;

	
	if($auth_session->role_name == "branch_administrator")
	{
		$limit = " AND place_of_registration = ".$auth_session->user_domain;
	}

	$sql = "SELECT * FROM ".TB_PREFIX."customers ".$limit;
	$query = mysqlQuery($sql) or die(mysql_error());
			
	$users = null;
	
	for($i=0;$user = mysql_fetch_array($query);$i++) {
		
  		if ($user['enabled'] == 1) {
  			$user['enabled'] = $LANG['enabled'];
  		} else {
  			$user['enabled'] = $LANG['disabled'];
  		}

		switch ($user['person_type']) {
		case "1":
  			$user['person_type'] = "Student";
			break;
		case "2":
  			$user['person_type'] = "Teacher";
			break;
		case "3":
  			$user['person_type'] = "Other";
			break;
		}
		$users[$i] = $user;
	}
	
	return $users;

}
$users = getUsers();

$pageActive = "options";

$smarty -> assign('pageActive', $pageActive);
$smarty -> assign("users",$users);

getRicoLiveGrid("rico_users","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
