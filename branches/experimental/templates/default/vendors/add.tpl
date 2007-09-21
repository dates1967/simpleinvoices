{* if vendor is updated or saved.*}

{if $smarty.post.name != "" && $smarty.post.submit != null }
	{include file="../templates/default/vendors/save.tpl"}

{else}
	{* if  name was inserted *}
	{if $smarty.post.submit !=null}
		<div class="validation_alert"><img src="./images/common/important.png"</img>
		You must enter a Customer name</div>
		<hr />
	{/if}
<form name="frmpost" ACTION="index.php?module=vendors&view=add" METHOD="post"><h3>Add New Vendor</h3>
<hr />
<table align=center>
	<tr>
		<td class="details_screen">Vendor Name
			<a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a>
		</td>
		<td>
			<input type=text name="name" value="{$smarty.post.name}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Contact</td>
		<td><input type=text name="attention" size=25 value="{$smarty.post.attention}"></td>
	</tr>
<!-- Billing Address -->
	<tr>
		<td colspan="1" class="details_screen" style="font-weight:bold;font-size:small;padding-left:20px">Details</td><td></td>
	</tr>
	<tr>
		<td class="details_screen">Street Address</td>
		<td><input type=text name="street_address" value="{$smarty.post.street_address}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Street Address (cont) </td>
		<td><input type=text name="street_address2" value="{$smarty.post.street_address2}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td><input type=text name="city" value="{$smarty.post.city}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td><input type=text name="state" value="{$smarty.post.state}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip}</td>
		<td><input type=text name="zip_code" value="{$smarty.post.zip_code}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td><input type=text name="country" value="{$smarty.post.country}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td><input type=text name="phone" value="{$smarty.post.phone}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.mobile_phone}</td>
		<td><input type=text name="mobile_phone" value="{$smarty.post.mobile_phone}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td><input type=text name="fax" value="{$smarty.post.fax}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.email}</td>
		<td><input type=text name="email" value="{$smarty.post.email}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Website</td>
		<td><input type=text name="website" value="{$smarty.post.website}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td><textarea name='notes' rows=8 cols=50>{$smarty.post.notes}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
			{html_options name=enabled options=$enabled selected=1}
		</td>
	</tr>
</table>
<hr />
<div style="text-align:center;">
	<input type=submit name="submit" value="Insert Vendor" />
	<input type=hidden name="op" value="insert_vendor" />
</div>
</form>
{/if}
