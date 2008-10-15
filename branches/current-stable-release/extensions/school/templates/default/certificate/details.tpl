<form name="frmpost"
	action="index.php?module=certificate&view=save&id={$smarty.get.id}"
	method="post">


{if $smarty.get.action== 'view' }

	<b>Certificate ::
	<a href="index.php?module=certificate&view=print&id={$certificate.id}">{$LANG.Print}</a></b> :: 
	<a href="index.php?module=certificate&view=print&id={$certificate.id}&lang=fr">{$LANG.Print} fr</a></b> :: 
	<a href="index.php?module=certificate&view=print&id={$certificate.id}&lang=de">{$LANG.Print} de</a></b> :: 
	<a href="index.php?module=certificate&view=print&id={$certificate.id}&lang=it">{$LANG.Print} it</a></b> :: 
	<a href="index.php?module=certificate&view=print&id={$certificate.id}&lang=es">{$LANG.Print} es</a></b> :: 
	<a href="index.php?module=certificate&view=print&id={$certificate.id}&lang=en-gb">{$LANG.Print} en</a></b> :: 
	<a href="index.php?module=certificate&view=details&id={$certificate.id}&action=edit">{$LANG.edit}</a></b>
	
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

<hr></hr>
<a href="index.php?module=certificate&view=print&id={$certificate.id}">{$LANG.Print}</a> ::
<a href="index.php?module=certificate&view=details&id={$certificate.id}&action=edit">{$LANG.edit}</a>
{/if}


{if $smarty.get.action== 'edit' }

	<b>{$LANG.certificate_edit}</b>
	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">Certificate ID</td>
		<td>{$certificate.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Issued at</td>
		<td>
			<select name="branch_id">
			{foreach from=$branch item=branch_row}
				<option {if $branch_row.id == $branch_sel.0.id } selected {/if} value="{$branch_row.id}">{$branch_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Date</td>
		<td><input type=text name="date" class="date-picker" value="{$certificate.date}" size=12></td>
	</tr>
	<tr>
		<td class="details_screen">Student</td>
		<td>
		<select name="student_id">
		{foreach from=$student item=student_row}
			<option {if $student_row.id == $student_sel.0.id} selected {/if} value="{$student_row.id}">{$student_row.name}, {$student_row.first_name}</option>
		{/foreach}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Course</td>
		<td>
		<select name="course_id">
		{foreach from=$courses item=course_row}
			<option {if $course_row.id == $course_sel->id} selected {/if} value="{$course_row.id}">{$course_row.description}</option>
		{/foreach}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Grade</td>
		<td>
		<select name="grade_id">
		{foreach from=$grade item=grade_row}
			<option {if $grade_row.id == $grade_sel.0.id} selected {/if} value="{$grade_row.id}">{$grade_row.name}</option>
		{/foreach}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf1} <a href="docs.php?t=help&p=custom_fields" rel="gb_page_center[450, 450]"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field1" value="{$certificate.custom_field1}"  size=50></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf2} <a href="docs.php?t=help&p=custom_fields" rel="gb_page_center[450, 450]"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field2" value="{$certificate.custom_field2}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf3} <a href="docs.php?t=help&p=custom_fields" rel="gb_page_center[450, 450]"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field3" value="{$certificate.custom_field3}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf4} <a href="docs.php?t=help&p=custom_fields" rel="gb_page_center[450, 450]"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field4" value="{$certificate.custom_field4}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td><textarea input type=text name="text"
			 rows=8 cols=50>{$certificate.text}</textarea></td>
	</tr>
	</table>
{/if} 
{if $smarty.get.action== 'edit' }
	<hr></hr>
		<input type="submit" name="cancel" value="{$LANG.cancel}" /> 
		<input type="submit" name="save_certificate" value="Save Certificate" /> 
		<input type="hidden" name="op" value="edit_certificate" /> 
	{/if}
</form>
