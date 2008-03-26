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



?>
