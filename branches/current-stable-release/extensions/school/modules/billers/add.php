<?php

/*
* Script: add.php
* 	Billers add page
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

checkLogin();

$files = getLogoList();

$smarty->assign("files", $files);

#get custom field labels
$customFieldLabel = getCustomFieldLabels();

if ($_POST['name'] != "") {
	include ("./extensions/school/modules/billers/save.php");
}

$pageActive = "billers";

$smarty->assign('pageActive', $pageActive);
$smarty->assign('files', $files);
$smarty->assign('customFieldLabel', $customFieldLabel);
$smarty->assign('save', $save);

/*branch*/
$sql = "select * from ".TB_PREFIX."branch"; 
$branch_sql = sql2array($sql);
$smarty -> assign('branch',$branch_sql);

?>
