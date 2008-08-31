{*
	/*
	* Script: header.tpl
	* 	 Header file for invoice template
	*
	* Last edited:
	* 	 2008-08-31
	*
	* License:
	*	 GPL v3 or above
	*
	* Website:
	*	http://www.simpleinvoices.org
	*/
*}
<hr />
<input type="hidden" name="action" value="insert">
<table align="center">

<tr>
	<td class="details_screen">
		{$LANG.biller_name}
	</td>
	<td input type="text" name="biller_block" size=25>
		{if $billers == null }
	<p><em>{$LANG.no_billers}</em></p>
{else}
	<select name="biller_id">
	{foreach from=$billers item=biller}
		<option {if $biller.id == $defaults.biller} selected {/if} value="{$biller.id}">{$biller.name}</option>
	{/foreach}
	</select>
{/if}

	</td>
</tr>
<tr>
		<td class="details_screen">Branch</td>
		<td>
			<select name="branch_id">
			{foreach from=$branch item=branch_row1}
				{if $auth_role_name == "branch_administrator"}
					{if $branch_row1.id == $auth_user_domain}
						<option selected value="{$branch_row1.id}">{$branch_row1.name}</option>
					{/if}
				{/if}
				{if $auth_role_name != "branch_administrator"}
					<option value="{$branch_row1.id}">{$branch_row1.name}</option>
				{/if}
			{/foreach}
			</select>
		</td>
</tr>
<tr>
	<td class="details_screen">
		Student
	</td>
	<td input type="text" name="customer_block" size=25>
		
{if $customers == null }
	<p><em>{$LANG.no_customers}</em></p>
{else}
	<select name="customer_id">
	{foreach from=$customers item=customer}
		<option {if $customer.id == $defaults.customer} selected {/if} value="{$customer.id}">{$customer.name}, {$customer.first_name} {$customer.middle_name}</option>
	{/foreach}
	</select>
{/if}

	</td>
</tr>
<tr>
        <td class="details_screen">{$LANG.date_formatted}</td>
        <td>
                        <input type="text" class="date-picker" name="date" id="date1" value='{$smarty.now|date_format:"%Y-%m-%d"}'></input>
        </td>
</tr>

