<table class="header">
	<tr>
		<td class="module" style="background-color:#FFCC00;color:black">Module :: Reports</td>
		<td class="view">Select Report</td>
		<td class="action">
			<input style="float:right" type=submit class="submit" name="submit" value="Request Report">
		</td>
	</tr>
</table>
<hr style="clear:both" />
<div id="container">
	<div class="reports">
		<h3 class="reports">Available Reports</h3>

		<form name="price_lists" action="index.php" method="GET">
		<input type="hidden" name="module" value="reports" />
		<input type="hidden" name="view" value="show" />
		<input type="hidden" name="request" value="price_list" />

		<!-- PRICE LISTS -->
		<h4>Price Lists</h4>
		<table class="main">
			<tr>
				<th style="width:200px">Brand</td>
				<th style="width:175px">Price Level</td>
				<th style="width:175px">Extra</td>
			</tr>
			<tr>
				<td style="vertical-align:top">
					<table class="radio">
					<tr>
						<td><INPUT type="checkbox" name="filter" value="swiss" /></td>
						<td class="col2">Swiss Army</td>
					</tr>
					<tr>
						<td><INPUT type="checkbox" name="filter" value="techno" /></td>
						<td class="col2">Technomarine</td>
					</tr>
					<tr>
						<td><INPUT type="checkbox" name="" value="" /></td>
						<td class="col2">All</td>
					</tr>
					</table>
				</td>
				<td style="vertical-align:top">
					<table class="radio">
					<tr>
						<td><INPUT type="radio" name="param" value="A" /></td>
						<td class="col2">A</td>
					</tr>
					<tr>
						<td><INPUT type="radio" name="param" value="B" /></td>
						<td class="col2">B</td>
					</tr>
					<tr>
						<td><INPUT type="radio" name="param" value="C" /></td>
						<td class="col2">C</td>
					</tr>
					<tr>
						<td><INPUT type="radio" name="param" value="D" /></td>
						<td class="col2">D</td>
					</tr>
					<tr>
						<td><INPUT type="radio" name="param" value="" /></td>
						<td class="col2">none</td>
					</tr>
					</table>
				</td>
				<td style="vertical-align:top">
					<table class="radio">
					<tr>
						<td><INPUT type="checkbox" name="param" value="qty" /></td>
						<td class="col2">Include Quantity</td>
					</tr>
					<tr>
						<td><INPUT type="checkbox" name="param" value="cost" /></td>
						<td class="col2">Include Cost</td>
					</tr>
					<tr>
						<td><INPUT type="checkbox" name="param" value="usretail" /></td>
						<td class="col2">Include US Retail</td>
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3" class="last"><input type="submit" value="Request Report" class="submit" /></td>
			</tr>
		</table>
		</form>
		<p class="blank_separator"></p>

		<!-- FINANCIAL -->
		<h4>Financial Reports</h4>
		<form name="financial" id="financial" action="index.php" method="GET">
		<input type="hidden" name="module" value="reports" />
		<input type="hidden" name="view" value="show" />
		<input type="hidden" name="request" value="financial" />
		<table class="main">
			<tr>
				<th style="width:200px">Type</td>
				<th style="width:175px">Period</td>
				<th style="width:175px">Extra</td>
			</tr>
			<tr>
				<td style="vertical-align:top">
					<table class="radio">
					<tr>
						<td><INPUT type="radio" name="type" value="sales" /></td>
						<td class="col2">Sales</td>
					</tr>
					<tr>
						<td><INPUT type="radio" name="type" value="purchases" /></td>
						<td class="col2">Purchases</td>
					</tr>
					<tr>
						<td><INPUT type="radio" name="type" value="inventory" /></td>
						<td class="col2">Inventory</td>
					</tr>
					<tr>
						<td><INPUT type="radio" name="type" value="complete" /></td>
						<td class="col2">Complete</td>
					</tr>
					</table>
				</td>
				<td style="vertical-align:top">
					<table class="period">
					<tr>
						<td>From:</td>
						<td>
						<input type="text" class="calendar" name="from_date" id="date1" value='{$smarty.now|date_format:"%Y-%m-%d"}' />
						</td>
					</tr>
					<tr>
						<td>To:</td>
						<td><input type="text" class="calendar" name="to_date" id="date2" value='{$smarty.now|date_format:"%Y-%m-%d"}' /></td>
					</tr>
					</table>
				</td>
				<td style="vertical-align:top">
					<table class="radio">
					<tr>
						<td><INPUT type="radio" name="param" value="detailed" /></td>
						<td class="col2">Detailed</td>
					</tr>
					<tr>
						<td><INPUT type="radio" name="param" value="summary" /></td>
						<td class="col2">Summary</td>
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3" class="last"><input type="submit" value="Request Report" class="submit" /></td>
			</tr>
		</table>
		</form>

  	<p class="blank_separator"></p>
		<h4>Other Reports</h4>

		<p class="blank_separator"></p>
		<p class="separator"></p>
	</div>
	<div id="footer"></div>
</div>