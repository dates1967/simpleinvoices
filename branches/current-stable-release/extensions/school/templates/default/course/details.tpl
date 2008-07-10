<form name="frmpost"
	action="index.php?module=course&view=save&id={$smarty.get.id}"
	method="post">


{if $smarty.get.action== 'view' }

	<b>Course ::
	<a href="index.php?module=course&view=details&id={$course.id}&action=edit">{$LANG.edit}</a></b>
	
 	<hr></hr>

	
	<div id="container-1">
	<ul class="anchors">
		<li><a href="#section-1">Course General Info</a></li>
		<li><a href="#section-2">Course Additional Info</a></li>
		<li><a href="#section-3">Custom Fields</a></li>
	</ul>
	<div id="section-1" class="fragment">
<p>
<table align=center>
	<tr>
		<td class="details_screen">Course ID</td>
		<td>{$course.id}</td>
	</tr>
	<tr>
		<td class="details_screen">Course name</td>
		<td>{$course.description}</td>
	</tr>
	<tr>
		<td class="details_screen">Price</td>
		<td>{$course.unit_price}</td>
	</tr>
	<tr>
		<td class="details_screen">Place of enrolment</td>
		<td>
			{$branch_selected.0.name}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Subject</td>
		<td>
			{$subject_selected.0.name}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Age</td>
		<td>
			{$course.age}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Level</td>
		<td>
			{$level_select.0.name}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Type</td>
		<td>
			{$course.type}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Status</td>
		<td>
			{$course.status}
		</td>
	</tr>

	<tr>
		<td class="details_screen">Intensity</td>
		<td>
			{$course.intensity}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Course start date</td>
		<td>
			{$course.start_date}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Course time (part of day)</td>
		<td>
			{$course.part_of_day}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Start time</td>
		<td>
			{$course.start_time}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Duration</td>
		<td>
			{$course.duration} {$course.duration_type}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Area</td>
		<td>
			{$course.area}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Rooms</td>
		<td>{$course.rooms}</td>
	</tr>
	<tr>
		<td class="details_screen">Teacher</td>
		<td>
			{$teacher_selected.0.name}, {$teacher_selected.0.first_name} {$teacher_selected.0.middle_name}</option>
		</td>
	</tr>

	<tr>
		<td class="details_screen">End</td>
		<td>
			{$course.end_date}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Repeat type</td>
		<td>
			{$course.repeat_type}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Repeat day (for n-weekly)</td>
		<td>
			{$course.repeat_day}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Number of weeks</td>
		<td>
			{$course.number_of_weeks}
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
			{$course.book}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Teaching hours</td>
		<td>
			{$course.teaching_hours}
		</td>
	</tr>



</table>
	</p>
	</div>
	<div id="section-3" class="fragment">
	<p>
	<table align=center>
	<tr>
		<td class="details_screen">{$customFieldLabel.product_cf1} <a
			tabindex="-1"
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>{$course.custom_field1}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.product_cf2} <a 
			tabindex="-1"
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>{$course.custom_field2}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.product_cf3} <a
			tabindex="-1"
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>{$course.custom_field3}</td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.product_cf4} <a
			tabindex="-1"
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td>{$course.custom_field4}</td>
	</tr>
	<tr>
		<td class="details_screen">Enabled</td>
		<td>
			{$course.wording_for_enabled}
		</td>
	</tr>

	</table>
	</p>
	</div>
 </div>

<hr></hr>
<a href="index.php?module=course&view=details&id={$course.id}&action=edit">{$LANG.edit}</a>
{/if}


{if $smarty.get.action== 'edit' }

	<b>Edit Course</b>
	<hr></hr>

<div id="container-1">
	<ul class="anchors">
		<li><a href="#section-1">Course General Info</a></li>
		<li><a href="#section-2">Course Additional Info</a></li>
		<li><a href="#section-3">Custom Fields</a></li>
	</ul>
	<div id="section-1" class="fragment">
<p>
<table align=center>
	<tr>
		<td class="details_screen">Course name <a href="docs.php?t=help&p=required_field" rel="gb_page_center[350, 150]"><img src="./images/common/required-small.png"></img></a></td>
		<td><input type=text name="description" value="{$course.description}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">Price</td>
		<td><input type=text name="unit_price" value="{$course.unit_price}" size=10></td>
	</tr>
	<tr>
		<td class="details_screen">Place of enrolment</td>
		<td>
			<select name="branch_id">
			{foreach from=$branch item=branch_row}
				<option {if $branch_row.id == $branch_selected.0.id} selected {/if} value="{$branch_row.id}">{$branch_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Subject</td>
		<td>
			<select name="subject_id">
			{foreach from=$subject item=subject_row}
				<option {if $subject_row.id == $subject_selected.0.id} selected {/if} value="{$subject_row.id}">{$subject_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Age</td>
		<td>
				{html_options values=$age output=$age name=age selected=$course.age}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Level</td>
		<td>
			<select name="level_id">
			{foreach from=$level item=level_row}
				<option {if $level_row.id == $course.level_id} selected {/if} value="{$level_row.id}">{$level_row.name}</option>
			{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Type</td>
		<td>
				{html_options name=type values=$type output=$type selected=$course.type}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Status</td>
		<td>
				{html_options name=status values=$status output=$status selected=$course.status}
		</td>
	</tr>

	<tr>
		<td class="details_screen">Intensity</td>
		<td>
				{html_options values=$intensity output=$intensity selected=$course.intensity name=intensity}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Course start date</td>
		<td>
		<select name="start_day">
			{html_options values=$day output=$day selected=$day_selected}
		</select>
		<select name="start_month">
			{html_options options=$month selected=$month_selected}
		</select>
		<select name="start_year">
			{html_options values=$year output=$year selected=$year_selected}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Course time (part of day)</td>
		<td>
				{html_options values=$part_of_day output=$part_of_day selected=$course.part_of_day name="part_of_day"}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Start time</td>
		<td>
			<input type=text name="start_time" value="{$course.start_time}" size=5>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Duration</td>
		<td>
		<input type=text name="duration" value="{$course.duration}" size=5>
				{html_options values=$duration_type output=$duration_type selected=$course.duration_type name="duration_type"}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Area</td>
		<td><input type=text name="area" value="{$course.area}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">Rooms</td>
		<td><input type=text name="rooms" value="{$course.rooms}" size=50></td>
	</tr>
	<tr>
		<td class="details_screen">Teacher</td>
		<td>
			<select name="teacher_id">
			{foreach from=$teacher item=teacher_row}
				<option {if $teacher_row.id == $course.teacher_id} selected {/if} value="{$teacher_row.id}">{$teacher_row.name}, {$teacher_row.first_name} {$teacher_row.middle_name}</option>
			{/foreach}
			</select>
		</td>
	</tr>

	<tr>
		<td class="details_screen">End</td>
		<td>
		<select name="end_day">
			{html_options values=$day output=$day selected=$end_day_selected}
		</select>
		<select name="end_month">
			{html_options options=$month selected=$end_month_selected}
		</select>
		<select name="end_year">
			{html_options values=$year output=$year selected=$end_year_selected}
		</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Repeat type</td>
		<td>
				{html_options values=$repeat_type output=$repeat_type name="repeat_type" selected=$course.repeat_type}
		</td>
	</tr>
	<tr>
		<td class="details_screen">Repeat day (for n-weekly)</td>
		<td>
				{html_options values=$repeat_day output=$repeat_day name="repeat_day" selected=$course.repeat_day}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Number of weeks</td>
		<td>
			<input type=text name="number_of_weeks" value="{$course.number_of_weeks}" size=5>
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
			<input type=text name="book" value="{$course.book}" size=50>
		</td>
	</tr>
	<tr>
		<td class="details_screen">Teaching hours</td>
		<td>
			<input type=text name="teaching_hours" value="{$course.teaching_hours}" size=5>
		</td>
	</tr>



</table>
	</p>
	</div>
	<div id="section-3" class="fragment">
	<p>
	<table align=center>
	<tr>
		<td class="details_screen">{$customFieldLabel.product_cf1} <a
			tabindex="-1"
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field1" value="{$course.custom_field1}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.product_cf2} <a 
			tabindex="-1"
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field2" value="{$course.custom_field2}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.product_cf3} <a
			tabindex="-1"
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field3" value="{$course.custom_field3}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$customFieldLabel.product_cf4} <a
			tabindex="-1"
			href="docs.php?t=help&p=custom_fields"
			rel="gb_page_center[450, 450]"><img
			src="./images/common/help-small.png"></img></a></td>
		<td><input type=text name="custom_field4" value="{$course.custom_field4}" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">Is Course</td>
		<td><input type=text name="iscourse" readonly value="1" size=25></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
		{html_options name=enabled options=$enabled selected=$course.enabled}
		</td>
	</tr>
	</table>
	</p>
	</div>
 </div>
{/if} 
{if $smarty.get.action== 'edit' }
	<hr></hr>
		<input type="submit" name="cancel" value="{$LANG.cancel}" /> 
		<input type="submit" name="save_course" value="Save Course" /> 
		<input type="hidden" name="op" value="edit_course" /> 
	{/if}
</form>
