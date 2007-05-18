

<div class="CFile CTopic" id=MainTopic><h1 class=CTitle><a name="Home"></a>Home</h1><div class=CBody><p class=CParagraph>Simple Invoices</p><p class=CParagraph>
a simple web based invoicing system designed to get the job done, Free/Open source software, community developed, no hype, no buzz words, and no whizzbang features you're never going to use.</p>
<p class=CParagraph>
<h4 class=CHeading align=center>
<a href="index.php?page=About">Read more &gt;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


	<a href="./src/include/images/imagebox/si_easy_invoice.png" title="

<b>Easy invoice creation</b>
<br><br>
Creating an invoice in Simple Invoice is as simple as selecting a few options, enter a price, and click Save. It's that easy.

" rel="imagebox-bw">Quick Tour ></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<a href="./src/include/images/imagebox/si_inv_types.png" class="tour" title="
<b>Multiple invoice types</b>
<br><br>
One size doesn't fit all<br><br>
In Simple Invoices there are various types of invoices available, each suited to different organisations.

" rel="imagebox-bw"></a>

	<a href="./src/include/images/imagebox/si_flexibility.png" title="
<b>Flexibility</b>
<br><br>
Not limited to invoices.<br>
<br>
The flexibility of Simple Invoices allows you to easily change from creating invoices to estimates, receipts, quotes or whatever style of invoices you need as you can easily customise your own invoice style to suit your requirements
" rel="imagebox-bw"></a>

	<a href="./src/include/images/imagebox/si_nice.png" class="tour" title="
<b>Easily create nice looking invoices</b>
<br><br>
Invoice can be printed a variety of nice looking templates to make your invoices all pretty :)
" rel="imagebox-bw"></a>

	<a href="./src/include/images/imagebox/si_export.png" class="tour" title="

<b>Export</b>
<br><br>
You can export your invoices to a variety of formats including PDF, MS Word, and MS Excel
" rel="imagebox-bw"></a>

	<a href="./src/include/images/imagebox/si_manage.png" title="

<b>Manage your invoices</b>
<br><br>
From one simple screen you can manage all your invoices.  Monitor amounts owed to you, tracking the aging of unpaid invoices, sort and filter etc..
" rel="imagebox-bw"></a>

	<a href="./src/include/images/imagebox/si_reports.png" title="
<b>Reports</b>
<br><br>
Simple Invoices provides a number of reports allowing you to further analyse your information
" rel="imagebox-bw"></a>

	<a href="./src/include/images/imagebox/si_free_software.jpg" title="
<b>Free/Open-Source Software</b>
<br><br>
One of the main features of Simple Invoices is that its Free/Open-source Software licensed under the GNU GPL.<br><br>
What does this mean for you?<br><br>
It means that Simple Invoices is your software, your in control.  You can download Simple Invoices and install it on you PC/server/whatever and use it, modify it, redistribute for ever, whatever without having to pay some license fees or get a support contract.
" rel="imagebox-bw"></a>

	<a href="./src/include/images/imagebox/si_community.jpg" title="
<b>Community</b>
<br><br>
As Simple Invoices is Free/Open-source software its developmented in an open environment by the Simple Invoices community. <br><br> Jump on the forum to see the community in action, you can post ideas, bugs, whatever here and work on improving Simple Invoices.
" rel="imagebox-bw"></a>

	<a href="./src/include/images/imagebox/si_more.jpg" title="
<b>What, more?</b>
<br><br>
Theres still more to Simple Invoices, read the website, documentation and forums to find out more or go to the online demo site to give Simple Invoices a try - no install or downloads required
" rel="imagebox-bw"></a>

<a href="http://www.simpleinvoices.org/demo">Online demo &gt;</a></p></h4></div></div>
</p>

<script type="text/javascript">
$(document).ready(
	function()
	{
		$.ImageBox.init(
			{
				loaderSRC: './src/include/images/imagebox/loading.gif',
				closeHTML: '<img class="tour" src="./src/include/images/imagebox/close.jpg" />'
			}
		);
	}
);
</script>
		<script language="JavaScript" type="text/javascript">var client_id = 1;</script>


    





<div class="CFunction CTopic"><h3 class=CTitle>Community News</h3></div>         
<h4 class=CHeading>Blog posts</h4>
<?php
	require_once('src/include/rss_fetch.inc');
	error_reporting(E_ERROR);
                define('MAGPIE_CACHE_DIR', '/var/cache');
                $rss = fetch_rss('http://feeds.feedburner.com/SimpleInvoicesBlog');
		if ( $rss ) {
                $display_block .= "<ul class=CBulletList>";
                $items = array_slice($rss->items, 0, 5);
                foreach ($items as $item) {
                        $href = $item['link'];
                        $title = $item['title'];
                        $desc = $item['description'];
			$date = $item['date_timestamp'];
			$published = date("d M", $date);
                        $display_block .=  "<li><a href=\"$href\">$published: ";

                       if($title)
                                if (strlen($title) >= 123)
                        {
                                $title = substr($title,0,123)."...";
                        }

                        $display_block .=  $title;
                        $display_block .=  "</a><br>";
                }
		}

		else {
		    echo "An error occured! - Could grab the rss feed "; 
		}


		 $display_block .=  "</ul><p class=CParagraph><a href =\"http://www.simpleinvoices.org/blog\">Read More</a></p>";
		
		echo $display_block;
?>

<h4 class=CHeading>Forum posts</h4>         
<?php
        require_once('src/include/rss_fetch.inc');
		$display_block ="";
	require_once('src/include/rss_fetch.inc');
                define('MAGPIE_CACHE_DIR', '/var/cache');
                $rss = fetch_rss('http://feeds.feedburner.com/SimpleInvoicesForum');
		if ( $rss ) {
                $display_block .= "<ul class=CBulletList>";
                $items = array_slice($rss->items, 0, 5);
                foreach ($items as $item) {
                        $href = $item['link'];
                        $title = $item['title'];
                        $desc = $item['description'];
			$date = $item['date_timestamp'];
			$published = date("d M", $date);
                        $display_block .=  "<li><a href=\"$href\">$published: ";

                       if($title)
                                if (strlen($title) >= 123)
                        {
                                $title = substr($title,0,123)."...";
                        }

                        $display_block .=  $title;
                        $display_block .=  "</a><br>";
                }

                 $display_block .=  "</ul><p class=CParagraph><a href =\"http://simpleinvoices.org/forum/\">Read More</a></p>";
		}

            else {
                    echo "An error occured! - Could grab the rss feed ";
                }
		echo $display_block;
?>



<h4 class=CHeading>Simple Invoices news via RSS or Email</h4>         
<table class=CDescriptionList>
<tr>
 <td class="rss CDLEntry">
<!--
 <div style="border: solid thick #FF8800; text-align: center; width: 200px;" id="preview">
--> 
<form style="border: solid thick #FF8800 ;padding:3px;text-align:center;"
action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow"
onsubmit="window.open('http://www.feedburner.com', 'popupwindow',
'scrollbars=yes,width=550,height=520');return true">


<b>Blog Notification
</b><p>Enter your email address:<br><input type="text" style="width:140px"
name="email"/><input type="hidden" value="http://feeds.feedburner.com/~e?ffid=662422"
name="url"/><input type="hidden" value="Simple Invoices Blog" name="title"/><input
type="submit" value="Subscribe" /></p>

<p><a href="http://feeds.feedburner.com/SimpleInvoicesBlog" rel="alternate"
type="application/rss+xml"><img
src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt=""
style="vertical-align:middle;border:0"/></a> <a
href="http://feeds.feedburner.com/SimpleInvoicesBlog" rel="alternate"
type="application/rss+xml">Subscribe in a reader</a></p>
<a href="http://www.feedburner.com" target="_blank"><img
src="http://www.feedburner.com/fb/images/pub/powered_by_fb.gif" alt="Powered by
FeedBurner" style="border:0"/></a>
</form>
<!--
</div>
-->
</td>

<td class="rss CDLEntry">
 
 
 
 
</td>
<td class="rss  CDLEntry">
<!--
 <div style="border: solid thick #FF8800; text-align: center; width: 200px;" id="preview">
-->
<form style="border:solid thick #FF8800;padding:3px;text-align:center;"
action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow"
onsubmit="window.open('http://www.feedburner.com', 'popupwindow',
'scrollbars=yes,width=550,height=520');return true">


<b>Forum Posts Notification</b><p>Enter your email address:<br><input type="text"
style="width:140px"
name="email"/><input type="hidden" value="http://feeds.feedburner.com/~e?ffid=604613"
name="url"/><input type="hidden" value="Simple Invoices Forum Posts" name="title"/><input
type="submit" value="Subscribe" /></p>

<p><a href="http://feeds.feedburner.com/SimpleInvoicesForum" rel="alternate"
type="application/rss+xml"><img
src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt=""
style="vertical-align:middle;border:0"/></a> <a
href="http://feeds.feedburner.com/SimpleInvoicesForum" rel="alternate"
type="application/rss+xml">Subscribe in a reader</a></p>
<a href="http://www.feedburner.com" target="_blank"><img
src="http://www.feedburner.com/fb/images/pub/powered_by_fb.gif" alt="Powered by
FeedBurner" style="border:0"/></a>
<!--
</div>
-->
</form>
</td>
</tr>
</table>

</div><!--Content end-->
