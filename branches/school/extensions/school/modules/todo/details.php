<?php
//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

#get the invoice id
$id = $_GET['id'];


	$sql = "SELECT * FROM ".TB_PREFIX."todo where id = $id";
	$query = mysqlQuery($sql) or die(mysql_error());
			
	$todo = mysql_fetch_array($query);
		

$pageActive = "todo";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign('todo',$todo);

$smarty -> assign('year',$year = year());
$smarty -> assign('year_now', substr( $todo['date'],0,4 ) );

$smarty -> assign('month',$month = month());
$smarty -> assign('month_now', substr( $todo['date'],5,2 ) );

$smarty -> assign('day',$day = day());
$smarty -> assign('day_now', substr( $todo['date'],8,2 ) );

?>
