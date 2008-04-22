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
$status[] = "Started";
$status[] = "Waitlisted";
$status[] = "Stopped";
$status[] = "Graduated";
$status[] = "Archived";
$smarty -> assign('status',$status);

/*Teacher function*/
$sql_teacher = "select * from ".TB_PREFIX."teacher where enabled = 1"; 
$teacher = sql2array($sql_teacher);
$smarty -> assign('teacher',$teacher);

/*Intensity*/
$intensity = array();
$intensity[] = "3 times/week-Mo-We-Fr";
$intensity[] = "5 times/week-Mo-till-Fr";
$intensity[] = "Weekends";
$smarty -> assign('intensity',$intensity);

$smarty -> assign('year',$year = year());
$smarty -> assign('year_now',$year_now = date('Y') );
$smarty -> assign('month',$month = month());
$smarty -> assign('day',$day = day());

/*Duration*/
$duration_type = array();
$duration_type[] = "minutes";
$duration_type[] = "hours";
$duration_type[] = "days";
$smarty -> assign('duration_type',$duration_type);

/*Course part of day*/
$part_of_day = array();
$part_of_day[] = "Morning";
$part_of_day[] = "Afternoon";
$part_of_day[] = "Evening";
$smarty -> assign('part_of_day',$part_of_day);

/*Repeat type*/
$repeat_type = array();
$repeat_type[] = "None";
$repeat_type[] = "Daily";
$repeat_type[] = "Weekly";
$repeat_type[] = "Monthly";
$repeat_type[] = "Yearly";
$repeat_type[] = "Monthly, corresponding day";
$repeat_type[] = "n-Weekly";
$smarty -> assign('repeat_type',$repeat_type);

/*Repeat day*/
$repeat_day = array();
$repeat_day[] = "Monday";
$repeat_day[] = "Tuesday";
$repeat_day[] = "Wednesday";
$repeat_day[] = "Thursday";
$repeat_day[] = "Friday";
$repeat_day[] = "Saturday";
$repeat_day[] = "Sunday";
$smarty -> assign('repeat_day',$repeat_day);



?>
