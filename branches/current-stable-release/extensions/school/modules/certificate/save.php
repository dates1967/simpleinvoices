<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert product
$saved = false;

if (  $op === 'insert_certificate' ) 
{
	$sql = "insert into ".TB_PREFIX."certificate (id, name) VALUES (NULL,'$_POST[name]')";
	// Execute our query
	if (mysqlQuery($sql)) $saved=true;
}

if ($op === 'edit_certificate' ) 
{
	$sql = "update ".TB_PREFIX."certificate set name = \"$_POST[name]\" where id = \"$_GET[id]\" ";
	// Execute our query
	if (mysqlQuery($sql)) $saved=true;
}

$refresh_total = isset($refresh_total) ? $refresh_total : '&nbsp';


$pageActive = "certificate";
$smarty->assign('pageActive', $pageActive);
$smarty->assign('saved',$saved);
//$smarty -> assign('display_block',$display_block); 
//$smarty -> assign('refresh_total',$refresh_total); 

?>
