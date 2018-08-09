var expres = require('express')();

var http = require('http').Server(expres);

var io = require('socket.io')(http);

var Redis = require('ioredis');

var redis = new Redis();

//监听频道
redis.subscribe('message');

redis.on('message',function(channel,data){
		
	var data1 = JSON.parse(data);
	
	io.emit(channel+':'+data1.event,data1.data);
});

http.listen('3003',function(){

	console.log('Server Star');
});