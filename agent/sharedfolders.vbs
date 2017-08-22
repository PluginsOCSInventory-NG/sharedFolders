'----------------------------------------------------------
' Plugin for OCS Inventory NG 2.x
' Script :		Retrieve shared folders
' Version :		1.10
' Date :		12/08/2017
' Author :		?
' Contributor :	Stéphane PAUTREL (acb78.com)
'----------------------------------------------------------
' OS checked [X] on	32b	64b	(Professionnal edition)
'	Windows XP	[X]	[ ]
'	Windows Vista	[X]	[X]
'	Windows 7	[X]	[X]
'	Windows 8.1	[X]	[X]	
'	Windows 10	[X]	[X]
' ---------------------------------------------------------
' NOTE : No checked on Windows 8
' ---------------------------------------------------------
On Error Resume Next

Set objWMIService = GetObject("winmgmts:" _
& "{impersonationLevel=impersonate}!\\.\root\cimv2")

Set colShares = objWMIService.ExecQuery("Select * from Win32_Share")

For each objShare in colShares
    If objShare.Type = 0 Or objShare.Type = -2147483648 Then
    	If objShare.Type = 0 Then
    		sharetype = "User"
    	Else
    		sharetype = "Admin"
    	End If
		
		Wscript.Echo _
		"<SHAREDFOLDERS>" & vbCrLf &_
    	"<SHARENAME>" & objShare.Name & "</SHARENAME>" & vbCrLf &_
    	"<SHAREPATH>" & objShare.Path & "</SHAREPATH>" & vbCrLf &_
    	"<SHARETYPE>" & sharetype & "</SHARETYPE>" & vbCrLf &_
		"<SHAREDESC>" & objShare.Description & "</SHAREDESC>" & vbCrLf &_
    	"</SHAREDFOLDERS>"
	End If
Next
