{*
/*
* Script: details.tpl
* 	 Customer details template
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-18
*
* License:
*	 GPL v2 or above
*
* Website:
*	http://www.simpleinvoices.org
*/
*}

{if $smarty.get.action == 'view' }
<b>Teacher :: <a href="index.php?module=teacher&view=details&id={$customer.id}&action=edit">{$LANG.edit}</a>
</b>
<hr></hr>
	
<div id="container-1">
	<ul class="anchors">
		<li><a href="#section-1">General Info</a></li>
		<li><a href="#section-2">Custom Fields</a></li>
		<li><a href="#section-3">{$LANG.notes}</a></li>
	</ul>
	<div id="section-1" class="fragment">
<p>
<table align=center>
	<tr>
		<td class="details_screen">Branch</td>
		<td>
			{$branch_id}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Place of Enrolment</td>
		<td>
			{$place_of_enrolment}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Place of Lessons</td>
		<td>
			{$place_of_lesson}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Student {$LANG.id}</td>
		<td>{$customer.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Date (dd/mm/yyyy) (TODO: what is this for?)</td>
		<td>
			{$customer_date.day}/{$customer_date.month}/{$customer_date.year}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Last name <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td>
			{$customer.name}
		</td>
		
	</tr>
	<tr>
		<td class="details_screen">First name <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td>
			{$customer.first_name}
		</td>
		
	</tr>
	<tr>
		<td class="details_screen">Middle name</td>
		<td>
			{$customer.middle_name}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Birthday (dd/mm/yyyy)</td>
		<td>
			{$customer_birthday.day }/{$customer_birthday.month}/{$customer_birthday.year}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Gender</td>
		<td>
			{$customer.gender}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Age</td>
		<td>
			{$age}
		</td>
	</tr>
	
	<tr>
		<td class="details_screen" colspan="2">Passport details:</td>
	</tr>
	<tr>
		<td class="details_screen">&nbsp;&nbsp;&nbsp;Passport number</td>
		<td>
			{$customer.passport_number}
		</td>
	</tr>
		<tr>
		<td class="details_screen">&nbsp;&nbsp;&nbsp;Passport issued at</td>
		<td>
			{$customer.passport_issued_at}
		</td>
	</tr>
		<tr>
		<td class="details_screen">&nbsp;&nbsp;&nbsp;Passport issued on (dd/mm/yyyy)</td>
		<td>
			{$customer_passport_issued_on.day }/{$customer_passport_issued_on.month}/{$customer_passport_issued_on.year}
		</td>
	</tr>
	
	
	<tr>
		<td class="details_screen">{$LANG.street}</td>
		<td>
			{$customer.street_address}
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street2}</td>
		<td>
			{$customer.street_address2}
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td>
			{$customer.city}
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td>
			{$customer.state}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Post code</td>
		<td>
			{$customer.zip_code}
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td>
			{$customer.country}
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td>
			{$customer.phone}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Cell phone</td>
		<td>
			{$customer.mobile_phone}
		</td>	
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td>
			{$customer.fax}
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.email}</td>
		<td>
			{$customer.email}
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
			{$customer.wording_for_enabled}
		</td>
	</tr>


	</table>
</p>
	</div>
	
	<div id="section-2" class="fragment">
	<p>
	<table align=center>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf1} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>
			{$customer.custom_field1}
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf2} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>
			{$customer.custom_field2}
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf3} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>
			{$customer.custom_field3}
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf4} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>
			{$customer.custom_field4}
		</td>
	</tr>
	</table>
	</p>
	</div>
	
	
	
	<div id="section-3" class="fragment">
	<p>
	<table align=center>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td>
			{$customer.notes}
		</td>
	</tr>

{*
	{showCustomFields categorieId="2"}
*}
</table>
<p>
</div>
</div>


<hr></hr>
<a href="index.php?module=teacher&view=details&id={$customer.id}&action=edit">{$LANG.edit}</a>
{/if}

{if $smarty.get.action == 'edit' }

<form name="frmpost"
	action="index.php?module=teacher&view=save&id={$customer.id}"
	method="post">

<div id="top"><b>Edit Teacher</b></div>
<hr></hr>
<div id="container-1">
	<ul class="anchors">
		<li><a href="#section-1">General Info</a></li>
		<li><a href="#section-2">Custom Fields</a></li>
		<li><a href="#section-3">{$LANG.notes}</a></li>
	</ul>
	<div id="section-1" class="fragment">
<p>
<table align="center">
<tr>
		<td class="details_screen">Branch</td>
		<td>
		<select name="branch_id">
			{foreach from=$branch item=branch_row}
				<option {if $branch_row.id == $customer.branch_id} selected {/if} value="{$branch_row.id}">{$branch_row.name}</option>
			{/foreach}
		</select>
		</td>
	</tr>

<tr>
		<td class="details_screen">Place of Enrolment</td>
		<td>
		<select name="place_of_registration">
			{foreach from=$branch item=branch_row}
				<option {if $branch_row.id == $customer.place_of_enrolment} selected {/if} value="{$branch_row.id}">{$branch_row.name}</option>
			{/foreach}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Place of Lessons</td>
		<td>
					<select name="place_of_lesson">
			{foreach from=$branch item=branch_row}
				<option {if $branch_row.id == $customer.place_of_lesson} selected {/if} value="{$branch_row.id}">{$branch_row.name}</option>
			{/foreach}
			</select>
		</td>
{*		<td><input type=text name="place_of_lesson" value="{$smarty.post.place_of_lesson}" size=25></td> *}
	</tr>
	<tr>
		<td class="details_screen">Student {$LANG.id}</td>
		<td>{$customer.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Date (TODO: what date - awaiting answer from site)</td>
		<td>
			<select name="date_day">
				{html_options values=$day output=$day selected=$customer_date.day}
			</select>
			<select name="date_month">
				{html_options options=$month selected=$customer_date.month}
			</select>
			<select name="date_year">
				{html_options values=$year output=$year selected=$customer_date.year}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Last name <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td>
			<input type=text name="name" value="{$customer.name}" size=25>
		</td>
		
	</tr>
	<tr>
		<td class="details_screen">First name <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td>
			<input type=text name="first_name" value="{$customer.first_name}" size=25>
		</td>
		
	</tr>
	<tr>
		<td class="details_screen">Middle name</td>
		<td>
			<input type=text name="middle_name" value="{$customer.middle_name}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Birthday (dd/mm/yyyy)</td>
		<td>
		<select name="birthday_day">
			{html_options values=$day output=$day selected=$customer_birthday.day}
		</select>
		<select name="birthday_month">
			{html_options options=$month selected=$customer_birthday.month}
		</select>
		<select name="birthday_year">
			{html_options values=$year output=$year selected=$customer_birthday.year}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Gender</td>
		<td>
		<select name="gender">
			{html_options values=$gender output=$gender selected=$customer.gender}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Age</td>
		<td>
			{$age}
		</td>
	</tr>
	{* <input type=text name=" " value="{$customer. }" size=25> *}
	<tr>
		<td class="details_screen" colspan="2">Passport details:</td>
	</tr>
	<tr>
		<td class="details_screen">&nbsp;&nbsp;&nbsp;Passport number</td>
		<td>
			<input type=text name="passport_number" value="{$customer.passport_number}" size=25>
		</td>
	</tr>
		<tr>
		<td class="details_screen">&nbsp;&nbsp;&nbsp;Passport issued at</td>
		<td>
			<input type=text name="passport_issued_at" value="{$customer.passport_issued_at}" size=25>
		</td>
	</tr>
		<tr>
		<td class="details_screen">&nbsp;&nbsp;&nbsp;Passport issued on (dd/mm/yyyy)</td>
		<td>
		<select name="passport_issued_on_day">
			{html_options values=$day output=$day selected=$customer_passport_issued_on.day}
		</select>
		<select name="passport_issued_on_month">
			{html_options options=$month selected=$customer_passport_issued_on.month}
		</select>
		<select name="passport_issued_on_year">
			{html_options values=$year output=$year selected=$customer_passport_issued_on.year}
		</select>
		</td>
	</tr>
	
	
	<tr>
		<td class="details_screen">{$LANG.street}</td>
		<td>
			<input type=text name="street_address" value="{$customer.street_address}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street2}</td>
		<td>
			<input type=text name="street_address2" value="{$customer.street_address2}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td>
			<input type=text name="city" value="{$customer.city}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td>
			<input type=text name="state" value="{$customer.state}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Post code</td>
		<td>
			<input type=text name="zip_code" value="{$customer.zip_code}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td>
			<input type=text name="country" value="{$customer.country}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td>
			<input type=text name="phone" value="{$customer.phone}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Cell phone</td>
		<td>
			<input type=text name="mobile_phone" value="{$customer.mobile_phone}" size=25>
		</td>	
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td>
			<input type=text name="fax" value="{$customer.fax}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.email}</td>
		<td>
			<input type=text name="email" value="{$customer.email}" size=25>
		</td>
	</tr>
	
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
			{html_options name=enabled options=$enabled selected=$customer.enabled}
		</td>
	</tr>


	</table>
</p>
	</div>
	
	<div id="section-2" class="fragment">
	<p>
	<table align=center>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf1} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>
			<input type=text name="custom_field1" value="{$customer.custom_field1}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf2} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>
			<input type=text name="custom_field2" value="{$customer.custom_field2}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf3} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>
			<input type=text name="custom_field3" value="{$customer.custom_field3}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.customer_cf4} <a
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>
			<input type=text name="custom_field4" value="{$customer.custom_field4}" size=25>
		</td>
	</tr>
	</table>
	</p>
	</div>
	
	
	
	<div id="section-3" class="fragment">
	<p>
	<table align=center>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td>
			<textarea name='notes' rows=8 cols=50>{$customer.notes}</textarea>
		</td>
	</tr>


</table>
</div>
</div>
<br>
<!-- <input type="submit" name="cancel" value="{$LANG.cancel}" /> -->
<input type="submit" name="save_teacher" value="{$LANG.save_customer}" />
<input type="hidden" name="op" value="edit_teacher" />


</form>
{/if}
