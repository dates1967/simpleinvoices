
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
		<td><input type=text name="1" value="{$smarty.post.1}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">2</td>
		<td><input type=text name="2" value="{$smarty.post.2}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">3</td>
		<td><input type=text name="3" value="{$smarty.post.3}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">4</td>
		<td><input type=text name="4" value="{$smarty.post.4}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">5</td>
		<td><input type=text name="5" value="{$smarty.post.5}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">6</td>
		<td><input type=text name="6" value="{$smarty.post.6}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">7</td>
		<td><input type=text name="7" value="{$smarty.post.7}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">8</td>
		<td><input type=text name="8" value="{$smarty.post.8}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">9</td>
		<td><input type=text name="9" value="{$smarty.post.9}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">10</td>
		<td><input type=text name="10" value="{$smarty.post.10}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">11</td>
		<td><input type=text name="11" value="{$smarty.post.11}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">12</td>
		<td><input type=text name="12" value="{$smarty.post.12}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">13</td>
		<td><input type=text name="13" value="{$smarty.post.13}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">14</td>
		<td><input type=text name="14" value="{$smarty.post.14}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">15</td>
		<td><input type=text name="15" value="{$smarty.post.15}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">16</td>
		<td><input type=text name="16" value="{$smarty.post.16}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">17</td>
		<td><input type=text name="17" value="{$smarty.post.17}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">18</td>
		<td><input type=text name="18" value="{$smarty.post.18}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">19</td>
		<td><input type=text name="19" value="{$smarty.post.19}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">20</td>
		<td><input type=text name="20" value="{$smarty.post.20}" size=50></td>
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
