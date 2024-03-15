infos = document.querySelectorAll('.info_product')
infos.forEach((info) =>{
    info.addEventListener('click', function(){

        info.querySelector('.description').classList.replace('description','click-description')
        //info.querySelector('.click-description').classList.replace('click-description','description')
        //info.querySelector('.description').className = "click-description"
        console.log(info)
    })
})


//var msg
//div_msg = document.getElementsByClassName("msg")
//div_msg.innerHTML = $_SESSION["msg_form"]
//
//console.log($_SESSION["msg_form"])
//
// setTimeout(function(){
//     div_msg.innerHTML = "";}, 8000);
