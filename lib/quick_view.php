<?php

$this->data['invoice'] = $this->getInvoice();
$this->data['invoice']['summary'] = $this->displayInvoiceSummary();
$this->data['invoice']['details'] = $this->displayInvoiceDetails();
$this->data['invoice']['display_note'] = $this->displayNote();
$this->data['company'] = $this->getCompany();
$company_id = $this->data['company']['id'];
$this->data['company']['details'] = $this->displayCompanyDetails($company_id);
$this->data['company']['balance'] = $this->displayAccountBalance();

$url_pdf = "$_SERVER[HTTP_HOST]genlu/index.php?module={$this->module}&view=templates/template&submit={$this->id}&action=view&location=pdf";

$url_pdf_encoded = urlencode($url_pdf);

$url_for_pdf = 	"./pdf2/demo/html2ps.php?process_mode=single&renderfields=1&renderlinks=1&renderimages=1&scalepoints=1&pixels=$pdf_screen_size&media=$pdf_paper_size&leftmargin=$pdf_left_margin&rightmargin=$pdf_right_margin&topmargin=$pdf_top_margin&bottommargin=$pdf_bottom_margin&transparency_workaround=1&imagequality_workaround=1&output=1&location=export&pdfname=$preference[pref_inv_wording]$invoice[id]&URL=$url_pdf_encoded";

# Aca arranca la pagina
$display = <<<EOD

<!-- Start Quick View Section -->
<script type="text/javascript">
	$(document).ready(function() {
	 // hides the customer and biller details as soon as the DOM is ready (a little sooner that page load)
	  $('.show-summary').hide();
	  $('.show-invoice').hide();
	  $('.notes').hide();
  	});
</script>

<!--Actions heading - start-->
	<!-- EDIT -->
	<a href="index.php?module={$this->module}&view=edit&submit={$this->id}"> Edit</a>
	 ::
	<!-- VIEW -->
	<a href="index.php?module={$this->module}&view=details&submit={$this->id}&action=view"> View</a>
	 ::
	<!-- PRINT PREVIEW -->
	<a href="index.php?module={$this->module}&view=preview&submit={$this->id}"> {$this->lang['print_preview']}</a>
	 ::
	<!-- PROCESS PAYMENT -->
	<a href='index.php?module=payments&view=process&submit={$this->id}&op=pay_selected_invoice'> {$this->lang['process_payment']} </a>
	 ::
	<!-- EXPORT TO PDF -->
	<a href='{$url_for_pdf}'>{$this->lang['export_pdf']}</a>
	 ::
	<!-- CALC / EXCEL -->
	<a href="index.php?module={$this->module}&view=templates/template&submit={$this->id}&action=view&export={$spreadsheet}">{$this->lang['export_as']} .{$this->spreadsheet}</a>
	 ::
	<!-- WRITER / WORD -->
	<a href="index.php?module={$this->module}&view=templates/template&submit={$this->id}&action=view&export={$word_processor}">{$this->lang['export_as']} .{$this->word_processor}</a>
	 ::
	<!-- EMAIL -->
	<a href="index.php?module={$this->module}&view=email&stage=1&submit={$this->id}">{$this->lang['email']}</a>
<hr />
</form>

<!--Start Information Section -->

<div class="invoice_standard">
	<table class="invoice_header_left" style="margin-bottom:10px">
		<tr>
			<td class="info_header" colspan="2">Company Account Information <a href='index.php?module=customers&view=details&submit={$this->data['company']['id']}&action=view' class="small">(details)</a></td>
		</tr>
		{$this->data['company']['details']}
	</table>
	{$this->data['invoice']['summary']}
	<table class="summary_right" style="clear: right;margin-top:10px">
		<tr>
			<td class="info_header" colspan="2">Balance Information <a href='index.php?module=payments&view=manage&id={$this->id}' class="small">(details)</a></td>
		</tr>
		{$this->data['company']['balance']}
	</table>
</div>
<hr style="clear:both" />

<!-- Start Invoice section -->

<div class="invoice_standard">
	<table class="summary_table">
		<tr>
			<td class="info_header">Invoice Details</td>
			<td class="right">
				<a href='#' class="show-invoice" onClick="$('.invoice').show();$('.show-invoice').hide();">(show)</a><a href='#' class="invoice" onClick="$('.invoice').hide();$('.show-invoice').show();">(hide)</a>
			</td>
		</tr>
	</table>
	<div class="invoice">
	{$this->data['invoice']['details']}
	</div>
	<p style="clear: both;margin: 10px 0px;"></p>
</div>


<hr style="clear:both" />

<div class="invoice_standard">
{$this->data['invoice']['display_note']}
</div>
EOD;
?>
