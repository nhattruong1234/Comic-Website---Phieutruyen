<?php
    session_start();

    require_once ('./database/connect_database.php');

    $now = time();
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF"
        crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
        <link rel="stylesheet" type="text/css" href="./css/footer.css">
        <link rel="stylesheet" type="text/css" href="./css/story-list-style.css">
        <link rel="stylesheet" type="text/css" href="./css/breadcrumb.css">
        <link rel="stylesheet" type="text/css" href="./css/pagination.css">
        <link rel="stylesheet" type="text/css" href="./css/topbar.css">
        <link rel="stylesheet" type="text/css" href="./css/Theodoi.css">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    
        <script language="javascript">
            function xoa_theo_doi(id_td, name) {
                if (!confirm("Bỏ theo dõi truyện '"+name+"'"))
                return;
                $data = "xoa-theo-doi";
                $.ajax({
                    url : "delete_following.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        data : $data,
                        id_follow : id_td
                    },
                    success : function (result){
                        $('content').html(result);
                    }
                });
            }
        </script>
    </head>

    <body>

    <?php require_once("./component/header.php"); ?>

    <?php require_once("./component/sidebar.php"); ?>

    <div id="content" class="container-xxl">
        <!-- Thanh breadcrumb --> 
        <div class="contain_nav_breadvrumb">
            <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                    <li class="breadcrumb-item active">Truyện theo dõi</li>
                </ol>
            </nav>
        </div>
        <h2 class="caption">TRUYỆN THEO DÕI</h2>
            <div class="d-flex" style="justify-content: space-between; flex-direction: column; height: 1000px;">
                <!--Story list 0-->
                <ul class="stories-list" id="0-SL">
                <?php
                    if(isset($_SESSION['user_id'])) {
                        $sql = "SELECT count(*) as total FROM comic cm join follow fl on fl.id_comic = cm.id WHERE fl.id_user = ".$_SESSION['user_id'];
                        $result = EXECUTE_RESULT($sql);
                        $total_records = $result[0]['total'];
                        
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 20;
                        
                        $total_page = ceil($total_records / $limit);
                        
                        if ($current_page > $total_page){
                            $current_page = $total_page;
                        }
                        else if ($current_page < 1){
                            $current_page = 1;
                        }
                        
                        $start = ($current_page - 1) * $limit;
                        $start = $start >= 0 ? $start : 0;
                        
                        $sql = "SELECT cm.id idcomic, cm.name, cm.coverphoto, cm.total_chapter, cm.detail, cm.total_view, cm.rating, cm.status, cm.id_user, cm.author, cm.created_at, cm.updated_at, fl.id FROM comic cm join follow fl on fl.id_comic = cm.id WHERE fl.id_user = ".$_SESSION['user_id']." GROUP by cm.id order by fl.created_at desc LIMIT $start, $limit";
                        $followcomic = EXECUTE_RESULT($sql);
                        $index = 0;
                        foreach($followcomic as $item) {
                            $inmoi = "";
                            $time = $item['created_at'];                                                                                                                                                                                                                                                                                                         
                            $time = date_parse_from_format('Y-m-d H:i:s', $time);
                            $time_stamp = mktime($time['hour'],$time['minute'],$time['second'],$time['month'],$time['day'],$time['year']);
                            if(($now - $time_stamp) <= 7*24*60*60){
                                $inmoi = "<span class=\"badge bg-warning text-dark\">Mới</span>";
                            }
                            $follow = EXECUTE_RESULT("select count(*) total from follow where id_comic = ".$item['idcomic']);
                            echo '<li class="story" id="0'.$index.'-story">
                            <div class="story-i-tag">
                                <span class="badge bg-info text-dark">'.$item['updated_at'].'</span>'.$inmoi.'
                            </div>
                            <button class="close-cmt btn btn-danger delete-button" type="button" onclick="xoa_theo_doi('.$item['id'].', \''.$item['name'].'\')">
                                <i class="bi bi-x"></i>
                            </button>
                            <a href="./comic.php?comic='.($item['idcomic']).'">
                                <img src="'.$item['coverphoto'].'" alt="tk">
                                <h6 class="story-title">'.$item['name'].'</h6>
                            </a>               
                            <p class="story-chapter"><a href="./read.php?comic='.$item['idcomic'].'&chapter='.$item['total_chapter'].'">Chap '.$item['total_chapter'].'</a></p>
                            <div class="story-info"  id="0'.($index++).'-story-info">
                                <h1 class="story-info-title">'.$item['name'].'</h1>
                                <p class="story-info-detail">Tình trạng truyện: '.$item['status'].'</p>
                                <p class="story-info-detail">Lượt xem: '.$item['total_view'].'</p>
                                <p class="story-info-detail">Lượt theo dõi: '.$follow[0]['total'].'</p>
                                <div class="story-info-category">';

                            $sql = "select * from tag_comic str join tag tg on str.id_tag = tg.id where str.id_comic = ".$item['idcomic'];
                            $theloai = EXECUTE_RESULT($sql);
                            foreach ($theloai as $tl) {
                                echo '<button class="category btn-outline-primary" onclick="location.href=\'./typecomic.php?tagid'.$tl['id'].'=on\';">'.$tl['name'].'</button>';
                            }

                            echo '</div>
                                <p class="story-info-detail">'.$item['detail'].'</p>
                            </div>
                            </li>';
                        }
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>

    <?php $btntop = false; require_once("./component/footer.php"); ?>
    
    <script language="javascript" src="./js/jsheader.js"></script>
    <script language="javascript" src="./js/story-list.js"></script>
    <script language="JavaScript" src="./js/sidebarType1.js"></script>
</body>
</html>