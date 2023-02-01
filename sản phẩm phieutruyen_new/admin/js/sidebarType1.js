// sidebar js
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn-menu");

closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
    if(sidebar.classList.contains("open")){
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
    }else {
        closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
    }
}

var btn_light_dark =document.getElementById("btn-light-dark");
        btn_light_dark.addEventListener("click", ()=>{
            document.body.classList.toggle("dark");
        });

$("#btntop").click(function () {
    $("html").animate({
        scrollTop:0
    }, 750);
})