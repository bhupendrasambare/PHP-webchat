const searchBar = document.querySelector(".serch input"),
searchIcon = document.querySelector(".serch button");
const userList = document.querySelector(".user-list");

searchIcon.onclick = ()=>{
    searchBar.classList.toggle("show");
    searchIcon.classList.toggle("active");
    searchBar.focus();
    if(searchBar.classList.contains("active")){
      searchBar.value = "";
      searchBar.classList.remove("active");
    }
  }
  var check=1;
  setInterval(()=>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "./php/user-check.php", true);
  xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(check==1){
                  userList.innerHTML = data;
              }
          }
      }
  }
  xhr.send();
  },500)
  searchBar.onkeyup = ()=>{
      let searchTerm = searchBar.value;
      if(searchTerm !=""){
          check=0;
          let xhr = new XMLHttpRequest();
            xhr.open("POST", "./php/search.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        if(check==0){
                            userList.innerHTML = data;
                        }
                    }
                }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("searchTerm=" + searchTerm );
      }else{
          check=1;
      }
  }



  