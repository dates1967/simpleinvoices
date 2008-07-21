<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

	$search_sql ="";
	$i = 0;
if (!empty($_GET['action']))
{
	$search_sql =" WHERE";
}
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$search_sql .= " id = $id ";
		$i++;
	}
	if (!empty($_GET['name'])) {
		$i == 1 ? $and = "AND" : $and="";
		$search_sql .= " $and name like '%".$_GET['name']."%'";
	}

$sql = "SELECT * FROM ".TB_PREFIX."branch $search_sql ORDER BY name";

$module = sql2array($sql) or die(mysql_error());

$pageActive = "options";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("module",$module);

getRicoLiveGrid("rico_product","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
