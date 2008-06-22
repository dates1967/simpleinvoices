<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$id = $_GET['id'];

	$sql = "SELECT id, name, first_name, middle_name, username, password, person_type FROM ".TB_PREFIX."customers where id = $id";
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

?>
