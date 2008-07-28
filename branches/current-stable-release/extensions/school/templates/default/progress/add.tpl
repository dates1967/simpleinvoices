
{* if bill is updated or saved.*}

{if $smarty.post.name != "" } 
	{include file="../extensions/school/templates/default/progress/save.tpl"}
{else}
{* if  name was inserted *} 
	{if $smarty.post.name !=null} 
		<div class="validation_alert"><img src="./images/common/important.png"</img>
		You must enter a name for the branch</div>
		<hr />
	{/if}
<form name="frmpost" ACTION="index.php?module=progress&view=add" METHOD="POST">

<div id="top"><h3>Add Progress</h3></div>
 <hr />

<table align=center>
	<tr>
		<td class="details_screen">Date</td>
		<td>
			<select name="student_id">
			{foreach from=$student item=student_row}
				<option {if $student_row.id == "1"} selected {/if} value="{$student_row.id}">{$student_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Student</td>
		<td>
			<select name="student_id">
			{foreach from=$student item=student_row}
				<option {if $student_row.id == "1"} selected {/if} value="{$student_row.id}">{$student_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Test</td>
		<td>
			<select name="test_id">
			{foreach from=$test item=test_row}
				<option {if $test_row.id == "1"} selected {/if} value="{$test_row.id}">{$test_row.name}</option>
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
		<td class="details_screen">Branch name <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td><input type=text name="name" value="{$smarty.post.name}" size=50></td>
	</tr>
</table>
<!-- </div> -->
<hr />
<div style="text-align:center;">
	<input type="submit" name="id" value="Insert Branch">
	<input type="hidden" name="op" value="insert_branch">
</div>
</form>
	{/if}
