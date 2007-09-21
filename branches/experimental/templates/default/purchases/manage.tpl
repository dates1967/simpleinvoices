{if $data.invoices == null }
	<P><em>{$LANG.no_invoices}.</em></p>
{else}

<div style="text-align:center;">
	<b>{$LANG.manage_invoices}</b> ::
	<a href="index.php?module=purchases&view=create">{$LANG.add_new_invoice}</a> ::
</div>
<hr />

<table align="center" id="ex1" class="ricoLiveGrid manage" >
<colgroup>
	<col style='width:15%;' />
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:5%;' />
</colgroup>
<thead>
	<tr class="sortHeader">
		<th class="noFilter sortable" >{$LANG.actions}</th>
		<th class="selectFilter index_table sortable">Invoice Number</th>
		<th class="selectFilter index_table sortable">{$LANG.company}</th>
		<th class="selectFilter index_table sortable">{$LANG.date_upper}</th>
		<th class="selectFilter index_table sortable">{$LANG.total}</th>
		<th class="selectFilter index_table sortable">{$LANG.owing}</th>
		<th class="selectFilter index_table sortable">{$LANG.aging}</th>
	</tr>
</thead>

{foreach from=$data.invoices item=invoice}

{get_url_for_pdf item=$invoice current_pdf=$url_for_pdf output=url_pdf}

	<tr class="index_table">
	<td class="index_table" nowrap>
	<!-- Quick View -->
	<a class="index_table"
	 title="{$LANG.quick_view_tooltip} Invoice {$invoice.invoice_number}"
	 href="index.php?module=purchases&view=quick_view&submit={$invoice.id}">
		<img src="images/common/view.png" height="16" border="-5px0" padding="-4px" valign="bottom" /><!-- print --></a>
	</a>

	<!-- Edit View -->
	<a class="index_table" title="{$LANG.edit_view_tooltip}"
	 href="index.php?module=purchases&view=edit&submit={$invoice.id}">
		<img src="images/common/edit.png" height="16" border="-5px" padding="-4px" valign="bottom" /><!-- print --></a>
	</a>

	<!-- Print View -->
	<a class="index_table" title="{$LANG.print_preview_tooltip} {$invoice.invoice_number}"
	href="{$url_preview}{$invoice.id}">
	<img src="images/common/printer.gif" height="16" border="-5px" padding="-4px" valign="bottom" /><!-- print --></a>

	<!-- EXPORT TO PDF -->
	<a title="{$LANG.export_tooltip} {$LANG.export_pdf_tooltip}"
	class="index_table" href="{$url_pdf}"><img src="images/common/pdf.jpg" height="16" padding="-4px" border="-5px" valign="bottom" /><!-- pdf --></a>

	<!--XLS -->
	<a title="{$LANG.export_tooltip} {$LANG.export_xls_tooltip} {$LANG.format_tooltip}"
	 class="index_table" href="index.php?module=purchases&view=export&submit={$invoice.id}&format={$options.spreadsheet}">
	 <img src="images/common/xls.gif" height="16" border="0" padding="-4px" valign="bottom" /><!-- $spreadsheet --></a>

	<!-- DOC -->
	<a title="{$LANG.export_tooltip} {$LAcustomerNG.export_doc_tooltip} {$LANG.format_tooltip}"
	 class="index_table" href="index.php?module=purchases&view=export&submit={$invoice.id}&format={$options.word_processor}">
	 <img src="images/common/doc.png" height="16" border="0" padding="-4px" valign="bottom" /><!-- $word_processor --></a>

  <!-- Payment --><a title="{$LANG.process_payment}"
   class="index_table" href="index.php?module=payments&view=process&submit={$invoice.id}&op=pay_selected_invoice">$</a>
	<!-- Email -->
	<a href="index.php?module=purchases&view=email&stage=1&submit={$invoice.id}" title="{$LANG.email}"><img src="images/common/mail-message-new.png" height="16" border="0" padding="-4px" valign="bottom" /></a>

	</td>
	<td class="index_table">{$invoice.invoice_number}</td>
	<td class="index_table">{$invoice.company}</td>
	<td class="index_table">{$invoice.date}</td>
	<td class="index_table">{$invoice.total}</td>
	<td class="index_table"></td>
	<td class="index_table"></td>
	</tr>


	{/foreach}

</table>
{/if}
