<?php


$patch['school']['1']['name'] = "Create branches table";
$patch['school']['1']['patch'] = "
	CREATE TABLE  ".TB_PREFIX."si_branch (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	name VARCHAR( 255 ) NOT NULL
	) 
";
if ($db_server == "pgsql") {
$patch['school']['1']['patch'] = "
	CREATE TABLE  ".TB_PREFIX."si_branch (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	name VARCHAR( 255 ) NOT NULL
	)
"; 
}
$patch['school']['1']['date'] = "20080325";

/*
CREATE TABLE `si_branch` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 255 ) NOT NULL
) 
*/


$patch['school']['2']['name'] = "Create course start reaosn table";
$patch['school']['2']['patch'] = "
	CREATE TABLE  ".TB_PREFIX."course_start_reason (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	reason VARCHAR( 255 ) NOT NULL
)	
";
if ($db_server == "pgsql") {
$patch['school']['2']['patch'] = "
	CREATE TABLE  ".TB_PREFIX."course_start_reason (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	reason VARCHAR( 255 ) NOT NULL
	)
"; 
}
$patch['school']['2']['date'] = "20080325";
/*
CREATE TABLE `si_course_start_reason` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`reason` VARCHAR( 255 ) NOT NULL
)
*/


$patch['school']['3']['name'] = "Create course dropped reaosn table";
$patch['school']['3']['patch'] = "
	CREATE TABLE  ".TB_PREFIX."course_dropped_reason (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	reason VARCHAR( 255 ) NOT NULL
)	
";
if ($db_server == "pgsql") {
$patch['school']['3']['patch'] = "
	CREATE TABLE  ".TB_PREFIX."course_dropped_reason (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	reason VARCHAR( 255 ) NOT NULL
	)
"; 
}
$patch['school']['3']['date'] = "20080325";
/*
CREATE TABLE `si_course_dropped_reason` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`reason` VARCHAR( 255 ) NOT NULL
)
*/
/*
insert into si_course_dropped_reason values (null,'N/A');
insert into si_course_dropped_reason values (null,'Stopped');
insert into si_course_dropped_reason values (null,'Dropped Out/Discontunied Ed');
insert into si_course_dropped_reason values (null,'Illness/Injury');
insert into si_course_dropped_reason values (null,'Graduated');
*/

/*
insert into si_course_start_reason values (null,'N/A');
insert into si_course_start_reason values (null,'New Student');
insert into si_course_start_reason values (null,'Re-Entry after Dropping Out');
*/
/*
create table si_course_enrol ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , course_id INT NOT NULL , student_id INT NOT NULL);
*/

/*
create table si_student_relation ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , relation VARCHAR(255) NOT NULL);
*/

/*
insert into si_student_relation values (null,'N/A');
insert into si_student_relation values (null,'Mother');
insert into si_student_relation values (null,'Father');
insert into si_student_relation values (null,'Aunt');
insert into si_student_relation values (null,'Uncle');
insert into si_student_relation values (null,'Grand Mother');
insert into si_student_relation values (null,'Grand Father');
insert into si_student_relation values (null,'Guardian');
*/

/*
ALTER TABLE `si_customers` ADD `place_of_enrolment` INT( 255 ) NULL ,
ADD `place_of_lesson` INT( 11 ) NULL ,
ADD `date` DATE NULL ,
ADD `first_name` VARCHAR( 255 ) NULL ,
ADD `middle_name` VARCHAR( 255 ) NULL ,
ADD `last_name` VARCHAR( 255 ) NULL ,
ADD `birthday` DATE NULL ,
ADD `gender` VARCHAR( 255 ) NULL ,
ADD `age` VARCHAR( 255 ) NULL ,
ADD `passport_number` VARCHAR( 255 ) NULL ,
ADD `passport_issued_at` VARCHAR( 255 ) NULL ,
ADD `passport_issued_on` DATE NULL ,
ADD `cell_phone` VARCHAR( 255 ) NULL ;
*/

/*
ALTER TABLE 
	`si_customers` 
		ADD `guardian1_relationship` VARCHAR(11) NOT NULL AFTER `id`, 
		ADD `guardian1_first_name` VARCHAR(255) NULL AFTER `guardian1_relationship`, 
		ADD `guardian1_middle_name` VARCHAR(255) NULL AFTER `guardian1_first_name`, 
		ADD `guardian1_last_name` VARCHAR(255) NULL AFTER `guardian1_middle_name`, 
		ADD `guardian1_home_phone` VARCHAR(255) NULL AFTER `guardian1_last_name`, 
		ADD `guardian1_cell_phone` VARCHAR(255) NULL AFTER `guardian1_home_phone`, 
		ADD `guardian1_email` VARCHAR(255) NULL AFTER `guardian1_cell_phone`, 
		ADD `guardian1_passport_number` VARCHAR(255) NULL AFTER `guardian1_email`, 
		ADD `guardian1_passport_issued_at` VARCHAR(255) NULL AFTER `guardian1_passport_number`, 
		ADD `guardian1_passport_issued_on` VARCHAR(255) NULL AFTER `guardian1_passport_issued_at`, 
		ADD `guardian1_address` VARCHAR(255) NULL AFTER `guardian1_passport_issued_on`, 
		ADD `guardian2_relationship` VARCHAR(11) NULL AFTER `guardian1_address`, 
		ADD `guardian2_first_name` VARCHAR(255) NULL AFTER `guardian2_relationship`, 
		ADD `guardian2_middle_name` VARCHAR(255) NULL AFTER `guardian2_first_name`, 
		ADD `guardian2_last_name` VARCHAR(255) NULL AFTER `guardian2_middle_name`, 
		ADD `guardian2_home_phone` VARCHAR(255) NULL AFTER `guardian2_last_name`, 
		ADD `guardian2_cell_phone` VARCHAR(255) NULL AFTER `guardian2_home_phone`, 
		ADD `guardian2_email` VARCHAR(255) NULL AFTER `guardian2_cell_phone`, 
		ADD `guardian2_passport_number` VARCHAR(255) NULL AFTER `guardian2_email`, 
		ADD `guardian2_passport_issued_at` VARCHAR(255) NULL AFTER `guardian2_passport_number`, 
		ADD `guardian2_passport_issued_on` VARCHAR(255) NULL AFTER `guardian2_passport_issued_at`, 
		ADD `guardian2_address` VARCHAR(255) NULL AFTER `guardian2_passport_issued_on`
;
*/
?>
