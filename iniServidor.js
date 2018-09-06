var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
app.get('/', function(req, res){
res.sendFile(__dirname + '/propaganda.html');
});io.on('connection', function(socket){
socket.on('canal', function(par){
io.emit('canal', par);
});
});
http.listen(3000, function(){
console.log('listening on *:3000');
});
