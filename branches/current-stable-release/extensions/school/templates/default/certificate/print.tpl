	
 	<hr></hr>

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
		<td class="details_screen">Subject</td>
		<td>{$subject_sel->name}</td>
	</tr>
	<tr>
		<td class="details_screen">Level</td>
		<td>{$level_sel->name} </td>
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

