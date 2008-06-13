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


insert into si_course_dropped_reason values (null,'N/A');
insert into si_course_dropped_reason values (null,'Stopped');
insert into si_course_dropped_reason values (null,'Dropped Out/Discontunied Ed');
insert into si_course_dropped_reason values (null,'Illness/Injury');
insert into si_course_dropped_reason values (null,'Graduated');



insert into si_course_start_reason values (null,'N/A');
insert into si_course_start_reason values (null,'New Student');
insert into si_course_start_reason values (null,'Re-Entry after Dropping Out');


create table si_course_enrol ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , course_id INT NOT NULL , student_id INT NOT NULL);
ALTER TABLE `si_course_enrol` ADD `start_reason_id` INT( 11 ) NULL DEFAULT NULL ;
ALTER TABLE `si_course_enrol` ADD `dropped_reason_id` INT( 11 ) NULL DEFAULT NULL ;
ALTER TABLE `si_course_enrol` ADD `dropped_date` DATE NULL; 
ALTER TABLE `si_course_enrol` ADD `start_date` DATE NULL; 
ALTER TABLE `si_course_enrol` ADD `invoice_id` INT( 11 ) NULL DEFAULT NULL; 
ALTER TABLE `si_course_enrol` ADD `invoice_item_id` INT( 11 ) NULL DEFAULT NULL; 




create table si_student_relation ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , relation VARCHAR(255) NOT NULL);



insert into si_student_relation values (null,'N/A');
insert into si_student_relation values (null,'Mother');
insert into si_student_relation values (null,'Father');
insert into si_student_relation values (null,'Aunt');
insert into si_student_relation values (null,'Uncle');
insert into si_student_relation values (null,'Grand Mother');
insert into si_student_relation values (null,'Grand Father');
insert into si_student_relation values (null,'Guardian');



ALTER TABLE `si_customers` 
ADD `place_of_registration` INT( 255 ) NULL ,
ADD `place_of_lesson` INT( 11 ) NULL ,
ADD `date` DATE NULL ,
ADD `first_name` VARCHAR( 255 ) NULL ,
ADD `middle_name` VARCHAR( 255 ) NULL ,
ADD `birthday` DATE NULL ,
ADD `gender` VARCHAR( 255 ) NULL ,
ADD `passport_number` VARCHAR( 255 ) NULL ,
ADD `passport_issued_at` VARCHAR( 255 ) NULL ,
ADD `passport_issued_on` DATE NULL ;




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
		ADD `guardian1_passport_issued_on` DATE NULL AFTER `guardian1_passport_issued_at`, 
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
		ADD `guardian2_passport_issued_on` DATE NULL AFTER `guardian2_passport_issued_at`, 
		ADD `guardian2_address` VARCHAR(255) NULL AFTER `guardian2_passport_issued_on`,
		ADD `person_type` VARCHAR(255) NULL AFTER `cell_phone`
;








-- TEST DATA
-- branches
insert into si_branch value (null,'Moscow');
insert into si_branch value (null,'Stalingrad');




ALTER TABLE `si_products` (
ADD `branch_id` INT( 11 ) NULL ,
ADD `subject_id` INT( 11 ) NULL ,
ADD `age` VARCHAR( 255 ) NULL ,
ADD `level_id` INT( 11 ) NULL ,
ADD `type` VARCHAR( 255 ) NULL ,
ADD `status` VARCHAR( 255 ) NULL ,
ADD `intensity` VARCHAR( 255 ) NULL ,
ADD `start_date` DATE NULL ,
ADD `part_of_day` VARCHAR( 255 ) NULL ,
ADD `start_time` VARCHAR( 255 ) NULL ,
ADD `duration` VARCHAR( 255 ) NULL ,
ADD `duration_type` VARCHAR( 255 ) NULL ,
ADD `area` VARCHAR( 255 ) NULL ,
ADD `rooms` VARCHAR( 255 ) NULL ,
ADD `teacher_id` INT( 11 ) NULL ,
ADD `repeat_type` VARCHAR( 255 ) NULL ,
ADD `end_date` DATE NULL ,
ADD `repeat_day` VARCHAR( 255 ) NULL ,
ADD `number_of_weeks` INT( 11 ) NULL ,
ADD `book` VARCHAR( 255 ) NULL ,
ADD `teaching_hours` VARCHAR ( 255 ) NULL,
ADD `iscourse` INT( 1 ) NOT NULL DEFAULT '0'  
)




CREATE TABLE `si_teacher` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`last_name` VARCHAR( 255 ) NULL ,
`first_name` VARCHAR( 255 ) NULL ,
`middle_name` VARCHAR( 255 ) NULL ,
`place_of_registration` INT( 11 ) NULL ,
`place_of_lesson` BIGINT( 11 ) NULL ,
`date` DATE NULL ,
`birthday` DATE NULL ,
`gender` VARCHAR( 255 ) NULL ,
`passport_number` VARCHAR( 255 ) NULL ,
`passport_issued_at` VARCHAR( 255 ) NULL ,
`passport_issued_on` DATE NULL ,
`street_address` VARCHAR( 255 ) NULL ,
`street_address2` VARCHAR( 255 ) NULL ,
`city` VARCHAR( 255 ) NULL ,
`post_code` VARCHAR( 255 ) NULL ,
`state` VARCHAR( 255 ) NULL ,
`country` VARCHAR( 255 ) NULL ,
`home_phone` VARCHAR( 255 ) NULL ,
`cell_phone` VARCHAR( 255 ) NULL ,
`fax` VARCHAR( 255 ) NULL ,
`email` VARCHAR( 255 ) NULL ,
`custom_field1` VARCHAR( 255 ) NULL ,
`custom_field2` VARCHAR( 255 ) NULL ,
`custom_field3` VARCHAR( 255 ) NULL ,
`custom_field4` VARCHAR( 255 ) NULL ,
`enabled` INT( 1 ) NULL ,
`note` TEXT NULL
);







CREATE TABLE `si_level` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 255 ) NOT NULL
) ENGINE = MYISAM ;

INSERT INTO `simple_invoices_school`.`si_level` (
`id` ,
`name`
)
VALUES (
NULL , 'Beginner'
), (
NULL , 'Elementary'
), (
NULL , 'Pre-Intermediate'
), (
NULL , 'Intermediate'
), (
NULL , 'Upper-Intermediate'
), (
NULL , 'Advanced'
), (
NULL , 'Upper-Advanced,'
), (
NULL , 'Zap A'
), (
NULL , 'Zap B'
), (
NULL , 'Zabadoo 1'
), (
NULL , 'Zabadoo 2'
), (
NULL , 'Zabadoo 3'
), (
NULL , 'Zabadoo Plus'
), (
NULL , 'Project 1'
), (
NULL , 'Project 2'
), (
NULL , 'Project 3'
), (
NULL , 'Project 4'
), (
NULL , 'Project Plus'
), (
NULL , 'A1'
), (
NULL , 'A2'
), (
NULL , 'B1'
);




CREATE TABLE `si_subject` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 255 ) NOT NULL
) ENGINE = MYISAM ;

INSERT INTO `simple_invoices_school`.`si_subject` (
`id` ,
`name`
)
VALUES (
NULL , 'English'
), (
NULL , 'German'
), (
NULL , 'Spanish'
), (
NULL , 'Italian'
), (
NULL , 'French'
), (
NULL , 'Japanese'
), (
NULL , 'Chinese'
), (
NULL , 'Greek'
), (
NULL , 'Russian for Foreigners'
);

ALTER TABLE `si_invoice_items` ADD `student_id` INT( 11 ) NULL DEFAULT NULL);
ALTER TABLE `si_invoice_items` ADD `start_reason_id` INT( 11 ) NULL DEFAULT NULL ;
ALTER TABLE `si_invoice_items` ADD `dropped_reason_id` INT( 11 ) NULL DEFAULT NULL ;
ALTER TABLE `si_invoice_items` ADD `dropped_date` DATE NULL; 


create table si_certificate ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , course_id INT NOT NULL , name VARCHAR( 255 ) NOT NULL);

*/


?>
