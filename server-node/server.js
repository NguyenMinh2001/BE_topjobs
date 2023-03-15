const os = require('os');

function getLocalIpAddress() {
  const interfaces = os.networkInterfaces();
  for (const interfaceName in interfaces) {
    const interfacesInfo = interfaces[interfaceName];
    for (let i = 0; i < interfacesInfo.length; i++) {
      const interfaceInfo = interfacesInfo[i];
      if (interfaceInfo.family === 'IPv4' && !interfaceInfo.internal) {
        return interfaceInfo.address;
      }
    }
  }
  return 'localhost';
}
const ipAddress = getLocalIpAddress();
var http = require('http');
const express = require('express');
const app = express();
const { Server } = require('socket.io')
port = 6000;
ip = ipAddress;
const httpServer = http.createServer(app);
const io = new Server(httpServer, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
});
io.on('connection', function (socket) {
    console.log(`User ${socket.id} is connected.`);
    socket.on('update-user',(data)=>{
        // console.log('new')
        // console.log(data)
        io.emit('user:'+data.id,{ message: data })
    })
    socket.on('post-info',(data)=>{
        // console.log('new')
        // console.log(data)
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

