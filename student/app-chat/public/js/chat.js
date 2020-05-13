
const socket=io();
 

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

socket.on('updateChat', (data)=>{
    var message = JSON.parse(data);
    const html= Mustache.render(messageTemplate,{
        userName:message.userName,
        message:message.messageContent,
        createdAt:moment("13:00").format('h:mm a')
    })
    console.log("The html:" + html);
    $messages.insertAdjacentHTML('beforeend',html)

})


function renderMessage(userName, message){

}

socket.on('userLeftChatRoom', (message)=>{
    console.log(message)
    const html= Mustache.render(messageTemplate,{
        userName:message.userName,
        message:"The following user left the chat: ",
        createdAt:moment(message.createdAt).format('h:mm a')
    })
    $messages.insertAdjacentHTML('beforeend',html)

})

 
 socket.emit('subscribe', { roomName, userName });



$messageForm.addEventListener('submit',(e)=>{
    e.preventDefault()
    $messageFormButton.setAttribute('disabled','disabled')
    
    //disable
    const messageContent=e.target.elements.message.value

    socket.emit('newMessage', {messageContent, roomName});
    console.log('Message delivered!');
 })

