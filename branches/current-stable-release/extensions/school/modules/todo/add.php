<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();


#get custom field labels
//$customFieldLabel = getCustomFieldLabels();

//if valid then do save
if ($_POST['description'] != "" ) {
	include("./extensions/school/modules/todo/save.php");
}
$pageActive = "todo";

$smarty->assign('pageActive', $pageActive);
//$smarty -> assign('customFieldLabel',$customFieldLabel);
$smarty -> assign('save',$save);

$smarty -> assign('year',$year = year());
$smarty -> assign('year_now',$year_now = date('Y') );

$smarty -> assign('month',$month = month());
$smarty -> assign('month_now',$month = date('m') );

$smarty -> assign('day',$day = day());
$smarty -> assign('day_now',$day = date('d') );
?>
