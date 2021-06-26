const form = document.querySelector(".signup form"),
contiueBtn = document.querySelector(".button input"),
error_massage = document.querySelector(".error-txt")

form.onsubmit = (e)=>
{
    e.preventDefault();
}

contiueBtn.onclick = ()=>{
    // ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "success"){
                    console.log(data)
                    location.href="./user.php";
                }else{
                    console.log("fail")
                    error_massage.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}