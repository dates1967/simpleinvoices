<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$id = $_GET['id'];

function getBranch($id) {
	
	global $LANG;
	$sql = "SELECT * FROM ".TB_PREFIX."branch WHERE id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());
	$product = mysql_fetch_array($query);
	//	$product['wording_for_enabled'] = $product['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $product;
}

$pageActive = "options";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('branch',$getModule = getBranch($id));
$smarty -> assign('customFieldLabel',$customFieldLabel);

?>
