<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$sql = "SELECT * FROM ".TB_PREFIX."certificate ORDER BY name";

$certificate = sql2array($sql) or die(mysql_error());

$pageActive = "certificate";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("certificate",$certificate);

getRicoLiveGrid("rico_product","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
