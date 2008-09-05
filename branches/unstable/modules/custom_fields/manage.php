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


$sql = "SELECT * FROM ".TB_PREFIX."custom_fields ORDER BY cf_custom_field";

$result = mysqlQuery($sql, $conn) or die(mysql_error());
$number_of_rows = mysql_num_rows($result);

$cfs = null;

for($i=0; $cf = mysql_fetch_array($result);$i++) {
	$cfs[$i] = $cf;
	$cfs[$i]['filed_name'] = get_custom_field_name($cf['cf_custom_field']);
}

$smarty -> assign("cfs",$cfs);

getRicoLiveGrid("rico_custom_fields","{ type:'number', decPlaces:0, ClassName:'alignleft' }");
?>