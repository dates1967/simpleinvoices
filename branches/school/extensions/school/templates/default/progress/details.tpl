<form name="frmpost"
	action="index.php?module=progress&view=save&id={$smarty.get.id}"
	method="post">


{if $smarty.get.action== 'view' }

	<b>Progress ::
	<a href="index.php?module=progress&view=details&id={$module.id}&action=edit">{$LANG.edit}</a></b>
	
 	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">ID</td><td>{$module.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Date</td>
		<td>{$module.date}</td>
	</tr>
	<tr>
		<td class="details_screen">Student</td>
		<td>{$name}, {$first_name} {$middle_name}</td>
	</tr>
	<tr>
		<td class="details_screen">Course</td>
		<td>{$course}</td>
	</tr>
	<tr>
		<td class="details_screen">Test</td>
		<td>{$test_name}</td>
	</tr>
	<tr>
		<td class="details_screen">Total</td>
		<td><b>{$module.total}</b></td>
	</tr>
	<tr>
		<td class="details_screen">1</td>
		<td>{$module.q1}</td>
	</tr>
	<tr>
		<td class="details_screen">2</td>
		<td>{$module.q2}</td>
	</tr>
	<tr>
		<td class="details_screen">3</td>
		<td>{$module.q3}</td>
	</tr>
	<tr>
		<td class="details_screen">4</td>
		<td>{$module.q4}</td>
	</tr>
	<tr>
		<td class="details_screen">5</td>
		<td>{$module.q5}</td>
	</tr>
	<tr>
		<td class="details_screen">6</td>
		<td>{$module.q6}</td>
	</tr>
	<tr>
		<td class="details_screen">7</td>
		<td>{$module.q7}</td>
	</tr>
	<tr>
		<td class="details_screen">8</td>
		<td>{$module.q8}</td>
	</tr>
	<tr>
		<td class="details_screen">9</td>
		<td>{$module.q9}</td>
	</tr>
	<tr>
		<td class="details_screen">10</td>
		<td>{$module.q10}</td>
	</tr>
	<tr>
		<td class="details_screen">11</td>
		<td>{$module.q11}</td>
	</tr>
	<tr>
		<td class="details_screen">12</td>
		<td>{$module.q12}</td>
	</tr>
	<tr>
		<td class="details_screen">13</td>
		<td>{$module.q13}</td>
	</tr>
	<tr>
		<td class="details_screen">14</td>
		<td>{$module.q14}</td>
	</tr>
	<tr>
		<td class="details_screen">15</td>
		<td>{$module.q15}</td>
	</tr>
	<tr>
		<td class="details_screen">16</td>
		<td>{$module.q16}</td>
	</tr>
	<tr>
		<td class="details_screen">17</td>
		<td>{$module.q17}</td>
	</tr>
	<tr>
		<td class="details_screen">18</td>
		<td>{$module.q18}</td>
	</tr>
	<tr>
		<td class="details_screen">19</td>
		<td>{$module.q19}</td>
	</tr>
	<tr>
		<td class="details_screen">20</td>
		<td>{$module.q20}</td>
	</tr>
	</table>

<hr></hr>
<a href="index.php?module=progress&view=details&id={$progress.id}&action=edit">{$LANG.edit}</a>
{/if}


{if $smarty.get.action== 'edit' }

	<b>Edit Progres</b>
	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">Date</td>
		<td><input type="text" class="date-picker" name="date" id="date1" value="{$module.date}" /></td>
	</tr>
	<tr>
		<td class="details_screen">Student</td>
		<td>
			<select name="student_id">
			{foreach from=$student item=student_row}
				<option {if $student_row.id == $module.student_id} selected {/if} value="{$student_row.id}">{$student_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Test</td>
		<td>
			<select name="test_id">
			{foreach from=$test item=test_row}
				<option {if $test_row.id == $module.test_id} selected {/if} value="{$test_row.id}">{$test_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Course</td>
		<td>
			<select name="course_id">
			{foreach from=$courses item=course_row}
				<option {if $course_row.id == $module.course_id} selected {/if} value="{$course_row.id}">{$course_row.description}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">1</td>
		<td><input type=text name="q1" value="{$module.q1}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">2</td>
		<td><input type=text name="q2" value="{$module.q2}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">3</td>
		<td><input type=text name="q3" value="{$module.q3}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">4</td>
		<td><input type=text name="q4" value="{$module.q4}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">5</td>
		<td><input type=text name="q5" value="{$module.q5}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">6</td>
		<td><input type=text name="q6" value="{$module.q6}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">7</td>
		<td><input type=text name="q7" value="{$module.q7}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">8</td>
		<td><input type=text name="q8" value="{$module.q8}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">9</td>
		<td><input type=text name="q9" value="{$module.q9}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">10</td>
		<td><input type=text name="q10" value="{$module.q10}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">11</td>
		<td><input type=text name="q11" value="{$module.q11}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">12</td>
		<td><input type=text name="q12" value="{$module.q12}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">13</td>
		<td><input type=text name="q13" value="{$module.q13}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">14</td>
		<td><input type=text name="q14" value="{$module.q14}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">15</td>
		<td><input type=text name="q15" value="{$module.q15}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">16</td>
		<td><input type=text name="q16" value="{$module.q16}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">17</td>
		<td><input type=text name="q17" value="{$module.q17}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">18</td>
		<td><input type=text name="q18" value="{$module.q18}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">19</td>
		<td><input type=text name="q19" value="{$module.q19}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">20</td>
		<td><input type=text name="q20" value="{$module.q20}" size=50></td>
	</tr>
	</table>
{/if} 
{if $smarty.get.action== 'edit' }
	<hr></hr>
		<input type="submit" name="cancel" value="{$LANG.cancel}" /> 
		<input type="submit" name="save_progress" value="Save Progress" /> 
		<input type="hidden" name="op" value="edit_progress" /> 
	{/if}
</form>
