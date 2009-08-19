{*
/*
* Script: add.tpl
* 	 Customers add template
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-18
*
* License:
*	 GPL v2 or above
*/
*}

{* if customer is updated or saved.*} 

{if $smarty.post.description != "" && $smarty.post.description != null } 
	{include file="../extensions/school/templates/default/todo/save.tpl"}

{else}
{* if  name was inserted *} 
	{if $smarty.post.description } 
		<div class="validation_alert"><img src="./images/common/important.png"</img>
		You must enter a description</div>
		<hr />
	{/if}
	

	
<form name="frmpost" ACTION="index.php?module=todo&view=add" METHOD="post"><h3>Add a ToDo item</h3>
<hr />
	
<table align=center>
	<tr>
		<td class="details_screen">Date (dd/mm/yyyy)</td>
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
		<td class="details_screen">Description <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td><input type=text name="description" value="{$smarty.post.description}" size=75></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td><textarea name='note' rows=8 cols=74>{$smarty.post.note}</textarea></td>
	</tr>
</table>

<hr />
<div style="text-align:center;">
	<input type="submit" name="subject" value="Add To Do Item">
	<input type="hidden" name="op" value="insert_todo">
</div>
</form>
{/if}
