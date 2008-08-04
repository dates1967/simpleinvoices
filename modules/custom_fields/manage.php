<?php
/*
* Script: manage.php
* 	Custom fields manage page
*
* Authors:
*	 Justin Kelly, Nicolas Ruflin
*
* Last edited:
* 	 2007-07-19
*
* License:
*	 GPL v2 or above
*
* Website:
* 	http://www.simpleinvoices.org
 */

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

global $dbh;
$sql = "SELECT * FROM ".TB_PREFIX."custom_fields ORDER BY cf_custom_field";
$sth = dbQuery($sql) or die(end($dbh->errorInfo()));

$cfs = null;

$number_of_rows = 0;
for($i=0; $cf = $sth->fetch();$i++) {
	$cfs[$i] = $cf;
	$cfs[$i]['filed_name'] = get_custom_field_name($cf['cf_custom_field']);
	$number_of_rows = $i;
}

$pageActive = "options";

$smarty -> assign('pageActive', $pageActive);
$smarty -> assign("cfs",$cfs);

?>
