<?php
echo "hola";
$mysqli = new mysqli("localhost", "german", "29214127", "genluTest");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
echo "todo ok";
printf("Host information: %s\n", $mysqli->host_info);

/* close connection */
$mysqli->close();
?> 
