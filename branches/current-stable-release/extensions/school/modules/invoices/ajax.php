<?php

$menu=false;
if($_GET['id'])
{
    //sleep(2);aa

	for ($i = 1; $i <= 10; $i++) 
	{
    	if($i == "1")
		{
			$sql = sprintf('SELECT '.$i.' as row, start_date as start, payment_period_'.$i.'_end as end FROM si_products WHERE id = %d LIMIT 1', $_GET['id']);
		} else { 
		    $sql = sprintf('SELECT  '.$i.' as row,  payment_period_'.$i.'_start as start, payment_period_'.$i.'_end as end FROM si_products WHERE id = %d LIMIT 1', $_GET['id']);
		}
    $states = mysqlQuery($sql);
    $row = mysql_fetch_array($states);
//    $output .= $states_sql;

        	$json[] = array($row['row'] => $row['start']." to ".$row['end']." Period:".$row['row']  );
  //      	$json['end'] =  $row['end'];
   
	}

  echo json_encode( $json );
//    print_r ( $output );

    exit();
	
} else {

echo "";
}

// Perform teh Queries!
$sql = 'SELECT * FROM si_products';
$country = mysqlQuery($sql) or die('Query Failed:' . mysql_error());


?>
