const socket=io()

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
const{ username, room}=Qs.parse(location.search,{ignoreQueryPrefix:true})
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

socket.on('message', (message)=>{
    console.log(message)
    const html= Mustache.render(messageTemplate,{
        username:message.username,
        message:message.text,
        createdAt:moment(message.createdAt).format('h:mm a')
    })
    $messages.insertAdjacentHTML('beforeend',html)
    //STOPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP

    

})

socket.on('locationMessage',(message)=>{
    console.log(message)
    const html=Mustache.render(locationMessageTemplate,{
        username:message.username,
        url:message.url,
        createdAt:moment(message.createdAt).format('h:mm a')
    })
    $messages.insertAdjacentHTML('beforeend',html)
    autoscroll()
})
socket.on('roomData',({room,users})=>{
   const html=Mustache.render(sidebarTemplate,{
       room,
       users
   })
   document.querySelector('#sidebar').innerHTML=html
  autoscroll()
})
 $messageForm.addEventListener('submit',(e)=>{
    e.preventDefault()
    $messageFormButton.setAttribute('disabled','disabled')
    
    //disable
    const message=e.target.elements.message.value
    socket.emit('sendMessage',message,(error)=>{
        $messageFormButton.removeAttribute('disabled')
        $messageFormInput.value=''
        $messageFormInput.focus()
        //enable
       if(error){
        return console.log(error)
       }
       console.log('Message delivered!')
    })
 })

 $sendLocationButton.addEventListener('click',()=>{

    if(!navigator.geolocation){
         return alert('Gelocation is not supporting by your brower.')
     }
     $sendLocationButton.setAttribute('disabled','disabled')
     
     navigator.geolocation.getCurrentPosition((position)=>{
         
         socket.emit('sendLocation',{
             latitude:position.coords.latitude,
             longitude:position.coords.longitude
         },()=>{
             $sendLocationButton.removeAttribute('disabled')
            console.log('Location shared')
         })
         
     })
 })
socket.emit('join',{username,room},(error)=>{
    if(error){
        alert(error)
        location.href='/'
    }

})  