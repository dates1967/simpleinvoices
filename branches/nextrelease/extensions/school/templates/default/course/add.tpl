
{* if bill is updated or saved.*}

{if $smarty.post.description != "" && $smarty.post.id != null } 
	{include file="../templates/default/products/save.tpl"}
{else}
{* if  name was inserted *} 
	{if $smarty.post.id !=null} 
		<div class="validation_alert"><img src="./images/common/important.png"</img>
		You must enter a description for the product</div>
		<hr />
	{/if}
<form name="frmpost" ACTION="index.php?module=course&view=add" METHOD="POST">

<div id="top"><h3>&nbsp;Course to add &nbsp;</h3></div>
 <hr />
<div id="container-1">
	<ul class="anchors">
		<li><a href="#section-1">Course General Info</a></li>
		<li><a href="#section-2">Course Additional Info</a></li>
	</ul>
	<div id="section-1" class="fragment">
<p>
<table align=center>
	<tr>
		<td class="details_screen">{$LANG.product_description} <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td><input type=text name="description" value="{$smarty.post.description}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">Place of Enrolment</td>
		<td>
			<select name="place_of_enrolment">
			{foreach from=$branch item=branch_row}
				<option {if $branch_row.id == "1"} selected {/if} value="{$branch_row.id}">{$branch_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Subject</td>
		<td>
			<select name="subject">
				<option  selected value=""></option>
			{foreach from=$subject item=subject_row}
				<option value="{$subject_row.id}">{$subject_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Age</td>
		<td>
			<select name="age">
				<option  selected value=""></option>
				{html_options values=$age output=$age}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Level</td>
		<td>
			<select name="level">
				<option  selected value=""></option>
			{foreach from=$level item=level_row}
				<option value="{$level_row.id}">{$level_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Type</td>
		<td>
			<select name="type">
				<option  selected value=""></option>
				{html_options values=$type output=$type}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Status</td>
		<td>
			<select name="status">
				<option  selected value=""></option>
				{html_options values=$status output=$status}
			</select>
		</td>
	</tr>

	<tr>
		<td class="details_screen">Intensity</td>
		<td>
			<select name="intensity">
				<option  selected value=""></option>
				{html_options values=$intensity output=$intensity}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Course start date</td>
		<td>
		<select name="start_day">
			{html_options values=$day output=$day}
		</select>
		<select name="start_month">
			{html_options options=$month}
		</select>
		<select name="start_year">
			{html_options values=$year output=$year selected=$year_now}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Course time (part of day)</td>
		<td>
			<select name="part_of_day">
				<option  selected value=""></option>
				{html_options values=$part_of_day output=$part_of_day}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Start time</td>
		<td>
			<input type=text name="start_time" value="{$smarty.post.start_time}" size=5>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Duration</td>
		<td>
		<input type=text name="duration" value="{$smarty.post.duration}" size=5>
			<select name="duration_type">
				<option  selected value=""></option>
				{html_options values=$duration_type output=$duration_type}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Area</td>
		<td><input type=text name="area" value="{$smarty.post.area}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">Rooms</td>
		<td><input type=text name="rooms" value="{$smarty.post.rooms}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">Teacher</td>
		<td>
			<select name="teacher">
				<option  selected value=""></option>
			{foreach from=$teacher item=teacher_row}
				<option value="{$teacher_row.id}">{$teacher_row.last_name}, {$teacher_row.first_name}</option>
			{/foreach}
			</select>
		</td>
	</tr>

	<tr>
		<td class="details_screen">End</td>
		<td>
		<select name="end_day">
			{html_options values=$day output=$day}
		</select>
		<select name="end_month">
			{html_options options=$month}
		</select>
		<select name="end_year">
			{html_options values=$year output=$year selected=$year_now}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Repeat type</td>
		<td>
			<select name="repeat_type">
				{html_options values=$repeat_type output=$repeat_type}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Repeat day (for n-weekly)</td>
		<td>
			<select name="repeat_day">
				<option  selected value=""></option>
				{html_options values=$repeat_day output=$repeat_day}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Number of weeks</td>
		<td>
			<input type=text name="number_of_weeks" value="{$smarty.post.number_of_weeks}" size=5>
		</td>
	</tr>

	</table>
	
	</p>
		</div>
		<div id="section-2" class="fragment">
	<p>
	<table align=center>
	<tr>
		<td class="details_screen">Course book</td>
		<td>
			<input type=text name="course_book" value="{$smarty.post.course_book}" size=50>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Teaching hours</td>
		<td>
			<input type=text name="teaching_hours" value="{$smarty.post.teaching_hours}" size=5>
		</td>
	</tr>



</table>
<!-- </div> -->
<hr />
<div style="text-align:center;">
	<input type="submit" name="id" value="{$LANG.insert_product}">
	<input type="hidden" name="op" value="insert_product">
</div>
</form>
	{/if}
