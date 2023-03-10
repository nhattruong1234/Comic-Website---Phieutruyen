<?php
    session_start();

    require_once ('./database/connect_database.php');

    if(isset($_SESSION['user_id'])) {
        $sql = "SELECT count(*) as total FROM readed rdd WHERE rdd.id_user = ".$_SESSION['user_id'];
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
        
        $sql = "SELECT cm.id idcomic, cm.name, cm.author, cm.id_user, cm.status, cm.coverphoto, cm.total_view, cm.total_chapter, cm.rating, cm.detail, cm.created_at, cm.updated_at, count(DISTINCT fl.id_user) follow, rdd.id lsdoc, chap.index FROM readed rdd join chapter chap on chap.id = rdd.id_chapter join comic cm on chap.id_comic = cm.id left join follow fl on cm.id = fl.id_comic WHERE rdd.id_user = ".$_SESSION['user_id']." group by cm.id order by rdd.created_at desc LIMIT $start, $limit";
        $readedcomic = EXECUTE_RESULT($sql);

        $now = time();
    }
?>



<!DOCTYPE html>
<html lang="vi">
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
        <link rel="stylesheet" type="text/css" href="./css/story-list-style.css">
        <link rel="stylesheet" type="text/css" href="./css/breadcrumb.css">
        <link rel="stylesheet" type="text/css" href="./css/pagination.css">
        <link rel="stylesheet" type="text/css" href="./css/topbar.css">
        <link rel="stylesheet" type="text/css" href="./css/LSD.css">
        
        <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    
        <script language="javascript">
            function xoa_ls_doc(id_ls) {
                $data = "xoa-ls-doc";
                $.ajax({
                    url : "delete_history.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        data : $data,
                        id_history : id_ls
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

    <div id="content" class="container-xxl">
        <!-- Thanh breadcrumb -->
        <div class="contain_nav_breadvrumb">
            <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                    <li class="breadcrumb-item active">Lịch sử đọc</li>
                </ol>
            </nav>
        </div>

        <h2 class="caption">LỊCH SỬ ĐỌC</h2>
        
        <div class="da-duoc-dang-nhap">
        <div class="d-flex" style="justify-content: space-between; flex-direction: column; min-height: 1000px;">
            <!--Story list 0-->
            <ul class="stories-list" id="0-SL">
            <?php
            if(isset($_SESSION['user_id'])) {
                $index = 0;
                foreach ($readedcomic as $item) {
                    echo '<li class="story" id="0'.$index.'-story">
                    <div class="story-i-tag">
                        <span class="badge bg-info text-dark">'.$item['updated_at'].'</span>
                    </div>
                    <button class="close-cmt btn btn-danger delete-button" type="button" onclick="xoa_ls_doc('.$item['lsdoc'].')">
                        <i class="bi bi-x"></i>
                    </button>
                    <a href="./read.php?comic='.$item['idcomic'].'&chapter='.$item['index'].'">
                        <img src="'.$item['coverphoto'].'" alt="tk">
                        <h6 class="story-title">'.$item['name'].'</h6>
                    </a>    
                    <p class="story-chapter"><a href="./read.php?comic='.$item['idcomic'].'&chapter='.$item['total_chapter'].'">Chap '.$item['total_chapter'].'</a></p>           
                    <div class="story-info"  id="0'.($index++).'-story-info">
                        <h1 class="story-info-title">'.$item['name'].'</h1>
                        <p class="story-info-detail">Tình trạng truyện: '.$item['status'].'</p>
                        <p class="story-info-detail">Lượt xem: '.$item['total_view'].'</p>
                        <p class="story-info-detail">Lượt theo dõi: '.$item['follow'].'</p>
                        <div class="story-info-category">'; 



                    $sql = "select * from tag_comic tm join tag tg on tm.id_tag = tg.id where tm.id_comic = ".$item['idcomic'];
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

            <div class="contain_nav_pagination" style="display: none;">
                <nav class="nav_pagination" aria-label="Page navigation example">
                    <ul class="pagination">
                    <?php
                        //  <p class="story-chapter"><a href="#">Chap '.$item['total_chapter'].'</a></p>
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev 
                        if ($current_page > 1 && $total_page > 1){
                            echo '<li class="page-item">
                            <a class="page-link" href="./history.php?page='.($current_page-1).'"><i class="bx bx-first-page"></i></a>
                            </li>';
                        }
                        if ($total_page > 1){
                            echo '<li class="page-item">
                                <a class="page-link" href="./history.php?page=1" tabindex="-1" aria-disabled="true">Page 1</a>
                            </li>';
                        }
                        // Lặp khoảng giữa
                        for ($i = 2; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page){
                                echo '<li class="page-item">
                                    <a class="page-link" href="./history.php?page='.$i.'" tabindex="-1" aria-disabled="true">Page '.$i.'</a>
                                </li>';
                            }
                            else{
                                echo '<li class="page-item">
                                    <a class="page-link" href="./history.php?page='.$i.'" tabindex="-1" aria-disabled="true">Page '.$i.'</a>
                                </li>';
                            }
                        }
    
                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<li class="page-item">
                            <a class="page-link" href="./history.php?page='.($current_page+1).'"><i class="bx bx-last-page" ></i></a>
                            </li>';
                        }
                    ?>
                    </ul>
                </nav>
            </div>
        </div>
        </div>
    </div>

    <?php require_once("./component/sidebar.php"); ?>

    <?php $btntop = false; require_once("./component/footer.php"); ?>

    <script language="javascript" src="./js/jsheader.js"></script>
    <script language="javascript" src="./js/story-list.js"></script>
    <script language="JavaScript" src="./js/sidebarType1.js"></script>
    </body>
</html>