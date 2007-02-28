<?php
include_once('./include/include_main.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="./src/include/js/ibox.js"></script>
<link rel="stylesheet" href="./src/include/css/ibox.css" type="text/css"  media="screen"/>

<?php
#table
echo <<<EOD


EOD;
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

#customer query
$print_customer = 'SELECT * FROM si_customers WHERE c_id = ' . $customer_id;
$result_print_customer = mysql_query($print_customer, $conn) or die(mysql_error());


while ($Array = mysql_fetch_array($result_print_customer) ) {
	$c_idField = $Array['c_id'];
	$c_attentionField = $Array['c_attention'];
	$c_nameField = $Array['c_name'];
	$c_street_addressField = $Array['c_street_address'];
	$c_street_address2Field = $Array['c_street_address2'];
	$c_cityField = $Array['c_city'];
	$c_stateField = $Array['c_state'];
	$c_zip_codeField = $Array['c_zip_code'];
	$c_countryField = $Array['c_country'];
	$c_phoneField = $Array['c_phone'];
	$c_mobile_phoneField = $Array['c_mobile_phone'];
	$c_faxField = $Array['c_fax'];
	$c_emailField = $Array['c_email'];
	$c_notesField = $Array['c_notes'];
	$c_custom_field1Field = $Array['c_custom_field1'];
	$c_custom_field2Field = $Array['c_custom_field2'];
	$c_custom_field3Field = $Array['c_custom_field3'];
	$c_custom_field4Field = $Array['c_custom_field4'];
	$c_enabledField = $Array['c_enabled'];

	if ($c_enabledField == 1) {
	      $wording_for_enabled = $wording_for_enabledField;
	} else {
	      $wording_for_enabled = $wording_for_disabledField;
	}

#invoice total calc - start
		$invoice_total_Field = calc_customer_total($c_idField);
		$invoice_total_Field_formatted = number_format($invoice_total_Field,2);
#invoice total calc - end

#amount paid calc - start
			$invoice_paid_Field = calc_customer_paid($c_idField);;
			$invoice_paid_Field_formatted = number_format($invoice_paid_Field,2);
#amount paid calc - end

#amount owing calc - start
			$invoice_owing_Field = number_format($invoice_total_Field - $invoice_paid_Field,2);
#amount owing calc - end

}

#get custom field labels
$customer_custom_field_label1 = get_custom_field_label(customer_cf1);
$customer_custom_field_label2 = get_custom_field_label(customer_cf2);
$customer_custom_field_label3 = get_custom_field_label(customer_cf3);
$customer_custom_field_label4 = get_custom_field_label(customer_cf4);


if ($_GET['action'] === 'view') {

	$display_block = <<<EOD
	<b>{$LANG_customer} :: <a href="index.php?module=customers&view=details&submit={$c_idField}&action=edit">{$LANG_edit}</a></b>
	<hr></hr>

	<table align="center">
	<tr>
		<td colspan="7" align="center"> </td>
	</tr>	
	<tr>
		<td colspan="4" align="center"><i>{$LANG_customer_details}</i></td>
		<td width="10%"></td>
		<td colspan="2" align="center"><i>{$LANG_summary_of_accounts}</i></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_customer} {$LANG_id}</td>
		<td>{$c_idField}</td><td colspan="2"></td><td></td>
		<td class="details_screen">{$LANG_total_invoices}</td><td>{$invoice_total_Field_formatted}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_customer_name}</td><td colspan="2">{$c_nameField}</td>
		<td colspan="2"></td><td class="details_screen">{$LANG_total_paid}</td>
		<td>{$invoice_paid_Field_formatted}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_attention_short} <a href="documentation/info_pages/customer_contact.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td>
		<td colspan="2">{$c_attentionField}</td><td colspan=2></td>
		<td class="details_screen">{$LANG_total_owing}</td><td><u>{$invoice_owing_Field}</u></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_street}</td><td>{$c_street_addressField}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_street2} <a href="./documentation/info_pages/street2.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td><td>{$c_street_address2Field}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_city}</td><td>{$c_cityField}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_zip}</td><td>{$c_zip_codeField}</td>
		<td class="details_screen">{$LANG_phone}</td><td>{$c_phoneField}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_state}</td><td>{$c_stateField}</td>
		<td class="details_screen">{$LANG_mobile_phone}</td><td>{$c_mobile_phoneField}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_country}</td><td>{$c_countryField}</td>
		<td class="details_screen">{$LANG_fax}</td><td>{$c_faxField}</td>
	</tr>
	<tr>
		<td class="details_screen">{$wording_for_enabledField}</td><td>{$wording_for_enabled}</td>
		<td class="details_screen">{$LANG_email}</td><td>{$c_emailField}</td>
	</tr>	
	</table>

EOD;

#show invoices per client
$sql = "select * from si_invoices where inv_customer_id =$customer_id  ORDER BY inv_id desc";

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
				<td class="details_screen">{$customer_custom_field_label1} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td><td>{$c_custom_field1Field}</td>
			</tr>
			<tr>
				<td class="details_screen">{$customer_custom_field_label2} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td><td>{$c_custom_field2Field}</td>
			</tr>
			<tr>
				<td class="details_screen">{$customer_custom_field_label3} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td><td>{$c_custom_field3Field}</td>
			</tr>
			<tr>
				<td class="details_screen">{$customer_custom_field_label4} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td><td>{$c_custom_field4Field}</td>
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
			{$c_notesField}
			</div>
			</p>
		</div>
	</div>

EOD;

#include('./manage_invoices.inc.php'); 

$footer = <<<EOD
<hr></hr>
	<a href="index.php?module=customers&view=details&submit={$c_idField}&action=edit">{$LANG_edit}</a>
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
		<td>{$c_idField}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_customer_name}</td>
		<td><input type="text" name="c_name" value="{$c_nameField}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_attention_short} <a href="documentation/info_pages/customer_contact.html" rel="ibox&height=400" ><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_attention" value="{$c_attentionField}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_street}</td>
		<td><input type="text" name="c_street_address" value="{$c_street_addressField}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_street2} <a href="./documentation/info_pages/street2.html" rel="ibox&height=400" ><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_street_address2" value="{$c_street_address2Field}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_city}</td>
		<td><input type="text" name="c_city" value="{$c_cityField}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_zip}</td>
		<td><input type="text" name="c_zip_code" value="{$c_zip_codeField}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_state}</td>
		<td><input type="text" name="c_state" value="{$c_stateField}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_country}</td>
		<td><input type="text" name="c_country" value="{$c_countryField}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_phone}</td>
		<td><input type="text" name="c_phone" value="{$c_phoneField}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_mobile_phone}</td>
		<td><input type="text" name="c_mobile_phone" value="{$c_mobile_phoneField}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_fax}</td>
		<td><input type="text" name="c_fax" value="{$c_faxField}" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG_email}</td>
		<td><input type="text" name="c_email" value="{$c_emailField}" size="50" /></td
	</tr>
	<tr>
		<td class="details_screen">{$customer_custom_field_label1} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_custom_field1" value="{$c_custom_field1Field}" size="50" /></td
	</tr>
	<tr>
		<td class="details_screen">{$customer_custom_field_label2} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_custom_field2" value="{$c_custom_field2Field}" size="50" /></td
	</tr>
	<tr>
		<td class="details_screen">{$customer_custom_field_label3} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_custom_field3" value="{$c_custom_field3Field}" size="50" /></td
	</tr>
	<tr>
		<td class="details_screen">{$customer_custom_field_label4} <a href="./documentation/info_pages/custom_fields.html" rel="ibox&height=400"><img src="./images/common/help-small.png"></img></a></td>
		<td><input type="text" name="c_custom_field4" value="{$c_custom_field4Field}" size="50" /></td
	</tr>
	<tr>
		<td class="details_screen">{$LANG_notes}</td>
		<td><textarea name="c_notes" rows="8" cols="50">{$c_notesField}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$wording_for_enabledField}</td><td>{$display_block_enabled}</td>
	</tr>

	</table>

EOD;

$footer = <<<EOD

	<hr></hr>
	<input type="submit" name="cancel" value="{$LANG_cancel}" />
	<input type="submit" name="save_customer" value="{$LANG_save} {$LANG_customer}" />
	<input type="hidden" name="op" value="edit_customer" />
EOD;
}

?>

<script type="text/javascript" src="include/jquery.js"></script>

<link rel="stylesheet" href="./include/css/tabs.css" type="text/css" media="print, projection, screen" />
	<!-- Additional IE/Win specific style sheet (Conditional Comments) -->
	<!--[if lte IE 7]>
	<link rel="stylesheet" href="./include/css/tabs-ie.css" type="text/css" media="projection, screen" />
	<![endif]-->
	<style type="text/css" media="screen, projection">
	    /* just to make this demo look a bit better */
	    h4 {
		margin: 0;
		padding: 0;
	    }
	    ul {
		list-style: none;
		
	    }
	    body>ul>li {
		display: inline;
	    }
	    body>ul>li:before {
		content: ", ";
	    }
	    body>ul>li:first-child:before {
		content: "";
	    }
	</style>
	<!-- Additional IE/Win specific style sheet (Conditional Comments) -->
	<!--[if lte IE 7]>
	<style type="text/css" media="screen, projection">
	    body {
		font-size: 100%; /* resizable fonts */
	    }
	</style>
	<![endif]-->

	<script src="./include/jquery.js" type="text/javascript"></script>
	<!-- script src="jquery.history.js" type="text/javascript"></script -->
	<script src="./include/jquery.tabs.js" type="text/javascript"></script>
	<script type="text/javascript">//<![CDATA[
	    $(document).ready(function() {
		$('#container-1').tabs();
		$('#trigger-tab').after('<p><a href="#" onclick="$(\'#container-1\').triggerTab(3); return false;">Activate third tab</a></p>');
		$('#custom-tab-by-hash').title('New window').click(function() {
		    var win = window.open(this.href, '', 'directories,location,menubar,resizable,scrollbars,status,toolbar');
		    win.focus();
		});
	    });
	//]]></script>

<script language="javascript" type="text/javascript" src="include/tiny_mce/tiny_mce_src.js"></script>
<script language="javascript" type="text/javascript" src="include/tiny-mce.conf.js"></script>

</head>
<body>


<?php

echo <<<EOD

<form name="frmpost" action="index.php?module=customers&view=save&submit={$_GET['submit']}" method="post" onsubmit="return frmpost_Validator(this)">
{$display_block}
{$footer}
EOD;
?>
</form>
<!-- ./src/include/design/footer.inc.php gets called here by controller srcipt -->
