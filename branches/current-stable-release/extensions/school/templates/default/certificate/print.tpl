	
<link rel='stylesheet' type='text/css' href='./extensions/school/templates/default/css/school.css' />

	<table align="center" class="certTable" width="100%">
	<tr>
		<td align=center><div class="certGreen">{$LANG.school_name}</div></td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td align=center><div class="certTitle">{$LANG.CERTIFICATE}</div></td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td align=center><div class="certItalic" >{$LANG.cert_this_is_to_certify}</div></td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td align=center><div class="certBold">{$student_sel.0.first_name} {$student_sel.0.name}</div></td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td align=center><div class="certItalic">{$LANG.cert_followed_and_completed}</div></td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td align=center><div class="certBold" >{$course_sel->description|upper} {$LANG.COURSE}</div></td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td  align=center> <div class="certItalic">{$LANG.at} <span class="certBold">{$level_sel->name|upper}</span> {$LANG.level}</div></td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td  align=center> <div class="certBold" >{$grade_sel.0.name|upper}</div></td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td align=center><div class="certItalic"> {$course_sel->duration} {$duration_type->name}</div></td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td align=center><div class="certItalic">{$LANG.from} {$course_sel->start_date} {$LANG.to} {$course_sel->payment_period_6_end}</div></td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<tr>
		<td align=center>&nbsp;</td>
	</tr>
	<!-- bottom left -->
	<tr>
		<td>
			<table class="certSmall">
				<tr>	
					<td>{$LANG.date_of_issue}</td>
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
			</table>
		</td>
	</tr>

	<!-- bottom right -->
	<tr class="certSmall">
		<td align=right>Evgeny Lyzhko</td>
	</tr>
	<tr class="certSmall">
		<td align=right>{$LANG.school_director}</td>
	</tr>

	<!-- address -->
	<tr>
		<td  align=center><div class="certSmall">{$LANG.school_name}</div></td>
	</tr>
	<tr>
		<td align=center><div class="certSmall">{$LANG.school_address}</div></td>
	</tr>
	<tr>
		<td align=center><div class="certSmall">{$LANG.school_web_address}</div></td>
	</tr>


	</table>

