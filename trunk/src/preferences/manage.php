<?php
include('./include/include_main.php');

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();



	$print_preferences = "SELECT * FROM {$tb_prefix}preferences ORDER BY pref_description";
	$result_print_preferences  = mysql_query($print_preferences, $conn) or die(mysql_error());


	if (mysql_num_rows($result_print_preferences) == 0) {
		$display_block = "<P><em>{$LANG_no_preferences}.</em></p>";
	} else {
		$display_block = <<<EOD

	<b>{$LANG_manage_preferences} ::
	<a href="index.php?module=preferences&view=add">{$LANG_add_new_preference}</a></b>

	<hr></hr>
	

	<table align="center" class="ricoLiveGrid manage" id="rico_preferences">
	<colgroup>
	<col style='width:10%;' />
	<col style='width:10%;' />
	<col style='width:40%;' />
	<col style='width:10%;' />
	</colgroup>
	<thead>
	<tr class="sortHeader">
	<th class="noFilter sortable">{$LANG_actions}</th>
	<th class="index_table sortable">{$LANG_preference_id}</th>
	<th class="index_table sortable">{$LANG_description}</th>
	<th class="noFilter index_table sortable">{$wording_for_enabledField}</th>
	</tr>
	</thead>

EOD;
  	while ($Array_preferences = mysql_fetch_array($result_print_preferences)) {
  		$pref_idField = $Array_preferences['pref_id'];
  		$pref_descriptionField = $Array_preferences['pref_description'];
  		$pref_currency_signField = $Array_preferences['pref_currency_sign'];
  		$pref_inv_headingField = $Array_preferences['pref_inv_heading'];
  		$pref_inv_wordingField = $Array_preferences['pref_inv_wording'];
  		$pref_inv_detail_headingField = $Array_preferences['pref_inv_detail_heading'];
  		$pref_inv_detail_lineField = $Array_preferences['pref_inv_detail_line'];
  		$pref_inv_payment_methodField = $Array_preferences['pref_inv_payment_method'];
  		$pref_inv_payment_line1_nameField = $Array_preferences['pref_inv_payment_line1_name'];
  		$pref_inv_payment_line1_valueField = $Array_preferences['pref_inv_payment_line1_value'];
  		$pref_inv_payment_line2_nameField = $Array_preferences['pref_inv_payment_line2_name'];
  		$pref_inv_payment_line2_valueField = $Array_preferences['pref_inv_payment_line2_value'];
  		$pref_enabledField = $Array_preferences['pref_enabled'];

  		if ($pref_enabledField == 1) {
  			$wording_for_enabled = $wording_for_enabledField;
  		} else {
  			$wording_for_enabled = $wording_for_disabledField;
  		}

  		$display_block .= <<<EOD
 		<tr class="index_table">
		<td class="index_table">
		<a class="index_table"
		href="index.php?module=preferences&view=details&submit={$pref_idField}&action=view">{$LANG_view}</a> ::
		<a class="index_table"
		href="index.php?module=preferences&view=details&submit={$pref_idField}&action=edit">{$LANG_edit}</a> </td>
		<td class="index_table">{$pref_idField}</td>
		<td class="index_table">{$pref_descriptionField}</td>
		<td class="index_table">{$wording_for_enabled}</td>
		</tr>

EOD;
		} // while
		$display_block .= "</table>";
	} // if

	
getRicoLiveGrid("rico_preferences","{ type:'number', decPlaces:0, ClassName:'alignleft' }");
echo $display_block;

?>

<a href="./documentation/info_pages/inv_pref_what_the.html" rel="gb_page_center[450, 450]"><img src="./images/common/help-small.png"></img> What's all this "Invoice Preference" stuff about?</a>
