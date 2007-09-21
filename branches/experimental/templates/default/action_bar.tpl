<!--Actions heading - start-->
	<!-- EDIT -->
	<a href="index.php?module={$module}&view=details&submit={$this->id}&action=edit"> Edit</a>
	 ::
	<!-- VIEW -->
	<a href="index.php?module={$module}&view=details&submit={$this->id}&action=view"> View</a>
	 ::
	<!-- PRINT PREVIEW -->
	<a href="{$url_preview}"> {$LANG.print_preview}</a>
	 ::
	<!-- PROCESS PAYMENT -->
	<a href='index.php?module=payments&view=process&submit={$this->id}&op=pay_selected_invoice'> {$LANG.process_payment} </a>
	 ::
	<!-- EXPORT TO PDF -->
	<a href='{$url_for_pdf}'>{$LANG.export_pdf}</a>
	 ::
	<!-- CALC / EXCEL -->
	<a href="index.php?module={$module}&view=templates/template&submit={$this->id}&action=view&export={$spreadsheet}">{$LANG.export_as} .{$this->spreadsheet}</a>
	 ::
	<!-- WRITER / WORD -->
	<a href="index.php?module={$module}&view=templates/template&submit={$this->id}&action=view&export={$word_processor}">{$LANG.export_as} .{$this->word_processor}</a>
	 ::
	<!-- EMAIL -->
	<a href="index.php?module={$module}&view=email&stage=1&submit={$this->id}">{$LANG.email}</a>
<hr />
