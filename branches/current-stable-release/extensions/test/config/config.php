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
$extension['test']['name'] = "test extension";
$extension['test']['description'] = "this is a test";
$extension['test']['enabled'] = "0";
// dev guys to enable extensions via your local.config.php file
*/
if($environment != "live")
{
    @include("./config/".htmlspecialchars($environment).".config.php");
}

?>
