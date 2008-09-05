<?php
/*
* Script: details.php
* 	Customers details page
*
* Last edited:
* 	 2007-07-19
*
* License:
*	 GPL v3 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$smarty -> assign('auth_role_name',$auth_session->role_name);
$smarty -> assign('auth_user_domain',$auth_session->user_domain);

#get the invoice id
$customer_id = $_GET['id'];

$customer = school_student::getCustomer($customer_id);

$customer['wording_for_enabled'] = $customer['enabled']==1?$LANG['enabled']:$LANG['disabled'];


//TODO: Perhaps possible a bit nicer?
$stuff = null;
$stuff['total'] = customer::calc_customer_total($customer['id']);

#amount paid calc - start
$stuff['paid'] = customer::calc_customer_paid($customer['id']);;
#amount paid calc - end

#amount owing calc - start
$stuff['owing'] = $stuff['total'] - $stuff['paid'];
#get custom field labels



$customFieldLabel = getCustomFieldLabels();

$sSQL = "SELECT	iv.id, iv.date, iv.type_id, 
	@invd:=(SELECT sum( IF(isnull(ivt.total), 0, ivt.total)) 
		FROM " . TB_PREFIX . "invoice_items ivt where ivt.invoice_id = iv.id) As invd, 
	@apmt:=(SELECT sum( IF(isnull(ap.ac_amount), 0, ap.ac_amount)) 
		FROM " . TB_PREFIX . "account_payments ap where ap.ac_inv_id = iv.id) As pmt, 
	IF(isnull(@invd), 0, @invd) As total, 
	IF(isnull(@apmt), 0, @apmt) As paid, 
	(select (total - paid)) as owing 
FROM " . TB_PREFIX . "invoices iv 
WHERE iv.customer_id = $customer_id 
ORDER BY iv.id DESC";

$invoices = sql2array($sSQL);


//$customFieldLabel = getCustomFieldLabels("biller");
$pageActive = "customers";
$smarty->assign('pageActive', $pageActive);


$smarty -> assign("stuff",$stuff);
$smarty -> assign('customer',$customer);
$smarty -> assign('customer_date',$customer_date = format_date($customer['date']) );
$smarty -> assign('customer_birthday',$customer_birthday = format_date($customer['birthday']) );
$smarty -> assign('customer_passport_issued_on',$customer_passport_issued_on = format_date($customer['passport_issued_on']) );
$smarty -> assign('customer_guardian1_passport_issued_on',$customer_guardian1_passport_issued_on = format_date($customer['guardian1_passport_issued_on']) );
$smarty -> assign('customer_guardian2_passport_issued_on',$customer_guardian2_passport_issued_on = format_date($customer['guardian2_passport_issued_on']) );
$smarty -> assign('invoices',$invoices);
$smarty -> assign('customFieldLabel',$customFieldLabel);

/*Place of enrolment function*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

$sql_enrol = "select name from ".TB_PREFIX."branch where id = ".$customer['place_of_registration'] ; 
$enrol_sql = mysql_fetch_object(mysqlQuery($sql_enrol));
$smarty -> assign('place_of_enrolment',$enrol_sql->name);

$sql_lesson = "select name from ".TB_PREFIX."branch where id = ".$customer[place_of_lesson].""; 
$lesson_sql = mysql_fetch_object(mysqlQuery($sql_lesson));
$smarty -> assign('place_of_lesson',$lesson_sql->name);

$sql_branch = "select name from ".TB_PREFIX."branch where id = ".$customer[branch_id].""; 
$branch_sql = mysql_fetch_object(mysqlQuery($sql_branch));
$smarty -> assign('branch_id',$branch_sql->name);


/*Relationship function*/
$sql_rel = "select * from ".TB_PREFIX."student_relation"; 
$rel_sql = sql2array($sql_rel);
$smarty -> assign('relation',$rel_sql);

$sql_g1_rel = "select relation from ".TB_PREFIX."student_relation where id = ".$customer[guardian1_relationship].""; 
$g1_rel_sql = mysql_fetch_object(mysqlQuery($sql_g1_rel));
$smarty -> assign('guardian1_relationship',$g1_rel_sql->relation);

$sql_g2_rel = "select relation from ".TB_PREFIX."student_relation where id = ".$customer[guardian2_relationship].""; 
$g2_rel_sql = mysql_fetch_object(mysqlQuery($sql_g2_rel));
$smarty -> assign('guardian2_relationship',$g2_rel_sql->relation);


/* Gender */
$smarty->assign('gender', array('Male','Female'));

/* date selctors */
$smarty -> assign('year',$year = year());
$smarty -> assign('year_now',$year_now = date('Y') );
$smarty -> assign('month',$month = month());
$smarty -> assign('day',$day = day());

/* Age */
$calc_month = $customer_birthday['month']; 
$calc_day = $customer_birthday['day']; 
$calc_year = $customer_birthday['year'];

$smarty -> assign('age',$calc_age = calc_age($calc_month, $calc_day, $calc_year));
/* Course*/

/*
$course_sql = "select * from si_course_enrol where student_id = ".$customer_id."";
$course_sql_result = mysql_fetch_object(mysqlQuery($course_sql));
*/
$course_enrol = school_enrol::getStudentEnrollment($customer_id);
//print_r($course_enrol);
//$smarty->register_object("course_enrol",$course_sql_result);
/*
$course_dropped_sql = "select * from si_course_dropped_reason where id = ".$cource_sql_result['dropped_reason_id']."";
$course_dropped_sql_result = mysql_fetch_object(mysqlQuery($course_dropped_sql));
$course_sql_result['dropped_reaon'] = 
*/
$smarty -> assign('course_enrol',$course_enrol);

$progress_sql = "SELECT 
			pg.id as pgid,
			pg.date as date,
			pd.description as course,
			c.first_name as first_name,
			c.middle_name as middle_name,
			c.name as last_name,
			t.name as test,
			sum(pg.q1 + pg.q2 +pg.q3 +pg.q4 +pg.q5 +pg.q6 +pg.q7 +pg.q8 +pg.q9 +pg.q10 +pg.q11 +pg.q12 +pg.q13 +pg.q14 +pg.q15 + pg.q16 +pg.q17 +pg.q18 +pg.q19 + pg.q20 ) as total 
		FROM 
			".TB_PREFIX."progress pg,
			".TB_PREFIX."products pd,
			".TB_PREFIX."customers c,
			".TB_PREFIX."test t
		WHERE
			pg.course_id = pd.id
			AND
			pg.student_id = c.id
			AND
			pg.test_id = t.id
			AND pg.student_id = ".$customer_id."
		GROUP BY 
			pg.id
";

$progress = sql2array($progress_sql);
$smarty -> assign('progress',$progress);



/*Certificates*/

$cert_sql = "select 
			c.id as id, 
			b.name as branch, 
			s.name as name, 
			s.first_name as first_name , 
			c.date as date, 
			p.description as course
		from 
			".TB_PREFIX."certificate c, 
			".TB_PREFIX."branch b, 
			".TB_PREFIX."customers s, 
			".TB_PREFIX."products p 
		where 
			c.branch_id = b.id 
			and 
			c.student_id = s.id 
			and 
			c.course_id = p.id  
			and
			s.id = $customer_id
		order by 
			c.id";

$certificate = sql2array($cert_sql) or die(mysql_error());
$smarty -> assign("certificate",$certificate);

?>