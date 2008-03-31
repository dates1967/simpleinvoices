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

{if $smarty.post.last_name != "" && $smarty.post.customer != null } 
	{include file="../templates/default/customers/save.tpl"}

{else}
{* if  name was inserted *} 
	{if $smarty.post.last_name !=null} 
		<div class="validation_alert"><img src="./images/common/important.png"</img>
		You must enter a Customer name</div>
		<hr />
	{/if}
<form name="frmpost" ACTION="index.php?module=customers&view=add" METHOD="post"><h3>Add New Student</h3>
<hr />
	
<div id="container-1">
	<ul class="anchors">
		<li><a href="#section-1">General Info</a></li>
		<li><a href="#section-2">Additional Info</a></li>
		<li><a href="#section-3">Custom Fields</a></li>
		<li><a href="#section-4">{$LANG.notes}</a></li>
	</ul>
	<div id="section-1" class="fragment">
<p>
<table align=center>
	<tr>
		<td class="details_screen">Place of Enrolment</td>
		<td>
			<select name="place_of_enrolment">
			{foreach from=$branch item=branch_row}
				<option {if $branch_row.id == "1"} selected {/if} value="{$branch_row.id}">{$branch_row.name}</option>
			{/foreach}
			</select>
		</td>
{*
		<td><input type=text name="place_of_enrolment" value="{$smarty.post.place_of_enrolment}" size=25></td>
*}
	</tr>
	<tr>
		<td class="details_screen">Place of Lessons</td>
		<td>
			<select name="place_of_lesson">
			{foreach from=$branch item=branch_row}
				<option {if $branch_row.id == "1"} selected {/if} value="{$branch_row.id}">{$branch_row.name}</option>
			{/foreach}
			</select>
		</td>
{*		<td><input type=text name="place_of_lesson" value="{$smarty.post.place_of_lesson}" size=25></td> *}
	</tr>
	<tr>
		<td class="details_screen">Date (TODO: what date - awaiting answer from site)</td>
		<td><input type=text name="date" value="{$smarty.post.date}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Last Name <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td><input type=text name="last_name" value="{$smarty.post.last_name}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">First Name <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td><input type=text name="first_name" value="{$smarty.post.first_name}" size=25></td>
	</tr>
	</tr>
	<td class="details_screen">{$LANG.customer_contact} <a
		href="docs.php?t=help&p=customer_contact"
		rel="gb_page_center[450, 450]"><img
		src="./images/common/help-small.png"></img></a></td>
	<td><input type=text name="attention" size=25 value="{$smarty.post.attention}"></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street}</td>
		<td><input type=text name="street_address" value="{$smarty.post.street_address}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street2} <a
			href="docs.php?t=help&p=street2"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
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
		<td><input type=text name="country" value="{$smarty.post.country}" size=50></td>
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
		<td class="details_screen">Birthday (dd/mm/yyyy)</td>
		<td><input type=text name="birthday" value="{$smarty.post.birthday}" size=25></td>
	</tr>
	</table>
</p>
	</div>
	<div id="section-2" class="fragment">
<p>
	<table align=center>
	<tr>
		<td class="details_screen" colspan=2>Parent or Guardian </td>
	</tr>
	<tr>
		<td class="details_screen">Relationship</td>
		<td>
			<select name="guardian1_relationship">
			{foreach from=$relation item=relation_row}
				<option {if $relation_row.id == "1"} selected {/if} value="{$relation_row.id}">{$relation_row.relation}</option>
			{/foreach}
			</select>
		</td>
	{*
		<td><input type=text name="guardian1_relationship" value="{$smarty.post.guardian1_relationship}" size=25></td>
	*}
	</tr>
	<tr>
		<td class="details_screen">First name</td>
		<td><input type=text name="guardian1_first_name" value="{$smarty.post.guardian1_first_name}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Middle name</td>
		<td><input type=text name="guardian1_last_name" value="{$smarty.post.guardian1_middle_name}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Last Name</td>
		<td><input type=text name="guardian1_last_name" value="{$smarty.post.guardian1_last_name}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Home phone</td>
		<td><input type=text name="guardian1_home_phone" value="{$smarty.post.guardian1_home_phone}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Cell phone</td>
		<td><input type=text name="guardian1_cell_phone" value="{$smarty.post.guardian1_cell_phone}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Email</td>
		<td><input type=text name="guardian1_email" value="{$smarty.post.guardian1_email}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Passport number</td>
		<td><input type=text name="guardian1_passport_number" value="{$smarty.post.guardian1_passport_number}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued at</td>
		<td><input type=text name="guardian1_passport_issued_at" value="{$smarty.post.guardian1_passport_issued_at}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued on</td>
		<td><input type=text name="guardian1_passport_issued_on" value="{$smarty.post.guardian1_passport_issued_on}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Home address</td>
		<td><input type=text name="guardian1_home_address" value="{$smarty.post.guardian1_home_address}" size=25></td>
	</tr>

	<tr>
		<td class="details_screen" colspan=2>Parent or Guardian 2</td>
	</tr>
	<tr>
		<td class="details_screen">Relationship</td>
		<td>
			<select name="guardian2_relationship">
			{foreach from=$relation item=relation_row}
				<option {if $relation_row.id == "1"} selected {/if} value="{$relation_row.id}">{$relation_row.relation}</option>
			{/foreach}
			</select>
		</td>
		{*
		<td><input type=text name="guardian2_relationship" value="{$smarty.post.guardian2_relationship}" size=25></td>
		*}
	</tr>
	<tr>
		<td class="details_screen">First name</td>
		<td><input type=text name="guardian2_first_name" value="{$smarty.post.guardian2_first_name}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Middle name</td>
		<td><input type=text name="guardian2_last_name" value="{$smarty.post.guardian2_middle_name}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Last Name</td>
		<td><input type=text name="guardian2_last_name" value="{$smarty.post.guardian2_last_name}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Home phone</td>
		<td><input type=text name="guardian2_home_phone" value="{$smarty.post.guardian2_home_phone}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Cell phone</td>
		<td><input type=text name="guardian2_cell_phone" value="{$smarty.post.guardian2_cell_phone}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Email</td>
		<td><input type=text name="guardian2_email" value="{$smarty.post.guardian2_email}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Passport number</td>
		<td><input type=text name="guardian2_passport_number" value="{$smarty.post.guardian2_passport_number}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued at</td>
		<td><input type=text name="guardian2_passport_issued_at" value="{$smarty.post.guardian2_passport_issued_at}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued on</td>
		<td><input type=text name="guardian2_passport_issued_on" value="{$smarty.post.guardian2_passport_issued_on}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Home address</td>
		<td><input type=text name="guardian2_home_address" value="{$smarty.post.guardian2_home_address}" size=25></td>
	</tr>

	
	</table>
	</p>
	</div>
	<div id="section-3" class="fragment">
	<p>
	<table align=center>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf1} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field1" value="{$smarty.post.custom_field1}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf2} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field2" value="{$smarty.post.custom_field2}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf3} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field3" value="{$smarty.post.custom_field3}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf4} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field4" value="{$smarty.post.custom_field4}" size=25></td>
	</tr>
	</table>
	</p>
	</div>
	<div id="section-4" class="fragment">
	<p>
	<table align=center>
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
{*
	{showCustomFields categorieId="2"}
*}
</table>
<p>
</div>
</div>
<hr />
<div style="text-align:center;">
	<input type="submit" name="customer" value="Add Student">
	<input type="hidden" name="op" value="insert_customer">
</div>
</form>
{/if}
