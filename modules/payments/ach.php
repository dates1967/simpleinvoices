<?php

$id = base64_url_decode($_GET['id']);

$strlen_key = strlen($config->encryption->default->key);
$strlen_id= strlen($id);
$strlen = $strlen_id - $strlen_key;
$id = substr($id,0,$strlen);

$invoice = getInvoice($id);

$smarty -> assign("invoice",$invoice);
?>
