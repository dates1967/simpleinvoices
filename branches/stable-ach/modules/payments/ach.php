<?php

$id = simple_decrypt($_GET['id']);

$invoice = getInvoice($id);

$smarty -> assign("invoice",$invoice);
?>
