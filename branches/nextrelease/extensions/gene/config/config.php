<?php

####################
/* Extensions */
####################
/*
* For extension developers
* Add the following style into the config/config.php file within your extensions directory
*/
//1 = enabled 0 = disabled
//name is the director in ./extensions which it lives
/*
$extension['gene']['name'] = "gene";
$extension['gene']['description'] = "gene's purchase order based system extension";
$extension['gene']['enabled'] = "1";
*/
$extension['invoice_class_name'] = "gene_invoice";


// dev guys to enable extensions via your local.config.php file

if($environment != "live")
{
    @include("./extensions/gene/config/".htmlspecialchars($environment).".config.php");
}

?>
