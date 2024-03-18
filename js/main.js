infos = document.querySelectorAll('.info_product')
infos.forEach((info) =>{
    info.addEventListener('click', function(){
        info.querySelector('.description').classList.toggle('click')
        console.log(info)
    })
})



div_msg = document.getElementById("msg");
 setTimeout(function(){
     div_msg.innerHTML = "";}, 8000);
