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

{if $smarty.post.username != "" && $smarty.post.username != null } 
	{include file="../extensions/school/templates/default/user/save.tpl"}

{else}
{* if  name was inserted *} 
	{if $smarty.post.username } 
		<div class="validation_alert"><img src="./images/common/important.png"</img>
		You must enter a teachers name</div>
		<hr />
	{/if}
	

	
<form name="frmpost" ACTION="index.php?module=user&view=add" METHOD="post"><h3>Add New User</h3>
<hr />
	
<table align=center>
	<tr>
		<td class="details_screen">User name <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td><input type=text name="username" value="{$smarty.post.username}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">Password <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td><input type=text name="password_field" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">User Type</td>
		<td>
			<select name="person_type">
			{foreach from=$person_type key=pid item=ptype}
				<option value="{$pid}">{$ptype}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">User Group</td>
		<td>
			<select name="user_group">
			{foreach from=$role item=role_row}
				<option value="{$role_row.id}">{$role_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Branch</td>
		<td>
			<select name="branch_id">
			{foreach from=$branch item=branch_row}
				<option value="{$branch_row.id}">{$branch_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
</table>

<hr />
<div style="text-align:center;">
	<input type="submit" name="subject" value="Add User">
	<input type="hidden" name="op" value="insert_user">
</div>
</form>
{/if}
