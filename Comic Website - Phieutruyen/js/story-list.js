var storylist = document.querySelectorAll(".story");

for (let i=0; i<storylist.length; i++) {
    let storyinfo = storylist[i].lastChild.previousSibling;

    storyinfo.classList.add("invisible");
    if (storylist[i].getBoundingClientRect().left > (document.body.getBoundingClientRect().width/2))
    storyinfo.classList.add("si-left")
    else storyinfo.classList.remove("si-left");

    storylist[i].onmouseenter = function () {
        storyinfo.classList.remove("invisible");
        if (storylist[i].getBoundingClientRect().left > (document.body.getBoundingClientRect().width/2))
        storyinfo.classList.add("si-left")
        else storyinfo.classList.remove("si-left");
    }

    storylist[i].onmouseleave = function () {
        storyinfo.classList.add("invisible");
    }
}