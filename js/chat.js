const form = document.querySelector(".typing-area"),
sendbtn = document.querySelector("button"),
input = document.querySelector(".typing-area .input"),
incoming_id = document.querySelector(".incoming_id").value,
chatbox = document.querySelector(".chat-box");

form.onsubmit = (e)=>
{
    e.preventDefault();
}
setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/get-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatbox.innerHTML = data;
                scrollToBottom();
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
},500)
sendbtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/chat-setData.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                    input.value = "";
                    scrollToBottom();
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}
function scrollToBottom(){
    chatbox.scrollTop = chatbox.scrollHeight;
}