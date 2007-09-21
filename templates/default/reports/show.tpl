<div id="container">
<div id="header">
</div>
<h2>{$module_wording}</h2>
<p class="separator"></p>
{include file="`$template_dir`/reports/action_bar.tpl"}
<!--	<table width="100%" align="center" class="table_header">
		<tr>
			<td style="vertical-align: top">
				<table>
					<tr><td colspan="2" class="address01"><img src="templates/invoices/logos/logo2.png"></td></tr>
					<tr><td colspan="2" class="address01">Genlu L.L.C</td></tr>
					<tr><td colspan="2" class="address01">Miami - Florida - USA</td></tr>
					<tr><td class="address01">Phone-USA:</td><td class="address02">786-975-4482</td></tr>
					<tr><td class="address01">Contact:</td><td class="address02">Federico</td></tr>
					<tr><td class="address01">Phone-Vza:</td><td class="address02">0414-431-9805</td></tr>
					<tr><td class="address01">Contact:</td><td class="address02">Joseph</td></tr>
					<tr><td colspan="2" class="address01">genludistributors@gmail.com</td></tr>
				</table>
			</td>
			<td style="vertical-align: top"></td>
			<td style="vertical-align: top">
				<table class="to_right">
					<tr><td colspan="2" class="header01">{$module_wording}</td></tr>
					<tr><td colspan="2" class="header03"># {$number}</td></tr>
					<tr>
						<td class="address01">Date:</td>
						<td class="address02" style="width:125px">{$date}</td>
					</tr>
					<tr>
						<td class="address01">Valid-Thru:</td>
						<td class="address02" style="width:125px">{$due_date}</td>
					</tr>
					<tr>
						<td class="address01">Currency:</td>
						<td class="address02" style="width:125px">{$currency}</td>
					</tr>
				</table>
			</td>
		</tr>
	</table> -->
{if isset($info)}
	<table class="bank">
		{foreach from=$info key=name item=statement}
		<tr>
			<td class="col1">{$name}</td>
			<td class="col2">{$statement}</td>
		</tr>
		{/foreach}
		<tr>
		<td colspan="2"><br /></td>
		</tr>
	</table>
	<p class="divider"></p>
	<h4>Please feel free to contact us if you need further assistance.</h4>

{elseif isset($financial)}
	<table class="invoice_header_center">
		<tr class="black">
			<td>Invoice #</td>
			<td>Date</td>
			<td>Customer</td>
			<td class="unit_price">Cost of Sales</td>
			<td class="unit_price">Amount</td>
			<td class="unit_price">Profit</td>
		</tr>
		{foreach name=reportLines from=$data key=num item=line}
			<tr>
				<td>{$line.invoice_number}</td>
				<td>{$line.date}</td>
				<td>{$line.customer}</td>
				<td class="unit_price">{$line.cost}</td>
				<td class="unit_price">{$line.amount}</td>
				<td class="unit_price">{$line.profit}</td>
			</tr>
		{/foreach}
		<tr>
			<td colspan="3" class="big bold">TOTAL</td>
			<td class="unit_price">{$totals.totalCost}</td>
			<td class="unit_price">{$totals.totalAmount}</td>
			<td class="unit_price">{$totals.totalProfit}</td>
		</tr>
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
		{foreach name=reportLines from=$report_lines key=num item=line}
			<tr>
				<td class="reference">{$line.reference}</td>
				<td class="description">{$line.description}</td>
				{if $qty}
				<td class="qty">{$line.qty_hand}</td>
				{/if}
				<td class="unit_price">{$line.prepaid_price}</td>
				<td class="unit_price">{$line.credit_price}</td>
				<td class="order"></td>
			</tr>
		{/foreach}
	</table>
<!-- end of Report Lines -->

<p class="blank_separator"></p>
<p class="separator"></p>
	<table class="summary_table">
		<tr>
			<td class="header">Special Instructions:</td>
			<td class="header right"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
	</table>

{/if}
<div id="footer"></div>

</div>

<p class="pagebreak"></p>
