<?php

#include('./include/include_main.php'); 
#include('./config/config.php'); 
#include("./lang/$language.inc.php");
include('./include/sql_patches.php');
#include('./include/menu.php');

//stop the direct browsing to this file - let index.php handle which files get displayed
checkLogin();



#Largest debtor query - start
if ($mysql > 4) {
	$sql = "
	SELECT	
	        {$tb_prefix}customers.c_id as ID,
	        {$tb_prefix}customers.c_name as Customer,
	        (select sum(inv_it_total) from {$tb_prefix}invoice_items,{$tb_prefix}invoices where  {$tb_prefix}invoice_items.inv_it_invoice_id = {$tb_prefix}invoices.inv_id and {$tb_prefix}invoices.inv_customer_id = ID) as Total,
	        (select IF ( isnull(sum(ac_amount)), '0', sum(ac_amount)) from {$tb_prefix}account_payments,{$tb_prefix}invoices where {$tb_prefix}account_payments.ac_inv_id = {$tb_prefix}invoices.inv_id and {$tb_prefix}invoices.inv_customer_id = ID) as Paid,
	        (select (Total - Paid)) as Owing
	FROM
	        {$tb_prefix}customers,{$tb_prefix}invoices,{$tb_prefix}invoice_items
	WHERE
	        {$tb_prefix}invoice_items.inv_it_invoice_id = {$tb_prefix}invoices.inv_id and {$tb_prefix}invoices.inv_customer_id = c_id
	GROUP BY
	        Owing DESC
	LIMIT 1;
	";

	$result = mysql_query($sql) or die(mysql_error());

	$debtor = mysql_fetch_array($result);
}
#Largest debtor query - end

#Top customer query - start

if ($mysql > 4) {
	$sql2 = "
	SELECT
		{$tb_prefix}customers.c_id as ID,
	        {$tb_prefix}customers.c_name as Customer,
       		(select sum(inv_it_total) from {$tb_prefix}invoice_items,{$tb_prefix}invoices where  {$tb_prefix}invoice_items.inv_it_invoice_id = {$tb_prefix}invoices.inv_id and {$tb_prefix}invoices.inv_customer_id = ID) as Total,
	        (select IF ( isnull(sum(ac_amount)), '0', sum(ac_amount)) from {$tb_prefix}account_payments,{$tb_prefix}invoices where {$tb_prefix}account_payments.ac_inv_id = {$tb_prefix}invoices.inv_id and {$tb_prefix}invoices.inv_customer_id = ID) as Paid,
	        (select (Total - Paid)) as Owing

	FROM
       		{$tb_prefix}customers,{$tb_prefix}invoices,{$tb_prefix}invoice_items
	WHERE
	        {$tb_prefix}invoice_items.inv_it_invoice_id = {$tb_prefix}invoices.inv_id and {$tb_prefix}invoices.inv_customer_id = c_id
	GROUP BY
	        Total DESC
	LIMIT 1;
";

	$result2 = mysql_query($sql2) or die(mysql_error());

	$customer = mysql_fetch_array($result2);
}
#Top customer query - end

#Top biller query - start
if ($mysql > 4) {
	
	$sql3 = "
	SELECT
		{$tb_prefix}biller.name,  
		sum({$tb_prefix}invoice_items.inv_it_total) as Total 
	FROM 
		{$tb_prefix}biller, {$tb_prefix}invoice_items, {$tb_prefix}invoices 
	WHERE 
		{$tb_prefix}invoices.inv_biller_id = {$tb_prefix}biller.b_id and {$tb_prefix}invoices.inv_id = {$tb_prefix}invoice_items.inv_it_invoice_id GROUP BY name ORDER BY Total DESC LIMIT 1;
	";

	$result3 = mysql_query($sql3) or die(mysql_error());

	$biller = mysql_fetch_array($result3);
}
#Top biller query - start


#Max patches applied - start
$sql4 = "
        SELECT
                count(sql_patch_ref) as count
        FROM 
                {$tb_prefix}sql_patchmanager
        ";

        $result4 = mysql_query($sql4) or die(mysql_error());

        while ($Array4 = mysql_fetch_array($result4)) {
                $max_patches_applied = $Array4['count'];
        };

#Top biller query - start

$display_block_notice .="<div>";

$display_block_notice .="<b align=center>$title</b><hr></hr>";

if ($mysql < 5) {
	$display_block_notice .=" 
		NOTE <a href='./documentation/info_pages/mysql4.html' rel='gb_page_center[450, 450]' ><img src='./images/common/help-small.png'></img></a> : As you are using Mysql 4 some features have been disabled<br>
	";
};

if (count($patch) > $max_patches_applied) {
        $display_block_notice .=" 
                NOTE <a href='./documentation/info_pages/database_patches.html' rel='gb_page_center[450, 450]'><img src='./images/common/help-small.png'></img></a> :   There are database patches that need to be applied, please select <a href=\"./index.php?module=options&view=database_sqlpatches \">'Database Upgrade Manager'</a> from the Options menu and follow the instructions<br>
        ";
};

/*
$display_block_notice .="
<script type=\"text/javascript\">
if( $.browser.msie() ) { // defaults to undefined
	document.write(\"
		NOTE: As you are using MS Internet Explorer, some features of Simple Invoices have been disabled, please use <a href='http://www.getfirefox.com'>Firefox</a> to enable all features\")
	// Do something... ;
}
</script>
";

$display_block_notice .="
<script type=\"text/javascript\">
if( $.browser.konqueror() ) { // defaults to undefined
        document.write(\"
		NOTE: As you are using Konqueror, some features of Simple Invoices have been disabled, please use <a href='http://www.getfirefox.com'>Firefox</a> to enable all features\")
}
</script>
";

$display_block_notice .="
<script type=\"text/javascript\">
if( $.browser.safari() ) { // defaults to undefined
        document.write(\"
		NOTE: As you are using Safari, some features of Simple Invoices may not work as expected, please use <a href='http://www.getfirefox.com'>Firefox</a> to enable all features\")
}
</script>
";

*/

$display_block_notice .="";

echo $display_block_notice;

echo <<<EOD
                <div id="list1">
                <h2><img src="./images/common/reports.png"></img>{$LANG['stats']}</h2>
                        <div id="item11">

                                <div class="title">{$LANG['stats_debtor']}</div>

                                <div class="content">
			
				$debtor[Customer]
                                </div>
                        </div>

                        <div id="item12">

                                <div class="title">{$LANG['stats_customer']}</div>

                                <div class="content">

				$customer[Customer];

                                </div>

                        </div>

                        <div id="item13">

                                <div class="title">{$LANG['stats_biller']}</div>

                                <div class="content">

				$biller[name]

                                </div>

                        </div>
                </div>


               <div id="list2">

                <h2><img src="./images/common/menu.png">{$LANG['shortcut']}</h2>

                        <div id="item21">
                                <div class="mytitle">{$LANG['getting_started']}</div>
                                <div class="mycontent">
                                      <table>
                                        <tr>
                                                <td width=10%>
                                        		<a href="index.php?module=documentation/inline_docs&view=inline_instructions#faqs-what">
								<img src="images/common/question.png"></img>
								 {$LANG['faqs_what']}
							</a>
                                		</td>		
						<td width=10%>
		                                        <a href="index.php?module=documentation/inline_docs&view=inline_instructions#faqs-need">
	                                                	<img src="images/common/question.png"></img>
								{$LANG['faqs_need']}
							</a>
                                		</td>		
					</tr>
					<tr>
						<td width=10%>
		                                        <a href="index.php?module=documentation/inline_docs&view=inline_instructions#faqs-how">
	                                                	<img src="images/common/question.png"></img>
								{$LANG['faqs_how']}
							</a>
                                		</td>		
						<td width=10%>
                		                        <a href="index.php?module=documentation/inline_docs&view=inline_instructions#faqs-types">
	                                                	<img src="images/common/question.png"></img>
								{$LANG['faqs_type']}
							</a>
                                		</td>		
					</tr>
					</table>
                                </div>
                        </div>

                        <div id="item22">
                                <div class="mytitle">{$LANG['create_invoice']}</div>
                                <div class="mycontent">
					<table>
					<tr>
						<td width=10%>
				                        <a href="index.php?module=invoices&view=itemised">
								<img src="images/common/itemised.png"></img>
								{$LANG['itemised_style']}
							</a>
                                		</td>		
						<td width=10%>
				        		<a href="index.php?module=invoices&view=total">
								<img src="images/common/total.png"></img>
								{$LANG['total_style']}
							</a>
						</td>
						<td width=10%>
		                                        <a href="index.php?module=invoices&view=consulting">
								<img src="images/common/consulting.png"></img>
								{$LANG['consulting_style']}
							</a>
                				</td>
					</tr>
					<tr>
						<td colspan=3 align=center class="align_center">
                		                        <a href="index.php?module=documentation/inline_docs&view=inline_instructions#faqs-types">
	                                                	<img src="images/common/question.png"></img>
								{$LANG['faqs_type']}
							</a>
                                		</td>		
					</tr>
					</table>
		                </div>
                        </div>
                        <div id="item23">
                                <div class="mytitle">{$LANG['manage_existing_invoice']}</div>
                                <div class="mycontent">
					<table>
					<tr>
						<td width=10% align=center class="align_center">
                                        		<a href="index.php?module=invoices&view=manage">
								<img src="images/common/manage.png"></img>
								{$LANG['manage_invoices']}
							</a>
						</td>
					</tr>
					</table>
                                </div>
                        </div>

                        <div id="item24">
                                <div class="mytitle">{$LANG['manage_data']}</div>
	                        <div class="mycontent">
	                                <table>
                                        <tr>
                                                <td width=10%>
		                                        <a href="index.php?module=customers&view=add">
                                                        	<img src="images/common/add.png"></img>
								{$LANG['insert_customer']}
							</a>
                                                </td>
                                                <td width=10%>
		                                        <a href="index.php?module=billers&view=add">
                                                        	<img src="images/common/add.png"></img>
								{$LANG['insert_biller']}
							</a>
						</td>
                                                <td width=10%>
                                		        <a href="index.php?module=products&view=add">
                                                        	<img src="images/common/add.png"></img>
								{$LANG['insert_product']}
							</a>
						</td>
					</tr>
					<tr>
                                                <td width=10%>
                		                        <a href="index.php?module=customers&view=manage">
                                                        	<img src="images/common/customers.png"></img>
								{$LANG['manage_customers']}
							</a>
						</td>
                                                <td width=10%>
                                        		<a href="index.php?module=billers&view=manage">
                                                        	<img src="images/common/biller.png"></img>
								{$LANG['manage_billers']}
							</a>
						</td>
                                                <td width=10%>
		                                        <a href="index.php?module=products&view=manage">
                                                        	<img src="images/common/products.png"></img>
								{$LANG['manage_products']}
							</a>
						</td>
					</tr>
					</table>
                                </div>
                        </div>
                        <div id="item25">
                                <div class="mytitle">{$LANG['options']}</div>
                                <div class="mycontent">
                                      <table>
                                        <tr>
                                                <td width=10%>
		                                        <a href="index.php?module=system_defaults&view=manage">
                                                        	<img src="images/common/defaults.png"></img>
								{$LANG['system_defaults']}
							</a>
						</td>
                                                <td width=10%>
                		                        <a href="index.php?module=tax_rates&view=manage">
                                                        	<img src="images/common/tax.png"></img>
								{$LANG['tax_rates']}
							</a>
						</td>
                                                <td width=10%>
		                                        <a href="index.php?module=preferences&view=manage">
                                                        	<img src="images/common/preferences.png"></img>
								{$LANG['invoice_preferences']}
							</a>
						</td>
						</tr>
						<tr>
                                                <td width=10%>
                                		        <a href="index.php?module=payment_types&view=manage">
                                                        	<img src="images/common/payment.png"></img>
								{$LANG['payment_types']}
							</a>
						</td>
                                                <td width=10%>
                		                        <a href="index.php?module=options&view=database_sqlpatches">
                                                        	<img src="images/common/upgrade.png"></img>
								{$LANG['database_upgrade_manager']}
							</a>
						</td>
                                                <td width=10%>
		                                        <a href="index.php?module=options&view=backup_database">
                                                        	<img src="images/common/backup.png"></img>
								{$LANG['backup_database']}
							</a>
						</td>
					</tr>
					</table>
                                </div>
                        </div>
                        <div id="item26">
                                <div class="mytitle">{$LANG['help']}</div>
                                <div class="mycontent">
                                      <table>
                                        <tr>
                                                <td width=10%>
                                        		<a href="index.php?module=documentation/inline_docs&view=inline_instructions#installation">
                                                        	<img src="images/common/help.png"></img>
								{$LANG['installation']}
							</a>
						</td>	
						<td width=10%>
                		                        <a href="index.php?module=documentation/inline_docs&view=inline_instructions#upgrading">
                                                        	<img src="images/common/help.png"></img>
								{$LANG['upgrading_simple_invoices']}
							</a>
						</td>	
					</tr>
					<tr>
						<td width=10% class="align_center" colspan="2">
		                                        <a href="index.php?module=documentation/inline_docs&view=inline_instructions#prepare">
                                                        	<img src="images/common/help.png"></img>
								{$LANG['prepare_simple_invoices']}
							</a>
						</td>	
					</tr>
					</table>
                                </div>
                                </div>
                        </div>
                        </div>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br>
EOD;



?>

