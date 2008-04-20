<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();


#get custom field labels
$customFieldLabel = getCustomFieldLabels();

//if valid then do save
if ($_POST['description'] != "" ) {
	include("./modules/products/save.php");
}
$pageActive = "course";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('customFieldLabel',$customFieldLabel);
$smarty -> assign('save',$save);

/*Place of enrolment function*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

/*Subject function*/
$sql_sub = "select * from ".TB_PREFIX."subject"; 
$sub_sql = sql2array($sql_sub);
$smarty -> assign('subject',$sub_sql);

/*Age*/
$age = array();
$age[] = "Kids";
$age[] = "Teens";
$age[] = "Adults";
$smarty -> assign('age',$age);

/*Subject function*/
$sql_level = "select * from ".TB_PREFIX."level"; 
$level = sql2array($sql_level);
$smarty -> assign('level',$level);

/*Type*/
$type = array();
$type[] = "Group";
$type[] = "One to one";
$smarty -> assign('type',$type);

/*Status*/
$status = array();
$status[] = "Group";
$status[] = "One to one";
$smarty -> assign('status',$status);

/*Teacher function*/
$sql_teacher = "select * from ".TB_PREFIX."teacher"; 
$teacher = sql2array($sql_teacher);
$smarty -> assign('teacher',$teacher);

?>
