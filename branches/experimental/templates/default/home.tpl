
<div>
<h3>{$title}</h3>
<hr />

<div id="accordian">
	<div id="list1">
	<h2><img src="./images/common/reports.png"></img>{$LANG.stats}</h2>
	
		<div id="item11">
			<div class="title">{$LANG.stats_debtor}</div>
			<div class="content">{$debtor.Customer}</div>
		</div>

		<div id="item12">
			<div class="title">{$LANG.stats_customer}</div>
			<div class="content">{$customer.Customer}</div>
		</div>

		<div id="item13">
			<div class="title">{$LANG.stats_biller}</div>
			<div class="content">{$biller.name}</div>
		</div>
	</div>

	<div id="list2">
	<h2><img src="./images/common/data.png">{$LANG.shortcut}</h2>

	<div id="item21">
	<div class="mytitle">{$LANG.getting_started}</div>
		<div class="mycontent">
			<table>
				<tr>
					<td>
						<a href="#"><img src="images/common/question.png"></img>{$LANG.faqs_what}</a>
					</td>		
					<td>
						<a href="#"><img src="images/common/question.png"></img>{$LANG.faqs_need}</a>
					</td>		
				</tr>
				<tr>
					<td>
						<a href="#"><img src="images/common/question.png"></img>{$LANG.faqs_how}</a>
					</td>		
					<td>
						<a href="#"><img src="images/common/question.png"></img>{$LANG.faqs_type}</a>
					</td>		
				</tr>
			</table>
		</div>
	</div>

	<div id="item22">
	<div class="mytitle">Manage Sales</div>
		<div class="mycontent">
			<table class="shortcut">
				<tr>
					<td class="c1">
						<a href="index.php?module=sales&view=manage"><img src="images/common/manage.png" /></a>
					</td>
					<td class="c2">
						<a href="index.php?module=sales&view=manage">Manage Sales Orders</a>
					</td>
					<td class="c3">
						<a href="index.php?module=sales&view=manage"><img src="images/common/manage.png" /></a>
					</td>
					<td class="c4">
						<a href="index.php?module=sales&view=manage">Manage Invoices</a>
					</td>
				</tr>
				<tr>
					<td class="c1">
						<a href="index.php?module=sales&view=create"><img src="images/common/document-new.png" /></a>
					</td>
					<td class="c2">
						<a href="index.php?module=sales&view=create">New Sales Order</a>
					</td>
					<td class="c3">
						<a href="index.php?module=sales&view=create"><img src="images/common/document-new.png" /></a>
					</td>
					<td class="c4">
						<a href="index.php?module=sales&view=create">New Invoice</a>
					</td>

				</tr>
			</table>
		</div>
	</div>

	<div id="item23">
	<div class="mytitle">Manage Purchases</div>
		<div class="mycontent">
			<table class="shortcut">
				<tr>
					<td class="c1">
						<a href="index.php?module=purchases&view=manage"><img src="images/common/manage.png" /></a>
					</td>
					<td class="c2">
						<a href="index.php?module=purchases&view=manage">Manage Purchase Orders</a>
					</td>
					<td class="c3">
						<a href="index.php?module=purchases&view=manage"><img src="images/common/manage.png" /></a>
					</td>
					<td class="c4">
						<a href="index.php?module=purchases&view=manage">Manage Purchases</a>
					</td>
				</tr>
				<tr>
					<td class="c1">
						<a href="index.php?module=purchases&view=create"><img src="images/common/document-new.png" /></a>
					</td>
					<td class="c2">
						<a href="index.php?module=purchases&view=create">New Purchase Order</a>
					</td>
					<td class="c3">
						<a href="index.php?module=purchases&view=create"><img src="images/common/document-new.png" /></a>
					</td>
					<td class="c4">
						<a href="index.php?module=purchases&view=create">New Purchase</a>
					</td>

				</tr>
			</table>
		</div>
	</div>

	<div id="item24">
	<div class="mytitle">Manage Customers</div>
		<div class="mycontent">
			<table class="shortcut">
				<tr>
					<td class="c1">
						<a href="index.php?module=customers&view=manage"><img src="images/common/contacts.png"></img></a>
					</td>
					<td class="c2">
						<a href="index.php?module=customers&view=manage">{$LANG.manage_customers}</a>
					</td>

					<td class="c3">
						<a href="index.php?module=customers&view=add"><img src="images/common/contact-new.png"></img></a>
					</td>
					<td class="c4">
						<a href="index.php?module=customers&view=add">Add New Customer</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div id="item25">
	<div class="mytitle">Manage Vendors</div>
		<div class="mycontent">
			<table class="shortcut">
				<tr>
					<td class="c1">
						<a href="index.php?module=vendors&view=manage"><img src="images/common/contacts.png"></img></a>
					</td>
					<td class="c2">
						<a href="index.php?module=vendors&view=manage">Manage Vendors</a>
					</td>

					<td class="c3">
						<a href="index.php?module=vendors&view=add"><img src="images/common/contact-new.png"></img></a>
					</td>
					<td class="c4">
						<a href="index.php?module=vendors&view=add">Add New Vendor</a>
					</td>
				</tr>
			</table>

		</div>
	</div>
	<div id="item26">
	<div class="mytitle">Manage Products</div>
		<div class="mycontent">
			<table class="shortcut">
				<tr>
					<td class="c1">
						<a href="index.php?module=products&view=manage"><img src="images/common/products.png" /></a>
					</td>
					<td class="c2">
						<a href="index.php?module=products&view=manage">{$LANG.manage_products}</a>
					</td>
					<td class="c3">
						<a href="index.php?module=products&view=add"><img src="images/common/product-new.png" /></a>
					</td>
					<td class="c4">
						<a href="index.php?module=products&view=add">Add New Product</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
		
	<div id="item27">
	<div class="mytitle">{$LANG.options}</div>
		<div class="mycontent">
			<table>
				<tr>
					<td>
						<a href="#"><img src="images/common/defaults.png"></img>{$LANG.system_defaults}</a>
					</td>
					<td>
						<a href="#"><img src="images/common/tax.png"></img>{$LANG.tax_rates}</a>
					</td>
					<td>
						<a href="#"><img src="images/common/preferences.png"></img>{$LANG.invoice_preferences}</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="#"><img src="images/common/payment.png"></img>{$LANG.payment_types}</a>
					</td>
					<td>
						<a href="#"><img src="images/common/upgrade.png"></img>{$LANG.database_upgrade_manager}</a>
					</td>
					<td>
						<a href="#"><img src="images/common/backup.png"></img>{$LANG.backup_database}</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
	
	<div id="item28">
	<div class="mytitle">{$LANG.help}</div>
		<div class="mycontent">
			<table>
				<tr>
					<td>
						<a href="#"><img src="images/common/help.png"></img>{$LANG.installation}</a>
					</td>	
					<td>
						<a href="#"><img src="images/common/help.png"></img>{$LANG.upgrading_simple_invoices}</a>
					</td>	
				</tr>
				<tr>
					<td class="align_center" colspan="2">
						<a href="#"><img src="images/common/help.png"></img>{$LANG.prepare_simple_invoices}</a>
					</td>	
				</tr>
			</table>
		</div>
	</div>
</div>
	
</div>
<br />
<br />
<br />
<br />
<br />
<br />
</div>
