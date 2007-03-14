<?php
include_once('./include/include_main.php');

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();




/* validataion code */
include("./include/validation.php");

jsBegin();
jsFormValidationBegin("frmpost");
jsValidateRequired("c_name",$LANG_customer_name);
jsFormValidationEnd();
jsEnd();

/* end validataion code */


#get the invoice id
$customer_id = $_GET['submit'];


#Info from DB print
$conn = mysql_connect( $db_host, $db_user, $db_password );
mysql_select_db( $db_name, $conn );


$customer = getCustomer($customer_id);


$wording_for_enabled = $customer['c_enabled'] == 1 ?$wording_for_enabledField:$wording_for_disabledField;


$invoice_total_Field = calc_customer_total($customer['c_id']);
$invoice_total_Field_formatted = number_format($invoice_total_Field,2);
#invoice total calc - end

#amount paid calc - start
$invoice_paid_Field = calc_customer_paid($customer['c_id']);;
$invoice_paid_Field_formatted = number_format($invoice_paid_Field,2);
#amount paid calc - end

#amount owing calc - start
$invoice_owing_Field = number_format($invoice_total_Field - $invoice_paid_Field,2);


#get custom field labels
$customer_custom_field_label1 = get_custom_field_label("customer_cf1");
$customer_custom_field_label2 = get_custom_field_label("customer_cf2");
$customer_custom_field_label3 = get_custom_field_label("customer_cf3");
$customer_custom_field_label4 = get_custom_field_label("customer_cf4");


if ($_GET['action'] === 'view') {

	$display_block = <<<EOD
	<b>{$LANG_customer} :: <a href="index.php?module=customers&view=details&submit={$customer[c_id]}&action=edit">{$LANG_edit}</a></b>
	<hr></hr>

	<table align="center">
	<tr>
		<td colspan="7" align="center"> </td>
	</tr>	
	<tr>
		<td colspan="4" align="center" class="align_center"><i>{$LANG_customer_details}</i></td>
		<td width="10%"></td>
		<td colspan="2" align="center" class="align_center"><i>{$LANG_summary_of_accounts}</i></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_customer} {$LANG_id}</td>
		<td>{$customer[c_id]}</td><td colspan="2"></td><td></td>
		<td class="details_screen">{$LANG_total_invoices}</td><td>{$invoice_total_Field_formatted}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_customer_name}</td><td colspan="2">{$customer[c_name]}</td>
		<td colspan="2"></td><td class="details_screen">{$LANG_total_paid}</td>
		<td>{$invoice_paid_Field_formatted}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_attention_short} <a href="documentation/info_pages/customer_contact.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td>
		<td colspan="2">{$customer[c_attention]}</td><td colspan=2></td>
		<td class="details_screen">{$LANG_total_owing}</td><td><u>{$invoice_owing_Field}</u></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_street}</td><td>{$customer[c_street_address]}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_street2} <a href="./documentation/info_pages/street2.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td><td>{$customer[c_street_address2]}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_city}</td><td>{$customer[c_city]}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_zip}</td><td>{$customer[c_zip_code]}</td>
		<td class="details_screen">{$LANG_phone}</td><td>{$customer[c_phone]}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_state}</td><td>{$customer[c_state]}</td>
		<td class="details_screen">{$LANG_mobile_phone}</td><td>{$customer[c_mobile_phone]}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_country}</td><td>{$customer[c_country]}</td>
		<td class="details_screen">{$LANG_fax}</td><td>{$customer[c_fax]}</td>
	</tr>
	<tr>
		<td class="details_screen">{$wording_for_enabledField}</td><td>{$wording_for_enabled}</td>
		<td class="details_screen">{$LANG_email}</td><td>{$customer[c_email]}</td>
	</tr>	
	</table>

EOD;

#show invoices per client
$sql = "select * from {$tb_prefix}invoices where inv_customer_id =$customer_id  ORDER BY inv_id desc";

$display_block .= <<<EOD
<br>
	<div id="container-1">
		<ul class="anchors">
			<li><a href="#section-1">{$LANG_custom_fields}</a></li>
			<li><a href="#section-2">{$LANG_customer} {$LANG_invoice_listings}</a></li>
			<li><a href="#section-3">{$LANG_notes}</a></li>
		</ul>
		<div id="section-1" class="fragment">
			<h4><u>{$LANG_customer} {$LANG_custom_fields}</u></h4>
			<p>
			<table>
			<tr>
				<td class="details_screen">{$customer_custom_field_label1} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td><td>{$customer[c_custom_field1]}</td>
			</tr>
			<tr>
				<td class="details_screen">{$customer_custom_field_label2} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td><td>{$customer[c_custom_field2]}</td>
			</tr>
			<tr>
				<td class="details_screen">{$customer_custom_field_label3} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td><td>{$customer[c_custom_field3]}</td>
			</tr>
			<tr>
				<td class="details_screen">{$customer_custom_field_label4} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td><td>{$customer[c_custom_field4]}</td>
			</tr>		
			</table>	
			</p>
		</div>
		<div id="section-2" class="fragment">
			<h4><u>{$LANG_invoice_listings}</u></h4>
			<p>

EOD;

include('./src/invoices/manage.inc.php'); 

$display_block .= <<<EOD
			</p>
		</div>
		<div id="section-3" class="fragment">
			<h4><u>{$LANG_customer} {$LANG_notes}</u></h4>
			<p>
			
			<div id="left">
			{$customer[c_notes]}
			</div>
			</p>
		</div>
	</div>

EOD;

#include('./manage_invoices.inc.php'); 

$footer = <<<EOD
<hr></hr>
	<a href="index.php?module=customers&view=details&submit={$customer[c_id]}&action=edit">{$LANG_edit}</a>
EOD;
}

else if ($_GET['action'] === 'edit') {
#do the product enabled/disblaed drop down
$display_block_enabled = "<select name=\"c_enabled\">
<option value=\"$c_enabledField\" selected style=\"font-weight: bold\">$wording_for_enabled</option>
<option value=\"1\">$wording_for_enabledField</option>
<option value=\"0\">$wording_for_disabledField</option>
</select>";

	$display_block = <<<EOD
	<div id="top"><b>{$LANG_customer_edit}</b></div>
	 <hr></hr>

	<table align="center">
	<tr>
		<td class="details_screen">{$LANG_customer} {$LANG_id}</td>
		<td>{$customer[c_id]}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_customer_name}</td>
		<td><input type="text" name="c_name" value="{$customer[c_name]}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_attention_short} <a href="documentation/info_pages/customer_contact.html" rel="ibox&height=400" ><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_attention" value="{$customer[c_attention]}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_street}</td>
		<td><input type="text" name="c_street_address" value="{$customer[c_street_address]}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_street2} <a href="./documentation/info_pages/street2.html" rel="ibox&height=400" ><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_street_address2" value="{$customer[c_street_address2]}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_city}</td>
		<td><input type="text" name="c_city" value="{$customer[c_city]}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_zip}</td>
		<td><input type="text" name="c_zip_code" value="{$customer[c_zip_code]}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_state}</td>
		<td><input type="text" name="c_state" value="{$customer[c_state]}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_country}</td>
		<td><input type="text" name="c_country" value="{$customer[c_country]}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_phone}</td>
		<td><input type="text" name="c_phone" value="{$customer[c_phone]}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_mobile_phone}</td>
		<td><input type="text" name="c_mobile_phone" value="{$customer[c_mobile_phone]}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_fax}</td>
		<td><input type="text" name="c_fax" value="{$customer[c_fax]}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_email}</td>
		<td><input type="text" name="c_email" value="{$customer[c_email]}" size="50" /></td
	</tr>
	<tr>
		<td class="details_screen">{$customer_custom_field_label1} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_custom_field1" value="{$customer[c_custom_field1]}" size="50" /></td
	</tr>
	<tr>
		<td class="details_screen">{$customer_custom_field_label2} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_custom_field2" value="{$customer[c_custom_field2]}" size="50" /></td
	</tr>
	<tr>
		<td class="details_screen">{$customer_custom_field_label3} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_custom_field3" value="{$customer[c_custom_field3]}" size="50" /></td
	</tr>
	<tr>
		<td class="details_screen">{$customer_custom_field_label4} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_custom_field4" value="{$customer[c_custom_field4]}" size="50" /></td
	</tr>
	<tr>
		<td class="details_screen">{$LANG_notes}</td>
		<td><textarea name="c_notes" rows="8" cols="50">{$customer[c_notes]}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$wording_for_enabledField}</td><td>{$display_block_enabled}</td>
	</tr>

	</table>

EOD;

$footer = <<<EOD

	<hr></hr>
	<input type="submit" name="cancel" value="{$LANG_cancel}" />
	<input type="submit" name="save_customer" value="{$LANG_save_customer}" />
	<input type="hidden" name="op" value="edit_customer" />
EOD;
}



echo <<<EOD

<form name="frmpost" action="index.php?module=customers&view=save&submit={$_GET['submit']}" method="post" onsubmit="return frmpost_Validator(this)">
{$display_block}
{$footer}

</form>
EOD;
?>
<!-- ./src/include/design/footer.inc.php gets called here by controller srcipt -->
