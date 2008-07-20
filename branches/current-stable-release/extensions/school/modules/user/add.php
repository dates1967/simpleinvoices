<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();


#get custom field labels
//$customFieldLabel = getCustomFieldLabels();

//if valid then do save
if ($_POST['username'] != "" ) {
	include("./extensions/school/modules/user/save.php");
}
$pageActive = "options";

/*age*/
$person_type = array();
$person_type[1] = "Student";
$person_type[2] = "Teacher";
$person_type[3] = "Other";

/*branch*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

/*user group*/
$sql_role = "select * from ".TB_PREFIX."user_role"; 
$role_sql = sql2array($sql_role);
$smarty -> assign('role',$role_sql);

$smarty -> assign('person_type',$person_type);

$smarty->assign('pageActive', $pageActive);
//$smarty -> assign('customFieldLabel',$customFieldLabel);
$smarty -> assign('save',$save);
?>
