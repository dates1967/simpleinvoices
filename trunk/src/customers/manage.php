<?php
include_once('./include/include_main.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
echo <<<EOD
<title>{$title} :: {$LANG_manage_customers}</title>
<link rel="stylesheet" type="text/css" href="themes/{$theme}/tables.css">

EOD;

#select customers
$conn = mysql_connect("$db_host","$db_user","$db_password");
mysql_select_db("$db_name",$conn);


$sql = "select * from si_customers ORDER BY c_name";

$result = mysql_query($sql, $conn) or die(mysql_error());
$number_of_rows = mysql_num_rows($result);


if (mysql_num_rows($result) == 0) {
	$display_block = "<P><em>{$LANG_no_customers}.</em></p>";
} else {
	$display_block = <<<EOD

<div id="sorting">
	<div>Sorting tables, please hold on...</div>
</div>

<table width="100%" align="center" id="large" class="filterable sortable">
<div id="header"><b>{$LANG_manage_customers}</b> ::
<a href="insert_customer.php">{$LANG_customer_add}</a></div>
<tr class="sortHeader">
<th class="noFilter">{$LANG_actions}</th>
<th class="index_table">{$LANG_customer_id}</th>
<th class="index_table">{$LANG_customer_name}</th>
<th class="index_table">{$LANG_phone}</th>
<th class="index_table">{$LANG_total}</th>
<th class="index_table">{$LANG_paid}</th>
<th class="index_table">{$LANG_owing}</th>
<th class="selectFilter index_table">{$wording_for_enabledField} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>

EOD;

	while ($Array = mysql_fetch_array($result)) {
		$c_idField = $Array['c_id'];
		$c_attentionField = $Array['c_attention'];
		$c_nameField = $Array['c_name'];
		$c_street_addressField = $Array['c_street_address'];
		$c_cityField = $Array['c_city'];
		$c_stateField = $Array['c_state'];
		$c_zip_codeField = $Array['c_zip_code'];
		$c_countryField = $Array['c_country'];
		$c_phoneField = $Array['c_phone'];
		$c_faxField = $Array['c_fax'];
		$c_emailField = $Array['c_email'];
		$c_enabledField = $Array['c_enabled'];
	
  	if ($c_enabledField == 1) {
  		$wording_for_enabled = $wording_for_enabledField;
  	} else {
  		$wording_for_enabled = $wording_for_disabledField;
		}

#invoice total calc - start
		$print_invoice_total ="select IF ( isnull( sum(inv_it_total)) ,  '0', sum(inv_it_total)) as total from si_invoice_items, si_invoices where  si_invoices.inv_customer_id  = $c_idField  and si_invoices.inv_id = si_invoice_items.inv_it_invoice_id";
		$result_print_invoice_total = mysql_query($print_invoice_total, $conn) or die(mysql_error());

		while ($Array = mysql_fetch_array($result_print_invoice_total)) {
			$invoice_total_Field = number_format($Array['total'],2);
#invoice total calc - end

#amount paid calc - start
			$x1 = "select  IF ( isnull( sum(ac_amount)) ,  '0', sum(ac_amount)) as amount from si_account_payments, si_invoices, si_invoice_items where si_account_payments.ac_inv_id = si_invoices.inv_id and si_invoices.inv_customer_id = $c_idField  and si_invoices.inv_id = si_invoice_items.inv_it_invoice_id";
			//$x1 = "select  IF ( isnull( sum(ac_amount)) ,  '0', sum(ac_amount)) as amount from si_account_payments, si_invoices, si_invoice_items where si_account_payments.ac_inv_id = si_invoices.inv_id and si_invoices.inv_customer_id = $c_idField  and si_invoices.inv_id = si_invoice_items.inv_it_id";
			$result_x1 = mysql_query($x1, $conn) or die(mysql_error());
			while ($result_x1Array = mysql_fetch_array($result_x1)) {
				$invoice_paid_Field = number_format($result_x1Array['amount'],2);
#amount paid calc - end

#amount owing calc - start
				$invoice_owing_Field = number_format($invoice_total_Field - $invoice_paid_Field,2);
#amount owing calc - end

				$display_block .= <<<EOD
	<tr class="index_table">
	<td class="index_table"><a class="index_table"
	 href="index.php?module=customers&view=details&submit={$c_idField}&action=view">{$LANG_view}</a> ::
	<a class="index_table"
	 href="index.php?module=customers&view=details&submit={$c_idField}&action=edit">{$LANG_edit}</a> </td>
	<td class="index_table">{$c_idField}</td>
	<td class="index_table">{$c_nameField}</td>
	<td class="index_table">{$c_phoneField}</td>
	<td class="index_table">{$invoice_total_Field}</td>
	<td class="index_table">{$invoice_paid_Field}</td>
	<td class="index_table">{$invoice_owing_Field}</td>
	<td class="index_table">{$wording_for_enabled}</td>
	</tr>

EOD;
			}
		}
	}
	$display_block .= "</table>";
}

$mid->printMenu('hormenu1');
$mid->printFooter();
?>

<script type="text/javascript" src="include/doFilter.js"></script>

<script type="text/javascript" src="include/jquery.js"></script>
<script type="text/javascript" src="include/jquery.tablesorter.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("table#large").tableSorter({
		sortClassAsc: 'sortUp', // class name for asc sorting action
		sortClassDesc: 'sortDown', // class name for desc sorting action
		highlightClass: ['highlight'], // class name for sort column highlighting.
		//stripingRowClass: ['even','odd'],
		//alternateRowClass: ['odd','even'],
		headerClass: 'largeHeaders', // class name for headers (th's)
		disableHeader: [0], // disable column can be a string / number or array containing string or number.
		dateFormat: 'dd/mm/yyyy' // set date format for non iso dates default us, in this case override and set uk-format
	})
});
$(document).sortStart(function(){
	$("div#sorting").show();
}).sortStop(function(){
	$("div#sorting").hide();
});
</script>


<script type="text/javascript" src="niftycube.js"></script>
<script type="text/javascript">
window.onload=function(){
Nifty("div#container");
Nifty("div#content,div#nav","same-height small");
Nifty("div#header,div#footer","small");
}
</script>

</head>
<body>

<br>
<div id="container">
<?php echo $display_block; ?>
<div id="footer"></div>
</div>
</div>

</body>
</html>
