<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$id = $_GET['id'];

	$sql = "SELECT id, name, first_name, middle_name, username, password, person_type, user_group, branch_id FROM ".TB_PREFIX."customers where id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());
			
	$user = mysql_fetch_array($query);

	
		switch ($user['person_type']) {
		case "1":
  			$user['person_type_description'] = "Student";
			break;
		case "2":
  			$user['person_type_description'] = "Teacher";
			break;
		case "3":
  			$user['person_type_description'] = "Other";
			break;
		}

$pageActive = "options";

$person_type = array();
$person_type[1] = "Student";
$person_type[2] = "Teacher";
$person_type[3] = "Other";

$smarty -> assign('person_type',$person_type);

$smarty -> assign('pageActive', $pageActive);
$smarty -> assign('user',$user);

/*branch*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

$sql_sel = "select name from ".TB_PREFIX."branch where id = ".$user['branch_id']; 
$branch_sql_sel = sql2array($sql_sel);
$smarty -> assign('branch_selected',$branch_sql_sel);

/*user group*/
$sql_role = "select * from ".TB_PREFIX."user_role"; 
$role_sql = sql2array($sql_role);
$smarty -> assign('role',$role_sql);

$sql_role_sel = "select name from ".TB_PREFIX."user_role where id = ".$user['user_group'] ; 
$role_sql_sel = sql2array($sql_role_sel);
$smarty -> assign('role_selected',$role_sql_sel);
?>
