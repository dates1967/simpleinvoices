<?php

/*
* Script: details.php
* 	Biller details page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-19
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$biller_id = $_GET['id'];

$biller = getBiller($biller_id);

/*drop down list code for invoice logo */

$files = getLogoList();

/*end logo stuff */

#get custom field labels
$customFieldLabel = getCustomFieldLabels();

$smarty->assign('biller', $biller);
/*
$smarty -> assign('enabled', array(
                                0 => $LANG[disabled],
				1 => $LANG[enabled]
			)
		);
 */
$smarty->assign('files', $files);
$smarty->assign('customFieldLabel', $customFieldLabel);

/*branch*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

$sql_sel = "select name from ".TB_PREFIX."branch where id = ".$biller['branch_id']; 
$branch_sql_sel = sql2array($sql_sel);
$smarty -> assign('branch_selected',$branch_sql_sel);

?>
