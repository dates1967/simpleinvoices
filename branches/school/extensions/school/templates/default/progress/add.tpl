
{* if bill is updated or saved.*}

{if $smarty.post.date != "" } 
	{include file="../extensions/school/templates/default/progress/save.tpl"}
{else}
{* if  name was inserted *} 
	{if $smarty.post.date !=null} 
		<div class="validation_alert"><img src="./images/common/important.png"</img>
		You must enter a date</div>
		<hr />
	{/if}
<form name="frmpost" ACTION="index.php?module=progress&view=add" METHOD="POST">

<div id="top"><h3>Add Progress</h3></div>
 <hr />

<table align=center>
	<tr>
		<td class="details_screen">Date</td>
		<td><input type="text" class="date-picker" name="date" id="date1" value="{$today}" /></td>
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
		<td class="details_screen">1</td>
		<td><input type=text name="q1" value="{$smarty.post.q1}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">2</td>
		<td><input type=text name="q2" value="{$smarty.post.q2}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">3</td>
		<td><input type=text name="q3" value="{$smarty.post.q3}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">4</td>
		<td><input type=text name="q4" value="{$smarty.post.q4}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">5</td>
		<td><input type=text name="q5" value="{$smarty.post.q5}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">6</td>
		<td><input type=text name="q6" value="{$smarty.post.q6}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">7</td>
		<td><input type=text name="q7" value="{$smarty.post.q7}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">8</td>
		<td><input type=text name="q8" value="{$smarty.post.q8}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">9</td>
		<td><input type=text name="q9" value="{$smarty.post.q9}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">10</td>
		<td><input type=text name="q10" value="{$smarty.post.q10}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">11</td>
		<td><input type=text name="q11" value="{$smarty.post.q11}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">12</td>
		<td><input type=text name="q12" value="{$smarty.post.q12}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">13</td>
		<td><input type=text name="q13" value="{$smarty.post.q13}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">14</td>
		<td><input type=text name="q14" value="{$smarty.post.q14}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">15</td>
		<td><input type=text name="q15" value="{$smarty.post.q15}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">16</td>
		<td><input type=text name="q16" value="{$smarty.post.q16}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">17</td>
		<td><input type=text name="q17" value="{$smarty.post.q17}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">18</td>
		<td><input type=text name="q18" value="{$smarty.post.q18}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">19</td>
		<td><input type=text name="q19" value="{$smarty.post.q19}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">20</td>
		<td><input type=text name="q20" value="{$smarty.post.q20}" size=50></td>
	</tr>
</table>
<!-- </div> -->
<hr />
<div style="text-align:center;">
	<input type="submit" name="id" value="Insert Progress">
	<input type="hidden" name="op" value="insert_progress">
</div>
</form>
	{/if}
