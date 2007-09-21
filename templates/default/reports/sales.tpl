<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{$title}</title>
	<link rel="stylesheet" media="all" type="text/css" href="{$css}" />
	<!--<link rel="stylesheet" media="print" type="text/css" href="{$css_print}" />-->
</head>
<body>

{section name=page start=0 loop=$pages step=1}
<!-- break control -->
{assign var=page value=$smarty.section.page.index}
{assign var=current_page value=`$page+1`}

<div id="container">
<div id="header">
</div>

<table class="biller">
	<tr><td class="address01"><img src="templates/invoices/logos/logo3.png" width="242px" height="45px"></td></tr>
	<tr><td class="address01">Genlu L.L.C</td></tr>
	<tr><td class="address01">Miami - Florida - USA</td></tr>
	<tr><td class="address01">Phone-USA: 786-975-4482</td></tr>
	<tr><td class="address01">Contact: Federico</td></tr>
	<tr><td class="address01">Phone-Vzla: 0414-431-9805</td></tr>
	<tr><td class="address01">Contact: Joseph</td></tr>
	<tr><td class="address01">genludistributors@gmail.com</td></tr>
</table>
<table class="biller_right">
	<tr><td colspan="2" class="header01">{$module_wording}</td></tr>
	<tr><td colspan="2" class="header03"># {$number}</td></tr>
	<tr><td class="address01">Date:</td><td class="data02">{$date}</td></tr>
	<tr><td class="address01">Valid-Thru:</td><td class="data02">{$due_date}</td></tr>
	<tr><td class="address01">Page:</td><td class="data02">{$smarty.section.page.index+1}</td></tr>
	<tr><td class="address01">Currency:</td><td class="data02">{$currency}</td></tr>
</table>
<div class="separator"></div>

{if isset($financial)}

<!-- Financial Report -->
	<table class="invoice_header_center">
		<tr class="black">
			<td class="inv">Invoice #</td>
			<td class="date">Date</td>
			<td class="name">Customer</td>
			<td class="cost">Cost of Sales</td>
			<td class="numeric">Amount</td>
			<td class="numeric">Profit</td>
			<td class="numeric">Profit (%)</td>
		</tr>
	{section name=reportLines start=`$page*$max` loop=`$current_page*$max` step=1}
		{assign var=line value=$smarty.section.reportLines.index}
		{if isset($data.$line.invoice_number)}
		<tr>
			<td class="inv">{$data.$line.invoice_number}</td>
			<td class="date">{$data.$line.date}</td>
			<td class="name">{$data.$line.customer}</td>
			<td class="cost">{$data.$line.cost}</td>
			<td class="numeric">{$data.$line.amount}</td>
			<td class="numeric">{$data.$line.profit}</td>
			<td class="numeric">{$data.$line.profit_percentage}</td>
		</tr>
		{else}
		<tr>
			<td class="inv">&nbsp</td>
			<td class="date"></td>
			<td class="name"></td>
			<td class="cost"></td>
			<td class="numeric"></td>
			<td class="numeric"></td>
			<td class="numeric"></td>
		</tr>	
		{/if}
	{/section}
		{if $smarty.section.page.last}
		<tr class="total">
			<td colspan="3" class="big bold">TOTAL</td>
			<td class="cost">{$totals.totalCost}</td>
			<td class="numeric">{$totals.totalAmount}</td>
			<td class="numeric">{$totals.totalProfit}</td>
			<td class="numeric"></td>
		</tr>
		{else}
		<tr class="total">
			<td colspan="3" class="big bold">TOTAL</td>
			<td class="cost">...</td>
			<td class="numeric">...</td>
			<td class="numeric">...</td>
			<td class="numeric"></td>
		</tr>
		{/if}
	</table>
{else}
<!-- Report Lines -->
	<table class="invoice_header_center">
			<tr class="black">
				<td class="reference">Reference</td>
				<td class="description">Description</td>
				{if $qty}
				<td class="qty">Qty</td>
				{/if}
				<td class="unit_price">Prepaid ($)</td>
				<td class="unit_price">Credit ($)</td>
				<td class="order">Order</td>
			</tr>

		{section name=reportLines start=`$page*$max` loop=`$current_page*$max` step=1}
			{assign var=line value=$smarty.section.reportLines.index}
			{if isset($report_lines.$line.id)}
			<tr>
				<td class="reference">{$report_lines.$line.reference}</td>
				<td class="description">{$report_lines.$line.description}</td>
				{if $qty}
				<td class="qty">{$report_lines.$line.qty_hand}</td>
				{/if}
				<td class="unit_price">{$report_lines.$line.prepaid_price}</td>
				<td class="unit_price">{$report_lines.$line.credit_price}</td>
				<td class="order"></td>
			</tr>
			{else}
			<tr>
				<td class="reference">&nbsp</td>
				<td class="description"></td>
				{if $qty}
				<td class="qty"></td>
				{/if}
				<td class="unit_price"></td>
				<td class="unit_price"></td>
				<td class="order"></td>
			</tr>
			{/if}
		{/section}
	</table>
<!-- end of Report Lines -->
{/if}
<p class="blank_separator"></p>
<p class="separator"></p>
	<table class="summary_table">
		<tr>
			<td class="header">Notes:</td>
		</tr>
		<tr>
			<td class="fill"></td>
		</tr>
	</table>


<div id="footer"></div>

</div>
{/section}
</body>
</html>
