<form name="frmpost"
	action="index.php?module=enrollment&view=save&id={$smarty.get.id}"
	method="post">


{if $smarty.get.action== 'view' }

	<b>Enrollment ::
	<a href="index.php?module=enrollment&view=details&id={$enrollment.0.enrollment_id}&action=edit">{$LANG.edit}</a></b>
	
 	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">ID</td><td>{$enrollment.0.enrollment_id}</td>
	</tr>
	<tr>
		<td class="details_screen">Student</td>
		<td><a href="index.php?module=customers&view=details&id={$enrollment.0.student_id}&action=view">{$enrollment.0.first_name} {$enrollment.0.middle_name} {$enrollment.0.last_name}</a></td>
	</tr>
	<tr>
		<td class="details_screen">Course</td>
		<td><a href="index.php?module=course&view=details&id={$enrollment.0.id}&action=view">{$enrollment.0.course_name}</a></td>
	</tr>
	<tr>
		<td class="details_screen">Course branch</td>
		<td>{$enrollment.0.branch_name}</td>
	</tr>
	<tr>
		<td class="details_screen">Course subject</td>
		<td>{$enrollment.0.subject_name}</td>
	</tr>
	<tr>
		<td class="details_screen">Status</td>
		<td>{$enrollment.0.status}</td>
	</tr>
	<tr>
		<td class="details_screen">Date of first leason</td>
		<td>{$enrollment.0.start_date}</td>
	</tr>
	<tr>
		<td class="details_screen">Start reason</td>
		<td>{$enrollment.0.start_reason}</td>
	</tr>
	<tr>
		<td class="details_screen">Dropped data</td>
		<td>{$enrollment.0.dropped_date}</td>
	</tr>
	<tr>
		<td class="details_screen">Dropped reason</td>
		<td>{$enrollment.0.dropped_reason}</td>
	</tr>
	</table>

<hr></hr>
<a href="index.php?module=enrollment&view=details&id={$enrollment.0.enrollment_id}&action=edit">{$LANG.edit}</a>
{/if}


{if $smarty.get.action== 'edit' }

	<b>Edit Enrollment</b>
	<hr></hr>

	<table align="center">
		<tr>
		<td class="details_screen">ID</td><td>{$enrollment.0.enrollment_id}</td>
	</tr>
		<tr>
		<td class="details_screen">Student</td>
		<td>
			<select name="student_id">
			{foreach from=$students item=student}
				<option {if $student.id == $enrollment.0.student_id} selected {/if} value="{$student.id}">{$student.name}, {$student.first_name} {$student.middle_name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Course</td>
		<td>
			<select name="course_id">
			{foreach from=$courses item=course}
				<option {if $course.id == $enrollment.0.course_id} selected {/if} value="{$course.id}">{$course.description}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Start Reason</td>
		<td>
			<select name="start_reason_id">
			{foreach from=$start_reasons item=start_reason}
				<option {if $start_reason.id == $enrollment.0.start_id} selected {/if} value="{$start_reason.id}">{$start_reason.reason}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Dropped Reason</td>
		<td>
			<select name="dropped_reason_id">
			{foreach from=$dropped_reasons item=dropped_reason}
				<option {if $dropped_reason.id == $enrollment.0.dropped_id} selected {/if} value="{$dropped_reason.id}">{$dropped_reason.reason}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
	
		<td class="details_screen">Dropped date</td>
		<td>
                 <input type="text" class="date-picker" name="date" id="date1" value='{$enrollment.0.dropped_date|date_format:"%Y-%m-%d"}'></input>
        </td>
		
	</tr>
	</table>
{/if} 
{if $smarty.get.action== 'edit' }
	<hr></hr>
		<input type="submit" name="cancel" value="{$LANG.cancel}" /> 
		<input type="submit" name="save_enrollment" value="Save Enrollment" /> 
		<input type="hidden" name="op" value="edit_enrollment" /> 
	{/if}
</form>
