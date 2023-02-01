<?php
    session_start();


    require_once ('./database/connect_database.php');


    if(!(isset($_GET['comic']) && isset($_GET['chapter']))) {
        header("location: ./");
        die();
    }

    $comic_id = $_GET['comic'];

    $sql_cm = "select chap.id, chap.id_comic, chap.index, chap.name, chap.created_at, chap.updated_at, cm.id_user, cm.name name_cm, cm.status, count(*) total from chapter chap join comic cm on chap.id_comic = cm.id where cm.status != 'Chờ duyệt' and chap.status != 'Chờ duyệt' and chap.id_comic = ".$comic_id." and chap.index = ".$_GET['chapter'];
    $sql_ch = "select * from chapter chap join comic cm on chap.id_comic = cm.id where chap.id_comic = ".$_GET['comic']." and chap.status != 'Chờ duyệt' order by chap.index asc";

    if(isset($_SESSION["user_id"])) {
        $sql = "select isadmin from login where id_user = ".$_SESSION["user_id"];
        $result = EXECUTE_RESULT($sql);
        if($result[0]["isadmin"] == 1) {
            $sql_cm = "select chap.id, chap.id_comic, chap.index, chap.name, chap.created_at, chap.updated_at, cm.id_user, cm.name name_cm, cm.status, count(*) total from chapter chap join comic cm on chap.id_comic = cm.id where chap.id_comic = ".$comic_id." and chap.index = ".$_GET['chapter'];
            $sql_ch = "select * from chapter chap join comic cm on chap.id_comic = cm.id where chap.id_comic = ".$_GET['comic']." order by chap.index asc";
        }
    }

    $comic = EXECUTE_RESULT($sql_cm);

    if($comic[0]['total'] == 0) {
        header("location: ./");
        die();
    }

    EXECUTE("update comic set total_view = total_view + 1 where id=".$comic_id);

    $user = [];

    $chapter = EXECUTE_RESULT($sql_ch);

    $sql = "select * from page pg join chapter chap on pg.id_chapter = chap.id where chap.id_comic = ".$_GET['comic']." and chap.index = ".$_GET['chapter']." order by pg.index asc";
    $page = EXECUTE_RESULT($sql);

    $sql = "select count(*), id from chapter chap where id_comic= ".$_GET['comic']." and chap.index= ".$_GET['chapter'];
    $idchapter = EXECUTE_RESULT($sql);
    //echo $sql;
    $chiso = 0;
    foreach($chapter as $item) {
        if($item["index"] == $_GET["chapter"]) break;
        $chiso++;
    }
    
    if(isset($_SESSION["user_id"])) {
        $sql = "select count(*) total, rdd.id from readed rdd join chapter chap on rdd.id_chapter = chap.id join comic cm on chap.id_comic = cm.id where chap.id = ".$idchapter[0]["id"];
        //echo $sql;
        $result = EXECUTE_RESULT($sql);
        if($result[0]["total"] != 0) {
            $sql = "UPDATE readed SET id_chapter = ".$idchapter[0]["id"]." WHERE id = ".$result[0]["id"];
            EXECUTE($sql);
        }
        else {
            $sql = "INSERT INTO readed (id_user, id_chapter) VALUES (".$_SESSION["user_id"].", ".$idchapter[0]["id"].")";
            EXECUTE($sql);
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Đọc truyện tranh Manga, Manhua, Manhwa, Comic online hay và cập nhật thường xuyên tại PhieuTruyen.Com">
        <meta property="og:site_name" content="PhieuTruyen.Com">
        <meta name="Author" content="PhieuTruyen.Com">
        <meta name="keyword" content="doc truyen tranh, manga, manhua, manhwa, comic">
        <title>Đọc truyện tranh Manga, Manhua, Manhwa, Comic Online</title>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
        <link rel="stylesheet" type="text/css" href="./css/footer.css">
        <link rel="stylesheet" type="text/css" href="./css/style-DT.css">
        <link rel="stylesheet" type="text/css" href="./css/breadcrumb.css">
        <link rel="stylesheet" type="text/css" href="./css/topbar.css">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

        <script language="javascript">
            function danh_dau_da_doc(){
                $data = "danh-dau-da-doc";
                $.ajax({
                    url : "notification.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        data : $data
                    },
                    success : function (result){
                        $('#notification-button').html(result);
                    }
                });
            }
        </script>
    
    </head>
    <body>
        <?php require_once("./component/header.php"); ?>

        <!-- Thanh công cụ -->
        <div class="sidebar">
            <div class="logo-detail" style="background-color: #B4A5FF;">
                <i class='bx bx-menu' id="btn-menu"></i>
            </div>
            <ul class="nav-list">
                <?php
                    if(isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1) {
                        require_once("./component/sidebar_admin.php");
                    }
                    else {
                        require_once("./component/sidebar_user.php");
                    }
                ?>

                <!-- Nút thao tác khi ở trang đọc truyện -->

                <li>
                    <a href="./comic.php?<?php echo "comic=".$comic_id; ?>">
                        <i class='bx bxs-book'></i>
                        <span class="links_name">Về bìa truyện</span>
                    </a>
                    <span class="tooltip">Về bìa truyện</span>
                </li>
                <li id="trg_trc">
                    <a href="./read.php?<?php echo "comic=".$comic_id."&chapter=".($chapter[$chiso -1]["index"]); ?>">
                        <i class='bx bx-chevrons-left'></i>
                        <span class="links_name">Chương trước</span>
                    </a>
                    <span class="tooltip">Chương trước</span>
                </li>
                <li id="Nav_ListChapBtn">
                    <a>
                        <i class='bx bx-spreadsheet'></i>
                        <span class="links_name">Danh sách chương</span>
                    </a>
                    <span class="tooltip">Danh sách chương</span>
                </li>
                <li id="trg_sau">
                    <a href="./read.php?<?php echo "comic=".$comic_id."&chapter=".($chapter[$chiso +1]["index"]); ?>">
                        <i class='bx bx-chevrons-right' ></i>
                        <span class="links_name">Chương sau</span>
                    </a>
                    <span class="tooltip">Chương sau</span>
                </li>      
            </ul>

            <?php
                if($_GET['chapter'] <= 1){
                    echo '<style>#trg_trc{display: none;}</style>';
                }
                if($_GET['chapter'] >= $chapter[count($chapter)-1]["index"]){
                    echo '<style>#trg_sau{display: none;}</style>';
                }
            ?>

            <div class="Nav_ListChap">
                <ul>
                    <?php
                        foreach($chapter as $item) {
                            echo '<li> <a href="./read.php?comic='.$comic_id.'&chapter='.$item['index'].'"> <span class="links_name"';
                            if($item['index'] == $_GET['chapter']) echo ' style="font-weight: bold;"';
                            echo '>Chương '.$item['index'].'</span> </a> </li>';
                        }
                    ?>
                </ul>
            </div>
        </div>

        <!--Khối tiêu đề đầu trang, dùng để đổi server ảnh-->
        <div class="container-xxl" id="read-story-info">
            <!-- Thanh breadcrumb --> 
            <div class="contain_nav_breadvrumb">
                <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                        <li class="breadcrumb-item"><?php echo $comic[0]['name_cm']; ?></li>
                        <li class="breadcrumb-item active">Chap <?php echo $_GET['chapter']." - ".$comic[0]['name']; ?></li>
                    </ol>
                </nav>
            </div>
            <!--  -->
            <div class="caption">
                <a id="story-title"><?php echo $comic[0]['name_cm']; ?></a>
            </div>
            <div class="caption">
                <a style="font-size: .75em;" id="story-chapter">Chap <?php echo $_GET['chapter']; ?></a>
            </div>
            <p style="font-size: 1em; text-align: center;">Nếu không xem được ảnh vui lòng chọn server khác dưới đây</p>
            <div id="server-option">
                <a class="btn btn-primary" href="#" role="button">Server 1</a>
                <a class="btn btn-primary" href="#" role="button">Server 2</a>
                <a class="btn btn-primary" href="#" role="button">Server 3</a>
            </div>
        </div>

        <!--Hình truyện đọc-->
        <div  id="contentDT">
            <?php
                foreach($page as $item) {
                    echo '<img src="'.$item['link_page'].'" alt="ayame">';
                }
            ?>
        </div>

        <?php if($comic[0]["status"] != "Chờ duyệt") require_once("./component/comment.php"); ?>
         
        <?php $btntop = false; require_once("./component/footer.php"); ?>

        <script>
            $("#btntop").click(function () {
                $("html").animate({
                    scrollTop:0
                }, 750);
            })
        </script>
        
        <script language="javascript" src="./js/jsheader.js"></script>
        <script language="javascript" src="./js/sidebarType2.js"></script>
    </body>
</html>