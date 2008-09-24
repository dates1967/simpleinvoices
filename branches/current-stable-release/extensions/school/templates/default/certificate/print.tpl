	
 	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">ID</td><td>{$certificate.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Issues at</td>
		<td>{$branch_sel.0.name}</td>
	</tr>
	<tr>
		<td class="details_screen">Date</td>
		<td>{$certificate.date}</td>
	</tr>
	<tr>
		<td class="details_screen">Student ID</td>
		<td>{$student_sel.0.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Student's Last Name</td>
		<td>{$student_sel.0.name}</td>
	</tr>
	<tr>
		<td class="details_screen">Student's First Name</td>
		<td>{$student_sel.0.first_name}</td>
	</tr>
	<tr>
		<td class="details_screen">Student's Middle Name</td>
		<td>{$student_sel.0.middle_name}</td>
	</tr>
	<tr>
		<td class="details_screen">Course name</td>
		<td>{$course_sel->description}</td>
	</tr>
	<tr>
		<td class="details_screen">Subject</td>
		<td>{$subject_sel->name}</td>
	</tr>
	<tr>
		<td class="details_screen">Level</td>
		<td>{$level_sel->name}</td>
	</tr>
	<tr>
		<td class="details_screen">Dates of course</td>
		<td>{$course_sel->start_date} - {$course_sel->payment_period_6_end}</td>
	</tr>
	<tr>
		<td class="details_screen">Grade</td>
		<td>{$grade_sel.0.name}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf1}</td>
		<td>{$certificate.custom_field1}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf2}</td>
		<td>{$certificate.custom_field2}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf3}</td>
		<td>{$certificate.custom_field3}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf4}</td>
		<td>{$certificate.custom_field4}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td>{$certificate.text}</td>
	</tr>
	</table>

