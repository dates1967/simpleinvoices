<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$id = $_GET['id'];


	$sql = "SELECT * FROM ".TB_PREFIX."subject where id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());
			
	$subject = mysql_fetch_array($query);
		

$pageActive = "options";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('subject',$subject);

?>
