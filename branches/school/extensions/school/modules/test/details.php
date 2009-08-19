<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$id = $_GET['id'];

function getBranch($id) {
	
	global $LANG;
	$sql = "SELECT * FROM ".TB_PREFIX."test WHERE id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());
	$product = mysql_fetch_array($query);
	//	$product['wording_for_enabled'] = $product['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $product;
}

$pageActive = "school";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('test',$getModule = getBranch($id));
$smarty -> assign('customFieldLabel',$customFieldLabel);

?>
