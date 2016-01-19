function config-winrm {
	Set-Item -Path "WSMan:\localhost\Client\Auth\Basic" -Value $true
  Set-Item -Path "WSMan:\localhost\Service\Auth\Basic" -Value $true
  Set-Item -Path "WSMan:\localhost\Service\AllowUnencrypted" -Value $true
  Set-Item -Path "WSMan:\localhost\MaxTimeoutms" -Value 300000
}
config-winrm