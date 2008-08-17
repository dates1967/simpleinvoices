
{* if bill is updated or saved.*}

{if $smarty.post.date != "" } 
	{include file="../extensions/school/templates/default/certificate/save.tpl"}
{else}
{* if  name was inserted *} 
	{if $smarty.post.date !=null} 
		<div class="validation_alert"><img src="./images/common/important.png"</img>
		You must enter a date for the certificate</div>
		<hr />
	{/if}
<form name="frmpost" ACTION="index.php?module=certificate&view=add" METHOD="POST">

<div id="top"><h3>Add Certificate</h3></div>
 <hr />

<table align=center>
	<tr>
		<td class="details_screen">Certificate ID</td>
		<td><i>This will be auto created</i></td>
	</tr>
	<tr>
		<td class="details_screen">Issued at</td>
		<td>
			<select name="branch_id">
			{foreach from=$branch item=branch_row}
				<option {if $branch_row.id == "1"} selected {/if} value="{$branch_row.id}">{$branch_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Date</td>
		<td><input type=text name="date" class="date-picker" value="{$smarty.post.date}" size=12></td>
	</tr>
	<tr>
		<td class="details_screen">Student</td>
		<td>
		<select name="student_id">
		{foreach from=$student item=student_row}
			<option {if $student_row.id == "1"} selected {/if} value="{$student_row.id}">{$student_row.name}, {$student_row.first_name}</option>
		{/foreach}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Course</td>
		<td>
		<select name="course_id">
		{foreach from=$course item=course_row}
			<option {if $course_row.id == "1"} selected {/if} value="{$course_row.id}">{$course_row.description}</option>
		{/foreach}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Grade</td>
		<td>
		<select name="grade_id">
		{foreach from=$grade item=grade_row}
			<option {if $grade_row.id == "1"} selected {/if} value="{$grade_row.id}">{$grade_row.name}</option>
		{/foreach}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf1} <a href="docs.php?t=help&p=custom_fields" rel="gb_page_center[450, 450]"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field1" value="{$smarty.post.custom_field1}"  size=50></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf2} <a href="docs.php?t=help&p=custom_fields" rel="gb_page_center[450, 450]"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field2" value="{$smarty.post.custom_field2}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf3} <a href="docs.php?t=help&p=custom_fields" rel="gb_page_center[450, 450]"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field3" value="{$smarty.post.custom_field3}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.certificate_cf4} <a href="docs.php?t=help&p=custom_fields" rel="gb_page_center[450, 450]"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field4" value="{$smarty.post.custom_field4}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td><textarea input type=text name="text"
			 rows=8 cols=50>{$smarty.post.notes}</textarea></td>
	</tr>
</table>
<!-- </div> -->
<hr />
<div style="text-align:center;">
	<input type="submit" name="id" value="Insert Certificate">
	<input type="hidden" name="op" value="insert_certificate">
</div>
</form>
	{/if}
