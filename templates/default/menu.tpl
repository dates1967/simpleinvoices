
<div id="Header">
	<div id="Tabs">
		<ul id="navmenu">
			<li><a href="index.php">{$LANG.home}</a></li>
			<li><a href="index.php?module=customers&view=manage">{$LANG.customers} +</a>
				<ul>
					<li><a href="index.php?module=customers&view=manage">{$LANG.manage_customers}</a></li>
					<li><a href="index.php?module=customers&view=add">{$LANG.add_customer}</a></li>
				</ul>
			</li>
			<li><a href="index.php?module=vendors&view=manage">Vendors +</a>
				<ul>
					<li><a href="index.php?module=vendors&view=manage">Manage Vendors</a></li>
					<li><a href="index.php?module=vendors&view=add">Add new Vendor</a></li>
				</ul>
			</li>
			<li><a href="index.php?module=sales&view=manage">Sales +</a>
				<ul>
					<li><a href="index.php?module=sales&view=manage">{$LANG.manage_invoices}</a></li>
					<li></li>
					<li><a href="index.php?module=sales&view=create">Invoice :: New</a></li>
					<li><a href="index.php?module=sales&view=manage">Manage Sales Orders</a></li>
					<li><a href="index.php?module=sales&view=create">Sales Order :: New</a></li>
				</ul>
			</li>
			<li><a href="index.php?module=purchases&view=manage">Purchases +</a>
				<ul>
					<li><a href="index.php?module=purchases&view=manage">Manage Purchases</a></li>
					<li><a href="index.php?module=purchases&view=create">Purchase Order :: New</a></li>
					<li><a href="index.php?module=purchases&view=enter">Purchase :: Receive</a></li>
				</ul>
			</li>

			<li><a href="index.php?module=products&view=manage">Inventory +</a>
				<ul>
					<li><a href="index.php?module=products&view=manage">{$LANG.manage_products}</a></li>
					<li><a href="index.php?module=products&view=add">{$LANG.add_product}</a></li>
				</ul>
			</li>

			<li><a href="index.php?module=payments&view=manage">{$LANG.payments} +</a>
				<ul>
					<li><a href="index.php?module=payments&view=manage">{$LANG.manage_payments}</a></li>
					<li><a href="index.php?module=payments&view=process&op=pay_invoice">{$LANG.process_payment}</a></li>
				</ul>
			</li>
			<li>
			<a href="index.php?module=reports&view=show">{$LANG.reports} +</a>
				<ul>
					<li>
<a href="index.php?module=reports&view=show&request=price_list&param=A">Price List Level A</a>
					</li>
					<li>
<a href="index.php?module=reports&view=show&request=price_list&filter=swiss&param=A">Swiss Army Level A</a>
					</li>
					<li>
<a href="index.php?module=reports&view=show&request=price_list&filter=swiss&param=B">Swiss Army Level B</a>
					</li>
					<li>
<a href="index.php?module=reports&view=show&request=price_list&filter=swiss&param=C">Swiss Army Level C</a>
					</li>
					<li>
<a href="index.php?module=reports&view=show&request=bank_info">Company Bank Information</a>
					</li>
				</ul>
			</li>
			<li><a href="#">{$LANG.options} +</a>
				<ul>
					<li>
						<a href="./index.php?module=system_defaults&view=manage">{$LANG.system_defaults}</a>
					</li>
					<li>
						<a href="./index.php?module=custom_fields&view=manage">{$LANG.custom_fields_upper}</a>
					</li>
					<li></li>
					<li>
						<a href="./index.php?module=tax_rates&view=manage">{$LANG.tax_rates} +</a>
						<ul>
							<li>
								<a href="./index.php?module=tax_rates&view=manage">{$LANG.manage_tax_rates}</a>
							</li>
							<li>
								<a href="./index.php?module=tax_rates&view=add">{$LANG.add_tax_rate}</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="./index.php?module=preferences&view=manage">{$LANG.invoice_preferences} +</a>
						<ul>
							<li>
								<a href="./index.php?module=preferences&view=manage">{$LANG.manage_invoice_preferences}</a>
							</li>
							<li>
								<a href="./index.php?module=preferences&view=add">{$LANG.add_invoice_preference}</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="./index.php?module=payment_types&view=manage">{$LANG.payment_types} +</a>
						<ul>
							<li>
								<a href="./index.php?module=payment_types&view=manage">{$LANG.manage_payment_types}</a>
							</li>
							<li>
								<a href="./index.php?module=payment_types&view=add">{$LANG.add_payment_type}</a>
							</li>
						</ul>
					</li>
					<li></li>
					<li>
						<a href="./index.php?module=options&view=manage_sqlpatches">{$LANG.database_upgrade_manager}</a>
					</li>
					<li>
						<a href="./index.php?module=options&view=backup_database">{$LANG.backup_database}</a>
					</li>
					<li></li>
					<li>
						<a href="docs.php?p=ReadMe">{$LANG.help} +</a>
						<ul>
							<li>
								<a href="docs.php?p=ReadMe#installation">{$LANG.installation}</a>
							</li>
							<li>
								<a href="docs.php?p=ReadMe#upgrading">{$LANG.upgrading_simple_invoices}</a>
							</li>
							<li><a href="docs.php?p=ReadMe#prepare">{$LANG.prepare_simple_invoices}</a>
							</li>
							<li><a href="docs.php?p=ReadMe#use">{$LANG.using_simple_invoices}</a>
							</li>
							<li><a href="docs.php?p=ReadMe#faqs">{$LANG.faqs}</a></li>
							<li><a href="index.php?module=options&view=help">{$LANG.get_help}</a></li>
						</ul>
					</li>
					<li><a href="index.php?module=documentation/inline_docs&view=about">{$LANG.about} +</a>
						<ul>
							<li><a href="docs.php?p=about">{$LANG.about}</a></li>
							<li><a href="docs.php?p=ChangeLog">{$LANG.change_log}</a></li>
							<li><a href="docs.php?p=Credits">{$LANG.credits}</a></li>
							<li><a href="docs.php?p=gpl">{$LANG.license}</a></li>
						</ul>
					</li>
				</ul>
			</li>
			{if $smarty.session.db_is_logged_in == null}
				<li><a href="login.php">{$LANG.login}</a></li>
			{else}
				<li><a href="logout.php">{$LANG.logout}</a></li>
			{/if}
		</ul>

</div id="Tabs">
</div id="Header">