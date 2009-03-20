{*
/*
* Script: manage.tpl
* 	 Manage invoices template
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin, Ben Brown, Ap.Muthu
*
* Last edited:
* 	 2008-01-03
*
* License:
*	 GPL v2 or above
*
* Website:
*	http://www.simpleinvoices.org
*/
*}
<script type="text/javascript">

{*  
This Script has to be inlined so that smarty renders it.

Assign Smarty vars to JS vars before we switch to literal/JS mode.  We'll be passing
these strings to String.format on each row, which also delimits with curly braces, so we need to use
{ldelim} and {rdelim}.
*}

var quick_view_tooltip = "{$LANG.quick_view_tooltip} {$invoice.preference.pref_inv_wording} {ldelim}1{rdelim}";
var edit_view_tooltip = "{$LANG.edit_view_tooltip} {$invoice.preference.pref_inv_wording} {ldelim}1{rdelim}";
var print_preview_tooltip = "{$LANG.print_preview_tooltip} {$invoice.preference.pref_inv_wording} {ldelim}1{rdelim}";
var export_tooltip = "{$LANG.export_tooltip} {$invoice.preference.pref_inv_wording} {ldelim}1{rdelim} {$LANG.export_pdf_tooltip}";
var export_xls_tooltip = "{$LANG.export_tooltip} {$invoice.preference.pref_inv_wording} {ldelim}1{rdelim} {$LANG.export_xls_tooltip} {$spreadsheet} {$LANG.format_tooltip}"
var export_word_tooltip = "{$LANG.export_tooltip} {$invoice.preference.pref_inv_wording} {ldelim}1{rdelim} {$LANG.export_doc_tooltip} {$word_processor} {$LANG.format_tooltip}";
var process_payment_tooltip = "{$LANG.process_payment} {$invoice.preference.pref_inv_wording} {ldelim}1{rdelim}";
var email_tooltip = "{$LANG.email}  {$invoice.preference.pref_inv_wording} {ldelim}1{rdelim}";

{literal}
Ext.onReady(function(){

	Ext.QuickTips.init();

	//Create a clickable button for the Manage pages - toolbar
	Ext.LinkButton = Ext.extend(Ext.Button,
	{
		template: new Ext.Template(
		'<table border="0" cellpadding="0" cellspacing="0" class="x-btn-wrap"><tbody><tr>',
		'<td class="x-btn-left"><i> </i></td><td class="x-btn-center"><a class="x-btn-text" href="{1}" target="{2}">{0}</a></td><td class="x-btn-right"><i> </i></td>',
		"</tr></tbody></table>"),

		onRender: function(ct, position)
		{
			var btn, targs = [this.text || ' ', this.href, this.target || "_self"];

			if(position){
				btn = this.template.insertBefore(position, targs, true);
			}else{
				btn = this.template.append(ct, targs, true);
			}

			var btnEl = btn.child("a:first");
			btnEl.on('focus', this.onFocus, this);
			btnEl.on('blur', this.onBlur, this);

			this.initButtonEl(btn, btnEl);
			btn.un(this.clickEvent, this.onClick, this);
			Ext.ButtonToggleMgr.register(this);
		}
	});

	// create the Data Store
	var ds = new Ext.data.GroupingStore({
		// load using HTTP
		//url: 'sheldon2.xml',
		url: 'index.php?module=invoices&amp;view=xml',
		// the return will be XML, so lets set up a reader
		reader: new Ext.data.XmlReader({
			// records will have an "Item" tag
			record: 'tablerow',
			id: 'id',
			type_id: 'type_id',
			totalRecords: 'total'
		}, [
		// set up the fields mapping into the xml doc
		// The first needs mapping, the others are very basic
		'actions',
		{name: 'id', mapping: 'id'},
		{name: 'type_id', mapping: 'type_id'},
		{name: 'Aging', mapping: 'Aging'},
		'Biller','Customer','INV_TOTAL','INV_PAID','INV_OWING','Date','Aging','Type'
		]),
		// turn on defautl grouping by Aging field
		groupField: 'Aging',
		// turn on remote sorting
		remoteSort: true
	});

	ds.setDefaultSort('id', 'desc');

	// pluggable renders
	function renderActions(value, p, record){
		
		var quickViewLink = String.format(
		'<!--0 Quick View --><a class="index_table" title="'+ quick_view_tooltip +'" href="index.php?module=invoices&amp;view=quick_view&amp;invoice={1}"> <img src="images/common/view.png" height="16" border="-5px" padding="-4px" valign="bottom" alt="" /></a>',
		value,
		record.id,
		record.data.type_id,
		record.data.forumid);

		var editViewLink = String.format(
		'<!--1 Edit View --><a class="index_table" title="'+ edit_view_tooltip +'" href="index.php?module=invoices&amp;view=details&amp;invoice={1}&amp;action=view"><img src="images/common/edit.png" height="16" border="-5px" padding="-4px" valign="bottom" alt="" /><!-- print --></a>',
		value,
		record.id,
		record.data.type_id,
		record.data.forumid);

		var printViewLink = String.format(
		'<!--2 Print View --><a class="index_table" title="'+ print_preview_tooltip +'" href="index.php?module=invoices&amp;view=templates/template&amp;invoice={1}&amp;action=view&amp;location=print"><img src="images/common/printer.png" height="16" border="-5px" padding="-4px" valign="bottom" alt="" /><!-- print --></a>',
		value,
		record.id,
		record.data.type_id,
		record.data.forumid);

		var pdfLink = String.format(
		'<!--3 EXPORT TO PDF --><a title="'+export_tooltip+'"	class="index_table" href="pdfmaker.php?id={1}"><img src="images/common/page_white_acrobat.png" height="16" padding="-4px" border="-5px" valign="bottom" alt="" /><!-- pdf --></a>',
		value,
		record.id,
		record.data.type_id,
		record.data.forumid);

		var xlsLink = String.format(
		'<!--4 XLS --><a title="'+ export_xls_tooltip +'" class="index_table" href="index.php?module=invoices&amp;view=templates/template&amp;invoice={1}&amp;action=view&amp;location=print&amp;export={$spreadsheet}"><img src="images/common/page_white_excel.png" height="16" border="0" padding="-4px" valign="bottom" alt="" /><!-- $spreadsheet --></a>',
		value,
		record.id,
		record.data.type_id,
		record.data.forumid);

		var docLink = String.format(
		'<!--5 DOC --><a title="'+ export_word_tooltip +'" class="index_table" href="index.php?module=invoices&amp;view=templates/template&amp;invoice={1}&amp;action=view&amp;location=print&amp;export={$word_processor}"><img src="images/common/page_white_word.png" height="16" border="0" padding="-4px" valign="bottom" alt="" /><!-- $word_processor --></a>',
		value,
		record.id,
		record.data.type_id,
		record.data.forumid);

		var paymentLink = String.format(
		'<!--6 Payment --><a title="'+ process_payment_tooltip +'" class="index_table" href="index.php?module=payments&amp;view=process&amp;invoice={1}&amp;op=pay_selected_invoice"><img src="images/common/money_dollar.png" height="16" border="0" padding="-4px" valign="bottom" alt="" /></a>',
		value,
		record.id,
		record.data.type_id,
		record.data.forumid);


		var emailLink = String.format(
		'<!--7 Email --><a href="index.php?module=invoices&amp;view=email&amp;stage=1&amp;invoice={1}" title="'+ email_tooltip +'"><img src="images/common/mail-message-new.png" height="16" border="0" padding="-4px" valign="bottom" alt="" /></a>',
		value,
		record.id,
		record.data.type_id,
		record.data.forumid);

		//Return a nice big link for the Actions column in the Manage Invoices page
		return quickViewLink + editViewLink + printViewLink + pdfLink + xlsLink + docLink + paymentLink + emailLink;
		
	}


	var cm = new Ext.grid.ColumnModel([
	{header: "Actions", width: 105, dataIndex: 'actions', sortable:false, renderer: renderActions },
	{header: "ID", width: 50, dataIndex: 'id'},
	{header: "Biller", width: 180, dataIndex: 'Biller'},
	{header: "Customer", width: 115, dataIndex: 'Customer'},
	{header: "Total", width: 75, dataIndex: 'INV_TOTAL'},
	{header: "Owing", width: 75, dataIndex: 'INV_OWING'},
	{header: "Date", width: 75, dataIndex: 'Date'},
	{header: "Aging", width: 75, dataIndex: 'Aging'},
	{header: "Type", width: 100, dataIndex: 'Type'}
	]);
	cm.defaultSortable = true;

	// create the grid
	var grid = new Ext.grid.GridPanel({
		ds: ds,
		cm: cm,
		title:'Manage Invoices',
		renderTo:'manageInvoicesGrid',
		autoHeight: true,
		viewConfig: {
			forceFit:true
		},
		view: new Ext.grid.GroupingView({
			forceFit:true,
			groupTextTpl: '{text} ({[values.rs.length]} {[values.rs.length > 1 ? "Items" : "Item"]})'
		}),


		bbar: new Ext.PagingToolbar({
			pageSize: 25,
			store: ds,
			displayInfo: true,
			displayMsg: 'Displaying invoices {0} - {1} of {2}'
		}),
		layout:'fit'
	});

	function onButtonClick(btn){
		Ext.example.msg('Button Click','You clicked the "{0}" button.', btn.text);
	}

	ds.load({params:{start:0, limit:25}});

});
{/literal}
</script>

<div style="text-align:center;">
<b>{$LANG.manage_invoices}</b> :: {$LANG.add_new_invoice} &ndash
<a href="index.php?module=invoices&amp;view=total"> {$LANG.total_style}</a> :: 
<a href="index.php?module=invoices&amp;view=itemised"> {$LANG.itemised_style}</a> :: 
<a href="index.php?module=invoices&amp;view=consulting"> {$LANG.consulting_style}</a>
</div>
<hr />
{if $invoices == null }
<p><em>{$LANG.no_invoices}.</em></p>
{else}

<div id="manageInvoicesGrid"></div>

{/if}
