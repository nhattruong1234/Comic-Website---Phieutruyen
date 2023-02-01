<?php
    session_start();

    require_once ('./database/connect_database.php');

    if(!isset($_SESSION['user_id'])) {
        header("location: ./");
        die();
    }

    $comic_id = -1;
    $chapter = [];
    if(isset($_GET['comic'])) {
        $sql = "select *, count(*) sl from comic cm left join other_name_comic onc on cm.id=onc.id_comic where cm.id_user = ".$_SESSION['user_id']." and cm.id = ".$_GET['comic'];
        $comic = EXECUTE_RESULT($sql);
        if($comic[0]['sl'] == 0) {
            header("location: ./postcomic.php");
            die();
        }
        else $comic_id = $_GET['comic'];

        $sql = "select chap.id, chap.index, chap.name from chapter chap join comic cm on cm.id=chap.id_comic where cm.id = ".$comic_id." order by chap.index asc";
        $chapter = EXECUTE_RESULT($sql);
    }
?>



<!DOCTYPE html>
<html lang="vi" class>
<head>
    <meta charset="utf-8">
    <title>Đọc truyện tranh Manga, Manhua, Manhwa, Comic Online</title>
    <meta name="keyword" content="doc truyen tranh, manga, manhua, manhwa, comic">
    <meta name="description" content="Đọc truyện tranh Manga, Manhua, Manhwa, Comic online hay và cập nhật thường xuyên tại PhieuTruyen.Com">
    <meta property="og:site_name" content="PhieuTruyen.Com">
    <meta name="Author" content="PhieuTruyen.Com">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style-DangTruyen.css">
    <link rel="stylesheet" type="text/css" href="./css/topbar.css">
    <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="./css/breadcrumb.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./Bootstrap/js/bootstrap.js">
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script language="javascript">
        const js_comic_id = <?php echo $comic_id; ?>;
    </script>
</head>

<body>
    <style>
        #luu-anh-bia {
            position: absolute;
            cursor: pointer;
            top: 0px;
            left: 0px;
            width: 225px;
            height: 35px;
            background:#C4C4C4;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
    
    <?php require_once("./component/header.php"); ?>

    <?php require_once("./component/sidebar.php"); ?>

    <div class="container-xxl" id="content">
        <!-- Thanh breadcrumb -->
        <div class="contain_nav_breadvrumb">
            <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                    <li class="breadcrumb-item">Đăng truyện</li>
                </ol>
            </nav>
        </div>
        <!--  -->
        <h1 class="caption">ĐĂNG TRUYỆN</h1>
        <!-- Tabpage -->
        <div class="tabs">
            <!-- tab nhập thông tin truyện -->
            <input type="radio" id="StoryDetail" name="tabs" checked="checked">
            <label for="StoryDetail">Thông tin truyện</label>
            <div class="row tab" style="height: 550px;">
                <div class="col-sm-3 story-avatar">
                    <div class="input-img">
                        <img src="./img/logo.png" alt="avatar" id="comic-cover">
                        <label for="file-input">
                            <i class="bi bi-camera-fill"></i>
                        </label>
                    </div>
                    <div>
                        <h2>Ảnh bìa truyện</h2>
                    </div>
                </div>

                <form id="post-info" class="col-sm-9" action="./action_update_comic.php" enctype="multipart/form-data" method="POST">
                        <input type="text" class="form-control form-control-sm" id="comic-id" name="comic-id" value="<?php echo $comic_id; ?>" style="display: none;">
                    <div class="col-sm-10">
                        <input type="file" class="form-select" class="form-control" aria-label="file example" id="file-input" name="file-input" style="display: none;">
                    </div>
                    <div class="row mb-3">
                        <label for="NameItem" class="col-sm-2 col-form-label col-form-label-sm">Tên truyện</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="comic-name" name="comic-name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="AnotherNameItem" class="col-sm-2 col-form-label col-form-label-sm">Tên khác</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="comic-name-other" name="comic-name-other">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="AuthorName" class="col-sm-2 col-form-label col-form-label-sm">Tác giả</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="comic-author" name="comic-author">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="TypesOfTheItem" class="col-sm-2 col-form-label col-form-label-sm">Thể loại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="comic-tag" name="comic-tag">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="DetailItem" class="col-sm-2 col-form-label col-form-label-sm">Mô tả</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="11" id="comic-detail" name="comic-detail"></textarea>
                        </div>
                    </div>
                </form>

                <div class="uplbtn">
                    <button class="post-comic" id="btn-comic">Đăng truyện</button>
                </div>
                
            </div>


            <script>
                const file_cover = document.getElementById("file-input");
                const comic_cover = document.getElementById("comic-cover");
                const comic_name = document.getElementById("comic-name");
                const comic_name_other = document.getElementById("comic-name-other");
                const comic_author = document.getElementById("comic-author");
                const comic_tag = document.getElementById("comic-tag");
                const comic_detail = document.getElementById("comic-detail");
                const btn_comic = document.getElementById("btn-comic");

                function comic_is_exists() {
                    const name_other = 
                    '<?php
                        $name_other = EXECUTE_RESULT("select * from other_name_comic where id_comic=".$comic_id);
                        $bf = false;
                        foreach($name_other as $item) {
                            if($bf) {
                                echo ',';
                            }
                            else $bf = true;
                            echo $item['other_name'];
                        }
                    ?>';
                    const tag = 
                    '<?php
                        $name_tag = EXECUTE_RESULT("select * from tag_comic tc join tag tg on tc.id_tag = tg.id where tc.id_comic=".$comic_id);
                        $bf = false;
                        foreach($name_tag as $item) {
                            if($bf) {
                                echo ',';
                            }
                            else $bf = true;
                            echo $item['name'];
                        }
                    ?>';
                    comic_cover.setAttribute("src", "<?php if(isset($_GET['comic']) && isset($_SESSION['user_id']) && (int)$comic_id != -1) echo $comic[0]['coverphoto']; ?>");
                    comic_name.setAttribute("value", "<?php if(isset($_GET['comic']) && isset($_SESSION['user_id']) && (int)$comic_id != -1) echo $comic[0]['name']; ?>");
                    comic_name_other.setAttribute("value", name_other);
                    comic_author.setAttribute("value", "<?php if(isset($_GET['comic']) && isset($_SESSION['user_id']) && (int)$comic_id != -1) echo $comic[0]['author']; ?>");
                    comic_tag.setAttribute("value", tag);
                    comic_detail.value = "<?php if(isset($_GET['comic']) && isset($_SESSION['user_id']) && (int)$comic_id != -1) echo $comic[0]['detail']; ?>";
                    btn_comic.textContent = "Chỉnh sửa";
                    btn_comic.setAttribute("class", "comic");

                    file_cover.setAttribute("disabled", "disabled");
                    comic_name.setAttribute("disabled", "disabled");
                    comic_name_other.setAttribute("disabled", "disabled");
                    comic_author.setAttribute("disabled", "disabled");
                    comic_tag.setAttribute("disabled", "disabled");
                    comic_detail.setAttribute("disabled", "disabled");
                }

                function edit_comic() {
                    file_cover.removeAttribute("disabled");
                    comic_name.removeAttribute("disabled");
                    comic_name_other.removeAttribute("disabled");
                    comic_author.removeAttribute("disabled");
                    comic_tag.removeAttribute("disabled");
                    comic_detail.removeAttribute("disabled");

                    btn_comic.textContent = "Cập nhật";
                    btn_comic.setAttribute("class", "edit");
                }

                <?php
                    if(isset($_GET['comic']) && isset($_SESSION['user_id']) && (int)$comic_id != -1) {
                        echo "comic_is_exists();";
                    }
                ?>

                btn_comic.onclick = function() {
                    if(btn_comic.getAttribute("class") == "edit" || btn_comic.getAttribute("class") == "post-comic") {
                        document.getElementById('post-info').submit();
                    }
                    else if(btn_comic.getAttribute("class") == "comic") {
                        edit_comic();
                    }
                }

                document.getElementById("file-input").onchange = function () {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        // get loaded data and render thumbnail.
                        document.getElementById("comic-cover").src = e.target.result;
                    };

                    // read the image file as a data URL.
                    reader.readAsDataURL(this.files[0]);
                };

            </script>


            <!-- tab đăng chương truyện -->
            <div style="display: none;">
                <input id="chapter-updated" name="chapter-updated" type="text" form="post-info">
                <input id="max-index-chapter" name="max-index-chapter" value="0" type="text" form="post-info">
                <input id="arr-idpage-del" name="arr-idpage-del" value="" type="text" form="post-info">
                <input id="arr-idchapter-del" name="arr-idchapter-del" value="" type="text" form="post-info">                
            </div>

            <input type="radio" id="ChapterList" name="tabs">
            <label for="ChapterList">Danh sách chương</label>
            <div class="row tab" style="height: 550px;">
                <div class="row">
                    <div class="col mb-3">
                        <button class="ChapterListbtn" id="btn-add-chapter">Thêm chương</button>
                    </div>
                    <div class="col mb-3">
                        <button class="ChapterListbtn" id="btn-sx">Sắp xếp chương</button>
                    </div>
                    <div class="col mb-6" id="search-block">
                        <input type="text" placeholder="Tìm chương" id="search-chapter">
                        <button class="search-btn"><i class='bx bx-search-alt-2' ></i></button>
                    </div>
                </div>
                <div class="row workspace">
                    <div class="listchapter">
                        <ul id="display-chapter" class="col display-row-chapter">
                            <?php
                                $index_max = 0;
                                foreach($chapter as $item) {
                                    echo '<li class="chapteritem" id="chapter-item-'.$item['index'].'">
                                    <p id="name-chapter-'.$item['index'].'" class="col mb-6">Chương '.$item['index'].' : '.$item['name'].'</p>
                                    <button id="btn-rename-'.$item['index'].'" class="editchapter col-3" onclick="doi_ten('.$item['index'].', \''.$item['name'].'\')" style="width: 80px;">Đổi tên</button>
                                    <button class="editchapter col-3" onclick="chinh_sua_chuong('.$item['index'].')" style="width:120px;">Thêm/xóa ảnh</button>
                                    <button class="delchapter col-3" onclick="xoa_chuong('.$item['index'].', '.$item['id'].', \''.$item['name'].'\')">Xóa chương</button>
                                    </li>';
                                    $index_max = $item['index'];
                                }
                            ?>
                        </ul>
                    </div>
                    
                    <div id="drop-zone" class="upchapter" style="flex-direction: column; overflow-x: hidden;">
                        <span class="TipLine">Thả file ảnh hoặc click vào đây</span>

                        <div id="add-file" style="width: 100%; overflow: scroll; overflow-x: hidden;">
                            <!-- HIEN THI ANH O DAY -->
                        </div>

                        <style>
                            .delete-button {
                                top: 5px;
                                right: 5px;
                            }
                            .div-chapter {
                                position: relative;
                            }
                            #add-file {
                                display: flex;
                                margin: 10px;
                                flex-wrap: wrap;
                            }
                            #add-file > div {
                                margin: 6px;
                            }
                        </style>
                    </div>
                </div>

                <div class="uplbtn" style="left: 300px;">
                    <button id="btn-chapter" class="post-comic" >Đăng truyện</button>
                </div>

                <script>
                    let chapter_row_selected = 0, index_anh = 0;
                    const dropZone = document.getElementById('drop-zone');
                    const content = document.getElementById('add-file');
                    const arr_idpage_del = document.getElementById('arr-idpage-del');
                    const arr_idchapter_del = document.getElementById('arr-idchapter-del');
                    const openupchapter = document.querySelector(".upchapter");
                    const openlistchapter = document.querySelector(".listchapter");
                    const AddChapBtn = document.querySelector("#btn-add-chapter");
                    const btn_chapter = document.querySelector("#btn-chapter");
                    const list_chapter = document.querySelector(".display-row-chapter");
                    const form_chapter = document.querySelector("#post-info");
                    const max_chapter = document.getElementById("max-index-chapter");
                    const in_chapter_updated = document.getElementById("chapter-updated");

                    const reader = new FileReader();
                    
                    if (window.FileList && window.File) {
                        dropZone.addEventListener('dragover', event => {
                            event.stopPropagation();
                            event.preventDefault();
                            event.dataTransfer.dropEffect = 'copy';
                        });
                        
                        dropZone.addEventListener('drop', event => {
                            index_anh++;
                            let i = 0;

                            event.stopPropagation();
                            event.preventDefault();
                            const files = event.dataTransfer.files;
                            const input_page = document.createElement("input");
                            input_page.id = "page-chapter-"+chapter_row_selected+"-index-"+index_anh;
                            input_page.name = "page-chapter-"+chapter_row_selected+"-index-"+index_anh+"[]";
                            input_page.setAttribute("form", "post-info");
                            input_page.setAttribute("class", "file-chapter-"+chapter_row_selected);
                            input_page.type = "file";
                            input_page.multiple = "multiple";
                            input_page.style = "display: none;";

                            const name_chapter = document.getElementById("name-page-chapter-"+chapter_row_selected);

                            console.log(files);
                            //page-chapter-0-index-0 drop-zone
                            reader.readAsDataURL(files[0]);
                            reader.addEventListener('load', (event) => {
                                if(i == 0) {
                                    i++;
                                    dropZone.appendChild(input_page);
                                    content.innerHTML = content.innerHTML + '<div id="chapter-'+chapter_row_selected+'-index-'+index_anh+'" class="div-chapter chapter-'+chapter_row_selected+'">'+
                                                                                '<img src="'+event.target.result+'" alt="'+files[0].name+'">' +
                                                                                '<button class="delete-button" onclick="xoa_anh(-1, 0, \'chapter-'+chapter_row_selected+'-index-'+index_anh+'\')" type="button" >'+
                                                                                    '<i class="bi bi-x"></i>'+
                                                                                '</button>'+
                                                                            '</div>';
                                    input_page.files = files;
                                    name_chapter.value = name_chapter.value + ",page-chapter-"+chapter_row_selected+"-index-"+index_anh;

                                }
                            });
                        }); 
                    }

                    if(js_comic_id != -1) {
                        btn_chapter.textContent = "Cập nhật";
                    }

                    $(document).ready(function() {
                        $('#search-chapter').on('keyup', function(event) {
                            event.preventDefault();
                            /* Act on the event */
                            var tukhoa = $(this).val().toLowerCase();
                            $('#display-chapter li').filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(tukhoa)>-1);
                            });
                        });
                    });

                    
                    const so_row_ht = <?php echo count($chapter); ?>;
                    let row_max_now = <?php echo $index_max; ?>;
                    let index_row = row_max_now;
                    max_chapter.value = row_max_now;
                    let arr_index = [];
                    

                    function xoa_anh(id_page, _saved, id_div) {
                        if(_saved == 1) {
                            arr_idpage_del.value = arr_idpage_del.value + "," + id_page;
                        } else {
                            let child_ = document.getElementById("page-"+id_div);
                            child_.parentNode.removeChild(child_);
                        }
                        let child = document.getElementById(id_div);
                        child.parentNode.removeChild(child);
                    }

                    function chinh_sua_chuong(so_chuong) {
                        chapter_row_selected = so_chuong;
                        openupchapter.classList.toggle("open");
                        btn_chapter.textContent = "Hoàn tất";
                        btn_chapter.setAttribute("class", "continue");

                        in_chapter_updated.value = in_chapter_updated.value + ',' + so_chuong;
                        
                        if(arr_index.indexOf(chapter_row_selected) == -1) {
                            arr_index.push(chapter_row_selected);
                            const name_page_chapter = document.createElement("input");
                            name_page_chapter.id = "name-page-chapter-"+so_chuong;
                            name_page_chapter.name = "name-page-chapter-"+so_chuong;
                            name_page_chapter.setAttribute("form", "post-info");
                            name_page_chapter.type = "text";
                            name_page_chapter.style = "display: none;";
                            dropZone.appendChild(name_page_chapter);

                            if(so_chuong <= row_max_now) {
                                $.ajax({
                                    url : "action_get_pagechapter.php",
                                    type : "post",
                                    dataType:"text",
                                    data : {
                                        data : "get-page-chapter",
                                        indexchapter : so_chuong,
                                        comicid : js_comic_id
                                    },
                                    success : function (result){
                                        content.innerHTML = content.innerHTML + result;
                                    }
                                });
                            }
                        } else {
                            const arr_anh = document.querySelectorAll(".chapter-"+chapter_row_selected);
                            for(let i = 0; i < arr_anh.length; i++) {
                                arr_anh[i].removeAttribute("style");
                            }
                        }
                    }

                    function create_query(_data, _query) {
                        $.ajax({
                            url : "action_query.php",
                            type : "post",
                            dataType:"text",
                            data : {
                                data : _data,
                                query : _query
                            },
                            success : function (result){}
                        });
                    }

                    function xoa_chuong(so_chuong, chapter_id, name) {
                        let xn = confirm("Bạn có chắc chắn muốn xóa 'Chương "+so_chuong+" : "+name+"'?");
                        if(!xn) return;

                        if(chapter_id != -1) {
                            arr_idchapter_del.value = arr_idchapter_del.value + "," + chapter_id;
                        } else {
                            //xoa input luu ten chuong
                            let child = document.getElementById("new-name-chapter-"+so_chuong);
                            child.parentNode.removeChild(child);
                        }

                        //xoa hien thi chuong
                        let child = document.getElementById("chapter-item-"+so_chuong);
                        child.parentNode.removeChild(child);
                        //xoa cac file anh lien quan den chuong
                        const arr_input = document.querySelectorAll(".file-chapter-"+so_chuong);
                        for(let i = 0; i < arr_input.length; i++) {
                            arr_input[i].parentNode.removeChild(arr_input[i]);
                        }
                        const arr_anh = document.querySelectorAll(".chapter-"+so_chuong);
                        for(let i = 0; i < arr_anh.length; i++) {
                            arr_anh[i].parentNode.removeChild(arr_anh[i]);
                        }
                        //xoa mang chua ten file tai len
                        child = document.getElementById("name-page-chapter-"+so_chuong);
                        if(child != null) child.parentNode.removeChild(child);
                    }

                    function doi_ten(so_chuong, name) {
                        let ten_moi = prompt("Nhập tên chương mới:", name);
                        if(ten_moi != null ) {
                            if(js_comic_id != -1 && so_chuong <= row_max_now ) {
                                let data = "doi-ten-chuong";
                                let query = "update chapter set updated_at=now(), name='"+ten_moi+"' where id_comic="+js_comic_id+" and `index`="+so_chuong;
                                create_query(data, query);
                                document.getElementById("name-chapter-"+so_chuong).textContent = "Chương "+so_chuong+": "+ten_moi;
                                document.getElementById("btn-rename-"+so_chuong).setAttribute("onclick", "doi_ten("+so_chuong+", '"+ten_moi+"')");
                            } else {
                                document.getElementById("new-name-chapter-"+so_chuong).setAttribute("value", ten_moi);
                                document.getElementById("name-chapter-"+so_chuong).textContent = "Chương "+so_chuong+": "+ten_moi;
                                document.getElementById("btn-rename-"+so_chuong).setAttribute("onclick", "doi_ten("+so_chuong+", '"+ten_moi+"')");
                            }
                        }
                    }

                    AddChapBtn.addEventListener("click", () =>{
                        if(btn_chapter.getAttribute("class") == "post-comic") {
                            let name_chapter = prompt("Nhập tên chương:");
                            if(name_chapter != null) {
                                index_row++;
                                list_chapter.innerHTML = list_chapter.innerHTML + '<li class="chapteritem" id="chapter-item-'+index_row+'">'+
                                    '<p id="name-chapter-'+index_row+'" class="col mb-6">Chương ' + (index_row) +' : ' + name_chapter +'</p>' +
                                    '<button id="btn-rename-'+index_row+'" class="editchapter col-3" onclick="doi_ten('+index_row+', \''+name_chapter+'\')" style="width: 80px;">Đổi tên</button>'+
                                    '<button class="editchapter col-3" onclick="chinh_sua_chuong('+index_row+')" style="width: 120px;">Thêm/xóa ảnh</button>'+
                                    '<button class="delchapter col-3" onclick="xoa_chuong('+index_row+', -1, \'' + name_chapter +'\')">Xóa chương</button>'+
                                    '</li>';
                                content.innerHTML =  content.innerHTML + '<input form="post-info" id="new-name-chapter-'+index_row+'" type="text" name="name-chapter-'+index_row+'" value="'+name_chapter+'" style="display: none;">';
                                in_chapter_updated.value = in_chapter_updated.value + ',' + index_row;
                            }
                        }
                    })
                    
                    btn_chapter.addEventListener("click", () =>{
                        if (btn_chapter.getAttribute("class") == "continue") {
                            btn_chapter.setAttribute("class", "post-comic");
                            openupchapter.classList.toggle("open");
                            if(js_comic_id != -1) btn_chapter.textContent = "Cập nhật";
                            else btn_chapter.textContent = "Đăng truyện";
                            let arr_anh = document.querySelectorAll(".chapter-"+chapter_row_selected);
                            for(let i = 0; i < arr_anh.length; i++) {
                                arr_anh[i].setAttribute("style", "display: none;");
                            }
                        }
                        else if (btn_chapter.getAttribute("class") == "post-comic") {
                            form_chapter.submit();
                        }
                    })
                </script>
            </div>
        </div>
    </div>

    <?php $btntop = true; require_once("./component/footer.php"); ?>

    <script language="javascript" src="./js/jsheader.js"></script>
    <script language="javascript" src="./js/story-list.js"></script>
    <script language="JavaScript" src="./js/sidebarType1.js"></script>
</body>
</html>