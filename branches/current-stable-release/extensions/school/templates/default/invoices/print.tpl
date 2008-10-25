
<table width="100%" align=center>
	<tr>
		<td>
			{$LANG.invoice_id}: {$invoice.id}
		</td>
		<td>
			{$LANG.date_upper}: {$invoice.date}
		</td>
	</tr>
</table>
<hr/>

<table width="100%" align=center>
	<tr>
		<td class='details_screen'>{$LANG.biller}: {$biller.name}</td>
	</tr>
	<tr>
		<td class='details_screen'>{$LANG.customer}: {$customer.name}, {$customer.first_name}, {$customer.middle_name} </td>
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
		<td valign=top>{$smarty.foreach.invoiceItemLoop.iteration}</td>
		{* <td>{$invoiceItem.subject.name}</td> *}
		<td valign=top>
			{$LANG.course_name}: {$invoiceItem.product.description} 
			<br>{$LANG.payments_start}: {$invoiceItem.product.start_date}
			<br>{$LANG.payments_end}: {$invoiceItem.product.end_date} 
			<br>{$LANG.number_of_payment_periods}: {$invoiceItem.product.number_of_payment_periods} 
		</td>
		<td  valign=top >{$invoiceItem.quantity}</td>
		<td valign=top>{$invoiceItem.product.teaching_hours} {$LANG.teaching_hours}</td>
		<td valign=top>{$preference.pref_currency_sign}{$invoiceItem.unit_price|number_format:2}</td>
		<td valign=top>{$preference.pref_currency_sign}{$invoiceItem.tax_amount|number_format:2}</td>
		<td valign=top>{$preference.pref_currency_sign}{$invoiceItem.total|number_format:2}</td>
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
		<td>{$preference.pref_currency_sign}{$invoice.total|number_format:2}</td>
	</tr>
	<tr>
	</tr>

</table>
{$LANG.total_services_rendered}<br>
{$invoice_total_ru}

<br><br>
{$LANG.services_implemented_in_full}
<hr />
<br><br>

{$LANG.biller} 
.................................................
 &nbsp; &nbsp; &nbsp; &nbsp;
{$LANG.customer} 
.................................................
