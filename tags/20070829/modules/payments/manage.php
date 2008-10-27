<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();


#if coming from another page where you want to filter by just one invoice
if (!empty($_GET['id'])) {

	$display_block_header = "<h3>$LANG[payments_filtered] $_GET[id]</h3> :: <a href='index.php?module=payments&view=process&submit=$_GET[id]&op=pay_selected_invoice'>$LANG[payments_filtered_invoice]</a>";

	$sql = "select {$tb_prefix}account_payments.*, {$tb_prefix}customers.name as CNAME, {$tb_prefix}biller.name as BNAME from {$tb_prefix}account_payments, {$tb_prefix}invoices, {$tb_prefix}customers, {$tb_prefix}biller  where ac_inv_id = {$tb_prefix}invoices.id and {$tb_prefix}invoices.customer_id = {$tb_prefix}customers.id and {$tb_prefix}invoices.biller_id = {$tb_prefix}biller.id and {$tb_prefix}account_payments.ac_inv_id='$_GET[id]' ORDER BY {$tb_prefix}account_payments.id DESC";
}
#if coming from another page where you want to filter by just one customer
elseif (!empty($_GET['c_id'])) {

	$display_block_header = "<h3>$LANG[payments_filtered_customer] $_GET[c_id] :: <a href='index.php?module=payments&view=process&op=pay_invoice'>$LANG[process_payment]</a></h3>";

	$sql = "select {$tb_prefix}account_payments.*, {$tb_prefix}customers.name as CNAME, {$tb_prefix}biller.name as BNAME from {$tb_prefix}account_payments, {$tb_prefix}invoices, {$tb_prefix}customers, {$tb_prefix}biller  where ac_inv_id = {$tb_prefix}invoices.id and {$tb_prefix}invoices.customer_id = {$tb_prefix}customers.id and {$tb_prefix}invoices.biller_id = {$tb_prefix}biller.id and {$tb_prefix}customers.id='$_GET[c_id]' ORDER BY {$tb_prefix}account_payments.id DESC ";
}
#if you want to show all invoices - no filters
else {

	$display_block_header = "<h3>$LANG[manage_payments] :: <a href='index.php?module=payments&view=process&op=pay_invoice'>$LANG[process_payment]</a></h3>";

	$sql = "select {$tb_prefix}account_payments.*, {$tb_prefix}customers.name as CNAME, {$tb_prefix}biller.name as BNAME from {$tb_prefix}account_payments, {$tb_prefix}invoices, {$tb_prefix}customers, {$tb_prefix}biller  where ac_inv_id = {$tb_prefix}invoices.id and {$tb_prefix}invoices.customer_id = {$tb_prefix}customers.id and {$tb_prefix}invoices.biller_id = {$tb_prefix}biller.id ORDER BY {$tb_prefix}account_payments.id DESC";
}

$result = mysqlQuery($sql, $conn) or die(mysql_error());
$number_of_rows = mysql_num_rows($result);


if (mysql_num_rows($result) == 0) {
	$display_block = "<P><em>$LANG[no_payments].</em></p>";
}else{
	$display_block = <<<EOD


$display_block_header
<hr></hr>


<table align="center" class="ricoLiveGrid"  id="rico_payment" >
<colgroup>
<col style='width:10%;' />
<col style='width:10%;' />
<col style='width:10%;' />
<col style='width:15%;' />
<col style='width:10%;' />
<col style='width:10%;' />
<col style='width:10%;' />
<col style='width:10%;' />
<col style='width:15%;' />
</colgroup>
<thead>

<tr class="sortHeader">
<th class="noFilter sortable">$LANG[actions]</th>
<th class="index_table sortable">$LANG[payment_id]</th>
<th class="index_table sortable">$LANG[invoice_id]</th>
<th class="selectFilter index_table sortable">$LANG[customer]</th>
<th class="selectFilter index_table sortable">$LANG[biller]</th>
<th class="index_table sortable">$LANG[amount]</th>
<th class="index_table sortable">$LANG[notes]</th>
<th class="selectFilter index_table sortable">$LANG[payment_type]</th>
<th class="noFilter index_table sortable">$LANG[date_upper]</th>
</tr>
</thead>
EOD;

	while ($ac = mysql_fetch_array($result)) {

		#item description - only show first 10 characters and add ... to signify theres more text
		$max_length = 10;
		if (strlen($ac['ac_notes']) > $max_length ) {
			$ac['ac_notes'] = substr($ac['ac_notes'],0,10)."...";
		}
		else if (strlen($ac['ac_notes']) <= $max_length ) {
			$ac['ac_notes'] = $ac['ac_notes'];
		}

		#Payment type section
		$payment_type_description = "select pt_description from {$tb_prefix}payment_types where pt_id = {$ac['ac_payment_type']}";
		$result_payment_type_description = mysqlQuery($payment_type_description, $conn) or die(mysql_error());

		$pt = mysql_fetch_array($result_payment_type_description);

		$display_block .= <<<EOD
	<tr class='index_table'>
		<td class='index_table'><a class='index_table' href='index.php?module=payments&view=details&id={$ac['id']}'>{$LANG['view']}</a></td>
		<td class='index_table'>{$ac['id']}</td>
		<td class='index_table'>{$ac['ac_inv_id']}</td>
		<td class='index_table'>{$ac['CNAME']}</td>
		<td class='index_table'>{$ac['BNAME']}</td>
		<td class='index_table'>{$ac['ac_amount']}</td>
		<td class='index_table'>{$ac['ac_notes']}</td>
		<td class='index_table'>{$pt['pt_description']}</td>
		<td class='index_table'>{$ac['ac_date']}</td>
	</tr>
EOD;
	
	}

	$display_block .="</table>";
}


getRicoLiveGrid("rico_payment","{ type:'number', decPlaces:0, ClassName:'alignleft' },{ type:'number', decPlaces:0, ClassName:'alignleft' },,,{ type:'number', decPlaces:2, ClassName:'alignleft' }");


echo $display_block;

?>
<br />
<div style="text-align:center;"><a href="docs.php?t=help&p=wheres_the_edit_button"
	rel="gb_page_center[450, 450]"><img
	src="./images/common/help-small.png"></img> Wheres the Edit button?</a></div>