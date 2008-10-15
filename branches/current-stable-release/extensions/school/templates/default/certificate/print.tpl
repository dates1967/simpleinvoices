	

	<table align="center" with="100%">
	<tr>
		<td>{$LANG.school_name}</td>
	</tr>
	<tr>
		<td>{$LANG.CERTIFICATE}</td>
	</tr>
	<tr>
		<td>{$LANG.cert_this_is_to_certify}</td>
	</tr>
	<tr>
		<td>{$student_sel.0.first_name} {$student_sel.0.name}</td>
	</tr>
	<tr>
		<td>{$LANG.cert_followed_and_completed}</td>
	</tr>
	<tr>
		<td>{$course_sel->description|upper} {$LANG.COURSE}</td>
	</tr>
	<tr>
		<td>{$LANG.at} {$level_sel->name|upper} {$LANG.level}</td>
	</tr>
	<tr>
		<td>{$grade_sel.0.name|upper}</td>
	</tr>
	<tr>
		<td>{$course_sel->duration} {$duration_type->name}</td>
	</tr>
	<tr>
		<td>{$LANG.from} {$course_sel->start_date} {$LANG.to} {$course_sel->payment_period_6_end}</td>
	</tr>
	<!-- bottom left -->
	<tr>
		<td class="details_screen">{$LANG.date_of_issue}</td>
		<td>{$certificate.date}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.place_of_issue}</td>
		<td>{$branch_sel.0.name}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.students_id}</td>
		<td>{$student_sel.0.id}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.certificate_number}</td>
		<td>{$certificate.0.id}</td>
	</tr>

	<!-- bottom right -->
	<tr>
		<td>Evgeny Lyzhko</td>
	</tr>
	<tr>
		<td>{$LANG.school_director}</td>
	</tr>

	<!-- address -->
	<tr>
		<td>{$LANG.school_name}</td>
	</tr>
	<tr>
		<td>{$LANG.school_address}</td>
	</tr>
	<tr>
		<td>{$LANG.school_web_address}</td>
	</tr>


	</table>

