<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Bank Information</title>
		<link rel="stylesheet" media="all" type="text/css" href="{$css}" />
	</head>
	<body>
		<table class="top">
			<tr>
				<td>
					<img src="templates/invoices/logos/logo3.png" width="242px" height="45px">
				</td>
			</tr>
			<tr><th>Genlu L.L.C</td></tr>
			<tr><td>Miami - Florida - USA</td></tr>
			<tr><td>Phone-USA: 786-975-4482</td></tr>
			<tr><td>Contact: Federico</td></tr>
			<tr><td>Phone-Vzla: 0414-431-9805</td></tr>
			<tr><td>Contact: Joseph</td></tr>
			<tr><td>genludistributors@gmail.com</td></tr>
		</table>
		<p class="divider"></p>
		<h3 style="">Bank Information</h3>

		<table class="bank">
			{foreach from=$info key=name item=statement}
			<tr>
				<td class="col1">{$name}</td>
				<td class="col2">{$statement}</td>
			</tr>
			{/foreach}
			<tr>
			<td colspan="2"><br /></td>
			</tr>
		</table>
		<p class="divider"></p>
		<h4>Please feel free to contact us if you need further assistance.</h4>

	</body>
</html>