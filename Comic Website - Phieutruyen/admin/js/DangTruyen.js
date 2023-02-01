document.querySelectorAll(".BoxUpChapter").forEach((inputElement) => {
    const DropBoxElement = inputElement.closest(".upchapter");

    DropBoxElement.addEventListener("click", e => {
        inputElement.click();
    });

    inputElement.addEventListener("chage", e => {
        if(inputElement.files.length) {
            updateThumbnail(DropBoxElement, inputElement.files[0]);
        }
    });

    DropBoxElement.addEventListener("dragover", e => {
        e.preventDefault();
        DropBoxElement.classList.add("dropbox-over");
    });

    ["dragleave", "dragend"].forEach(type => {
        DropBoxElement.addEventListener(type, e => {
            DropBoxElement.classList.remove("dropbox-over");
        });
    });

    DropBoxElement.addEventListener("drop", e => {
        e.preventDefault();
        
        if(e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(DropBoxElement, e.dataTransfer.files[0]);
        }

        DropBoxElement.classList.remove("dropbox-over");
    })
});

function updateThumbnail(DropBoxElement, file) {
    let thumbElement = DropBoxElement.querySelector(".itemUp-thumb");

    if(DropBoxElement.querySelector(".TipLine")) {
        DropBoxElement.querySelector(".TipLine").remove();
    }

    if(!thumbElement) {
        thumbElement = document.createElement("div");
        thumbElement.classList.add("itemUp-thumb");
        DropBoxElement.appendChild(thumbElement);
    }

    thumbElement.dataset.label = file.name;

    if(file.type.startsWith("image/")) {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbElement.style.backgroundImage = `url("${ reader.result }")`;
        };
    } else {
        thumbElement.style.backgroundImage = null;
    }
}