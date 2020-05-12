const path=require('path')
const http =require('http')
const express= require('express')
const socketio=require('socket.io')
const Filter=require('bad-words')
const {generateMessage,generateLocationMessage}=require('./utils/messages')
const{addUser,removeUser,getUser,getUserInRoom}=require('./utils/users')


const app = express()
const server = http.createServer(app)
const io=socketio(server)

const port = process.env.PORT||3000
const publicDirectPath=path.join(__dirname,'../public')

app.use(express.static(publicDirectPath))



server.listen(port,()=>{
    console.log(`Server is up on port ${port}`)
})