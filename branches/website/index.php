<?php

$page = $_GET['page'];



if (($page != null )) {
	
	/*Check the $module for validitity - make sure no ones hacking the url */
	if (!ereg("^[a-zA-Z_/]+$",$page)) { 
        	die("Invalid page requested");
	}



	/*Check to make sure that the requested files exist*/
	if (file_exists("./src/$page.php")) {
	        include("./src/include/header.php");
	        include("./src/$page.php");
        	include("./src/include/footer.php");
	}
	else {
		include("./src/include/header.php");
		echo "The file that you requested doesn't exist";
		include("./src/include/footer.php");
	}
}

/*If all else fails show the start.php page */
else {
        include("./src/include/header.php");
        include("./src/start.php");
        include("./src/include/footer.php");
}

?>
