# Invoice Prepopulations #

## URL parameters to prepopulate an invoice ##

| **url** | **php** | **invoice** |
|:--------|:--------|:------------|
| biller  | `$_GET['biller']` | sets the biller to this ID |
|customer | `$_GET['customer']` | sets the customer field to this customer ID |
|`quantity[x]` | `$_GET['quantity'][x]` | sets the quantity field for line number 'x' - starting at 0 |
|`product[x]` | `$_GET['product'][x]` | sets the product field to this product ID |
|`tax[x][y]` | `$_GET['tax'][x][y]` | sets tax 'y' field for line number 'x'|
|`unit_price[x]` | `$_GET['quantity'][x]` | sets the quantity field for line number 'x' - starting at 0 |
|`description[x]` | `$_GET['description'][x]` | sets the description for line number 'x' - starting at 0 |
| note    | `$_GET['note']` | sets the notes field |
| date    | `$_GET['date']` | sets the dates field |
| preference | `$_GET['preference'][x]` | sets the invocie prefence to invoice preference 'x' |
| line\_items | `$_GET['line_items'][x]` | sets now many line items will be displays by default in the invoice |

example:

http://your.simplinvoicesinstall.com/index.php?module=invoices&view=itemised&biller=1&customer=4&product[0]=1&unit_price[0]=88&quantity[0]=7&tax[0][0]=1&note=testset&preference=2&date=2010-06-05&line_items=10