#NoTrayIcon
#Region ;**** Directives created by AutoIt3Wrapper_GUI ****
#AutoIt3Wrapper_icon=_icon.ico
#AutoIt3Wrapper_outfile=..\SimpleInvoices.exe
#AutoIt3Wrapper_UseUpx=n
#AutoIt3Wrapper_Change2CUI=y
#AutoIt3Wrapper_Res_Fileversion=1.6.0.38
#AutoIt3Wrapper_Res_Fileversion_AutoIncrement=y
#AutoIt3Wrapper_Res_Language=1033
#AutoIt3Wrapper_Run_Obfuscator=n
#Obfuscator_Parameters=/striponly
#EndRegion ;**** Directives created by AutoIt3Wrapper_GUI ****
;=====================================================================================
#include "_CommonFunctions.au3"
#include <GUIConstantsEx.au3>
#include <WindowsConstants.au3>
#include <ButtonConstants.au3>
#include <StaticConstants.au3>

#Include <File.au3>
#include <IE.au3>
#include <Array.au3>
#Include <String.au3>

;=====================================================================================
if @compiled=0 then;Change only for testing purposes when script is executed as uncompiled
	msgbox(0,"Testing...","Currently Nothing To Do Uncompiled")
	Exit
EndIf

Global $INI_SETTINGS="Settings.ini"
Global $WEBPORT=iniread($INI_SETTINGS,"SETTINGS","WebPort","8877")
Global $SQLPORT=iniread($INI_SETTINGS,"SETTINGS","SQLPort","3304")
Global $WEBADDRESS=iniread($INI_SETTINGS,"SETTINGS","WebAddress","localhost")
Global $SQLADDRESS=iniread($INI_SETTINGS,"SETTINGS","SQLAddress","localhost")
Global $WEBADDRESS_HTTPD=$WEBADDRESS&":"

if $WEBADDRESS="localhost" then
	$WEBADDRESS="127.0.0.1"
	$WEBADDRESS_HTTPD=$WEBADDRESS&":"
elseif $WEBADDRESS="" then
	$WEBADDRESS="127.0.0.1"
	$WEBADDRESS_HTTPD=""
endif

if $SQLADDRESS="localhost" OR $SQLADDRESS="" then $SQLADDRESS="127.0.0.1"

Global $HIGHT=iniread($INI_SETTINGS,"SETTINGS","WinHeight",680)
Global $WIDTH=iniread($INI_SETTINGS,"SETTINGS","WinWidth",1020)
Global $DEBUGLOG=iniread($INI_SETTINGS,"SETTINGS","Log",0)

Global $URL_BASE="http://"&$WEBADDRESS&":"&$WEBPORT
Global $URL_SCRIPTS=$URL_BASE&"/scripts/"
Global $URL_SI=$URL_BASE&"/"
Global $TITLE="Simple Invoices For Windows"
Global $TITLE_SHORT="Simple Invoices"
Global $Proccess_Apache="simpleinvoices_httpd.exe"
Global $Proccess_MySQL="simpleinvoices_mysqld.exe"

Global $SIVERSION=_StringProper(iniread("www\config\config.ini","production","version.name","ERROR"));"2010.2 Update 1"
Global $VERSION=FileGetVersion(@AutoItExe)
Global $STATE_SERVER=0

_cfl($TITLE&" "&$VERSION)

;=====================================================================================
_cfl("_only_instance")
If _only_instance(0)=1 then
	if NOT WinActivate($TITLE) then
	elseif WinActivate("Simple Invoices",$URL_BASE) then
	elseif WinActivate("Simple Invoices - Mozilla Firefox") then
	else
		OpenBrowser()
	EndIf

	Exit
endif

;=====================================================================================
_cfl("Tray Build")
if iniread($INI_SETTINGS,"SETTINGS","TrayIcon",0)=1 then Opt("TrayIconHide", 0)

Opt("TrayMenuMode", 1+2)
Opt("TrayOnEventMode", 1)
TraySetToolTip ($TITLE)

if iniread($INI_SETTINGS,"SETTINGS","Browser",1)=1 then
	TrayCreateItem("Open In Browser")
	TrayItemSetOnEvent(-1,"OpenBrowser")
endif
if iniread($INI_SETTINGS,"SETTINGS","PHPMyAdmin",1)=1 then
	TrayCreateItem("PHPMyAdmin")
	TrayItemSetOnEvent(-1,"phpmyadmin")
endif
if iniread($INI_SETTINGS,"SETTINGS","ToggleServer",1)=1 then
	$Tray_ToggleServer=TrayCreateItem("Toggle Server")
	TrayItemSetOnEvent(-1,"toggleserver")
endif
#cs
if iniread($INI_SETTINGS,"SETTINGS","RemoteFunctionsEnable",0)=1 then
	TrayCreateItem("Download Database")
	TrayItemSetOnEvent(-1,"RemoteDBToLocalDB")

	TrayCreateItem("Upload DB Changes")
	TrayItemSetOnEvent(-1,"LocalChangesToRemoteDB")
endif
#ce
TrayCreateItem("")

TrayCreateItem("About")
TrayItemSetOnEvent(-1,"About")

TrayCreateItem("Exit")
TrayItemSetOnEvent(-1,"TrayExitEvent")

;=====================================================================================
_cfl("GUI-1 Build")
$GUI_Prompt = GUICreate($TITLE, 447, 147, -1, -1, BitOR($WS_MINIMIZEBOX,$WS_SYSMENU,$WS_DLGFRAME,$WS_POPUP,$WS_GROUP,$WS_CLIPSIBLINGS), BitOR($WS_EX_TOPMOST,$WS_EX_WINDOWEDGE))
GUISetBkColor(0xFFFFFF)
$Group1 = GUICtrlCreateGroup("", 4, 0, 437, 141, $BS_CENTER)
$Button1 = GUICtrlCreateButton("GUI (typical)", 20, 63, 127, 33, BitOR($BS_DEFPUSHBUTTON,$WS_GROUP))
GUICtrlSetFont(-1, 10, 400, 0, "Verdana")
GUICtrlSetColor(-1, 0xFFFFFF)
GUICtrlSetBkColor(-1, 0xD54E21)
GUICtrlSetTip(-1, "Starts In Its Own Window")
$Button2 = GUICtrlCreateButton("Browser", 158, 63, 127, 33, $WS_GROUP)
GUICtrlSetFont(-1, 10, 400, 0, "Verdana")
GUICtrlSetColor(-1, 0xFFFFFF)
GUICtrlSetBkColor(-1, 0xD54E21)
GUICtrlSetTip(-1, "Starts In A New Browser Window (You can exit using the tray icon)")
$Button3 = GUICtrlCreateButton("Exit", 296, 63, 127, 33, $WS_GROUP)
GUICtrlSetFont(-1, 10, 400, 0, "Verdana")
GUICtrlSetColor(-1, 0xFFFFFF)
GUICtrlSetBkColor(-1, 0xD54E21)
$Label1 = GUICtrlCreateLabel("2011.1 - stable / 1.6.1", 176, 118, 252, 17, $SS_RIGHT)
GUICtrlSetFont(-1, 8, 400, 0, "Verdana")
GUICtrlSetColor(-1, 0x808080)
$Label2 = GUICtrlCreateLabel("How would you like to open "&$TITLE_SHORT&"?", 104, 26, 300, 20)
GUICtrlSetFont(-1, 10, 400, 0, "Verdana")
$Checkbox1 = GUICtrlCreateCheckbox("Set As Default", 24, 116, 97, 17)
GUICtrlSetFont(-1, 8, 400, 2, "Verdana")
GUICtrlSetColor(-1, 0x808080)
$Progress1 = GUICtrlCreateProgress(20, 116, 150, 17)
GUICtrlSetState(-1, $GUI_HIDE)
$Icon1 = GUICtrlCreateIcon("src\_icon.ico", -1, 32, 12, 48, 48, BitOR($SS_NOTIFY,$WS_GROUP))
GUICtrlCreateGroup("", -99, -99, 1, 1)

if iniread($INI_SETTINGS,"SETTINGS","GUI",1)=0 then GUICtrlSetState ($Button1,$GUI_DISABLE)
if iniread($INI_SETTINGS,"SETTINGS","Browser",1)=0 then GUICtrlSetState ($Button3,$GUI_DISABLE)
$Dummy1=GUICtrlCreateDummy ( )
$Dummy2=GUICtrlCreateDummy ( )

GUISetState(@SW_SHOW,$GUI_Prompt)

if iniread($INI_SETTINGS,"SETTINGS","PromptGUIBrowser",1)=0 then
	if iniread($INI_SETTINGS,"SETTINGS","GUI",1)=1 Then
		GUICtrlSendToDummy ($Dummy1)
	elseif iniread($INI_SETTINGS,"SETTINGS","Browser",1)=1 Then
		GUICtrlSendToDummy ($Dummy2)
	Else
		GUICtrlSendToDummy ($Dummy1)
	endif
endif

_cfl("GUI-1 Loop")

While 1
	$nMsg = GUIGetMsg()
	Switch $nMsg
		Case $GUI_EVENT_CLOSE, $Button3
			exit

		Case $Button1, $Dummy1
			If GUICtrlRead ($Checkbox1)=$GUI_CHECKED Then IniWrite ($INI_SETTINGS,"SETTINGS", "PromptGUIBrowser","0")
			GUIDelete($GUI_Prompt)
			StartServer()
			exitloop

		Case $Button2, $Dummy2
			If GUICtrlRead ($Checkbox1)=$GUI_CHECKED Then
				IniWrite ($INI_SETTINGS,"SETTINGS", "PromptGUIBrowser","0")
				IniWrite ($INI_SETTINGS,"SETTINGS", "GUI","0")
			EndIf

			GUIDelete($GUI_Prompt)

			Opt("TrayIconHide", 0)
			StartServer()
			OpenBrowser()

	EndSwitch

	sleep(10)
WEnd
;=====================================================================================
_cfl("GUI-2 Build")

$GUI_Browser = GUICreate($TITLE,$WIDTH,$HIGHT,-1,-1,BitOr($GUI_SS_DEFAULT_GUI,$WS_SIZEBOX,$WS_MAXIMIZEBOX))
$oIE = ObjCreate("Shell.Explorer.2")
$GUIActiveX = GUICtrlCreateObj ($oIE, 1, 1,$WIDTH-2,$HIGHT-4-20)
GUICtrlSetResizing ($GUIActiveX,2+4+32+64)
$MenuItem1 = GUICtrlCreateMenu("&File")
$MenuItem7 = GUICtrlCreateMenuItem("Exit", $MenuItem1)
$MenuItem10 = GUICtrlCreateMenu("Controls")
$MenuItem2 = GUICtrlCreateMenuItem("Back <<", $MenuItem10)
$MenuItem5 = GUICtrlCreateMenuItem("Forward >>", $MenuItem10)
$MenuItem6 = GUICtrlCreateMenuItem("Refresh ", $MenuItem10)
$MenuItem11 = GUICtrlCreateMenuItem("Home", $MenuItem10)
$MenuItem8 = GUICtrlCreateMenu("Help")
if iniread($INI_SETTINGS,"SETTINGS","ShowPHPMyAdminOption",1)=1 then $MenuItem4 = GUICtrlCreateMenuItem("PHPMyAdmin", $MenuItem8)
if iniread($INI_SETTINGS,"SETTINGS","EnableDefaultBrowser",1)=1 then $MenuItem9 = GUICtrlCreateMenuItem("Open In Browser", $MenuItem8)
if iniread($INI_SETTINGS,"SETTINGS","ShowToggleServerOption",1)=1 then $MenuItem12 = GUICtrlCreateMenuItem("Toggle Server", $MenuItem8)
GUICtrlCreateMenuItem("", $MenuItem8)
$MenuItem3 = GUICtrlCreateMenuItem("About", $MenuItem8)
;$StatusBar1 = _GUICtrlStatusBar_Create($Form1)
GUISetState(@SW_SHOW,$GUI_Browser)

Dim $Form1_AccelTable[1][2] = [["^f", $MenuItem1]]
GUISetAccelerators($Form1_AccelTable)

$oIE.navigate($URL_SI)

_cfl("GUI-2 Loop")
While 1
	$msg = GUIGetMsg()
	switch $msg
		Case $GUI_EVENT_CLOSE, $MenuItem7
			if Msgbox(1,$TITLE,"Exit Simple Invoices? (Unsaved data will be lost)") = 1 then Exit
		Case $MenuItem2
			$oIE.GoBack
		Case $MenuItem5
			$oIE.GoForward
		Case $MenuItem11
			$oIE.navigate($URL_SI)
		Case $MenuItem6
			$oIE.ReFresh
		Case $MenuItem3
			About()
		Case $MenuItem4
			phpmyadmin()
		Case $MenuItem9
			OpenBrowser()
		Case $MenuItem12
			toggleserver()
	Endswitch

	sleep(10)
WEnd

;=====================================================================================

#include <func_misc.au3>
#include <func_stopserver.au3>
#include <func_startserver.au3>
#include <func_toggleserver.au3>
;#include <func_remotedb.au3>
#Include <func_parseconfig.au3>