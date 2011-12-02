func TrayExitEvent()
	exit
endfunc
func About()
	_cfl("About")
	_msgbox(64+262144,$TITLE,$TITLE&@CRLF&"Version: "&$VERSION&@CRLF&"www.TeamMC.cc/simpleinvoices"&@CRLF&@CRLF&"Simple Invoices"&@CRLF&"Version: "&$SIVERSION&@CRLF&"www.SimpleInvoices.org")
endfunc
func OpenBrowser()
	_cfl("OpenBrowser")
	Run(@ComSpec & " /c start " & $URL_BASE & '/', "", @SW_HIDE)
EndFunc
func phpmyadmin()
	_cfl("phpmyadmin")
	Run(@ComSpec & " /c start " & $URL_BASE & '/phpmyadmin', "", @SW_HIDE)
endfunc