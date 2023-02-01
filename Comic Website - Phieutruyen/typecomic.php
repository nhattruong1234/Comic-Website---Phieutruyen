<?php
    session_start();

    require_once ('./database/connect_database.php');

    $theloaitr = EXECUTE_RESULT("SELECT * FROM tag");
    $quocgiatr = EXECUTE_RESULT("SELECT * FROM country");

    $dieukien = "";
    $ktra = false;

    if(isset($_GET['cCompleted'])) {
        if($ktra) {$dieukien = $dieukien."or ";}
        else{$ktra=true;}
        $dieukien = $dieukien."str.status = 'Đã hoàn thành' ";
    }
    if(isset($_GET['cInProgress'])) {
        if($ktra) {$dieukien = $dieukien."or ";}
        else{$ktra=true;}
        $dieukien = $dieukien."str.status = 'Đang tiến hành' ";
    }
    if(isset($_GET['cDropped'])) {
        if($ktra) {$dieukien = $dieukien."or ";}
        else{$ktra=true;}
        $dieukien = $dieukien."str.status = 'Tạm ngưng' ";
    }

    foreach ($theloaitr as $item) {
        if(isset($_GET['tagid'.$item['id']])) {
            if($ktra) {$dieukien = $dieukien."or ";}
            else{$ktra=true;}
            $dieukien = $dieukien."stt.id_tag = ".$item['id']." ";
        }
    }
    foreach ($quocgiatr as $item) {
        if(isset($_GET['countryid'.$item['id']])) {
            if($ktra) {$dieukien = $dieukien."or ";}
            else{$ktra=true;}
            $dieukien = $dieukien."con.id = ".$item['id']." ";
        }
    }

    if($dieukien != "") {
        $dieukien = "where ".$dieukien." and str.status != 'Chờ duyệt' ";
    }
    else $dieukien = "where str.status != 'Chờ duyệt' ";
    

    $sql = "SELECT count(DISTINCT str.id) total FROM comic str JOIN country con on str.id_country = con.id LEFT JOIN tag_comic stt ON str.ID = stt.id_comic LEFT JOIN tag tg ON stt.id_tag = tg.ID ".$dieukien;
    $result = EXECUTE_RESULT($sql);
    
    if(count($result) == 0) {
        $total_records = 0;
    } else $total_records = $result[0]['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 20;
    
    $total_page = ceil($total_records / $limit);
    
    if ($current_page > $total_page) {
        $current_page = $total_page;
    }
    else if ($current_page < 1) {
        $current_page = 1;
    }
    
    $start = ($current_page - 1) * $limit;
    $start = $start >= 0 ? $start : 0;

    $sql_comic = "SELECT str.id idcomic, str.name, str.coverphoto, str.total_view, str.detail, str.total_chapter, str.rating, str.status, str.id_user, str.author, str.created_at, str.updated_at, count(DISTINCT fl.id_user) tdoi FROM comic str LEFT JOIN follow fl on str.id = fl.id_comic LEFT JOIN country con on str.id_country = con.id LEFT JOIN tag_comic stt ON str.id = stt.id_comic ".$dieukien." GROUP by str.id LIMIT $start, $limit";
    // echo $sql_comic;
    // die();
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF"
        crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
        <link rel="stylesheet" type="text/css" href="./css/footer.css">
        <link rel="stylesheet" type="text/css" href="./css/story-list-style.css">
        <link rel="stylesheet" type="text/css" href="./css/breadcrumb.css">
        <link rel="stylesheet" type="text/css" href="./css/pagination.css">
        <link rel="stylesheet" type="text/css" href="./css/topbar.css">
        <link rel="stylesheet" type="text/css" href="./css/category.css">        
        <link rel="stylesheet" type="text/css" href="./css/TheLoai.css">

        <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <script>
            function submitForm(){
                document.getElementById('The-loai').submit();
            }
        </script>
        <?php require_once("./component/header.php"); ?>

        <?php require_once("./component/sidebar.php"); ?>

        <div id="content" class="container-xxl">
            <!-- Thanh breadcrumb --> 
            <div class="contain_nav_breadvrumb">
                <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                        <li class="breadcrumb-item active">Thể loại</li>
                    </ol>
                </nav>
            </div>

            <!--The loai-->
            <div id="category-content">
                <form class="categories" id="The-loai">

                    <label class="caption">Thể loại</label>

                    <?php
                        foreach ($theloaitr as $item) {
                            echo '<div class="fcategory">
                            <input type="checkbox" name="tagid'.$item['id'].'" id="c'.$item['id'].'">
                            <label for="c'.$item['id'].'">'.$item['name'].'</label>
                            </div>';
                        }
                    ?>

                    <label class="caption" style="font-weight: bold;">Quốc gia</label>

                    <?php
                        foreach ($quocgiatr as $item) {
                            echo '<div class="fcategory">
                            <input type="checkbox" name="countryid'.$item['id'].'" id="c'.$item['id'].'">
                            <label for="c'.$item['id'].'">'.$item['name'].'</label>
                            </div>';
                        }
                    ?>

                    <label class="caption" style="font-weight: bold;">Tình trạng</label>

                    <div class="fcategory">
                        <input type="checkbox" name="cCompleted" id="cCompleted">
                        <label for="cCompleted">Đã hoàn thành</label>
                    </div>
                    <div class="fcategory">
                        <input type="checkbox" name="cInProgress" id="cInProgress">
                        <label for="cInProgress">Đang tiến hành</label>
                    </div>
                    <div class="fcategory">
                        <input type="checkbox" name="cDropped" id="cDropped">
                        <label for="cDropped">Tạm ngưng</label>
                    </div>
                </form>

                <button type="submit" id="search-story-input" onclick="submitForm()">Tìm kiếm</button>

            </div>

            <div class="d-flex" style="justify-content: space-between; flex-direction: column; min-height: 1000px;"  id="contentDST-TL">
                <ul class="stories-list" id="0-SL">

                <?php
                    $sql = $sql_comic;
                    require_once("./component/list_comic.php");
                ?>
                
                </ul>

                <div class="contain_nav_pagination">
                    <nav class="nav_pagination" aria-label="Page navigation example">
                        <ul class="pagination">
                        <?php
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

        <?php $btntop=false; require_once("./component/footer.php"); ?>
        <script language="JavaScript" src="./js/sidebarType1.js"></script>
        <script language="JavaScript" src="./js/jsheader.js"></script>
        <script language="JavaScript" src="./js/story-list.js"></script>
    </body>
</html>