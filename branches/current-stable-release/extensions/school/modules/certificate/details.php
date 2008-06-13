<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$id = $_GET['id'];

function getCertificate($id) {
	
	global $LANG;
	$sql = "SELECT * FROM ".TB_PREFIX."certificate WHERE id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());
	$product = mysql_fetch_array($query);
	//	$product['wording_for_enabled'] = $product['enabled']==1?$LANG['enabled']:$LANG['disabled'];
	return $product;
}

$pageActive = "certificate";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('certificate',$getCert = getCertificate($id));
$smarty -> assign('customFieldLabel',$customFieldLabel);

?>
