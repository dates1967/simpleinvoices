<?php

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();

$courses = school_product::getCourses();
$pageActive = "course";

$smarty->assign('pageActive', $pageActive);
$smarty -> assign("courses",$courses);

getRicoLiveGrid("rico_courses","{ type:'number', decPlaces:0, ClassName:'alignleft' },,{ type:'number', decPlaces:2, ClassName:'alignleft' }");

?>
