<?php

header("Content-type: text/xml");

$start = (isset($_POST['start'])) ? $_POST['start'] : "0" ;
$dir = (isset($_POST['sortorder'])) ? $_POST['sortorder'] : "ASC" ;
$sort = (isset($_POST['sortname'])) ? $_POST['sortname'] : "pref_description" ;
$rp = (isset($_POST['rp'])) ? $_POST['rp'] : "25" ;
$page = (isset($_POST['page'])) ? $_POST['page'] : "1" ;
$baseUrl = Zend_Registry::get('baseUrl');

function sql($type='', $dir, $sort, $rp, $page )
{
	global $config;
	global $LANG;
	global $auth_session;
	global $dbh;
	$start = (isset($_POST['start'])) ? $_POST['start'] : "0" ;
	$limit = (isset($limit))? $limit : "";
	//SC: Safety checking values that will be directly subbed in
	if (intval($start) != $start) {
		$start = 0;
	}
	if (intval($limit) != $limit) {
		$limit = 25;
	}

	/*SQL Limit - start*/
	$start = (($page-1) * $rp);
	$limit = "LIMIT $start, $rp";

	if($type =="count")
	{
		unset($limit);
		$limit = "";
	}
	/*SQL Limit - end*/

	if (!preg_match('/^(asc|desc)$/iD', $dir)) {
		$dir = 'ASC';
	}

	$query = $_POST['query'];
	$qtype = $_POST['qtype'];

	$where = " WHERE domain_id = :domain_id ";
	if ($query) $where = " WHERE domain_id = :domain_id AND $qtype LIKE '%$query%' ";


	/*Check that the sort field is OK*/
	$validFields = array('pref_id', 'pref_description','enabled');

	if (in_array($sort, $validFields)) {
		$sort = $sort;
	} else {
		$sort = "pref_description";
	}

		$sql = "SELECT
					pref_id,
					pref_description,
                    pref_description as translation,
					(SELECT (CASE  WHEN pref_enabled = 0 THEN '".$LANG['disabled']."' ELSE '".$LANG['enabled']."' END )) AS enabled
				FROM
					".TB_PREFIX."preferences
				$where
				ORDER BY
					$sort $dir
				$limit";

	$result = dbQuery($sql, ':domain_id', $auth_session->domain_id) or die(htmlsafe(end($dbh->errorInfo())));
	
	return $result;
}

$sth = sql('', $dir, $sort, $rp, $page);

$sth_count_rows = sql('count',$dir, $sort, $rp, $page);

$preferences = $sth->fetchAll(PDO::FETCH_ASSOC);
$count = $sth->rowCount();

$xml = "";
$xml .= "<rows>";
$xml .= "<page>$page</page>";
$xml .= "<total>$count</total>";

foreach ($preferences as $row) {
	$xml .= "<row id='".$row['pref_id']."'>";
	$xml .= "<cell><![CDATA[
		<a class='index_table' title='$LANG[view] $LANG[preference] ".$row['pref_description']."' href='index.php?module=preferences&view=details&id=$row[pref_id]&action=view'><img src='" . $baseUrl . "images/common/view.png' height='16' border='-5px' padding='-4px' valign='bottom' /></a>
		<a class='index_table' title='$LANG[edit] $LANG[preference] ".$row['pref_description']."' href='index.php?module=preferences&view=details&id=$row[pref_id]&action=edit'><img src='" . $baseUrl . "images/common/edit.png' height='16' border='-5px' padding='-4px' valign='bottom' /></a>
	]]></cell>";
//	$xml .= "<cell><![CDATA[".$row['pref_description']."]]></cell>";

    $dsc = (isset($LANG[$row['translation']]))? $LANG[$row['translation']] : $row['translation'] ;
    if ($dsc=='') {$dsc=$row['pref_description'];}

    $xml .= "<cell><![CDATA[".$dsc."]]></cell>";
	if ($row['enabled']==$LANG['enabled']) {
		$xml .= "<cell><![CDATA[<img src='" . $baseUrl . "images/common/tick.png' alt='".$row['enabled']."' title='".$row['enabled']."' />]]></cell>";
	}
	else {
		$xml .= "<cell><![CDATA[<img src='" . $baseUrl . "images/common/cross.png' alt='".$row['enabled']."' title='".$row['enabled']."' />]]></cell>";
	}
	$xml .= "</row>";
}
$xml .= "</rows>";

echo $xml;
