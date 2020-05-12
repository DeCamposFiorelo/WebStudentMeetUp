
const socket=IO.socket("https://3000-c9a2aea5-686b-4d02-a9a7-46f1ad13d9db.ws-eu01.gitpod.io/");
 

//elements
const $messageForm=document.querySelector('#message-form')
const $messageFormInput=$messageForm.querySelector('input')
const $messageFormButton=$messageForm.querySelector('button')
const $sendLocationButton= document.querySelector('#send-location')
const $messages=document.querySelector('#messages')
//templates
const messageTemplate =document.querySelector('#message-template').innerHTML
const locationMessageTemplate=document.querySelector('#location-message-template').innerHTML
const sidebarTemplate =document.querySelector('#sidebar-template').innerHTML
//options

const{ userName, roomName}=Qs.parse(location.search,{ignoreQueryPrefix:true})
const autoscroll= ()=>{
    //new Message element
    const $newMessage=$messages.lastElementChild

    //height of the last new message
    const newMessageStyles = getComputedStyle($newMessage)
    const newMesageMargin=parseInt(newMessageStyles.marginBottom)
    const newMessageHeight=$newMessage.offsetHeight + newMesageMargin

    //visible height
    const visibleHeight = $messages.offsetHeight
    //Hight of messages container

    const containerHeight = $messages.scrollHeight

    //how far have i scrolled?
    const scrollOfset=$messages.scrollTop + visibleHeight

    if(containerHeight - newMessageHeight<=scrollOfset){
        $messages.scrollTop = $messages.scrollHeight


    }
}

socket.on('updateChat', (message)=>{
    console.log(message)
    const html= Mustache.render(messageTemplate,{
        userName:message.userName,
        message:message.messageContent,
        createdAt:moment(message.createdAt).format('h:mm a')
    })
    $messages.insertAdjacentHTML('beforeend',html)

})

socket.on('userLeftChatRoom', (message)=>{
    console.log(message)
    const html= Mustache.render(messageTemplate,{
        userName:message.userName,
        message:"The following user left the chat: ",
        createdAt:moment(message.createdAt).format('h:mm a')
    })
    $messages.insertAdjacentHTML('beforeend',html)

})

socket.emit('subscribe',{userName,roomName},(error)=>{
    if(error){
        alert(error)
        location.href='/'
    }

})  