{*
/*
* Script: details.tpl
* 	 Customer details template
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
<b>Students :: <a href="index.php?module=customers&view=details&id={$customer.id}&action=edit">{$LANG.edit}</a>
</b>
<hr></hr>
	
<div id="container-1">
	<ul class="anchors">
		<li><a href="#section-1">General Info</a></li>
		<li><a href="#section-2">Courses</a></li>
		<li><a href="#section-3">Additional Info</a></li>
		<li><a href="#section-4">Custom Fields</a></li>
		<li><a href="#section-5">Ledger</a></li>
		<li><a href="#section-6">Progress</a></li>
		<li><a href="#section-7">Certificates</a></li>
		<li><a href="#section-8">Login details</a></li>
		<li><a href="#section-9">{$LANG.notes}</a></li>
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
		<td class="details_screen">Date</td>
		<td>
			{$customer.date}
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
	<div id="section-2" class="fragment schooltab">
	<p>
	<h3><a href="index.php?module=enrollment&view=add&id={$customer.id}">Enroll student into course</a></h3>
	<table align=center>
	<tr class="sortHeader">
		<th class="sortable">
			Action
		</td>
		<th class="sortable">
			Course branch
		</td>
		<th class="sortable">
			Course name
		</td>
		<th class="sortable">
			Course subject
		</td>
		<th class="sortable">
			Course age
		</td>
		<th class="sortable">
			Course level
		</td>
		<th class="sortable">
			Course type
		</td>
		<th class="sortable">
			Course status
		</td>
		<th class="sortable">
			Date of first lesson
		</td>
		<th class="sortable">
			Start reason
		</td>
		<th class="sortable">
			Dropped
		</td>
		<th class="sortable">
			Dropped reason
		</td>
	</tr>
{foreach from=$course_enrol item=courses}
	<tr class="index_table">
		<td class="details_screen">
			<a href="index.php?module=enrollment&view=details&action=view&id={$courses.enrollment_id}">View</a> 
			:: 
			 <a href="index.php?module=enrollment&view=details&action=edit&id={$courses.enrollment_id}">Edit</a>
		</td>
		<td class="details_screen">
			{$courses.branch_name}
		</td>
		<td class="details_screen">
			<a href="index.php?module=course&view=details&action=view&id={$courses.id}">{$courses.course_name}</a>
		</td>
		<td class="details_screen">
			{$courses.subject_name}
		</td>
		<td class="details_screen">
			{$courses.age}
		</td>
		<td class="details_screen">
			{$courses.level_name}
		</td>
		<td class="details_screen">
			{$courses.type}
		</td>
		<td class="details_screen">
			{$courses.status}
		</td>
		<td class="details_screen">
			{$courses.start_date}
		</td>
		<td class="details_screen">
			{$courses.start_reason}
		</td>
		<td class="details_screen">
			{$courses.dropped_date}
		</td>
		<td class="details_screen">
			{$courses.dropped_reason}
		</td>
	</tr>
{/foreach}
	</table>
<br>
	</p>
	</div>
	<div id="section-3" class="fragment">
<p>
	<table align=center>
	<tr>
		<td class="details_screen" colspan=2>Parent or Guardian </td>
	</tr>
	<tr>
		<td class="details_screen">Relationship</td>
		<td>
			{$guardian1_relationship}
		</td>
	{*
		<td><input type=text name="guardian1_relationship" value="{$smarty.post.guardian1_relationship}" size=25></td>
	*}
	</tr>
	<tr>
		<td class="details_screen">First name</td>
		<td>
			{$customer.guardian1_first_name}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Middle name</td>
		<td>
			{$customer.guardian1_middle_name}
		</td>	
	</tr>
	<tr>
		<td class="details_screen">Last Name</td>
		<td>
			{$customer.guardian1_last_name}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Home phone</td>
		<td>
			{$customer.guardian1_home_phone}
		</td>	</tr>
	<tr>
		<td class="details_screen">Cell phone</td>
		<td>
			{$customer.guardian1_cell_phone}
		</td>	
	</tr>
	<tr>
		<td class="details_screen">Email</td>
			<td>
			{$customer.guardian1_email}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport number</td>
		<td>
			{$customer.guardian1_passport_number}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued at</td>
		<td>
			{$customer.guardian1_passport_issued_at}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued on</td>
		<td>
			{$customer_guardian1_passport_issued_on.day }/{$customer_guardian1_passport_issued_on.month}/{$customer_guardian1_passport_issued_on.year}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Home address</td>
			<td>
			{$customer.guardian1_address}
		</td>
	</tr>

	<tr>
		<td class="details_screen" colspan=2>Parent or Guardian 2</td>
	</tr>
	<tr>
		<td class="details_screen">Relationship</td>
		<td>
			{$guardian2_relationship}
		</td>
	{*
		<td><input type=text name="guardian1_relationship" value="{$smarty.post.guardian1_relationship}" size=25></td>
	*}
	</tr>
	<tr>
		<td class="details_screen">First name</td>
		<td>
			{$customer.guardian2_first_name}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Middle name</td>
		<td>
			{$customer.guardian2_middle_name}
		</td>	
	</tr>
	<tr>
		<td class="details_screen">Last Name</td>
		<td>
			{$customer.guardian2_last_name}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Home phone</td>
		<td>
			{$customer.guardian2_home_phone}
		</td>	</tr>
	<tr>
		<td class="details_screen">Cell phone</td>
		<td>
			{$customer.guardian2_cell_phone}
		</td>	
	</tr>
	<tr>
		<td class="details_screen">Email</td>
			<td>
			{$customer.guardian2_email}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport number</td>
		<td>
			{$customer.guardian2_passport_number}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued at</td>
		<td>
			{$customer.guardian2_passport_issued_at}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued on</td>
		<td>
			{$customer_guardian2_passport_issued_on.day }/{$customer_guardian2_passport_issued_on.month}/{$customer_guardian2_passport_issued_on.year}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Home address</td>
		<td>
			{$customer.guardian2_address}
		</td>
	</tr>

	
	</table>
	</p>
	</div>
	<div id="section-4" class="fragment">
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
	
	
	<div id="section-5" class="fragment">
		<h4><u>Ledger</u></h4>
		<p >
		<table align="center">
		<tr>
			<td  colspan="6" class="details_screen">
				Summary of accounts:
			</td>
		</tr>
		<tr>
			<td class="details_screen">Total charges</td>
			<td style="text-align:right">{$stuff.total|number_format:2}</td>
			<td class="details_screen">Total payments</td>
			<td style="text-align:right">{$stuff.paid|number_format:2}</td>
			<td class="details_screen">Balace</td>
			<td style="text-align:right"><u>{$stuff.owing|number_format:2}</u></td>
		</tr>
		</table><br>
		<table width="100%" align="center">
			<tr class="sortHeader">

				<th class="sortable">{$LANG.id}</th>
				<th class="sortable">{$LANG.total}</th>
				<th class="sortable">{$LANG.paid}</th>
				<th class="sortable">{$LANG.owing}</th>
				<th class="sortable">{$LANG.date_created}</th>

			</tr>
		
			{foreach from=$invoices item=invoice}
	
			<tr class="index_table">
				<td class="details_screen"><a href="index.php?module=invoices&view=quick_view&invoice={$invoice.id}">{$invoice.id}</a></td>
				<td class="details_screen">{$invoice.total|number_format:2}</td>
				<td class="details_screen">{$invoice.paid|number_format:2}</td>
				<td class="details_screen">{$invoice.owing|number_format:2}</td>
				<td class="details_screen">{$invoice.date}</td>
			</tr>

			{/foreach}
		</table>	
		</p>
	</div>
	
	<div id="section-6" class="fragment">
		<p>
		<table align=center>
			<a href="index.php?module=progress&view=manage">Manage Progress</a> :: <a href="index.php?module=progress&view=add">Add Progress</a>
			<br>
			<br>
			<table width="100%">
			<tr class="sortHeader">
				<th class="noFilter sortable">{$LANG.actions}</th>
				<th class="index_table sortable">ID</th>
				<th class="index_table sortable">Date</th>
				<th class="index_table sortable">Student</th>
				<th class="index_table sortable">Test</th>
				<th class="index_table sortable">Course</th>
				<th class="index_table sortable">Total</th>
			</tr>
			{foreach from=$progress item=progress_row}
				<tr class="index_table">
				<td class="index_table">
				<a class="index_table"
				 href="index.php?module=progress&view=details&id={$progress_row.pgid}&action=view">{$LANG.view}</a>
				<td class="index_table">{$progress_row.pgid}</td>
				<td class="index_table">{$progress_row.date}</td>
				<td class="index_table">{$progress_row.last_name}, {$progress_row.first_name} {$progress_row.middle_name} </td>
				<td class="index_table">{$progress_row.test}</td>
				<td class="index_table">{$progress_row.course}</td>
				<td class="index_table">{$progress_row.total}</td>
				</tr>

			{/foreach}

				</table>
					</table>
					<p>
				</div>

				<div id="section-7" class="fragment">
					<p>
					<table  align=center>
					<a href="index.php?module=certificate&view=manage">Manage Certificate</a> :: <a href="index.php?module=certificate&view=add">Add Progress</a>
					<br>
					<br>		
			<table align="center"  width="100%" class="ricoLiveGrid" id="rico_product">
			<colgroup>
				<col style='width:10%;' />
				<col style='width:10%;' />
				<col style='width:20%;' />
				<col style='width:30%;' />
				<col style='width:10%;' />
				<col style='width:20%;' />
			</colgroup>
			<thead>
			<tr class="sortHeader">
				<th class="noFilter sortable">{$LANG.actions}</th>
				<th class="index_table sortable">ID</th>
				<th class="index_table sortable">Branch</th>
				<th class="index_table sortable">Student</th>
				<th class="index_table sortable">Date</th>
				<th class="index_table sortable">Course</th>
			</tr>
			</thead>


			{foreach from=$certificate item=cert}
				<tr class="index_table">
				<td class="index_table">
				<a class="index_table"
				 href="index.php?module=certificate&view=details&id={$cert.id}&action=view">{$LANG.view}</a> ::
				<a class="index_table"
				 href="index.php?module=certificate&view=details&id={$cert.id}&action=edit">{$LANG.edit}</a> </td>
				<td class="index_table">{$cert.id}</td>
				<td class="index_table">{$cert.branch}</td>
				<td class="index_table">{$cert.name}, {$cert.first_name}</td>
				<td class="index_table">{$cert.date}</td>
				<td class="index_table">{$cert.course}</td>
				</tr>

			{/foreach}

				</table>
		</table>
		<p>
	</div>
	<div id="section-8" class="fragment">
		<p>
		<table align=center>
		<tr>
			<td class="details_screen">User name</td>
			<td>
				{$customer.username}
			</td>
		</tr>
		<tr>
			<td class="details_screen">Password</td>
			<td>
				<i>The password is not displayed</i>
			</td>
		</tr>

		{*
			{showCustomFields categorieId="2"}
		*}
		</table>
		<p>
	</div>
	<div id="section-9" class="fragment">
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
<a href="index.php?module=customers&view=details&id={$customer.id}&action=edit">{$LANG.edit}</a>
{/if}

{if $smarty.get.action == 'edit' }

<form name="frmpost"
	action="index.php?module=customers&view=save&id={$customer.id}"
	method="post">

<div id="top"><b>Edit Student</b></div>
<hr></hr>
<div id="container-1">
	<ul class="anchors">
		<li><a href="#section-1">General Info</a></li>
		<li><a href="#section-2">Additional Info</a></li>
		<li><a href="#section-3">Courses</a></li>
		<li><a href="#section-4">Custom Fields</a></li>
		<li><a href="#section-5">Ledger</a></li>
		<li><a href="#section-6">Progress</a></li>
		<li><a href="#section-7">Certificates</a></li>
		<li><a href="#section-8">Login details</a></li>
		<li><a href="#section-9">{$LANG.notes}</a></li>
	</ul>
	<div id="section-1" class="fragment">
<p>
<table align="center">

<tr>
		<td class="details_screen">Branch</td>
		<td>
		{if $auth_role_name == "branch_administrator"}
			{$branch_id}
		{/if}		
		{if $auth_role_name != "branch_administrator"}
			<select name="branch_id">
				{foreach from=$branch item=branch_row1}
					<option {if $branch_row1.id == $customer.branch_id} selected {/if} value="{$branch_row1.id}">{$branch_row1.name}</option>
				{/foreach}
			</select>
		{/if}
		</td>
	</tr>

<tr>
		<td class="details_screen">Place of Enrolment</td>
		<td>
		{if $auth_role_name == "branch_administrator"}
			{$place_of_enrolment}
		{/if}		
		{if $auth_role_name != "branch_administrator"}
		<select name="place_of_registration">
			{foreach from=$branch item=branch_row2}
				<option {if $branch_row2.id == $customer.place_of_registration} selected {/if} value="{$branch_row2.id}">{$branch_row2.name}</option>
			{/foreach}
		</select>
		{/if}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Place of Lessons</td>
		<td>
		{if $auth_role_name == "branch_administrator"}
			{$place_of_lesson}
		{/if}		
		{if $auth_role_name != "branch_administrator"}
					<select name="place_of_lesson">
			{foreach from=$branch item=branch_row3}
				<option {if $branch_row3.id == $customer.place_of_lesson} selected {/if} value="{$branch_row3.id}">{$branch_row3.name}</option>
			{/foreach}
			</select>
		{/if}
		</td>

	</tr>
	<tr>
		<td class="details_screen">Student {$LANG.id}</td>
		<td>{$customer.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Date</td>
		<td>
		{if $auth_role_name == "branch_administrator"}
			{$customer.date}
		{/if}		
		{if $auth_role_name != "branch_administrator"}
				<select name="date_day">
				{html_options values=$day output=$day selected=$customer_date.day}
			</select>
			<select name="date_month">
				{html_options options=$month  selected=$customer_date.month}  
			</select>
			<select name="date_year">
				{html_options values=$year output=$year selected=$customer_date.year}
			</select>
		{/if}
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
		<td class="details_screen" colspan=2>Parent or Guardian </td>
	</tr>
	<tr>
		<td class="details_screen">Relationship</td>
		<td>
			<select name="guardian1_relationship">
			{foreach from=$relation item=relation_row}
				<option {if $relation_row.id == $customer.guardian1_relationship} selected {/if} value="{$relation_row.id}">{$relation_row.relation}</option>
			{/foreach}
			</select>
		</td>
	{*
		<td><input type=text name="guardian1_relationship" value="{$smarty.post.guardian1_relationship}" size=25></td>
	*}
	</tr>
	<tr>
		<td class="details_screen">First name</td>
		<td>
			<input type=text name="guardian1_first_name" value="{$customer.guardian1_first_name}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Middle name</td>
		<td>
			<input type=text name="guardian1_middle_name" value="{$customer.guardian1_middle_name}" size=25>
		</td>	
	</tr>
	<tr>
		<td class="details_screen">Last Name</td>
		<td>
			<input type=text name="guardian1_last_name" value="{$customer.guardian1_last_name}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Home phone</td>
		<td>
			<input type=text name="guardian1_home_phone" value="{$customer.guardian1_home_phone}" size=25>
		</td>	</tr>
	<tr>
		<td class="details_screen">Cell phone</td>
		<td>
			<input type=text name="guardian1_cell_phone" value="{$customer.guardian1_cell_phone}" size=25>
		</td>	
	</tr>
	<tr>
		<td class="details_screen">Email</td>
			<td>
			<input type=text name="guardian1_email" value="{$customer.guardian1_email}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport number</td>
		<td>
			<input type=text name="guardian1_passport_number" value="{$customer.guardian1_passport_number}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued at</td>
		<td>
			<input type=text name="guardian1_passport_issued_at" value="{$customer.guardian1_passport_issued_at}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued on</td>
		<td>
		<select name="guardian1_passport_issued_on_day">
			{html_options values=$day output=$day selected=$customer_guardian1_passport_issued_on.day}
		</select>
		<select name="guardian1_passport_issued_on_month">
			{html_options options=$month selected=$customer_birthday.month}
		</select>
		<select name="guardian1_passport_issued_on_year">
			{html_options values=$year output=$year selected=$customer_guardian1_passport_issued_on.year}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Home address</td>
			<td>
			<input type=text name="guardian1_address" value="{$customer.guardian1_address}" size=25>
		</td>
	</tr>

	<tr>
		<td class="details_screen" colspan=2>Parent or Guardian 2</td>
	</tr>
	<tr>
		<td class="details_screen">Relationship</td>
		<td>
			<select name="guardian2_relationship">
			{foreach from=$relation item=relation_row}
				<option {if $relation_row.id == $customer.guardian2_relationship} selected {/if} value="{$relation_row.id}">{$relation_row.relation}</option>
			{/foreach}
			</select>
		</td>
	{*
		<td><input type=text name="guardian2_relationship" value="{$smarty.post.guardian2_relationship}" size=25></td>
	*}
	</tr>
	<tr>
		<td class="details_screen">First name</td>
		<td>
			<input type=text name="guardian2_first_name" value="{$customer.guardian2_first_name}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Middle name</td>
		<td>
			<input type=text name="guardian2_middle_name" value="{$customer.guardian2_middle_name}" size=25>
		</td>	
	</tr>
	<tr>
		<td class="details_screen">Last Name</td>
		<td>
			<input type=text name="guardian2_last_name" value="{$customer.guardian2_last_name}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Home phone</td>
		<td>
			<input type=text name="guardian2_home_phone" value="{$customer.guardian2_home_phone}" size=25>
		</td>	</tr>
	<tr>
		<td class="details_screen">Cell phone</td>
		<td>
			<input type=text name="guardian2_cell_phone" value="{$customer.guardian2_cell_phone}" size=25>
		</td>	
	</tr>
	<tr>
		<td class="details_screen">Email</td>
			<td>
			<input type=text name="guardian2_email" value="{$customer.guardian2_email}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport number</td>
		<td>
			<input type=text name="guardian2_passport_number" value="{$customer.guardian2_passport_number}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued at</td>
		<td>
			<input type=text name="guardian2_passport_issued_at" value="{$customer.guardian2_passport_issued_at}" size=25>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Passport issued on</td>
		<td>
		<select name="guardian2_passport_issued_on_day">
			{html_options values=$day output=$day selected=$customer_guardian2_passport_issued_on.day}
		</select>
		<select name="guardian2_passport_issued_on_month">
			{html_options options=$month selected=$customer_guardian2_passport_issued_on.month}
		</select>
		<select name="guardian2_passport_issued_on_year">
			{html_options values=$year output=$year selected=$customer_guardian2_passport_issued_on.year}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Home address</td>
			<td>
			<input type=text name="guardian2_address" value="{$customer.guardian2_address}" size=25>
		</td>
	</tr>

	
	</table>
	</p>
	</div>
	<div id="section-3" class="fragment schooltab">
	<p>
	<h3><a href="index.php?module=enrollment&view=add&id={$customer.id}">Enroll student into course</a></h3>
	<table align=center>
	<tr class="sortHeader">
		<th class="sortable">
			Action
		</td>
		<th class="sortable">
			Course branch
		</td>
		<th class="sortable">
			Course name
		</td>
		<th class="sortable">
			Course subject
		</td>
		<th class="sortable">
			Course age
		</td>
		<th class="sortable">
			Course level
		</td>
		<th class="sortable">
			Course type
		</td>
		<th class="sortable">
			Course status
		</td>
		<th class="sortable">
			Date of first lesson
		</td>
		<th class="sortable">
			Start reason
		</td>
		<th class="sortable">
			Dropped
		</td>
		<th class="sortable">
			Dropped reason
		</td>
	</tr>
{foreach from=$course_enrol item=courses}
	<tr class="index_table">
		<td class="details_screen">
			<a href="index.php?module=enrollment&view=details&action=view&id={$courses.enrollment_id}">View</a> 
			:: 
			 <a href="index.php?module=enrollment&view=details&action=edit&id={$courses.enrollment_id}">Edit</a>
		</td>
		<td class="details_screen">
			{$courses.branch_name}
		</td>
		<td class="details_screen">
			<a href="index.php?module=course&view=details&action=view&id={$courses.id}">{$courses.course_name}</a>
		</td>
		<td class="details_screen">
			{$courses.subject_name}
		</td>
		<td class="details_screen">
			{$courses.age}
		</td>
		<td class="details_screen">
			{$courses.level_name}
		</td>
		<td class="details_screen">
			{$courses.type}
		</td>
		<td class="details_screen">
			{$courses.status}
		</td>
		<td class="details_screen">
			{$courses.start_date}
		</td>
		<td class="details_screen">
			{$courses.start_reason}
		</td>
		<td class="details_screen">
			{$courses.dropped_date}
		</td>
		<td class="details_screen">
			{$courses.dropped_reason}
		</td>
	</tr>
{/foreach}
	</table>
<br>
	</p>
	</div>
	<div id="section-4" class="fragment">
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
	
	
	<div id="section-5" class="fragment">
		<h4><u>Ledger</u></h4>
		<p >
		<table align="center">
		<tr>
			<td  colspan="6" class="details_screen">
				Summary of accounts:
			</td>
		</tr>
		<tr>
			<td class="details_screen">Total charges</td>
			<td style="text-align:right">{$stuff.total|number_format:2}</td>
			<td class="details_screen">Total payments</td>
			<td style="text-align:right">{$stuff.paid|number_format:2}</td>
			<td class="details_screen">Balace</td>
			<td style="text-align:right"><u>{$stuff.owing|number_format:2}</u></td>
		</tr>
		</table><br>
		<table width="100%" align="center">
			<tr class="sortHeader">

				<th class="sortable">{$LANG.id}</th>
				<th class="sortable">{$LANG.total}</th>
				<th class="sortable">{$LANG.paid}</th>
				<th class="sortable">{$LANG.owing}</th>
				<th class="sortable">{$LANG.date_created}</th>

			</tr>
		
			{foreach from=$invoices item=invoice}
	
			<tr class="index_table">
				<td class="details_screen"><a href="index.php?module=invoices&view=quick_view&invoice={$invoice.id}">{$invoice.id}</a></td>
				<td class="details_screen">{$invoice.total|number_format:2}</td>
				<td class="details_screen">{$invoice.paid|number_format:2}</td>
				<td class="details_screen">{$invoice.owing|number_format:2}</td>
				<td class="details_screen">{$invoice.date}</td>
			</tr>

			{/foreach}
		</table>	
		</p>
	</div>
	
	<div id="section-6" class="fragment">
	<p>
	<table align=center>
<a href="index.php?module=progress&view=manage">Manage Progress</a> :: <a href="index.php?module=progress&view=add">Add Progress</a>
<br>
<br>
<table width="100%">
<tr class="sortHeader">
	<th class="noFilter sortable">{$LANG.actions}</th>
	<th class="index_table sortable">ID</th>
	<th class="index_table sortable">Date</th>
	<th class="index_table sortable">Student</th>
	<th class="index_table sortable">Test</th>
	<th class="index_table sortable">Course</th>
	<th class="index_table sortable">Total</th>
</tr>
{foreach from=$progress item=progress_row}
	<tr class="index_table">
	<td class="index_table">
	<a class="index_table"
	 href="index.php?module=progress&view=details&id={$progress_row.pgid}&action=view">{$LANG.view}</a>
	 :: <a href="index.php?module=progress&view=details&id={$progress_row.pgid}&action=edit">{$LANG.edit}</a>
	<td class="index_table">{$progress_row.pgid}</td>
	<td class="index_table">{$progress_row.date}</td>
	<td class="index_table">{$progress_row.last_name}, {$progress_row.first_name} {$progress_row.middle_name} </td>
	<td class="index_table">{$progress_row.test}</td>
	<td class="index_table">{$progress_row.course}</td>
	<td class="index_table">{$progress_row.total}</td>
	</tr>

{/foreach}

	</table>
	</table>
	</p>
	</div>
	<div id="section-7" class="fragment">
					<p>
					<table  align=center>
					<a href="index.php?module=certificate&view=manage">Manage Certificate</a> :: <a href="index.php?module=certificate&view=add">Add Progress</a>
					<br>
					<br>		
			<table align="center"  width="100%" class="ricoLiveGrid" id="rico_product">
			<colgroup>
				<col style='width:10%;' />
				<col style='width:10%;' />
				<col style='width:20%;' />
				<col style='width:30%;' />
				<col style='width:10%;' />
				<col style='width:20%;' />
			</colgroup>
			<thead>
			<tr class="sortHeader">
				<th class="noFilter sortable">{$LANG.actions}</th>
				<th class="index_table sortable">ID</th>
				<th class="index_table sortable">Branch</th>
				<th class="index_table sortable">Student</th>
				<th class="index_table sortable">Date</th>
				<th class="index_table sortable">Course</th>
			</tr>
			</thead>


			{foreach from=$certificate item=cert}
				<tr class="index_table">
				<td class="index_table">
				<a class="index_table"
				 href="index.php?module=certificate&view=details&id={$cert.id}&action=view">{$LANG.view}</a> ::
				<a class="index_table"
				 href="index.php?module=certificate&view=details&id={$cert.id}&action=edit">{$LANG.edit}</a> </td>
				<td class="index_table">{$cert.id}</td>
				<td class="index_table">{$cert.branch}</td>
				<td class="index_table">{$cert.name}, {$cert.first_name}</td>
				<td class="index_table">{$cert.date}</td>
				<td class="index_table">{$cert.course}</td>
				</tr>

			{/foreach}

				</table>
		</table>
		</p>
	</div>
	<div id="section-8" class="fragment">
	<p>
	<table align=center>
		<tr>
	<tr>
		<td class="details_screen">User name </td>
		<td><input type=text name="username" value="{$customer.username}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">Password </a></td>
		<td><input type=password name="password_field" size=25></td>
	</tr>
	</table>
	</p>
	</div>
	<div id="section-9" class="fragment">
	<p>
	<table align=center>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td>
			<textarea name='notes' rows=8 cols=50>{$customer.notes}</textarea>
		</td>
	</tr>
	</table>
	</p>
	</div>
</div>
<br>
<!-- <input type="submit" name="cancel" value="{$LANG.cancel}" /> -->
<input type="submit" name="save_customer" value="{$LANG.save_customer}" />
<input type="hidden" name="op" value="edit_customer" />


</form>
{/if}
