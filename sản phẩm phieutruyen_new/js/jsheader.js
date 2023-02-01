function open_list(element_id) {
    document.getElementById(element_id).classList.toggle("visible");
}

function close_list(element_id) {
    let list = document.getElementById(element_id);
    if (list.classList.contains("visible"))
    document.getElementById(element_id).classList.remove("visible");
}

function turn_on_off_notifi (element_id_i, element_id_t) {
    let newtext = document.getElementById(element_id_t);
    let icon_btn = document.getElementById(element_id_i)
    if (icon_btn.classList.contains("bi-bell")) {
        newtext.innerHTML = "Bật thông báo";
        icon_btn.classList.replace("bi-bell", "bi-bell-fill");
    } else {
        newtext.innerHTML = "Tắt thông báo";
        icon_btn.classList.replace("bi-bell-fill", "bi-bell");
    }
}

function delete_div(_div) {
    document.getElementById(_div).classList.add("d-none");
}

var del_btn = document.querySelectorAll(".delete-button");
for (let i=0; i<del_btn.length; i++) {
    del_btn[i].addEventListener("click", ()=>delete_div(del_btn[i].parentElement.id))
}