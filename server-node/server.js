var http = require('http');
const express = require('express');
const app = express();
const { Server } = require('socket.io')
port = 6000;
ip = '192.168.122.82';
const httpServer = http.createServer(app);
const io = new Server(httpServer, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
});
io.on('connection', function (socket) {
    console.log(`User ${socket.id} is connected.`);
    socket.on('post-info',(data)=>{
        // console.log('new')
        // console.log(data.data.id_business)
        io.emit('info:'+data.data.id_business,{ message: data })
    })
    socket.on('post-job',(data)=>{
        console.log('post new')
        io.emit('job:'+data.company_id,{message: data})
    })
    socket.on('disconnect', function() {
        console.log('Got disconnect!');
        // var i = allClients.indexOf(socket);
        // allClients.splice(i, 1);
    });
    
});

httpServer.listen(port, ip, function () {
    console.log("Socket.IO server started at %s:%s!", ip, port)
});

