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

{if $smarty.post.name != "" && $smarty.post.name != null } 
	{include file="../extensions/school/templates/default/subject/save.tpl"}

{else}
{* if  name was inserted *} 
	{if $smarty.post.name } 
		<div class="validation_alert"><img src="./images/common/important.png"</img>
		You must enter a teachers name</div>
		<hr />
	{/if}
	

	
<form name="frmpost" ACTION="index.php?module=subject&view=add" METHOD="post"><h3>Add New Subject</h3>
<hr />
	
<table align=center>
	<tr>
		<td class="details_screen">Subject name <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td><input type=text name="name" value="{$smarty.post.name}" size=25></td>
	</tr>
</table>

<hr />
<div style="text-align:center;">
	<input type="submit" name="subject" value="Add Subject">
	<input type="hidden" name="op" value="insert_subject">
</div>
</form>
{/if}
