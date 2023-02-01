// sidebar js
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn-menu");
        
        closeBtn.addEventListener("click", ()=>{
             if(NavListChap.classList.contains("open")){
                if (sidebar.classList.contains("open")) {
                    sidebar.classList.remove("open");
                }
                sidebar.classList.toggle("open2");
            }else{
                if (sidebar.classList.contains("open2")) {
                    sidebar.classList.remove("open2");
                }
                sidebar.classList.toggle("open");
            }
        ChangePosisionListChap();
        CloseSidebarOpen2();
        menuBtnChange();
        });
        
        // code chuyển icon menu side bar
        function menuBtnChange() {
        if(sidebar.classList.contains("open")){
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//đổi 2 icon
        }else {
        closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//đổi 2 icon
        }};
    // Mở đóng danh sách chương
    let NavListChap = document.querySelector(".Nav_ListChap");
    let ListChapOpenBtn = document.querySelector("#Nav_ListChapBtn");
    
        ListChapOpenBtn.addEventListener("click", () => {
        ListChapOpen();
        });
    
        function ListChapOpen() {
            if (sidebar.classList.contains("open")) {
                sidebar.classList.replace("open","open2");
                if(NavListChap.classList.contains("open")){
                    NavListChap.classList.remove("open");
                }
                NavListChap.classList.toggle("navopen");
            }
            else if(sidebar.classList.contains("open2")){
                sidebar.classList.replace("open","open2");
                if(NavListChap.classList.contains("open")){
                    NavListChap.classList.remove("open");
                }
                NavListChap.classList.toggle("navopen");
            }else{
                if(NavListChap.classList.contains("navopen")){
                    NavListChap.classList.remove("navopen");
                }
                NavListChap.classList.toggle("open");
            }
            CloseSidebarOpen2();
        };
        function ChangePosisionListChap(){
            if(sidebar.classList.contains("open2")){
                NavListChap.classList.replace("open","navopen");
            }else{
                NavListChap.classList.replace("navopen","open");
            }
        };
        function CloseSidebarOpen2() {
            if(NavListChap.classList.contains("open")){
                sidebar.classList.remove("open");
                sidebar.classList.remove("open2");
            }else if(NavListChap.classList.contains("navopen")){
            }else{
                sidebar.classList.replace("open2","open");
            }
    };
    
    // Nút bật tắt đèn
    var btn_light_dark = document.getElementById("btn-light-dark");
        btn_light_dark.addEventListener("click", ()=>{
            document.body.classList.toggle("dark");
    });