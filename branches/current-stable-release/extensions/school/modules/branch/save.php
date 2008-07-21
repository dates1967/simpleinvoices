<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

# Deal with op and add some basic sanity checking

$op = !empty( $_POST['op'] ) ? addslashes( $_POST['op'] ) : NULL;


#insert product
$saved = false;

if (  $op === 'insert_branch' ) 
{
	$sql = "insert into ".TB_PREFIX."branch (id, name) VALUES (NULL,'$_POST[name]')";
	// Execute our query
	if (mysqlQuery($sql)) $saved=true;
}

if ($op === 'edit_branch' ) 
{
	$sql = "update ".TB_PREFIX."branch set name = \"$_POST[name]\" where id = \"$_GET[id]\" ";
	// Execute our query
	if (mysqlQuery($sql)) $saved=true;
}

$refresh_total = isset($refresh_total) ? $refresh_total : '&nbsp';


$pageActive = "options";
$smarty->assign('pageActive', $pageActive);
$smarty->assign('saved',$saved);
//$smarty -> assign('display_block',$display_block); 
//$smarty -> assign('refresh_total',$refresh_total); 

?>
