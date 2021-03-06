<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$SI_SYSTEM_DEFAULTS = new SimpleInvoices_Db_Table_SystemDefaults();
$SI_PAYMENT_TYPES = new SimpleInvoices_Db_Table_PaymentTypes();
$SI_CUSTOMERS = new SimpleInvoices_Db_Table_Customers();
$SI_TAX = new SimpleInvoices_Db_Table_Tax();
$SI_BILLER = new SimpleInvoices_Db_Table_Biller();
$SI_PREFERENCES = new SimpleInvoices_Db_Table_Preferences();

#system defaults query

$defaults = $SI_SYSTEM_DEFAULTS->fetchAll();

if ($_GET["submit"] == "line_items") {

	jsBegin();
	jsFormValidationBegin("frmpost");
	jsValidateifNum("def_num_line_items","Default number of line items");
	jsFormValidationEnd();
	jsEnd();

	$default = "line_items";

	$escaped = htmlsafe($defaults[line_items]);
	$value = <<<EOD
<input type="text" size="25" name="value" value="$escaped">
EOD;
	$description = "{$LANG['default_number_items']}";

}
else if ($_GET["submit"] == "rows_per_page") {

	jsBegin();
	jsFormValidationBegin("frmpost");
	jsValidateifNum("def_num_rows_per_page","Define number of rows per page");
	jsFormValidationEnd();
	jsEnd();

	$default = "rows_per_page";

	$escaped = htmlsafe($defaults[rows_per_page]);
	$value = <<<EOD
<input type="text" size="25" name="value" value="$escaped">
EOD;
	$description = "{$LANG['default_rows_per_page']}";

}
else if ($_GET["submit"] == "def_inv_template") {

	$default = "template";
	/*drop down list code for invoice template - only show the folder names in src/invoices/templates*/

    $handle=opendir(APPLICATION_PATH."/../sys/templates/invoices/");
	while ($template = readdir($handle)) {
		if ($template != ".." && $template != "." && $template !="logos" && $template !=".svn" && $template !="template.php" && $template !="template.php~" ) {
			$files[] = $template;
		}
	}
	closedir($handle);

    foreach($config->extension as $extension)
    {
        /*
        * If extension is enabled then continue and include the requested file for that extension if it exists
        */
        if($extension->enabled == "1") {
            $handle=opendir(APPLICATION_PATH.'/../sys/extensions/' . $extension->name . '/templates/invoices/');
            while ($template = readdir($handle)) {
                if ($template != ".." && $template != "." && $template !="logos" && $template !=".svn" && $template !="template.php" && $template !="template.php~" ) {
                    $files[] = $template;
                }
            }
            closedir($handle);
        }
    }


	sort($files);

	$escaped = htmlsafe($defaults[template]);
	$display_block_templates_list = <<<EOD
	<select name="value">
EOD;

	$display_block_templates_list .= <<<EOD
	<option selected value='$escaped' style="font-weight: bold" >$escaped</option>
EOD;

	foreach ( $files as $var )
	{
		$var = htmlsafe($var);
		$display_block_templates_list .= "<option value='$var' >";
		$display_block_templates_list .= $var;
		$display_block_templates_list .= "</option>";
	}


	$display_block_templates_list .= "</select>";

	/*end drop down list section */
	/*start validataion section */

	jsBegin();
	jsFormValidationBegin("frmpost");
	jsValidateRequired("def_inv_template","{$LANG['default_inv_template']}");
	jsFormValidationEnd();
	jsEnd();
	/*end validataion section */


	$description = $LANG['default_inv_template'];

	$value = $display_block_templates_list;
	//error_log($value);

}

else if ($_GET["submit"] == "biller") {

	$default = "biller";

	#biller query
	$billers = $SI_BILLER->fetchAllActive();

	if ($billers == null) {
		$display_block_biller = "<p><em>{$LANG['no_billers']}</em></p>";
	}
	else {

		$display_block_biller = '<select name="value">
			<option value="0"> </option>';

		foreach($billers as $biller) {

			$selected = $biller['id'] == $defaults['biller']?"selected style='font-weight: bold'":"";

			$escaped = htmlsafe($biller['name']);
			$display_block_biller .= <<<EOD
			<option $selected value="$biller[id]">$escaped</option>
EOD;
		}
		$display_block_biller .= "</select>";
	}

	$description = "{$LANG['biller_name']}";
	$value = $display_block_biller;
}


else if ($_GET["submit"] == "customer") {

	$default = "customer";
	$customers = $SI_CUSTOMERS->fetchAllActive();

	if ($customers == null) {
		//no records
		$display_block_customer = "<p><em>{$LANG['no_customers']}</em></p>";

	} else {
		//has records, so display them
		$display_block_customer = '<select name="value">
                <option value="0"> </option>';


		foreach($customers as $customer) {

			$selected = $customer['id'] == $defaults['customer']?"selected style='font-weight: bold'":"";


			$escaped = htmlsafe($customer['name']);
			$display_block_customer .= <<<EOD
			<option $selected value="$customer[id]">$escaped</option>
EOD;
		}
		$display_block_customer .= "</select>";

	}

	$description = "{$LANG['customer_name']}";
	$value = $display_block_customer;
}
else if ($_GET['submit'] == "tax") {
	$default = "tax";

	$taxes = $SI_TAX->fetchAllActive();

	if ($taxes == null) {
		//no records
		$display_block_tax = "<p><em>{$LANG['no_tax_rates']}</em></p>";

	} else {
		//has records, so display them

		$display_block_tax = <<<EOD
	        <select name="value">

                <option value='0'> </option>
EOD;


		foreach($taxes as $tax) {

			$selected = $tax['tax_id'] == $defaults['tax']?"selected style='font-weight: bold'":"";

			$escaped = htmlsafe($tax['tax_description']);
			$display_block_tax .= <<<EOD
			<option $selected value="$tax[tax_id]">$escaped</option>
EOD;
		}
	}

	$description = "{$LANG['tax']}";
	$value = $display_block_tax;
}
else if ($_GET["submit"] == "preference_id") {

	$pref = $SI_PREFERENCES->getPreferenceById($defaults['preference']);
	$preferences = $SI_PREFERENCES->fetchAllActive();

	if ($preferences == null) {
		//no records
		$display_block_preferences = "<p><em>{$LANG['no_preferences']}</em></p>";

	} else {
		$default = "preference";
		//has records, so display them
		$display_block_preferences = <<<EOD
	        <select name="value">

                <option value='0'> </option>
EOD;

		foreach($preferences as $preference) {

			$selected = $preference['pref_id'] == $defaults['preference']?"selected style='font-weight: bold'":"";

			$escaped = htmlsafe($preference['pref_description']);
			$display_block_preferences .= <<<EOD
			<option $selected value="{$preference['pref_id']}">
	                        $escaped</option>
EOD;
		}
	}

	$value = $display_block_preferences;
	$description = "{$LANG['inv_pref']}";

}
else if ($_GET["submit"] == "def_payment_type") {

	$defpay = $SI_PAYMENT_TYPES->getDefault();
	$payments = $SI_PAYMENT_TYPES->fetchAllActive();


	if ($payments == null) {
		//no records
		$display_block_payment_type = "<p><em>{$LANG['payment_type']}</em></p>";

	} else {
		$default = "payment_type";
		//has records, so display them
		$display_block_payment_type = <<<EOD
                <select name="value">

                <option value='0'> </option>
EOD;

		foreach($payments as $payment) {

			$selected = $payment['pt_id'] == $defaults['payment_type']?"selected style='font-weight: bold'":"";
			$escaped = htmlsafe($payment['pt_description']);
			$display_block_payment_type .= <<<EOD
			<option $selected value="{$payment['pt_id']}">
                        $escaped</option>
EOD;
		}
	}

	$description = "{$LANG['payment_type']}";
	$value = $display_block_payment_type;

}
else if ($_GET["submit"] == "delete") {

	$array = array(0 => $LANG['disabled'], 1=>$LANG['enabled']);
	$default = "delete";
	$description = $LANG['delete'];
	$value = dropDown($array, $defaults['delete']);
}
else if ($_GET['submit'] == "logging") {

	$array = array(0 => $LANG['disabled'], 1=>$LANG['enabled']);
	$default = "logging";
	$description = $LANG['logging'];
	$value = dropDown($array, $defaults[$default]);
}

else if($_GET['submit'] == "language") {
    $default = "language";
    $languages = getLanguageList($include_dir . 'sys/lang/');
    $system_defaults = new SimpleInvoices_Db_Table_SystemDefaults();
    $lang = $system_defaults->findByName('language');

    usort($languages,"compareNameIndex");

    $description = $LANG['language'];
    //print_r($languages);
    $value = "<select name='value'>";
    foreach($languages as $language) {
        $selected = "";
        if($language->shortname == $lang) {
            $selected = " selected ";
        }
        $value .= "<option $selected value='".htmlsafe($language->shortname)."'>".htmlsafe("$language->name ($language->englishname) ($language->shortname)")."</option>";
    }
    $value .= "</select>";
}
elseif ($_GET["submit"] == "tax_per_line_item") {

	$default = "tax_per_line_item";

	$escaped = htmlsafe($defaults[tax_per_line_item]);
	$value = <<<EOD
<input type="text" size="25" name="value" value="$escaped">
EOD;
	$description = "{$LANG['number_of_taxes_per_line_item']}";

}
else if ($_GET['submit'] == "inventory") {

	$array = array(0 => $LANG['disabled'], 1=>$LANG['enabled']);
	$default = "inventory";
	$description = $LANG['inventory'];
	$value = dropDown($array, $defaults[$default]);
}
else {
	$description = "{$LANG['no_defaults']}";
}


/*$smarty->assign('pageActive', $pageActive);
$smarty->assign('files', $files);
$smarty->assign('customFieldLabel', $customFieldLabel);
$smarty->assign('save', $save);
$smarty->assign('lang', $lang);
$smarty->assign('billers',$billers);*/
$smarty->assign('defaults', $defaults);
$smarty->assign('value',$value);
$smarty->assign('description',$description);
$smarty->assign('default',$default);



/**
 * Help function for sorting the language array by name
 */
function compareNameIndex($a,$b) {
	$a = $a->name."";
	$b = $b->name."";

	if($a > $b) {
		return 1;
	}
	return -1;
}

$smarty -> assign('pageActive', 'system_default');
$smarty -> assign('active_tab', '#setting');
