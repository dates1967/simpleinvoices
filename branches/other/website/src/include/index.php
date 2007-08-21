<?php
include('./config/config.php');
require_once('rss_fetch.inc');
	#show index page
	$conn = mysql_connect("$db_host","$db_user","$db_password"); mysql_select_db("$db_name",$conn);

	
	#get the title of the site
        $title = "select v_content from nc_variable where v_name ='title'";
        $print_title  = mysql_query($title , $conn) or die(mysql_error());

        while ($Array = mysql_fetch_array($print_title)) {
                $v_titleField = $Array['v_content'];

        };
	
	#get the motto - heading of the site
        $motto = "select v_content from nc_variable where v_name ='motto'";
        $print_motto  = mysql_query($motto , $conn) or die(mysql_error());

        while ($Array = mysql_fetch_array($print_motto)) {
                $v_mottoField = $Array['v_content'];

        };

	#get a listing of the pages
        $pages = "select * from nc_page ORDER BY p_name";
        $print_pages  = mysql_query($pages , $conn) or die(mysql_error());

        while ($Array = mysql_fetch_array($print_pages)) {
                $page_idField = $Array['p_id'];
                $pageField = $Array['p_name'];
                $page_is_linkField = $Array['p_link'];

		#if there is a url for a page - show the link(external) else show the normal link(internal)
		if (!empty($page_is_linkField))	
			{
			$display_block_pages .= "<a href='$page_is_linkField'>$pageField</a><br> ";
			}
		else 	
			{
			$display_block_pages .= "<a href='index.php?page=$page_idField'>$pageField</a><br>";
			}
		
        };

	
	/*Print the News page - get a listing of all the news and show if nicely */
	if ($_GET['news'] == all) {
                $news = "select * from nc_news ORDER BY nn_date DESC"; #put a limit here of 2(a variable which canbe set in the admin page
                $print_news = mysql_query($news , $conn) or die(mysql_error());

                while ($Array_news = mysql_fetch_array($print_news)) {
                        $nn_idField = $Array_news['nn_id'];
                        $nn_dayField = $Array_news['nn_day'];
                        $nn_monthField = $Array_news['nn_month'];
                        $nn_yearField = $Array_news['nn_year'];
                        $nn_dateField = $Array_news['nn_date'];
                        $nn_titleField = $Array_news['nn_title'];
                        $nn_subjectField = $Array_news['nn_subject'];
                        $nn_newsField = $Array_news['nn_news'];

                        $config_month['date_format']  = 'M';
                        #get the month
                        $month = date($config_month['date_format'], strtotime( $Array_news['nn_date'] ) );

                        #get the day
                        $config_day['date_format']  = 'j';
                        $day = date($config_day['date_format'], strtotime( $Array_news['nn_date'] ) );

                        #item description - only show first 20 characters and add ... to signify theres more text
                        $max_length = 200;
                        if (strlen($nn_newsField ) > $max_length ) {
                                $stripped_nn_newsField = substr($nn_newsField,0,200);
                                $stripped_nn_newsField  .= "<a href=\"index.php?news=$nn_idField\" class=\"readmoree\">[read more...]</a>";
                        }
                        else if (strlen($nn_newsField) <= $max_length ) {
                                 $stripped_nn_newsField = $nn_newsField;
                        }
                

                        $display_block .= "<div class=\"summary\"><div class=\"date\"><span>$day</span><small>$month</small></div><h1>$nn_subjectField</h1><h2>$nn_titleField</h2><p class=\"snippet\">$stripped_nn_newsField</p><div class=\"break\"></div></div> ";
                }
	}


	#get the content of tha select page

	else if (!empty($_GET['page'])) {

		$page_id = $_GET['page'];
		$sql = "select c_content from nc_content where c_page=$page_id";
		$print_index  = mysql_query($sql , $conn) or die(mysql_error());

		while ($Array_master_invoice = mysql_fetch_array($print_index)) {
	                $c_idField = $Array_master_invoice['c_id'];
	                $c_postField = $Array_master_invoice['c_content'];

		}

	        #get a listing of the pages
	        $page_name = "select * from nc_page where p_id=$page_id" ;
        	$print_page_name  = mysql_query($page_name , $conn) or die(mysql_error());

	        while ($Array = mysql_fetch_array($print_page_name)) {
	                $page_nameField = $Array['p_name'];
		}

		$display_block =  "<h1>$page_nameField</h1><br><br><p class=\"lead\">$c_postField</p>";

	}
	
	/*Show the RSS new feed from the trac mailing list */
        else if (!empty($_GET['rss'])) {

	        require_once('rss_fetch.inc');

	        define('MAGPIE_CACHE_DIR', './cache');
	        $rss = fetch_rss('http://feeds.feedburner.com/SimpleInvoicesGoogleGroup');
	        $display_block = "<h2><b>Community News:</b></h2><h2>A summary of the <a href='http://groups.google.com/group/simpleinvoices/'>Simple Invoices google group</a></h2>" ;
	        $display_block .= "Channel: " . $rss->channel['title']. "<br><br>" ;
	        $items = array_slice($rss->items, 0, 15);
	        foreach ($items as $item) {
	                $href = $item['link'];
	                $title = $item['title'];
	                $desc = $item['description'];
	                $display_block .=  "<p><a href=\"$href\">$title</a><br><br>";
	                if($desc)
	        if (strlen($desc) >= 225)
	        {
	                $desc = substr($desc,0,224)."...";
	        }
	        $display_block .= $desc;
	        $display_block .= "<br><br>";
	        }
	        ;
	
	
	        }

	/*Show the RSS new feed from the trac mailing list */
        else if (!empty($_GET['rss-trac'])) {

                require_once('rss_fetch.inc');

                define('MAGPIE_CACHE_DIR', './cache');
                $rss = fetch_rss('http://feeds.feedburner.com/SimpleInvoicesTracking');
	        $display_block = "<h1>Community News:</h1><h2>Issues tracking and Subversion commits auto tracking</h2>This is an automatic summary of the happenings in the Simple Invoices issue tracking system and our Subversion server commits(this is the when the developers make changes to the code)" ;
                $display_block .= "Channel: " . $rss->channel['title']. "<br><br>" ;
                $items = array_slice($rss->items, 0, 15);
                foreach ($items as $item) {
                        $href = $item['link'];
                        $title = $item['title'];
                        $desc = $item['description'];
                        $display_block .=  "<p><a href=\"$href\">$title</a><br><br>";
                        if($desc)
                if (strlen($desc) >= 225)
                {
                        $desc = substr($desc,0,224)."...";
                }
                $display_block .= "";
                $display_block .= $desc;
                $display_block .= "<br><br>";
                }
                ;


                }





	
	#Show the full contents of the individual news item 
	else if (!empty($_GET['news'])) {
		$nn_id = $_GET['news'];

		#get the news - if enabled - only show ion the index page
		$news = "select * from nc_news where nn_id = $nn_id"; #put a limit here of 2(a variable which canbe set in the admin page
		$print_news = mysql_query($news , $conn) or die(mysql_error());

		while ($Array_news = mysql_fetch_array($print_news)) {
			$nn_idField = $Array_news['nn_id'];
			$nn_dayField = $Array_news['nn_day'];
			$nn_monthField = $Array_news['nn_month'];
			$nn_yearField = $Array_news['nn_year'];
			$nn_dateField = $Array_news['nn_date'];
			$nn_titleField = $Array_news['nn_title'];
			$nn_subjectField = $Array_news['nn_subject'];
			$nn_newsField = $Array_news['nn_news'];
		
                        $config_month['date_format']  = 'M';
                        #get the month
                        $month = date($config_month['date_format'], strtotime( $Array_news['nn_date'] ) );

                        #get the day
                        $config_day['date_format']  = 'j';
                        $day = date($config_day['date_format'], strtotime( $Array_news['nn_date'] ) );

			$display_block .= "<div class=\"summary\"><div class=\"date\"><span>$day</span><small>$month</small></div><h1>$nn_subjectField</h1><h2>$nn_titleField</h2><p class=\"snippet\">$nn_newsField</p><div class=\"break\"></div></div> ";
		}
	}


        #Show the full contents of the individual news item
        else if (!empty($_GET['cust_search'])) {


                $display_block .= "


";
	

        }

        #Show the full contents of the individual news item
        else if (!empty($_GET['Documentation'])) {


		$fp = fopen("./demo/documentation/ReadMe.english_UK.html", "r" );
		if(!$fp)
		{
		    echo "Couldn't open the data file. Try again later.";
		    exit;
		}
		$filename ="./demo/documentation/ReadMe.english_UK.html";
                $display_block .= "<h1>Documentation</h1><br>";
		$display_block .= fread( $fp, filesize( $filename ) );

        }
        #Show the full contents of the individual news item
        else if (!empty($_GET['Lang_check'])) {


		$fp = fopen("http://simpleinvoices.googlecode.com/svn/trunk/lang/lang_check.html", "r" );
		if(!$fp)
		{
		    echo "Couldn't open the data file. Try again later.";
		    exit;
		}
		$filename ="./demo/documentation/ReadMe.english_UK.html";
                $display_block .= "<h1>Language file check</h1><br>";
		$display_block .= fread( $fp, filesize( $filename ) );

        }




        #Show the full contents of the individual news item
        else if (!empty($_GET['ChangeLog'])) {


                $fp = fopen("./demo/documentation/ChangeLog.html", "r" );
                if(!$fp)
                {
                    echo "Couldn't open the data file. Try again later.";
                    exit;
                }
                $filename ="./demo/documentation/ChangeLog.html";
                $display_block .= "<h1>Change Log</h1><br>";
                $display_block .= fread( $fp, filesize( $filename ) );

        }

      #Show the full contents of the individual news item
        else if (!empty($_GET['Credits'])) {


                $fp = fopen("./demo/documentation/Credits.html", "r" );
                if(!$fp)
                {
                    echo "Couldn't open the data file. Try again later.";
                    exit;
                }
                $filename ="./demo/documentation/Credits.html";
                $display_block .= "<h1>Credits</h1><br>";
                $display_block .= fread( $fp, filesize( $filename ) );

        }



	#If $page is empty show the default page 
	else  {
		$display_block = "
	
		<div id=\"mission\">
		<div class=\"box\">
		<div class=\"w1\"><div class=\"w2\"><div class=\"w3\"><div class=\"w4\">
		<!--<div class=\"announcement\"><div>--> <!-- rip the heading --> <b>$v_titleField</b><br>
		<!-- rip the moto -->
		<br>
		<p>$v_mottoField</p>
		<p><a href='index.php?page=2'>Read more ></a> &nbsp &nbsp &nbsp &nbsp &nbsp   
		<!-- rip the listing of pages -->



	<a href=\"images/imagebox/si_easy_invoice.png\" title=\"

<b>Easy invoice creation</b>
<br><br>
Creating an invoice in Simple Invoice is as simple as selecting a few options, enter a price, and click Save. It's that easy.

\" rel=\"imagebox-bw\">Quick Tour ></a>

	<a href=\"images/imagebox/si_inv_types.png\" class=\"tour\" title=\"
<b>Multiple invoice types</b>
<br><br>
One size doesn't fit all<br><br>
In Simple Invoices there are various types of invoices available, each suited to different organisations.

\" rel=\"imagebox-bw\"></a>

	<a href=\"images/imagebox/si_flexibility.png\" title=\"
<b>Flexibility</b>
<br><br>
Not limited to invoices.<br>
<br>
The flexibility of Simple Invoices allows you to easily change from creating invoices to estimates, receipts, quotes or whatever style of invoices you need as you can easily customise your own invoice style to suit your requirements
\" rel=\"imagebox-bw\"></a>

	<a href=\"images/imagebox/si_nice.png\" class=\"tour\" title=\"
<b>Easily create nice looking invoices</b>
<br><br>
Invoice can be printed a variety of nice looking templates to make your invoices all pretty :)
\" rel=\"imagebox-bw\"></a>

	<a href=\"images/imagebox/si_export.png\" class=\"tour\" title=\"

<b>Export</b>
<br><br>
You can export your invoices to a variety of formats including PDF, MS Word, and MS Excel
\" rel=\"imagebox-bw\"></a>

	<a href=\"images/imagebox/si_manage.png\" title=\"

<b>Manage your invoices</b>
<br><br>
From one simple screen you can manage all your invoices.  Monitor amounts owed to you, tracking the aging of unpaid invoices, sort and filter etc..
\" rel=\"imagebox-bw\"></a>

	<a href=\"images/imagebox/si_reports.png\" title=\"
<b>Reports</b>
<br><br>
Simple Invoices provides a number of reports allowing you to further analyse your information
\" rel=\"imagebox-bw\"></a>

	<a href=\"images/imagebox/si_free_software.jpg\" title=\"
<b>Free/Open-Source Software</b>
<br><br>
One of the main features of Simple Invoices is that its Free/Open-source Software licensed under the GNU GPL.<br><br>
What does this mean for you?<br><br>
It means that Simple Invoices is your software, your in control.  You can download Simple Invoices and install it on you PC/server/whatever and use it, modify it, redistribute for ever, whatever without having to pay some license fees or get a support contract.
\" rel=\"imagebox-bw\"></a>

	<a href=\"images/imagebox/si_community.jpg\" title=\"
<b>Community</b>
<br><br>
As Simple Invoices is Free/Open-source software its developmented in an open environment by the Simple Invoices community. <br><br> Jump on the forum to see the community in action, you can post ideas, bugs, whatever here and work on improving Simple Invoices.
\" rel=\"imagebox-bw\"></a>

	<a href=\"images/imagebox/si_more.jpg\" title=\"
<b>What, more?</b>
<br><br>
Theres still more to Simple Invoices, read the website, documentation and forums to find out more or go to the online demo site to give Simple Invoices a try - no install or downloads required
\" rel=\"imagebox-bw\"></a>

&nbsp &nbsp &nbsp &nbsp &nbsp <a href=\"http://www.simpleinvoices.org/demo\" title=\"online demo\">Online demo ></a>
</p>

<script type=\"text/javascript\">
$(document).ready(
	function()
	{
		$.ImageBox.init(
			{
				loaderSRC: 'images/imagebox/loading.gif',
				closeHTML: '<img class=\"tour\" src=\"images/imagebox/close.jpg\" />'
			}
		);
	}
);
</script>
		<script language=\"JavaScript\" type=\"text/javascript\">var client_id = 1;</script>


    

		</div>
		</div>
		</div>
		</div>
		</div>
		<!-- extra div for link issue -->
		</div>	
		<!--</div></div>-->
		<br>
		
<a href=\"#\" id=\"slick-slidetoggle\"  onClick=\"$('.rss_front').toggle();\" >
<br>
<!--<a href=\"\" class=\"rss_front_slide\"  >-->
<img src=\"http://www.feedburner.com/fb/images/pub/feed-icon16x16.png\" alt=\"\"
style=\"vertical-align:middle;border:0\"/> Subscribe via RSS or Email >> </a>
<br><br>
<div class=\"rss_front\">
RSS and Email alerts:

Want to automatically keep in touch with the latest happenings of Simple Invoices. You can subscribe (via either email or rss) to Simple Invoices Blog or Forum and be automically notified of News, Updates and new forum posts 

<table>
<tr>
 <td class=\"rss\">
<!--
 <div style=\"border: solid 2px #FF8800; text-align: center; width: 200px;\" id=\"preview\">
--> 
<form style=\"border: solid 1px #ccc ;padding:3px;text-align:center;\"
action=\"http://www.feedburner.com/fb/a/emailverify\" method=\"post\" target=\"popupwindow\"
onsubmit=\"window.open('http://www.feedburner.com', 'popupwindow',
'scrollbars=yes,width=550,height=520');return true\">


<b>Blog Notification
</b><p>Enter your email address:<br><input type=\"text\" style=\"width:140px\"
name=\"email\"/><input type=\"hidden\" value=\"http://feeds.feedburner.com/~e?ffid=662422\"
name=\"url\"/><input type=\"hidden\" value=\"Simple Invoices Blog\" name=\"title\"/><input
type=\"submit\" value=\"Subscribe\" /></p>

<p><a href=\"http://feeds.feedburner.com/SimpleInvoicesBlog\" rel=\"alternate\"
type=\"application/rss+xml\"><img
src=\"http://www.feedburner.com/fb/images/pub/feed-icon16x16.png\" alt=\"\"
style=\"vertical-align:middle;border:0\"/></a> <a
href=\"http://feeds.feedburner.com/SimpleInvoicesBlog\" rel=\"alternate\"
type=\"application/rss+xml\">Subscribe in a reader</a></p>
<a href=\"http://www.feedburner.com\" target=\"_blank\"><img
src=\"http://www.feedburner.com/fb/images/pub/powered_by_fb.gif\" alt=\"Powered by
FeedBurner\" style=\"border:0\"/></a>
</form>
<!--
</div>
-->
</td>

<td class=\"rss\" >
 
</td>
<td class=\"rss\">
<!--
 <div style=\"border: solid 2px #FF8800; text-align: center; width: 200px;\" id=\"preview\">
-->

<form style=\"border:solid 1px #ccc ;padding:3px;text-align:center;\" action=\"http://www.feedburner.com/fb/a/emailverify\" method=\"post\" target=\"popupwindow\" onsubmit=\"window.open('http://www.feedburner.com', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true\">

<b>Forum Posts Notification</b><p>Enter your email address:<br><input type=\"text\" style=\"width:140px\" name=\"email\"/><input type=\"hidden\" value=\"http://feeds.feedburner.com/~e?ffid=604613\" name=\"url\"/><input type=\"hidden\" value=\"Simple Invoices Forum Posts\" name=\"title\"/>
<input type=\"submit\" value=\"Subscribe\" /></p>
<p><a href=\"http://feeds.feedburner.com/SimpleInvoicesForum\" rel=\"alternate\"
type=\"application/rss+xml\"><img src=\"http://www.feedburner.com/fb/images/pub/feed-icon16x16.png\" alt=\"\" style=\"vertical-align:middle;border:0\"/></a> <a href=\"http://feeds.feedburner.com/SimpleInvoicesForum\" rel=\"alternate\"
type=\"application/rss+xml\">Subscribe in a reader</a></p>

<a href=\"http://www.feedburner.com\" target=\"_blank\"><img src=\"http://www.feedburner.com/fb/images/pub/powered_by_fb.gif\" alt=\"Powered by FeedBurner\" style=\"border:0\"/></a>

<!--
</div>
-->
</form>
</td>
<td class=\"rss\">

<b>RSS:</b>
<ul>
<li>
     <a href=\"http://feeds.feedburner.com/SimpleInvoicesBlog\"> 
     <img
src=\"http://www.feedburner.com/fb/images/pub/feed-icon16x16.png\" alt=\"\"
style=\"vertical-align:middle;border:0\"/> Blog</a>

<li>
     <a href=\"http://feeds.feedburner.com/SimpleInvoicesForum\"> 
     <img
src=\"http://www.feedburner.com/fb/images/pub/feed-icon16x16.png\" alt=\"\"
style=\"vertical-align:middle;border:0\"/> Forum posts</a>

<li> 
<a href=\"http://feeds.feedburner.com/SimpleInvoicesWikiEdits\">
<img src=\"http://www.feedburner.com/fb/images/pub/feed-icon16x16.png\" alt=\"\"
style=\"vertical-align:middle;border:0\"/> Wiki edits</a>

<li><a href=\"http://feeds.feedburner.com/SimpleInvoicesTracking\">
<img
src=\"http://www.feedburner.com/fb/images/pub/feed-icon16x16.png\" alt=\"\"
style=\"vertical-align:middle;border:0\"/> 
Subversion/Issue Tracking update
</a>
<li>
<a href=\"http://feeds.feedburner.com/SimpleInvoicesGoogleGroup\">
<img
src=\"http://www.feedburner.com/fb/images/pub/feed-icon16x16.png\" alt=\"\"
style=\"vertical-align:middle;border:0\"/>
Google group/Mailing list</a>
</ul>
</td>
</tr>
</table>

</div class=\"rss_front\">


		";


                $display_block.= "
        	<div id=\"main\">
	        <div id=\"threecol\">
	        <div id=\"content\" class=\"content-right\">
		<div id=\"squeeze\">
		<div class=\"node\">
		
		<div class=\"sticky\">
		<div class=\"w1\">
		<div class=\"w2\">
		<div class=\"w3\">
		<div class=\"w4\">     
			<div class=\"drupal-grey\">     		
				Community news:
				<hr></hr>
			</div>
				
		<table>
		<tr > 
			<td class=\"comm\">
		";


	

                define('MAGPIE_CACHE_DIR', '/var/cache');
                $rss = fetch_rss('http://feeds.feedburner.com/SimpleInvoicesBlog');
                $display_block .= "<div class=\"drupal-grey-terms\"><!-- Channel: -->Blog posts</div>";
                $items = array_slice($rss->items, 0, 5);
                foreach ($items as $item) {
                        $href = $item['link'];
                        $title = $item['title'];
                        $desc = $item['description'];
                        $display_block .=  "<li><a href=\"$href\">";

                       if($title)
                                if (strlen($title) >= 23)
                        {
                                $title = substr($title,0,23)."...";
                        }

                        $display_block .=  $title;
                        $display_block .=  "</a><br>";
                }

		 $display_block .=  "<br><a href =\"http://www.simpleinvoices.org/blog\">Read More</a>";






                 $display_block .=  "</td><td class=\"comm\">";


                define('MAGPIE_CACHE_DIR', '/var/cache');
                $rss = fetch_rss('http://feeds.feedburner.com/SimpleInvoicesForum');
                $display_block .= "<div class=\"drupal-grey-terms\"><!--Channel: -->Forum posts</div>";
                $items = array_slice($rss->items, 0, 5);
                foreach ($items as $item) {
                        $href = $item['link'];
                        $title = $item['title'];
                        $desc = $item['description'];
                        $display_block .=  "<li><a href=\"$href\">";

                       if($title)
                                if (strlen($title) >= 23)
                        {
                                $title = substr($title,0,23)."...";
                        }

                        $display_block .=  $title;
                        $display_block .=  "</a><br>";
                }

                 $display_block .=  "<br><a href =\"http://simpleinvoices.org/forum/\">Read More</a>";

                 $display_block .=  "</td><td class=\"comm\">";

                define('MAGPIE_CACHE_DIR', '/var/cache');
                $rss = fetch_rss('http://feeds.feedburner.com/SimpleInvoicesGoogleGroup');
                $display_block .= "<!--Channel: --><div class=\"rss_google_group\">Google Group";
                $items = array_slice($rss->items, 0, 5);
                foreach ($items as $item) {
                        $href = $item['link'];
                        $title = $item['title'];
                        $desc = $item['description'];
                        $display_block .=  "<li><a href=\"$href\">";

                       if($title)
                                if (strlen($title) >= 23)
                        {
                                $title = substr($title,0,23)."...";
                        }

                        $display_block .=  $title;
                        $display_block .=  "</a><br>";
		}

		 $display_block .=  "<br><a href=\"index.php?rss=1\">Read More</a>";
		 $display_block .=  "</div>";





                 $display_block .=  "</td></tr><tr><td class=\"comm\">";






		$display_block .=  "<br>More <a href='' align=right class=\"rss_more_slide\"> >> </a>

<!--

<a href='#' align=right onClick=\"$('.rss_more').toggle();\"> >> </a>
<a href='#' class=\"codeButtonB\"align=right  onClick=\"

$(\"a.codeButtonB\").click(function(){ find(\".rss_more\").slideUp(); });


\"> ++ </a>

<a href='' class=\"codeButtonB\"align=right  onClick=\"

$(\"a.codeButtonB\").click(function(){ $find(\".rss_more\").slideDown(); });


\"> -- </a>
-->

</td></tr><tr><td class=\"comm\">";



		
                define('MAGPIE_CACHE_DIR', '/var/cache');
                $rss = fetch_rss('http://feeds.feedburner.com/SimpleInvoicesTracking');
                $display_block .= "<div class=\"rss_more drupal-grey-terms\"><!-- Channel: -->SVN/Issue tracking</div><div class=\"rss_more\"><br>";
                $items = array_slice($rss->items, 0, 5);
                foreach ($items as $item) {
                        $href = $item['link'];
                        $title = $item['title'];
                        $desc = $item['description'];
                        $display_block .=  "<li><a href=\"$href\">";

                       if($title)
                                if (strlen($title) >= 23)
                        {
                                $title = substr($title,0,23)."...";
                        }

                        $display_block .=  $title;
                        $display_block .=  "</a><br>";
                }

		 $display_block .=  "<br><a href =\"index.php?rss-trac=1\">Read More</a>";

		$display_block .=  "</div>";

                 $display_block .=  "</td><td class=\"comm\">"; 


                define('MAGPIE_CACHE_DIR', '/var/cache');
                $rss = fetch_rss('http://feeds.feedburner.com/SimpleInvoicesWikiEdits');
                $display_block .= "<div class=\"rss_more drupal-grey-terms\"><!--Channel: --> Wiki edits</div><div class=\"rss_more\"><br>" ;
                $items = array_slice($rss->items, 0, 5);
                foreach ($items as $item) {
                        $href = $item['link'];
                        $title = $item['title'];
                        $desc = $item['description'];
                        $display_block .=  "<li><a href=\"$href\">";

                       if($title)
                                if (strlen($title) >= 23)
                        {
                                $title = substr($title,0,23)."...";
                        }

                        $display_block .=  $title;
                        $display_block .=  "</a><br>";
                }

                 $display_block .=  "<br><a href =\"http://simpleinvoices.org/wiki\">Read More</a></div>";



                 $display_block .=  "</td></tr></table>";





		 $display_block .=  "
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <!--</div></div>-->
                ";




		#get the news - if enabled - only show ion the index page
		$news = "select * from nc_news ORDER BY nn_date DESC LIMIT 0,10"; #put a limit here of 2(a variable which canbe set in the admin page
		$print_news = mysql_query($news , $conn) or die(mysql_error());

		while ($Array_news = mysql_fetch_array($print_news)) {
			$nn_idField = $Array_news['nn_id'];
			$nn_dayField = $Array_news['nn_day'];
			$nn_monthField = $Array_news['nn_month'];
			$nn_yearField = $Array_news['nn_year'];
			$nn_dateField = $Array_news['nn_date'];
			$nn_titleField = $Array_news['nn_title'];
			$nn_subjectField = $Array_news['nn_subject'];
			$nn_newsField = $Array_news['nn_news'];
		
			$config_month['date_format']  = 'M';
			#get the month
		        $month = date($config_month['date_format'], strtotime( $Array_news['nn_date'] ) );
			
			#get the day
			$config_day['date_format']  = 'j';
		        $day = date($config_day['date_format'], strtotime( $Array_news['nn_date'] ) );
			
			#item description - only show first 20 characters and add ... to signify theres more text
			$max_length = 200;
			if (strlen($nn_newsField ) > $max_length ) {
				$stripped_nn_newsField = substr($nn_newsField,0,200);
				$stripped_nn_newsField  .= "<a href=\"index.php?news=$nn_idField\" class=\"readmoree\">[read more...]</a>";
			}
			else if (strlen($nn_newsField) <= $max_length ) {
				 $stripped_nn_newsField = $nn_newsField;
			}
			
		
			$display_block .= "<div class=\"summary\"><div class=\"date\"><span>$day</span><small>$month</small></div><h1>$nn_subjectField</h1><h2>$nn_titleField</h2><p class=\"snippet\">$stripped_nn_newsField</p><div class=\"break\"></div></div> ";
		};

			$display_block .= "<a href=\"index.php?news=all\" class=\"readmoree\">[read more news posts...]</a>";
		

};
		

?>

<html>
<head>
<title><?php echo $v_titleField; ?></title>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-302564-1";
urchinTracker();
</script>

<!--
<style type="text/css" media="all">

@import "css/global.css";

</style>
-->


<script src="js/jquery.js" type="text/javascript"></script>

<script src="js/jtip.js" type="text/javascript"></script>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="interface.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
         // hides the customer and biller details as soon as the DOM is ready (a little sooner that page load)
          $('.rss_more').hide();
          $('.rss_front').hide();
        });


    </script>

    <script type="text/javascript">
        $(document).ready(function() {

  $('a.rss_front_slide').click(function() {
    $('.rss_front').slideToggle(400);
    return false;
  });

});
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

  $('a.rss_more_slide').click(function() {
    $('.rss_more').slideToggle(400);
    return false;
  });

});
    </script>




</head>
<link rel="stylesheet" type="text/css" href="softly.css"/>
<link rel="stylesheet" type="text/css" href="tour.css">

<body>

<!-- COMMENT OUT GOOGLE HEADER
<script type="text/javascript"><!--
google_ad_client = "pub-2634629393845914";
google_alternate_color = "FFFFFF";
google_ad_width = 728;
google_ad_height = 15;
google_ad_format = "728x15_0ads_al_s";
//2006-10-11: simpleinvoices.org header
google_ad_channel ="9048370076";
//--></script>
<!--
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
-->


<div class="header">


	<ul class="nav">
<li><a href="http://www.simpleinvoices.org/demo">online demo</a></li><li><a href="http://sourceforge.net/project/showfiles.php?group_id=164303">download</a></li><li><a href="index.php?page=11">get involved</a></li><li><a href="http://www.simpleinvoices.org/forum">forum</a></li><li><a href="http://www.simpleinvoices.org/blog">blog</a></li><li><a href="http://www.simpleinvoices.org/wiki">wiki</a></li></ul>



      
</div>


	<!--
	<div class="column">
	<div id="navigation">
	-->

	<div id="sidebar-left" class="sidebar-left">
	<div class="block block-user" id="block-user-0">
<br>
  <h2><span class="w1"><span class="w2">Menu</span></span></h2>

  <div class="content"><div class="w1"><div class="w2">

<!--<div class="nav">-->

<a href="index.php">Home</a><br>
<?php echo $display_block_pages; ?>
<br>
<!-- COMMENT OUT GOOGLE SIDE ADDS
<script type="text/javascript"><!--
google_ad_client = "pub-2634629393845914";
google_alternate_color = "DFEDF7";
google_ad_width = 120;
google_ad_height = 600;
google_ad_format = "120x600_as";
google_ad_type = "text";
//2006-10-11: simpleinvoices.org
google_ad_channel ="2257714552";
google_color_border = "DFEDF7";
google_color_bg = "DFEDF7";
google_color_link = "0000FF";
google_color_text = "000000";
google_color_url = "008000";
//--></script>
<!--
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
-->



</div>
</div>
</div>

</div>
</div>

<div class="end"></div>
</div>

</div>

<div class="body">

<!-- Flags and translation -->
<a title="Francais" href="http://translate.google.com/translate?u=http%3A%2F%2Fwww.simpleinvoices.org&langpair=en%7Cfr&hl=en&ie=UTF8"><img src="./flags/flag_fr.gif" alt="French"></img></a>

<a title=Chinese  href="http://translate.google.com/translate?u=http%3A%2F%2Fwww.simpleinvoices.org&langpair=en%7Czh-CN&hl=en&ie=UTF8/"><img src="./flags/flag_zh-CN.gif" alt="Chinese"></img></a>

<a title=Deutsch  href="http://translate.google.com/translate?u=http%3A%2F%2Fwww.simpleinvoices.org&langpair=en%7Cde&hl=en&ie=UTF8"><img src="./flags/flag_de.gif" alt="German"></img></a>

<a title="Italiano"  href="http://translate.google.com/translate?u=http%3A%2F%2Fwww.simpleinvoices.org&langpair=en%7Cit&hl=en&ie=UTF8"><img src="./flags/flag_it.gif" alt="Italian"></img></a>

<a title="Japanese"  href="http://translate.google.com/translate?u=http%3A%2F%2Fwww.simpleinvoices.org&langpair=en%7Cja&hl=en&ie=UTF8"><img src="./flags/flag_ja.gif" alt="Japan"></img></a>

<a title="Korean"  href="http://translate.google.com/translate?u=http%3A%2F%2Fwww.simpleinvoices.org&langpair=en%7Cko&hl=en&ie=UTF8"><img src="./flags/flag_ko.gif" alt="Korean"></img></a>

<a title="Portugese"  href="http://translate.google.com/translate?u=http%3A%2F%2Fwww.simpleinvoices.org&langpair=en%7Cpt&hl=en&ie=UTF8"><img src="./flags/flag_pt.gif" alt="Portugese"></img></a>

<a title="Espanol"  href="http://translate.google.com/translate?u=http%3A%2F%2Fwww.simpleinvoices.org&langpair=en%7Ces&hl=en&ie=UTF8/"><img src="./flags/flag_es.gif" alt="Espanol"></img></a>

<a title="Arabic" href="http://translate.google.com/translate?u=http%3A%2F%2Fwww.simpleinvoices.org&langpair=en%7Car&hl=en&ie=UTF8"><img src="./flags/flag_ar.gif" alt="Arabic"></img></a>



<!--
<br><br>
<hr noshade="noshade" size="3">
-->
<!-- rip the page heading - if enabled -->
<!-- rip the page contents -->

<?php 
/* Show the news sub section if on the home page 
	if (empty($_GET['page'])) {
		 echo $display_block_news; 
	}

	else if ($_GET['page'] == 1) {
	                 echo $display_block_news;
        }
*/
?>
<!-- Google Search Result Snippet Begins -->
<div id="results_003881727916329808794:gferstjtmxq"></div>
<script type="text/javascript">
  var googleSearchIframeName = "results_003881727916329808794:gferstjtmxq";
  var googleSearchFormName = "searchbox_003881727916329808794:gferstjtmxq";
  var googleSearchFrameWidth = 600;
  var googleSearchFrameborder = 0;
  var googleSearchDomain = "google.com";
  var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
<!-- Google Search Result Snippet Ends -->
          

<?php echo $display_block; ?>



          


</div>
</div>
</div>
</div>
</div>
<div class="footer">
<div><em>Simple Invoices</em> <small>is <a href="http://www.gnu.org/licenses/licenses.html#WhatIsCopyleft">copy-left</a> and released under the </small> <a href ="http://www.gnu.org/licenses/gpl.html">GNU GPL Version 2 or above</a></div>
<!--
 <a href="http://www.servage.net/?coupon=cust26647"><img src="http://images.servage.net/img/lottery/Neutral-Full-banner.gif" border="0"></a>
-->
<a href="http://sourceforge.net"><img src="http://sflogo.sourceforge.net/sflogo.php?group_id=164303&amp;type=1" width="88" height="30" border="0" alt="SourceForge.net Logo" /></a>
<!--
<a href="http://www.vim.org"><img src="http://www.vim.org/images/vim_created.gif" width="88" height="30" border="0" alt="Vim Logo" /></a>
-->
<!--
<a href="http://www.cvsdude.org"><img src="https://secure.cvsdude.org/image/cvsdude_tag.jpg" width="88" height="30" border="0" alt="Vim Logo" title="Version control and software project management provided by CVSDude"/></a><br />
-->
</div>
</div>
</div>


</body>
</html>








