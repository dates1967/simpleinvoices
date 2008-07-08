<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$course_id = $_GET['id'];

$course = getProduct($course_id);

$course['wording_for_enabled'] = $course['enabled']==1?$LANG['enabled']:$LANG['disabled'];

#get custom field labels
$customFieldLabel = getCustomFieldLabels();

$pageActive = "course";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('course',$course);
$smarty -> assign('customFieldLabel',$customFieldLabel);


/*Place of enrolment function*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

/*Place of enrolment function - selected*/
$sql_selected = "select * from ".TB_PREFIX."branch where id = $course[branch_id]"; 
$branch_sql_selected = sql2array($sql_selected);
$smarty -> assign('branch_selected',$branch_sql_selected);

/*Subject function*/
$sql_sub = "select * from ".TB_PREFIX."subject"; 
$sub_sql = sql2array($sql_sub);
$smarty -> assign('subject',$sub_sql);

/*Subject function*/
$sql_sub_sel = "select * from ".TB_PREFIX."subject where id = ".$course['subject_id']; 
$sub_sql_sel = sql2array($sql_sub_sel);
$smarty -> assign('subject_selected',$sub_sql_sel);

/*Age*/
$age = array();
$age[] = "Kids";
$age[] = "Teens";
$age[] = "Adults";
$smarty -> assign('age',$age);

/*Level function*/
$sql_level = "select * from ".TB_PREFIX."level"; 
$level = sql2array($sql_level);
$smarty -> assign('level',$level);

$sql_level_sel = "select * from ".TB_PREFIX."level where id = ".$course['level_id']; 
$level_sel = sql2array($sql_level_sel);
$smarty -> assign('level_select',$level_sel);

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
$sql_teacher = "select * from ".TB_PREFIX."customers where enabled = '1' AND person_type = '2'"; 
$teacher = sql2array($sql_teacher);
$smarty -> assign('teacher',$teacher);

$sql_teacher_sel = "select * from ".TB_PREFIX."customers where id = ".$course['teacher_id']; 
$teacher_sel = sql2array($sql_teacher_sel);
$smarty -> assign('teacher_selected',$teacher_sel);


/*Intensity*/
$intensity = array();
$intensity[] = "3 times/week-Mo-We-Fr";
$intensity[] = "5 times/week-Mo-till-Fr";
$intensity[] = "Weekends";
$smarty -> assign('intensity',$intensity);

/* Date */
$smarty -> assign('year',$year = year());
$smarty -> assign('year_selected', substr( $course['start_date'],0,4 ) );
$smarty -> assign('end_year_selected', substr( $course['end_date'],0,4 ) );

$smarty -> assign('month',$month = month());
$smarty -> assign('month_selected', substr( $course['start_date'],5,2 ) );
$smarty -> assign('end_month_selected', substr( $course['end_date'],5,2 ) );

$smarty -> assign('day',$day = day());
$smarty -> assign('day_selected', substr( $course['start_date'],8,2 ) );
$smarty -> assign('end_day_selected', substr( $course['end_date'],8,2 ) );

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
