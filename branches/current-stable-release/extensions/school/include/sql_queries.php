<?php

class school_product extends product {

			function course_make_name()
			{
				/*
				If no course name then auto create one
				*/

				//last 2 letters of branch
				/*Place of enrolment function - selected*/
				$sql_selected = "select name from ".TB_PREFIX."branch where id = ".$_POST['branch_id']; 
				$branch_sql_selected = mysql_fetch_array(mysqlQuery($sql_selected));
				$cname_branch =  substr($branch_sql_selected['name'],-2);
				//First three letters of Subject
				/*Subject function*/
				$sql_sub_sel = "select name from ".TB_PREFIX."subject where id = ".$_POST['subject_id']; 
				$sub_sql_sel = mysql_fetch_array(mysqlQuery($sql_sub_sel));
				$cname_subject  = substr($sub_sql_sel['name'],0,3);
				//Level - use for Course name
				$sql_level_sel = "select name from ".TB_PREFIX."level where id = ".$_POST['level_id']; 
				$level_sel = mysql_fetch_array(mysqlQuery($sql_level_sel));
				$cname_level = $level_sel['name'];

				//Only first letter of Type
				$sql_type_sel = "select name from ".TB_PREFIX."course_type where id =".$_POST['type'];
				$cname_type_sql = mysql_fetch_array(mysqlQuery($sql_type_sel));
				$cname_type = substr($cname_type_sql['name'],0,1);
				//First four letters of Status
				$sql_status_sel = "select name from ".TB_PREFIX."course_status where id = ".$_POST['status']; 
				$cname_status_sql =  mysql_fetch_array(mysqlQuery($sql_status_sel));
				$cname_status = substr( $cname_status_sql['name'],0,4);
				//Last nine letters of Intensity
				$sql_intensity_sel = "select name from ".TB_PREFIX."course_intensity where id = ".$_POST['intensity']; 
				$cname_intensity_sql =  mysql_fetch_array(mysqlQuery($sql_intensity_sel));
				$cname_intensity = (strlen($cname_intensity_sql['name']) < 9) ? $cname_intensity_sql['name'] : substr($cname_intensity_sql['name'],-9);

				$sql_teacher_sel = "select * from ".TB_PREFIX."customers where id = ".$_POST['teacher_id']; 
				$teacher_sel = mysql_fetch_array(mysqlQuery($sql_teacher_sel));
				$cname_teacher = $teacher_sel['first_name']."_".substr($teacher_sel['name'],0,1);

				$course_short_name = $cname_branch."-".$cname_subject."-".$cname_level."-".$cname_type."-".$cname_status."-".$cname_intensity."-".$_POST['start_time']."-".$cname_teacher ;
				$course_name = (empty($_POST['description'])) ? $course_short_name : $_POST['description'] ;
				return $course_name;
			}

		function insertProduct($enabled=1,$visible=1) {

			$course_name = school_product::course_make_name();

			if(isset($_POST['enabled'])) {
				$enabled=$_POST['enabled'];
			}
			
			$sql = "INSERT into
					".TB_PREFIX."products
				(	
					id,
					description,
					unit_price,
					custom_field1,
					custom_field2,
					custom_field3,
					custom_field4,
					notes,
					enabled,
					visible,
					branch_id,
					subject_id,
					age,
					level_id,
					type,
					status,
					intensity,
					start_date,
					part_of_day,
					start_time,
					duration,
					duration_type,
					area,
					rooms,
					teacher_id,
					repeat_type,
					end_date,
					repeat_day,
					number_of_weeks,
					book,
					teaching_hours,
					iscourse,
					payment_period_1_end,
					payment_period_2_start,
					payment_period_2_end,
					payment_period_3_start,
					payment_period_3_end,
					payment_period_4_start,
					payment_period_4_end,
					payment_period_5_start,
					payment_period_5_end,
					payment_period_6_start,
					payment_period_6_end
				)			
				VALUES
					(	
						NULL,
						'$course_name',
						'$_POST[unit_price]',
						'$_POST[custom_field1]',
						'$_POST[custom_field2]',
						'$_POST[custom_field3]',
						'$_POST[custom_field4]',
						'$_POST[notes]',
						'$enabled',
						'$visible',
						'$_POST[branch_id]',
						'$_POST[subject_id]',
						'$_POST[age]',
						'$_POST[level_id]',
						'$_POST[type]',
						'$_POST[status]',
						'$_POST[intensity]',
						'$_POST[start_date]',
						'$_POST[part_of_day]',
						'$_POST[start_time]',
						'$_POST[duration]',
						'$_POST[duration_type]',
						'$_POST[area]',
						'$_POST[rooms]',
						'$_POST[teacher_id]',
						'$_POST[repeat_type]',
						'$_POST[end_date]',
						'$_POST[repeat_day]',
						'$_POST[number_of_weeks]',
						'$_POST[book]',
						'$_POST[teaching_hours]',
						'$_POST[iscourse]',
						'$_POST[payment_period_1_end]',
						'$_POST[payment_period_2_start]',
						'$_POST[payment_period_2_end]',
						'$_POST[payment_period_3_start]',
						'$_POST[payment_period_3_1end]',
						'$_POST[payment_period_4_start]',
						'$_POST[payment_period_4_end]',
						'$_POST[payment_period_5_start]',
						'$_POST[payment_period_5_end]',
						'$_POST[payment_period_6_start]',
						'$_POST[payment_period_6_end]'
					)";
			return mysqlQuery($sql);
		}

		
		function updateProduct($enabled=1,$visible=1) {

			$course_name = school_product::course_make_name();

			$sql = "UPDATE
					".TB_PREFIX."products
				SET	
					
					description = '$course_name',
					unit_price = '$_POST[unit_price]',
					custom_field1 = '$_POST[custom_field1]',
					custom_field2 = '$_POST[custom_field2]',
					custom_field3 = '$_POST[custom_field3]',
					custom_field4 = '$_POST[custom_field4]',
					notes = '$_POST[notes]',
					enabled = '$_POST[enabled]' ,
					branch_id = '$_POST[branch_id]',
					subject_id = '$_POST[subject_id]',
					age = '$_POST[age]',
					level_id = '$_POST[level_id]',
					type = '$_POST[type]',
					status = '$_POST[status]',
					intensity = '$_POST[intensity]',
					start_date = '$_POST[start_date]',
					part_of_day = '$_POST[part_of_day]',
					start_time = '$_POST[start_time]',
					duration = '$_POST[duration]',
					duration_type = '$_POST[duration_type]',
					area = '$_POST[area]',
					rooms = '$_POST[rooms]',
					teacher_id = '$_POST[teacher_id]',
					repeat_type = '$_POST[repeat_type]',
					end_date = '$_POST[end_date]',
					repeat_day = '$_POST[repeat_day]',
					number_of_weeks = '$_POST[number_of_weeks]',
					book = '$_POST[book]',
					teaching_hours = '$_POST[teaching_hours]',
					payment_period_1_end = '$_POST[payment_period_1_end]',
					payment_period_2_start = '$_POST[payment_period_2_start]',
					payment_period_2_end = '$_POST[payment_period_2_end]',
					payment_period_3_start = '$_POST[payment_period_3_start]',
					payment_period_3_end = '$_POST[payment_period_3_end]',
					payment_period_4_start = '$_POST[payment_period_4_start]',
					payment_period_4_end = '$_POST[payment_period_4_end]',
					payment_period_5_start = '$_POST[payment_period_5_start]',
					payment_period_5_end = '$_POST[payment_period_5_end]',
					payment_period_6_start = '$_POST[payment_period_6_start]',
					payment_period_6_end = '$_POST[payment_period_6_end]'
				WHERE
					id = " . $_GET['id'];
			
			return mysqlQuery($sql);
		}

	function getProducts() {
		global $LANG;
		
		$sql = "SELECT * FROM ".TB_PREFIX."products WHERE visible = 1 AND iscourse = 0 ORDER BY description";
		$query = mysqlQuery($sql) or die(mysql_error());
		
		$products = null;
		
		for($i=0;$product = mysql_fetch_array($query);$i++) {
			
			if ($product['enabled'] == 1) {
				$product['enabled'] = $LANG['enabled'];
			} else {
				$product['enabled'] = $LANG['disabled'];
			}

			$products[$i] = $product;
		}
		
		return $products;
	}

	function getCourses($search_sql="") 
	{
		global $LANG;
		
		$sql = "SELECT * FROM ".TB_PREFIX."products WHERE visible = 1 AND iscourse = 1 $search_sql ORDER BY description";
		$query = mysqlQuery($sql) or die(mysql_error());
		
		$products = null;
		
		for($i=0;$product = mysql_fetch_array($query);$i++) {
			
			if ($product['enabled'] == 1) {
				$product['enabled'] = $LANG['enabled'];
			} else {
				$product['enabled'] = $LANG['disabled'];
			}

			$products[$i] = $product;
		}
		
		return $products;
	}
}
class school_student extends customer {

	function insertCustomer() {
		
		extract( $_POST );
		$sql = "INSERT INTO ".TB_PREFIX."customers 
					(
					
						name,
						street_address,
						street_address2,
						city,
						state, 
						zip_code,
						country,
						phone,
						mobile_phone,
						fax,
						email,
						notes,
						custom_field1,
						custom_field2,
						custom_field3,
						custom_field4,
						enabled,
						
						place_of_registration,
						place_of_lesson,
						date,
						first_name,
						middle_name,
						birthday,
						gender,
						passport_number,
						passport_issued_at,
						passport_issued_on, 
						
									
									
					
						guardian1_relationship,
						guardian1_first_name,
						guardian1_middle_name,
						guardian1_last_name,
						guardian1_home_phone,
						guardian1_cell_phone,
						guardian1_email,
						guardian1_passport_number,
						guardian1_passport_issued_at,
						guardian1_passport_issued_on,
						guardian1_address,
						guardian2_relationship,
						guardian2_first_name,
						guardian2_middle_name,
						guardian2_last_name,
						guardian2_home_phone,
						guardian2_cell_phone,
						guardian2_email,
						guardian2_passport_number,
						guardian2_passport_issued_at,
						guardian2_passport_issued_on,
						guardian2_address,
						person_type,
						username,
						password,
						user_group,
						branch_id
					)	
					VALUES 
					(
						'$name',
						'$street_address',
						'$street_address2',
						'$city',
						'$state',
						'$zip_code',
						'$country',
						'$phone', 
						'$mobile_phone', 
						'$fax', 
						'$email', 
						'$notes', 
						'$custom_field1', 
						'$custom_field2', 
						'$custom_field3', 
						'$custom_field4', 
						'$enabled',
						
						'$place_of_registration',
						'$place_of_lesson',
						'$date_year-$date_month-$date_day', 
						'$first_name',
						'$middle_name',
						'$birthday_year-$birthday_month-$birthday_day', 
						'$gender',
						'$passport_number',
						'$passport_issued_at',
						'$passport_issued_on_year-$passport_issued_on_month-$passport_issued_on_day', 
						
									
									
					
						'$guardian1_relationship',
						'$guardian1_first_name',
						'$guardian1_middle_name',
						'$guardian1_last_name',
						'$guardian1_home_phone',
						'$guardian1_cell_phone',
						'$guardian1_email',
						'$guardian1_passport_number',
						'$guardian1_passport_issued_at',
						'$guardian1_passport_issued_on_year-$guardian1_passport_issued_on_month-$guardian1_passport_issued_on_day', 
						'$guardian1_address',
						'$guardian2_relationship',
						'$guardian2_first_name',
						'$guardian2_middle_name',
						'$guardian2_last_name',
						'$guardian2_home_phone',
						'$guardian2_cell_phone',
						'$guardian2_email',
						'$guardian2_passport_number',
						'$guardian2_passport_issued_at',
						'$guardian2_passport_issued_on_year-$guardian2_passport_issued_on_month-$guardian2_passport_issued_on_day', 
						'$guardian2_address',
						1,
						'$username',
						MD5('$password_field'),
						1,
						'$branch_id'
					)
				";
		
		return mysqlQuery($sql);
		
	}

		function updateCustomer() {
			
			empty($_POST[password_field]) ? $password = "" :  $password = "password = MD5('".$_POST[password_field]."'),"  ;
			

			$sql = "
					UPDATE
						".TB_PREFIX."customers
					SET
						name = '$_POST[name]',
						street_address = '$_POST[street_address]',
						street_address2 = '$_POST[street_address2]',
						city = '$_POST[city]',
						state = '$_POST[state]', 
						zip_code = '$_POST[zip_code]',
						country = '$_POST[country]',
						phone = '$_POST[phone]',
						mobile_phone = '$_POST[mobile_phone]',
						fax = '$_POST[fax]',
						email = '$_POST[email]',
						notes = '$_POST[notes]',
						custom_field1 = '$_POST[custom_field1]',
						custom_field2 = '$_POST[custom_field2]',
						custom_field3 = '$_POST[custom_field3]',
						custom_field4 = '$_POST[custom_field4]',
						enabled = '$_POST[enabled]',
						
						place_of_registration = '$_POST[place_of_registration]',
						place_of_lesson = '$_POST[place_of_lesson]',
						date =  '$_POST[date_year]-$_POST[date_month]-$_POST[date_day]',
						first_name = '$_POST[first_name]',
						middle_name = '$_POST[middle_name]',
						birthday = '$_POST[birthday_year]-$_POST[birthday_month]-$_POST[birthday_day]',
						gender = '$_POST[gender]', 
						passport_number = '$_POST[passport_number]',
						passport_issued_at = '$_POST[passport_issued_at]',
						passport_issued_on = '$_POST[passport_issued_on_year]-$_POST[passport_issued_on_month]-$_POST[passport_issued_on_day]', 
						
									
									
					
						guardian1_relationship = '$_POST[guardian1_relationship]',
						guardian1_first_name = '$_POST[guardian1_first_name]',
						guardian1_middle_name = '$_POST[guardian1_middle_name]',
						guardian1_last_name = '$_POST[guardian1_last_name]',
						guardian1_home_phone = '$_POST[guardian1_home_phone]',
						guardian1_cell_phone = '$_POST[guardian1_cell_phone]',
						guardian1_email = '$_POST[guardian1_email]',
						guardian1_passport_number = '$_POST[guardian1_passport_number]',
						guardian1_passport_issued_at = '$_POST[guardian1_passport_issued_at]',
						guardian1_passport_issued_on = '$_POST[guardian1_passport_issued_on_year]-$_POST[guardian1_passport_issued_on_month]-$_POST[guardian1_passport_issued_on_day]',
						guardian1_address = '$_POST[guardian1_address]',
						guardian2_relationship = '$_POST[guardian2_relationship]',
						guardian2_first_name = '$_POST[guardian2_first_name]',
						guardian2_middle_name = '$_POST[guardian2_middle_name]',
						guardian2_last_name = '$_POST[guardian2_last_name]',
						guardian2_home_phone = '$_POST[guardian2_home_phone]',
						guardian2_cell_phone = '$_POST[guardian2_cell_phone]',
						guardian2_email = '$_POST[guardian2_email]',
						guardian2_passport_number = '$_POST[guardian2_passport_number]',
						guardian2_passport_issued_at = '$_POST[guardian2_passport_issued_at]',
						guardian2_passport_issued_on = '$_POST[guardian2_passport_issued_on_year]-$_POST[guardian2_passport_issued_on_month]-$_POST[guardian2_passport_issued_on_day]',
						guardian2_address = '$_POST[guardian2_address]',
						username = '$_POST[username]',
						$password
						person_type = '1',
						user_group = '1',
						branch_id = '$_POST[branch_id]'
						
					WHERE
						id = " . $_GET['id'];

			return mysqlQuery($sql);
		}


		function getCustomer($id) 
		{
	
			$print_customer = "SELECT * FROM ".TB_PREFIX."customers WHERE id = $id AND person_type = '1'";
			$result_print_customer = mysqlQuery($print_customer) or die(mysql_error());
			return mysql_fetch_array($result_print_customer);
		}
		
		/*	
			
			
			$sql = "UPDATE ".TB_PREFIX."invoice_items 
			SET `quantity` =  '$quantity',
			`product_id` = '$product_id',
			`unit_price` = '$unit_price',
			`unit_cost` = '$unit_cost',
			`unit_load_cost` = '$unit_load_cost',
			`tax_id` = '$tax_id',
			`tax` = '$tax[tax_percentage]',
			`tax_amount` = '$tax_amount',
			`gross_total` = '$gross_total',
			`description` = '$description',
			`total` = '$total'			
			WHERE  `id` = '$id'";
		*/	
		function getCustomers($search_sql = "", $extra="") {
				
			global $LANG;
			
			$customer = null;
			
			$sql = "SELECT c.id, c.name, c.first_name, c.middle_name, c.enabled FROM ".TB_PREFIX."customers c $extra WHERE person_type ='1' $search_sql ORDER BY name";
			$result = mysqlQuery($sql) or die(mysql_error());

			$customers = null;

			for($i=0;$customer = mysql_fetch_array($result);$i++) {
				if ($customer['enabled'] == 1) {
					$customer['enabled'] = $LANG['enabled'];
				} else {
					$customer['enabled'] = $LANG['disabled'];
				}

				#invoice total calc - start
				$customer['total'] = customer::calc_customer_total($customer['id']);
				#invoice total calc - end

				#amount paid calc - start
				$customer['paid'] = customer::calc_customer_paid($customer['id']);
				#amount paid calc - end

				#amount owing calc - start
				$customer['owing'] = $customer['total'] - $customer['paid'];
				
				#amount owing calc - end
				$customers[$i] = $customer;

			}
			
			return $customers;
		}
}

class school_teacher
{
		function getTeacher($id) 
		{
	
			$print_customer = "SELECT * FROM ".TB_PREFIX."customers WHERE id = $id AND person_type = '2'";
			$result_print_customer = mysqlQuery($print_customer) or die(mysql_error());
			return mysql_fetch_array($result_print_customer);
		}
}
class school_enrol
{
	function getEnrollment($id)
	{
		global $LANG;
		
		//$sql = "SELECT * FROM ".TB_PREFIX."course_enrol WHERE student_id = ".$student_id." ORDER BY course_id";
		$sql = "select 
					e.id as enrollment_id, 
					c.name as last_name,
					c.first_name as first_name,
					c.middle_name as middle_name,
					e.student_id as student_id, 
					p.id, 
					p.id as course_id,
					b.name as branch_name, 
					p.description as course_name, 
					s.name as subject_name, 
					p.age, 
					l.name as level_name, 
					p.type, 
					p.status, 
					p.start_date, 
					start.reason as start_reason, 
					start.id as start_id,
					e.dropped_date as dropped_date, 
					dropped.id as dropped_id,
					dropped.reason as dropped_reason 
				from 
					".TB_PREFIX."customers c, 
					".TB_PREFIX."course_enrol e, 
					".TB_PREFIX."products p, 		
					".TB_PREFIX."subject s, 
					".TB_PREFIX."branch b, 
					".TB_PREFIX."level l, 
					".TB_PREFIX."course_start_reason start, 
					".TB_PREFIX."course_dropped_reason dropped 
				where 
					c.id = e.student_id 
					and
					e.course_id = p.id 
					and 
					p.subject_id = s.id 
					and 	
					p.branch_id =b.id 
					and 
					p.level_id = l.id 
					and 
					e.dropped_reason_id = dropped.id 
					and 
					e.start_reason_id = start.id 
					and 
					e.id = ".$id."";
		//$query = mysqlQuery($sql) or die(mysql_error());
		//$query = mysql_fetch_object(mysqlQuery($sql));
 

		return sql2array($sql);
	}
	function getStudentEnrollment($student_id)
	{
		global $LANG;
		
		//$sql = "SELECT * FROM ".TB_PREFIX."course_enrol WHERE student_id = ".$student_id." ORDER BY course_id";
		$sql = "select 
					e.id as enrollment_id, 
					c.name as last_name,
					c.first_name as first_name,
					c.middle_name as middle_name,
					e.student_id, 
					p.id, 
					b.name as branch_name, 
					p.description as course_name, 
					s.name as subject_name, 
					ag.name as age, 
					l.name as level_name, 
					ty.name as type, 
					st.name as status, 
					p.start_date, 
					start.reason as start_reason, 
					e.dropped_date, 
					dropped.reason as dropped_reason 
				from 
					".TB_PREFIX."customers c, 
					".TB_PREFIX."course_enrol e, 
					".TB_PREFIX."products p, 		
					".TB_PREFIX."subject s, 
					".TB_PREFIX."branch b, 
					".TB_PREFIX."level l, 
					".TB_PREFIX."course_start_reason start, 
					".TB_PREFIX."course_type ty, 
					".TB_PREFIX."course_status st, 
					".TB_PREFIX."age ag, 
					".TB_PREFIX."course_dropped_reason dropped 
				where 
					c.id = e.student_id 
					and
					e.course_id = p.id 
					and 
					p.subject_id = s.id 
					and 	
					p.branch_id =b.id 
					and 
					p.level_id = l.id 
					and 
					e.dropped_reason_id = dropped.id 
					and 
					e.start_reason_id = start.id 
					and 
					p.type = ty.id 
					and 
					p.status = st.id 
					and 
					p.age = ag.id 
					and 
					e.student_id = ".$student_id."";
		//$query = mysqlQuery($sql) or die(mysql_error());
		//$query = mysql_fetch_object(mysqlQuery($sql));
 

		return sql2array($sql);
	}
	
	function getStudentEnrollments()
	{
		global $LANG;
		
		//$sql = "SELECT * FROM ".TB_PREFIX."course_enrol WHERE student_id = ".$student_id." ORDER BY course_id";
		$sql = "select 
					e.id as enrollment_id, 
					c.name as last_name,
					c.first_name as first_name,
					c.middle_name as middle_name,
					e.student_id, 
					p.id, 
					b.name as branch_name, 
					p.description as course_name, 
					s.name as subject_name, 
					p.age, 
					l.name as level_name, 
					p.type, 
					p.status, 
					p.start_date, 
					start.reason as start_reason, 
					e.dropped_date, 
					dropped.reason as dropped_reason 
				from
					".TB_PREFIX."customers c, 				
					".TB_PREFIX."course_enrol e, 
					".TB_PREFIX."products p, 		
					".TB_PREFIX."subject s, 
					".TB_PREFIX."branch b, 
					".TB_PREFIX."level l, 
					".TB_PREFIX."course_start_reason start, 
					".TB_PREFIX."course_dropped_reason dropped 
				where 
					c.id = e.student_id 
					and
					e.course_id = p.id 
					and 
					p.subject_id = s.id 
					and 	
					p.branch_id =b.id 
					and 
					p.level_id = l.id 
					and 
					e.dropped_reason_id = dropped.id 
					and 
					e.start_reason_id = start.id 
					";
		//$query = mysqlQuery($sql) or die(mysql_error());
		//$query = mysql_fetch_object(mysqlQuery($sql));
 

		return sql2array($sql);
	}
	
	function searchStudentEnrollments($search_sql)
	{
		global $LANG;
		
		//$sql = "SELECT * FROM ".TB_PREFIX."course_enrol WHERE student_id = ".$student_id." ORDER BY course_id";
		$sql = "select 
					e.id as enrollment_id, 
					c.name as last_name,
					c.first_name as first_name,
					c.middle_name as middle_name,
					e.student_id, 
					p.id, 
					b.name as branch_name, 
					p.description as course_name, 
					s.name as subject_name, 
					p.age, 
					l.name as level_name, 
					p.type, 
					p.status, 
					p.start_date, 
					start.reason as start_reason, 
					e.dropped_date, 
					dropped.reason as dropped_reason 
				from
					".TB_PREFIX."customers c, 				
					".TB_PREFIX."course_enrol e, 
					".TB_PREFIX."products p, 		
					".TB_PREFIX."subject s, 
					".TB_PREFIX."branch b, 
					".TB_PREFIX."level l, 
					".TB_PREFIX."course_start_reason start, 
					".TB_PREFIX."course_dropped_reason dropped 
				where 
					c.id = e.student_id 
					and
					e.course_id = p.id 
					and 
					p.subject_id = s.id 
					and 	
					p.branch_id =b.id 
					and 
					p.level_id = l.id 
					and 
					e.dropped_reason_id = dropped.id 
					and 
					e.start_reason_id = start.id 
					$search_sql
					";
		//$query = mysqlQuery($sql) or die(mysql_error());
		//$query = mysql_fetch_object(mysqlQuery($sql));

		return sql2array($sql);
	}
	
}

class school_invoice extends invoice{

		function insertInvoice($type) {
			
			$sql = "INSERT 
					INTO
				".TB_PREFIX."invoices (
					id, 
					biller_id, 
					customer_id, 
					type_id,
					preference_id, 
					date, 
					note,
					custom_field1,
					custom_field2,
					custom_field3,
					custom_field4,
					branch_id
				)
				VALUES
				(
					NULL,
					'$_POST[biller_id]',
					'$_POST[customer_id]',
					'$type',
					'$_POST[preference_id]',
					'$_POST[date]',
					'$_POST[note]',
					'$_POST[customField1]',
					'$_POST[customField2]',
					'$_POST[customField3]',
					'$_POST[customField4]',
					'$_POST[branch_id]'
					)";
			//echo $sql;
			return mysqlQuery($sql);
		}

		function updateInvoice($invoice_id) {

		$sql = "UPDATE
			".TB_PREFIX."invoices
		SET
			biller_id = '$_POST[biller_id]',
			customer_id = '$_POST[customer_id]',
			preference_id = '$_POST[preference_id]',
			date = '$_POST[date]',
			note = '$_POST[note]',
			custom_field1 = '$_POST[customField1]',
			custom_field2 = '$_POST[customField2]',
			custom_field3 = '$_POST[customField3]',
			custom_field4 = '$_POST[customField4]',
			branch_id = '$_POST[branch_id]'
		WHERE
			id = $invoice_id";
			
	return mysqlQuery($sql);
}
/*		
		function insertinvoiceitem($invoice_id,$quantity,$product_id,$tax_id,$description="", $student_id, $start_reason_id, $dropped_reason_id, $dropped_date) 
		{
		
			global $LANG;
			$tax = gettaxrate($tax_id);
			$product = getproduct($product_id);
			//print_r($product);
			$actual_tax = $tax['tax_percentage']  / 100 ;
			$total_invoice_item_tax = $product['unit_price'] * $actual_tax;
			$tax_amount = $total_invoice_item_tax * $quantity;
			$total_invoice_item = $total_invoice_item_tax + $product['unit_price'] ;	
			$total = $total_invoice_item * $quantity;
			$gross_total = $product['unit_price']  * $quantity;
			
			$sql = "insert into ".TB_PREFIX."invoice_items (`invoice_id`,`quantity`,`product_id`,`unit_price`,`tax_id`,`tax`,`tax_amount`,`gross_total`,`description`,`total`,`student_id`,`start_reason_id`,`dropped_reason_id`,`dropped_date`) values ($invoice_id,$quantity,$product_id,$product[unit_price],'$tax[tax_id]',$tax[tax_percentage],$tax_amount,$gross_total,'$description',$total, '$student_id', '$start_reason_id', '$dropped_reason_id', '$dropped_date')";

			//echo $sql;
			return mysqlQuery($sql);

		}
*/
/*
		function updateInvoiceItem($id,$quantity,$product_id,$tax_id,$description, $student_id, $start_reason_id, $dropped_reason_id, $dropped_date) {

			$product = getProduct($product_id);
			$tax = getTaxRate($tax_id);
			
			$total_invoice_item_tax = $product['unit_price'] * $tax['tax_percentage'] / 100;	//:100?
			$tax_amount = $total_invoice_item_tax * $quantity;
			$total_invoice_item = $total_invoice_item_tax + $product['unit_price'];
			$total = $total_invoice_item * $quantity;
			$gross_total = $product['unit_price'] * $quantity;
			
			
			
			$sql = "UPDATE ".TB_PREFIX."invoice_items 
			SET `quantity` =  '$quantity',
			`product_id` = '$product_id',
			`unit_price` = '$product[unit_price]',
			`tax_id` = '$tax_id',
			`tax` = '$tax[tax_percentage]',
			`tax_amount` = '$tax_amount',
			`gross_total` = '$gross_total',
			`description` = '$description',
			`total` = '$total',			
			`student_id` = '$student_id',			
			`start_reason_id` = '$start_reason_id',			
			`dropped_reason_id` = '$dropped_reason_id',			
			`dropped_date` = '$dropped_date'			
			WHERE  `id` = '$id'";
			
			//echo $sql;
				
			return mysqlQuery($sql);
		}
*/
		function getActiveCustomers() {
	
			global $LANG; // must this be here?	
		
			$sql = "SELECT * FROM ".TB_PREFIX."customers WHERE enabled != 0 AND person_type = '1' ORDER BY name";
			return sql2array($sql);
		}

}

class school_biller extends biller
{
function insertBiller() {
	
	$sql = "INSERT into
			".TB_PREFIX."biller
		VALUES
			(
				NULL,
				'$_POST[name]',
				'$_POST[street_address]',
				'$_POST[street_address2]',
				'$_POST[city]',
				'$_POST[state]',
				'$_POST[zip_code]',
				'$_POST[country]',
				'$_POST[phone]',
				'$_POST[mobile_phone]',
				'$_POST[fax]',
				'$_POST[email]',
				'$_POST[logo]',
				'$_POST[footer]',
				'$_POST[notes]',
				'$_POST[custom_field1]',
				'$_POST[custom_field2]',
				'$_POST[custom_field3]',
				'$_POST[custom_field4]',
				'$_POST[enabled]',
				'$_POST[branch_id]'
			 )";


	return mysqlQuery($sql);
	/*
	if($query = mysqlQuery($sql)) {
		
		//error_log("iii:".mysql_insert_id());
		return $query;
	}
	else {
		return false;
	}*/
}

function updateBiller() {
	
	$sql = "UPDATE
				".TB_PREFIX."biller
			SET
				name = '$_POST[name]',
				street_address = '$_POST[street_address]',
				street_address2 = '$_POST[street_address2]',
				city = '$_POST[city]',
				state = '$_POST[state]',
				zip_code = '$_POST[zip_code]',
				country = '$_POST[country]',
				phone = '$_POST[phone]',
				mobile_phone = '$_POST[mobile_phone]',
				fax = '$_POST[fax]',
				email = '$_POST[email]',
				logo = '$_POST[logo]',
				footer = '$_POST[footer]',
				notes = '$_POST[notes]',
				custom_field1 = '$_POST[custom_field1]',
				custom_field2 = '$_POST[custom_field2]',
				custom_field3 = '$_POST[custom_field3]',
				custom_field4 = '$_POST[custom_field4]',
				enabled = '$_POST[enabled]',
				branch_id = '$_POST[branch_id]'
			WHERE
				id = '$_GET[id]'";
	return mysqlQuery($sql);
}
}

class school_custom_field {

	/**
	* Function: get_custom_field_name
	* 
	* Used by manage_custom_fields to get the name of the custom field and which section it relates to (ie, biller/product/customer)
	*
	* Arguments:
	* field         - The custom field in question
	**/


	function get_custom_field_name($field) {

			global $LANG;
			

		//grab the last character of the field variable
			$get_cf_letter = $field[0].$field[1];
			//grab the last character of the field variable
			$get_cf_number = $field[strlen($field)-1];
		
		if ($get_cf_letter == "bi") {
			$custom_field_name = $LANG['biller'];
		}
		if ($get_cf_letter == "cu") {
			$custom_field_name = $LANG['customer'];
		}
		if ($get_cf_letter == "ce") {
			$custom_field_name = "Certificate";
		}
		if ($get_cf_letter == "in") {
			$custom_field_name = $LANG['invoice'];
		}
		if ($get_cf_letter == "pr") {
			$custom_field_name = $LANG['product'];
		}
		
		$custom_field_name .= " :: " . $LANG["custom_field"] . " " . $get_cf_number ;
			return $custom_field_name;
	}

}

class school_payment {


	function getPayment($id) {
		global $config;
		$sql = "SELECT 
					ap.*, 
					c.name AS customer, 
					b.name AS biller, 
					br.name AS branch 
				FROM 
					".TB_PREFIX."account_payments ap, 
					".TB_PREFIX."invoices iv, 
					".TB_PREFIX."customers c, 
					".TB_PREFIX."branch br, 
					".TB_PREFIX."biller b  
				WHERE 
					ap.ac_inv_id = iv.id 
					AND 
					iv.customer_id = c.id 
					AND 
					br.id = ap.branch_id 
					AND 
					iv.biller_id = b.id AND ap.id=$id";

		$query = mysqlQuery($sql) or die(mysql_error());
		$payment = mysql_fetch_array($query);
		$payment['date'] = date( $config->date->format, strtotime( $payment['ac_date'] ) );
		return $payment;
	}

	function getInvoicePayments($id) {
		$sql = "SELECT ap.*, c.name AS CNAME, b.name AS BNAME, pt.pt_description AS description FROM ".TB_PREFIX."account_payments ap, ".TB_PREFIX."invoices iv, ".TB_PREFIX."customers c, ".TB_PREFIX."biller b, ".TB_PREFIX."payment_types pt WHERE ap.ac_inv_id = iv.id and iv.customer_id = c.id and iv.biller_id = b.id AND ap.ac_payment_type = pt.pt_id AND ap.ac_inv_id = $id ORDER BY ap.id DESC";
		return sql2array($sql);
	}

	function getCustomerPayments($id) {
		$sql = "SELECT 
					ap.*, 
					c.name AS CNAME, 
					b.name AS BNAME, 
					pt.pt_description AS description 
				FROM 
					".TB_PREFIX."account_payments ap, 
					".TB_PREFIX."invoices iv, 
					".TB_PREFIX."customers c, 
					".TB_PREFIX."biller b, 
					".TB_PREFIX."payment_types pt 
				WHERE 
					ap.ac_inv_id = iv.id 
					and 
					iv.customer_id = c.id 
					and 
					iv.biller_id = b.id 
					AND 
					ap.ac_payment_type = pt.pt_id 
					AND 
					c.id = $id 
				ORDER BY ap.id DESC";
		return sql2array($sql);
	}

function getPayments($limit="") {
	$sql = "SELECT 
				ap.*, 
				c.name AS CNAME, 
				b.name AS BNAME, 
				br.name as branch,
				pt.pt_description AS description 
			FROM 
				".TB_PREFIX."account_payments ap, 
				".TB_PREFIX."invoices iv, 
				".TB_PREFIX."customers c, 
				".TB_PREFIX."biller b, 
				".TB_PREFIX."branch br, 
				".TB_PREFIX."payment_types pt 
			WHERE 
				ap.ac_inv_id = iv.id 
				AND 
				iv.customer_id = c.id 
				AND 
				iv.biller_id = b.id 
				AND 
				ap.ac_payment_type = pt.pt_id 
				AND 
				br.id = ap.branch_id 
				$limit
			ORDER BY 
				ap.id DESC";
	return sql2array($sql);
	}
}

function year()
{
	$i = array();
	$y = 1930;
	$i[1930] = $y;
		while($y < 2020)
		{
			$y++;
			$i[] = $y;
		}

	return $i;

}

function month()
{
	
	$m = array();
	$m[1] = 'Jan';
	$m[2] = 'Feb';
	$m[3] = 'Mar';
	$m[4] = 'Apr';
	$m[5] = 'May';
	$m[6] = 'Jun';
	$m[7] = 'Jul';
	$m[8] = 'Aug';
	$m[9] = 'Sep';
	$m[10] = 'Oct';
	$m[11] = 'Nov';
	$m[12] = 'Dec';

	return $m;

}

function day()
{
	$i = array();
	$y = 01;
	$i[01] = $y;
		while($y < 31)
		{
			$y++;
			$i[] = $y;
		}

	return $i;
}

function format_date($date)
{
	$date_array = array();
	$date_array['year'] = substr($date, 0, 4);
	$date_array['month'] = substr($date, 5, 2);
	$date_array['day'] = substr($date, 8, 2);

	return $date_array;
}

function calc_age($month, $day, $year)
{
 (checkdate($month, $day, $year)==0) ? die("no such date.") : "";
 $y=gmstrftime("%Y");
 $m=gmstrftime("%m");
 $d=gmstrftime("%d");
 $age=$y-$year;
 return (($m<=$month)&&($d<=$day)) ? $age-1 : $age;
} 

?>