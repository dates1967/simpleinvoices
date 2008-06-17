<form name="frmpost"
	action="index.php?module=todo&view=save&id={$smarty.get.id}"
	method="post">


{if $smarty.get.action== 'view' }

	<b>ToDo ::
	<a href="index.php?module=todo&view=details&id={$todo.id}&action=edit">{$LANG.edit}</a></b>
	
 	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">ID</td><td>{$todo.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Date</td>
		<td>{$todo.date}</td>
	</tr>
	<tr>
		<td class="details_screen">Description</td>
		<td>{$todo.description}</td>
	</tr>
	<tr>
		<td class="details_screen">Note</td>
		<td>{$todo.note}</td>
	</tr>
	</table>

<hr></hr>
<a href="index.php?module=todo&view=details&id={$todo.id}&action=edit">{$LANG.edit}</a>
{/if}


{if $smarty.get.action== 'edit' }

	<b>Edit ToDo</b>
	<hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">ID</td>
		<td>{$todo.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Date</td>
		<td>
		<select name="date_day">
			{html_options values=$day output=$day selected=$day_now}
		</select>
		<select name="date_month">
			{html_options options=$month selected=$month_now }
		</select>
		<select name="date_year">
			{html_options values=$year output=$year selected=$year_now}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Description</td>
		<td><input type="text" name="description" size="75" value="{$todo.description}" /></td>
	</tr>
	<tr>
		<td class="details_screen">Note</td>
		<td><textarea name='note' rows=8 cols=74>{$todo.note}</textarea></td>
	</tr>
	</table>
{/if} 
{if $smarty.get.action== 'edit' }
	<hr></hr>
		<input type="submit" name="cancel" value="{$LANG.cancel}" /> 
		<input type="submit" name="save_subject" value="Save ToDo" /> 
		<input type="hidden" name="op" value="edit_todo" /> 
	{/if}
</form>
