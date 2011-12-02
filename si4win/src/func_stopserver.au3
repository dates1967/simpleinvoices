func StopServer()
	_cfl("StopServer")

	ProgressOff()
	ProgressOn($TITLE,$TITLE,"Simple Invoices Closing",Default,@DesktopHeight/2-200,16)

	ProgressSet(10,"Attempting Safe MySQL Shutdown")
	$PID=Run(@ComSpec & " /c " & 'mysql\bin\mysqladmin.exe --port='&$SQLPORT&' --user=root shutdown',@ScriptDir, @SW_HIDE)


	ProgressSet(30,"Waiting For MySQL Shutdown")
	ProcessWaitClose($PID,3)
	ProcessClose ($PID)
	sleep(1000)

	ProgressSet(50,"Closing Remaining MySQL Proccesses")
	_ProcessCloseOthers($Proccess_MySQL)

	ProgressSet(70,"Closing Apache Proccesses")
	_ProcessCloseOthers($Proccess_Apache)

	ProgressSet(90,"Updating Menu Options")

	OnAutoItExitUnregister("StopServer")
	$STATE_SERVER=0

	ProgressOff()

endfunc