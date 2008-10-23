
<table width="100%" align=center>
	<tr>
		<td>
			{$LANG.invoice_id}: {$payment.ac_inv_id}
		</td>
		<td>
			{$LANG.date_upper}: {$payment.date}
		</td>
	</tr>
</table>
<hr/>

<table width="100%" align=center>
	<tr>
		<td class='details_screen'>{$LANG.biller}: {$payment.biller}</td>
	</tr>
	<tr>
		<td class='details_screen'>{$LANG.customer}: {$payment.customer}, {$payment.customer_first_name}, {$payment.customer_middle_name} </td>
	</tr>

</table>
<table width="100%" align=center>

	<tr>
		<td>{$LANG.item}</td>
		<td>{$LANG.description}</td>
		<td>{$LANG.quantity_short}</td>
		<td>{$LANG.unit}</td>
		<td>{$LANG.unit_price}</td>
		<td>{$LANG.total_taxes}</td>
		<td>{$LANG.total_uppercase}</td>
	</tr>
	{foreach from=$invoiceItems item=invoiceItem name=invoiceItemLoop}
	<tr>
		<td>{$smarty.foreach.invoiceItemLoop.iteration}</td>
		<td>{$invoiceItem.subject.name}</td>
		<td>{$invoiceItem.quantity}</td>
		<td>{$invoiceItem.product.teaching_hours} {$LANG.teaching_hours}</td>
		<td>{$preference.pref_currency_sign}{$invoiceItem.unit_price}</td>
		<td>{$preference.pref_currency_sign}{$invoiceItem.tax_amount}</td>
		<td>{$preference.pref_currency_sign}{$invoiceItem.total}</td>
	</tr>
	{/foreach}
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>{$LANG.total_uppercase}</td>
		<td>{$preference.pref_currency_sign}{$invoice.total}</td>
	</tr>
	<tr>
	</tr>

</table>
{$LANG.total_services_rendered}<br>
{$invoice_total_ru}
<hr />
<br><br>

{$LANG.biller} 
.................................................
 &nbsp; &nbsp; &nbsp; &nbsp;
{$LANG.customer} 
.................................................
