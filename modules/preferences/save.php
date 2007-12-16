<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert invoice_preference
if (  $op === 'insert_preference' ) {

	$sql = "INSERT into
		".TB_PREFIX."preferences
	VALUES
		(
			NULL,
			:description,
			:currency_sign,
			:heading,
			:wording,
			:detail_heading,
			:detail_line,
			:payment_method,
			:payment_line1_name,
			:payment_line1_value,
			:payment_line2_name,
			:payment_line2_value,
			:enabled
		 )";
	if ($db_server == 'pgsql') {
		$sql = "INSERT into ".TB_PREFIX."preferences
		(
			pref_description,
			pref_currency_sign,
			pref_inv_heading,
			pref_inv_wording,
			pref_inv_detail_heading,
			pref_inv_detail_line,
			pref_inv_payment_method,
			pref_inv_payment_line1_name,
			pref_inv_payment_line1_value,
			pref_inv_payment_line2_name,
			pref_inv_payment_line2_value,
			pref_enabled
		)
		VALUES
		(
			:description,
			:currency_sign,
			:heading,
			:wording,
			:detail_heading,
			:detail_line,
			:payment_method,
			:payment_line1_name,
			:payment_line1_value,
			:payment_line2_name,
			:payment_line2_value,
			:enabled
		)";
	}

	if (dbQuery($sql,
	  ':description', $_POST['p_description'],
	  ':currency_sign', $_POST['p_currency_sign'],
	  ':heading', $_POST['p_inv_heading'],
	  ':wording', $_POST['p_inv_wording'],
	  ':detail_heading', $_POST['p_inv_detail_heading'],
	  ':detail_line', $_POST['p_inv_detail_line'],
	  ':payment_method', $_POST['p_inv_payment_method'],
	  ':payment_line1_name', $_POST['p_inv_payment_line1_name'],
	  ':payment_line1_value', $_POST['p_inv_payment_line1_value'],
	  ':payment_line2_name', $_POST['p_inv_payment_line2_name'],
	  ':payment_line2_value', $_POST['p_inv_payment_line2_value'],
	  ':enabled', $_POST['pref_enabled']
	  )) {
		$display_block = $LANG['save_preference_success'];
	} else {
		$display_block =  $LANG['save_preference_failure'];
	}

	//header( 'refresh: 2; url=manage_preferences.php' );
	$refresh_total = "<META HTTP-EQUIV=REFRESH CONTENT=2;URL=index.php?module=preferences&view=manage>";

}

#edit preference

else if (  $op === 'edit_preference' ) {

	if (isset($_POST['save_preference'])) {
		$sql = "UPDATE
				".TB_PREFIX."preferences
			SET
				pref_description = :description,
				pref_currency_sign = :currency_sign,
				pref_inv_heading = :heading,
				pref_inv_wording = :wording,
				pref_inv_detail_heading = :detail_heading,
				pref_inv_detail_line = :detail_line,
				pref_inv_payment_method = :payment_method,
				pref_inv_payment_line1_name = :line1_name,
				pref_inv_payment_line1_value = :line1_value,
				pref_inv_payment_line2_name = :line2_name,
				pref_inv_payment_line2_value = :line2_value,
				pref_enabled = :enabled
			WHERE
				pref_id = :id";

		if (dbQuery($sql,
		  ':description', $_POST['pref_description'],
		  ':currency_sign', $_POST['pref_currency_sign'],
		  ':heading', $_POST['pref_inv_heading'],
		  ':wording', $_POST['pref_inv_wording'],
		  ':detail_heading', $_POST['pref_inv_detail_heading'],
		  ':detail_line', $_POST['pref_inv_detail_line'],
		  ':payment_method', $_POST['pref_inv_payment_method'],
		  ':line1_name', $_POST['pref_inv_payment_line1_name'],
		  ':line1_value', $_POST['pref_inv_payment_line1_value'],
		  ':line2_name', $_POST['pref_inv_payment_line2_name'],
		  ':line2_value', $_POST['pref_inv_payment_line2_value'],
		  ':enabled', $_POST['pref_enabled'],
		  ':id', $_GET['submit'],
		  )) {
			$display_block = $LANG['save_preference_success'];
		} else {
			$display_block = $LANG['save_preference_failure'];
		}

		//header( 'refresh: 2; url=manage_preferences.php' );
		$refresh_total = "<META HTTP-EQUIV=REFRESH CONTENT=2;URL=index.php?module=preferences&view=manage>";

		}

	else if ($_POST[action] == "Cancel") {

		//header( 'refresh: 0; url=manage_preferences.php' );
		$refresh_total = "<META HTTP-EQUIV=REFRESH CONTENT=0;URL=index.php?module=preferences&view=manage>";
	}
}


$refresh_total = isset($refresh_total) ? $refresh_total : '&nbsp';

$pageActive = "options";
$smarty->assign('pageActive', $pageActive);

$smarty -> assign('display_block',$display_block); 
$smarty -> assign('refresh_total',$refresh_total); 
?>
