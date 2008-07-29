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
		<td>{$module.1}</td>
	</tr>
	<tr>
		<td class="details_screen">2</td>
		<td>{$module.2}</td>
	</tr>
	<tr>
		<td class="details_screen">3</td>
		<td>{$module.3}</td>
	</tr>
	<tr>
		<td class="details_screen">4</td>
		<td>{$module.4}</td>
	</tr>
	<tr>
		<td class="details_screen">5</td>
		<td>{$module.5}</td>
	</tr>
	<tr>
		<td class="details_screen">6</td>
		<td>{$module.6}</td>
	</tr>
	<tr>
		<td class="details_screen">7</td>
		<td>{$module.7}</td>
	</tr>
	<tr>
		<td class="details_screen">8</td>
		<td>{$module.8}</td>
	</tr>
	<tr>
		<td class="details_screen">9</td>
		<td>{$module.9}</td>
	</tr>
	<tr>
		<td class="details_screen">10</td>
		<td>{$module.10}</td>
	</tr>
	<tr>
		<td class="details_screen">11</td>
		<td>{$module.11}</td>
	</tr>
	<tr>
		<td class="details_screen">12</td>
		<td>{$module.12}</td>
	</tr>
	<tr>
		<td class="details_screen">13</td>
		<td>{$module.13}</td>
	</tr>
	<tr>
		<td class="details_screen">14</td>
		<td>{$module.14}</td>
	</tr>
	<tr>
		<td class="details_screen">15</td>
		<td>{$module.15}</td>
	</tr>
	<tr>
		<td class="details_screen">16</td>
		<td>{$module.16}</td>
	</tr>
	<tr>
		<td class="details_screen">17</td>
		<td>{$module.17}</td>
	</tr>
	<tr>
		<td class="details_screen">18</td>
		<td>{$module.18}</td>
	</tr>
	<tr>
		<td class="details_screen">19</td>
		<td>{$module.19}</td>
	</tr>
	<tr>
		<td class="details_screen">20</td>
		<td>{$module.20}</td>
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
			{foreach from=$course item=course_row}
				<option {if $course_row.id == $module.course_id} selected {/if} value="{$course_row.id}">{$course_row.description}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">1</td>
		<td><input type=text name="1" value="{$module.1}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">2</td>
		<td><input type=text name="2" value="{$module.2}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">3</td>
		<td><input type=text name="3" value="{$module.3}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">4</td>
		<td><input type=text name="4" value="{$module.4}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">5</td>
		<td><input type=text name="5" value="{$module.5}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">6</td>
		<td><input type=text name="6" value="{$module.6}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">7</td>
		<td><input type=text name="7" value="{$module.7}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">8</td>
		<td><input type=text name="8" value="{$module.8}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">9</td>
		<td><input type=text name="9" value="{$module.9}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">10</td>
		<td><input type=text name="10" value="{$module.10}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">11</td>
		<td><input type=text name="11" value="{$module.11}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">12</td>
		<td><input type=text name="12" value="{$module.12}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">13</td>
		<td><input type=text name="13" value="{$module.13}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">14</td>
		<td><input type=text name="14" value="{$module.14}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">15</td>
		<td><input type=text name="15" value="{$module.15}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">16</td>
		<td><input type=text name="16" value="{$module.16}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">17</td>
		<td><input type=text name="17" value="{$module.17}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">18</td>
		<td><input type=text name="18" value="{$module.18}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">19</td>
		<td><input type=text name="19" value="{$module.19}" size=50></td>
	</tr>
		<tr>
		<td class="details_screen">20</td>
		<td><input type=text name="20" value="{$module.20}" size=50></td>
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
