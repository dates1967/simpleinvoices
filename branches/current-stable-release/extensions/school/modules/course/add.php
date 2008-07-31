<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();


#get custom field labels
$customFieldLabel = getCustomFieldLabels();

//if valid then do save
if ($_POST['description'] != "" ) {
	include("./extensions/school/modules/course/save.php");
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
$sql_age = "select * from ".TB_PREFIX."age"; 
$smarty -> assign('age',sql2array($sql_age));

/*Level function*/
$sql_level = "select * from ".TB_PREFIX."level"; 
$level = sql2array($sql_level);
$smarty -> assign('level',$level);

/*Type*/
/*
$type = array();
$type[] = "Group";
$type[] = "One to one";
$smarty -> assign('type',$type);
*/
$sql_type = "select * from ".TB_PREFIX."course_type"; 
$smarty -> assign('type',sql2array($sql_type));

/*Status*/
/*
$status = array();
$status[] = "Started";
$status[] = "Waitlisted";
$status[] = "Stopped";
$status[] = "Graduated";
$status[] = "Archived";
$smarty -> assign('status',$status);
*/
$sql_status = "select * from ".TB_PREFIX."course_status"; 
$smarty -> assign('status',sql2array($sql_status));

/*Teacher function*/
$sql_teacher = "select * from ".TB_PREFIX."customers where enabled = '1' AND person_type = '2'"; 
$teacher = sql2array($sql_teacher);
$smarty -> assign('teacher',$teacher);

/*Intensity*/
/*
$intensity = array();
$intensity[] = "3 times/week-Mo-We-Fr";
$intensity[] = "5 times/week-Mo-till-Fr";
$intensity[] = "Weekends";
$smarty -> assign('intensity',$intensity);
*/
$sql_intensity = "select * from ".TB_PREFIX."course_intensity"; 
$smarty -> assign('intensity',sql2array($sql_intensity));

$smarty -> assign('year',$year = year());
$smarty -> assign('year_now',$year_now = date('Y') );
$smarty -> assign('month',$month = month());
$smarty -> assign('day',$day = day());

/*Duration*/
/*$duration_type = array();
$duration_type[] = "minutes";
$duration_type[] = "hours";
$duration_type[] = "days";
$smarty -> assign('duration_type',$duration_type);*/
$sql_duration = "select * from ".TB_PREFIX."course_duration"; 
$smarty -> assign('duration_type',sql2array($sql_duration));

/*Course part of day*/
/*$part_of_day = array();
$part_of_day[] = "Morning";
$part_of_day[] = "Afternoon";
$part_of_day[] = "Evening";
$smarty -> assign('part_of_day',$part_of_day);*/
$sql_part = "select * from ".TB_PREFIX."course_part_of_day"; 
$smarty -> assign('part_of_day',sql2array($sql_part));

/*Repeat type*/
/*$repeat_type = array();
$repeat_type[] = "None";
$repeat_type[] = "Daily";
$repeat_type[] = "Weekly";
$repeat_type[] = "Monthly";
$repeat_type[] = "Yearly";
$repeat_type[] = "Monthly, corresponding day";
$repeat_type[] = "n-Weekly";
$smarty -> assign('repeat_type',$repeat_type);
*/
$sql_repeat_type = "select * from ".TB_PREFIX."course_repeat_type"; 
$smarty -> assign('repeat_type',sql2array($sql_repeat_type));

/*Repeat day*/
/*
$repeat_day = array();
$repeat_day[] = "Monday";
$repeat_day[] = "Tuesday";
$repeat_day[] = "Wednesday";
$repeat_day[] = "Thursday";
$repeat_day[] = "Friday";
$repeat_day[] = "Saturday";
$repeat_day[] = "Sunday";
$smarty -> assign('repeat_day',$repeat_day);*/
$sql_repeat_day = "select * from ".TB_PREFIX."course_repeat_day"; 
$smarty -> assign('repeat_day',sql2array($sql_repeat_day));



?>
