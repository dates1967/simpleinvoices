<?php
// Connecting, selecting database
$db = mysql_connect('localhost', 'root', '') or die('Could not connect: ' . mysql_error());
mysql_select_db('simple_invoices') or die('Could not select database');

if($_GET['id'])
{
	sleep(2);
	$sql = sprintf('SELECT * FROM si_products WHERE id = %d LIMIT 1', $_GET['id']);
	$states = mysql_query($sql) or die('Query Failed:' . mysql_error());
	$output = '';
	if(mysql_num_rows($states) > 0)
	{	
		$row = mysql_fetch_array($states);

	//	print_r($row);
	//		$output .= '<input id="state" class="field select two-third addr" value="'.$row['unit_price'].'"/>';
			$output .= $row['unit_price'];
	//		$output .= $_POST['id'];
		
	}
	else
	{
		$output .= '';
	}
	echo $output;
	
	mysql_free_result($states);
	mysql_close($db);
	exit();
} else {

echo "";
}

// Perform teh Queries!
$sql = 'SELECT * FROM si_products';
$country = mysql_query($sql) or die('Query Failed:' . mysql_error());


?>

