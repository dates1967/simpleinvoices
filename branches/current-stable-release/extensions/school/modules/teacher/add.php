<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();


#get custom field labels
$customFieldLabel = getCustomFieldLabels();

//if valid then do save
if ($_POST['last_name'] != "" ) {
	include("./extensions/school/modules/teacher/save.php");
}
$pageActive = "teacher";

/*Place of enrolment function*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

/* Gender */
$smarty->assign('gender', array('Male','Female'));

/* Date */
$smarty -> assign('year',$year = year());
$smarty -> assign('year_now',$year_now = date('Y') );
$smarty -> assign('month',$month = month());
$smarty -> assign('day',$day = day());

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('customFieldLabel',$customFieldLabel);
$smarty -> assign('save',$save);

$smarty -> assign('auth_role_name',$auth_session->role_name);
$smarty -> assign('auth_user_domain',$auth_session->user_domain);

$sql_branch = "select name from ".TB_PREFIX."branch where id = ".$auth_session->user_domain.""; 
$branch_sql = mysql_fetch_object(mysqlQuery($sql_branch));
$smarty -> assign('branch_id',$branch_sql->name);

?>
