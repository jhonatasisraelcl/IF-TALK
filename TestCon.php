<?php
//function CriarCon(){
include "DAO/connect.php";
include "DAO/DaoGrupo.php";

$var =  new DaoGrupo();
$cons = $var -> NumCont();


echo "var app = require('express')();\n";
echo "var http = require('http').Server(app);\n";
echo "var io = require('socket.io')(http);\n";

echo "app.get('/', function(req, res){\n";
echo "res.sendFile(__dirname + '/propaganda.html');\n";
echo "});";

echo "io.on('connection', function(socket){\n";
//for($i=0; $i < count($cons); $i++){
	echo "socket.on('canal', function(par){\n";
	echo "io.emit('canal', par);\n";
	echo "});\n";
//}
echo "});\n";

echo "http.listen(3000, function(){\n";
echo "console.log('listening on *:3000');\n";
echo "});\n";

//}
?>
