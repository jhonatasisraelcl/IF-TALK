<?php
	shell_exec ('php TestCon.php > iniServidor.js');
	//shell_exec ('php BPC.php > bpc.html');
	//echo "res.sendFile(__dirname + '/bpc.html')"
	shell_exec('nodejs iniServidor.js');
?>
