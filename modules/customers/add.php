<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$customFieldLabel = getCustomFieldLabels("customer");

//if valid then do save
if ($_POST['c_name'] != "" ) {
	include("./modules/customers/save.php");
}

$smarty -> assign('customFieldLabel',$customFieldLabel);
$smarty -> assign('save',$save);
?>
