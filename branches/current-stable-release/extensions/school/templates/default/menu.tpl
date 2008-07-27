{*
Hello User’s Name Today is Day of Week Today date is dd-mm-yyyy

Home | Inv/Charges+ | Students+ | Courses+ | Products+ | Billers+ | Payments+ | Reports+ | Teachers+ | Certificates+ | To-Do Items+ | Options/Set | Log In/Out

Manage Students::Add New Student::Copy To New Student::Fast Search Student::Extended Search Student

Manage Courses::Add New Course::Copy to New Course::Find Course
*}
<div id="Header">
		<ul class="adxm menu">
			<li { if $pageActive == null} id="active" {/if}><a href="index.php">{$LANG.home}</a></li>
			<li { if $pageActive == 'invoices'} id="active" {/if}><a href="index.php?module=invoices&view=manage">Inv/Charges +</a>
				<ul>
					<li><a href="index.php?module=invoices&view=manage">{$LANG.manage_invoices}</a></li>
					<li class="separation"></li>
					<li><a href="index.php?module=invoices&view=itemised">{$LANG.new_invoice_itemised}</a></li>
					<li><a href="index.php?module=invoices&view=consulting">{$LANG.new_invoice_consulting}</a></li>
					<li><a href="index.php?module=invoices&view=total">{$LANG.new_invoice_total}</a></li>
					<li><a href="index.php?module=invoices&view=search">Search Invoices</a></li>

				</ul>
			</li>
			<li { if $pageActive == 'customers'} id="active" {/if} ><a href="index.php?module=customers&view=manage">Students +</a>
				<ul>
					<li><a href="index.php?module=customers&view=manage">Manage Students</a></li>
					<li class="separation"></li>
					<li><a href="index.php?module=customers&view=add">Add New Student</a></li>
					<li><a href="index.php?module=customers&view=search">Search Students</a></li>
{*
					<li><a href="index.php?module=customers&view=add">Copy to New Student</a></li>
					<li><a href="index.php?module=customers&view=add">Fast Search Student</a></li>
					<li><a href="index.php?module=customers&view=add">Extended Search Student</a></li>
*}
				</ul>
			</li>
			<li { if $pageActive == 'course'} id="active" {/if} ><a href="index.php?module=course&view=manage">Courses +</a>
				<ul>
					<li><a href="index.php?module=course&view=manage">Manage Courses</a></li>
					<li class="separation"></li>
					<li><a href="index.php?module=course&view=add">Add New Course</a></li>
					<li><a href="index.php?module=course&view=search">Search Courses</a></li>
{*
					<li><a href="index.php?module=course&view=add">Copy to New Course</a></li>
					<li><a href="index.php?module=course&view=add">Find Course</a></li>
*}
				</ul>
			</li>
			<li { if $pageActive == 'products'} id="active" {/if} ><a href="index.php?module=products&view=manage">{$LANG.products} +</a>
				<ul>
					<li><a href="index.php?module=products&view=manage">{$LANG.manage_products}</a></li>
					<li><a href="index.php?module=products&view=add">{$LANG.add_product}</a></li>
				</ul>
			</li>
			<li { if $pageActive == 'billers'} id="active" {/if}> <a href="index.php?module=billers&view=manage">{$LANG.billers} +</a>
				<ul>
					<li><a href="index.php?module=billers&view=manage">{$LANG.manage_billers}</a></li>
					<li><a href="index.php?module=billers&view=add">{$LANG.add_biller}</a></li>
				</ul>
			</li>
			<li { if $pageActive == 'payments'} id="active" {/if}> <a href="index.php?module=payments&view=manage">{$LANG.payments} +</a>
				<ul>
					<li><a href="index.php?module=payments&view=manage">{$LANG.manage_payments}</a></li>
					<li><a href="index.php?module=payments&view=process&op=pay_invoice">{$LANG.process_payment}</a></li>
				</ul>
			</li>
			<li { if $pageActive == 'reports'} id="active" {/if} ><a href="#">{$LANG.reports} +</a>
				<ul>
					<li><a href="index.php?module=reports&view=report_sales_total">{$LANG.sales} +</a>
						<ul>
							<li><a href="index.php?module=reports&view=report_sales_total">{$LANG.total_sales}</a></li>
						</ul>
					</li>
					<li><a href="index.php?module=reports&view=report_sales_customers_total">{$LANG.sales_by_customers} +</a>
						<ul>
							<li><a href="./index.php?module=reports&view=report_sales_customers_total">{$LANG.total_sales_by_customer}</a>
							</li>
						</ul>
					</li>
					<li><a href="./index.php?module=reports&view=report_tax_total">{$LANG.tax} +</a>
						<ul>
							<li><a href="./index.php?module=reports&view=report_tax_total">{$LANG.total_taxes}</a></li>
						</ul>
					</li>
					<li><a href="index.php?module=reports&view=report_products_sold_total">{$LANG.product_sales} +</a>
						<ul>
							<li><a href="./index.php?module=reports&view=report_products_sold_total">{$LANG.products_sold_total}</a>
							</li>
						</ul>
					</li>
					<li><a href="./index.php?module=reports&view=report_products_sold_by_customer">{$LANG.products_by_customer} +</a>
						<ul>
							<li><a href="./index.php?module=reports&view=report_products_sold_by_customer">{$LANG.products_sold_customer_total}</a>
							</li>
						</ul>
					</li>
					<li><a href="index.php?module=reports&view=report_biller_total">{$LANG.biller_sales} +</a>
						<ul>
							<li><a href="index.php?module=reports&view=report_biller_total">{$LANG.biller_sales_total}</a></li>
							<li><a href="./index.php?module=reports&view=report_biller_by_customer">{$LANG.biller_sales_by_customer_totals}</a>
							</li>
						</ul>
					</li>
					<li><a href="./index.php?module=reports&view=report_debtors_by_amount">{$LANG.debtors} +</a>
						<ul>
							<li><a href="./index.php?module=reports&view=report_debtors_by_amount">{$LANG.debtors_by_amount_owed}</a>
							</li>
							<li><a href="./index.php?module=reports&view=report_debtors_by_aging">{$LANG.debtors_by_aging_periods}</a>
							</li>
							<li><a href="./index.php?module=reports&view=report_debtors_owing_by_customer">{$LANG.total_owed_per_customer}</a>
							</li>
							<li><a href="./index.php?module=reports&view=report_debtors_aging_total">{$LANG.total_by_aging_periods}</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<li  { if $pageActive == 'school'} id="active" {/if} ><a href="#">School +</a>
				<ul>
					<li >
						<a href="index.php?module=certificate&view=manage">Certificates +</a>
						<ul>
							<li><a href="index.php?module=certificate&view=manage">Manage Certificates</a></li>
							<li class="separation"></li>
							<li><a href="index.php?module=certificate&view=add">Add New Certificate</a></li>
							<li><a href="index.php?module=certificate&view=search">Search Certificates</a></li>
						</ul>
					</li>
					<li > <a href="index.php?module=teacher&view=manage">Teachers +</a>
						<ul>
							<li><a href="index.php?module=teacher&view=manage">Manage Teachers</a></li>
							<li class="separation"></li>
							<li><a href="index.php?module=teacher&view=add">Add New Teacher</a></li>
							<li><a href="index.php?module=search&view=add">Search Teachers</a></li>
						</ul>
					</li>
					<li > <a href="index.php?module=todo&view=manage">ToDo Items +</a>
						<ul>
							<li><a href="index.php?module=todo&view=manage">Manage ToDo Items</a></li>
							<li><a href="index.php?module=todo&view=add">Add ToDo Item</a></li>
						</ul>
					</li>
					<li ><a href="index.php?module=enrollment&view=manage">Enrollment +</a>
						<ul>
							<li><a href="index.php?module=enrollment&view=manage">Manage Enrollments</a></li>
							<li class="separation"></li>
							<li><a href="index.php?module=enrollment&view=add">Add New Enrollment</a></li>
							<li><a href="index.php?module=enrollment&view=search">Search Enrollment</a></li>
						</ul>
					</li>
					<li>
						<a href="./index.php?module=subject&view=manage">Subjects +</a>
						<ul>
							<li>
								<a href="./index.php?module=subject&view=manage">Manage Subjects</a>
							</li>
							<li>
								<a href="./index.php?module=subject&view=add">Add Subject</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="./index.php?module=user&view=manage">Users +</a>
						<ul>
							<li>
								<a href="./index.php?module=user&view=manage">Manage Users</a>
							</li>
							<li>
								<a href="./index.php?module=user&view=add">Add User</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="./index.php?module=branch&view=manage">Branches +</a>
						<ul>
							<li>
								<a href="./index.php?module=branch&view=manage">Manage Branches</a>
							</li>
							<li>
								<a href="./index.php?module=branch&view=add">Add Branch</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="./index.php?module=test&view=manage">Tests +</a>
						<ul>
							<li>
								<a href="./index.php?module=test&view=manage">Manage Tests</a>
							</li>
							<li>
								<a href="./index.php?module=test&view=add">Add Test</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>	
			<li  { if $pageActive == 'options'} id="active" {/if} ><a href="#">{$LANG.options} +</a>
				<ul>
					<li>
						<a href="./index.php?module=system_defaults&view=manage">{$LANG.system_preferences}</a>
					</li>
					<li>
						<a href="./index.php?module=custom_fields&view=manage">{$LANG.custom_fields_upper}</a>
					</li>
					<li class="separation"></li>
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
					<li class="separation"></li>
					<li>
						<a href="./index.php?module=options&view=manage_sqlpatches">{$LANG.database_upgrade_manager}</a>
					</li>
					<li>
						<a href="./index.php?module=options&view=backup_database">{$LANG.backup_database}</a>
					</li>
<!--
					<li>
						<a href="./index.php?module=options&view=sanity_check">{$LANG.sanity_check}</a>
					</li>
-->
				</ul>
			</li>
			<li> <a href="#"><img src="./images/common/help-small.png"></a>
				<ul>
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
							<li><a href="docs.php?p=lang_check">{$LANG.language}</a></li>
							<li><a href="docs.php?p=Credits">{$LANG.credits}</a></li>
							<li><a href="docs.php?p=gpl">{$LANG.license}</a></li>
						</ul>
					</li>
				</ul>
			</li>
			{if $authenticationOn == "true"}
				{if $smarty.session.Zend_Auth.user_id == null}
					<li><a href="index.php?module=auth&view=login">{$LANG.login}</a></li>
				{else}
					<li><a href="index.php?module=auth&view=logout">{$LANG.logout}</a></li>
				{/if}
			{/if}
		</ul>
</div>
<div id="Header_shadow"></div>
