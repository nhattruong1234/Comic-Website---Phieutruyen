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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="./css/topbar.css">
        <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
        <link rel="stylesheet" type="text/css" href="./css/story-list-style.css">
        <link rel="stylesheet" type="text/css" href="./css/footer.css">
        <link rel="stylesheet" type="text/css" href="./css/style-home.css">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <?php require_once("./component/header.php"); ?>
        <!--test banner mới-->

        <div id="banner-top" class="container-xxl">

            <!--slider start-->
            <div class="slider">
                <div class="slides">
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">
                    <input type="radio" name="radio-btn" id="radio5">
                    <!--slider end-->

                    <!--banner start-->
                    <?php
                        $sql = "select cm.name, cm.status, cm.total_view, cm.coverphoto, cm.detail, cm.id idcomic, count(fl.id_user) tdoi from comic cm left join follow fl on cm.id = fl.id_comic where cm.status != 'Chờ duyệt' GROUP by cm.id limit 5";
                        $truyen_banner = EXECUTE_RESULT($sql);

                        $index = 1;
                        foreach ($truyen_banner as $item) {
                            $abc = "banner first";
                            if($index != 1) $abc = "banner";
                            echo '<div class="'.$abc.'" id="banner-'.($index++).'">
                            <img src="'.($item['coverphoto']).'" onclick="location.href=\'./comic.php?comic='.($item['idcomic']).'\'" style="cursor: pointer;">
                            <div class="banner-info">
                                <h1 class="banner-info-title">'.($item['name']).'</h1>
                                <p class="banner-info-detail">Tình trạng truyện: '.($item['status']).'</p>
                                <p class="banner-info-detail">Lượt xem: '.($item['total_view']).'</p>
                                <p class="banner-info-detail">Lượt theo dõi: '.($item['tdoi']).'</p>
                                <div class="story-info-category">';

                            $sql = "select * from tag_comic str join tag tg on str.id_tag = tg.id where str.id_comic = ".$item['idcomic'];
                            $theloai = EXECUTE_RESULT($sql);
                            foreach ($theloai as $tl) {
                                echo '<button class="category btn-outline-primary" onclick="location.href=\'./typecomic.php?tagid'.$tl['id'].'=on\';">'.$tl['name'].'</button>';
                            }

                            echo '</div>
                                <p class="banner-info-detail">'.($item['detail']).'</p>
                            </div>
                            </div>';
                        }
                    ?>
                    <!--banner end-->

                    <!--auto navigation start-->
                    <div class="auto-navigation">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                        <div class="auto-btn5"></div>
                    </div>
                    <!--auto navigation end-->
                </div>

                <!--manual navigation start-->
                <div class="manual-navigation">
                    <label for="radio1" class="manual-btn" onclick="set_counter(1)"></label>
                    <label for="radio2" class="manual-btn" onclick="set_counter(2)"></label>
                    <label for="radio3" class="manual-btn" onclick="set_counter(3)"></label>
                    <label for="radio4" class="manual-btn" onclick="set_counter(4)"></label>
                    <label for="radio5" class="manual-btn" onclick="set_counter(5)"></label>
                </div>
                <!--manual navigation end-->
            </div>

            <!--3 children ngoai banner-->
            <button class="change-banner-button bi bi-chevron-compact-left" type="button"
                style="top: 40%; right: 101%;"
                id="previous-banner-f"
                onclick="previous_bannerf()">
            </button>

            <button class="change-banner-button bi bi-chevron-compact-right" type="button"
                style="top: 40%; left: 101%;"
                id="previous-banner-f"
                onclick="next_bannerf()">
            </button>

            <script>
                var counter = 1;
                function play_banner() {
                    if(counter > 5) counter = 1;
                    if(counter < 1) counter = 5;
                    document.getElementById('radio' + counter).checked = true;
                    counter++;
                }

                var bannertimer

                function set_counter(index) {
                    counter = index;
                    clearInterval(bannertimer);
                    play_banner();
                    bannertimer = setInterval(play_banner, 5000);
                }

                play_banner();
                bannertimer = setInterval(play_banner, 5000);

                function next_bannerf() {
                    clearInterval(bannertimer);
                    play_banner();
                    bannertimer = setInterval(play_banner, 5000);
                }

                function previous_bannerf() {
                    clearInterval(play_banner);
                    counter=counter-2;
                    play_banner();
                    myBanner_play = setInterval(myTimer, 5000);
                }
            </script>

        </div>

        <!--Story list TRUYEN MOI NHAT -->
        <div class="container-xxl" id="contentTC">
            <!--Story list 0-->
            <ul class="stories-list" id="0-SL">
                <h1 class="caption">Truyện mới nhất</h1>
                <?php
                    $sql = "select cm.updated_at, cm.total_chapter, cm.created_at, cm.name, cm.status, cm.total_view, cm.coverphoto, cm.detail, cm.id idcomic, count(fl.id_user) tdoi from comic cm left join follow fl on cm.id = fl.id_comic where cm.status != 'Chờ duyệt' GROUP by cm.id ORDER BY cm.updated_at DESC LIMIT 10";

                    require_once("./component/list_comic.php");
                ?>

                <div style="width: 100%">
                    <a href="./updated.php" class="row open-list">Xem thêm</a>
                </div>
            </ul>

            <!--story list TRUYEN NHIEU NGUOI XEM NHAT -->
            <ul class="stories-list" id="1-SL">
                <h1 class="scaption">Truyện nhiều lượt xem nhất</h1>

                <?php
                    $sql = "select cm.total_chapter, cm.created_at, cm.updated_at, cm.name, cm.status, cm.total_view, cm.coverphoto, cm.detail, cm.id idcomic, count(fl.id_user) tdoi from comic cm left join follow fl on cm.id = fl.id_comic where cm.status != 'Chờ duyệt' GROUP by cm.id ORDER BY cm.total_view DESC LIMIT 10";
                    require("./component/list_comic.php");
                ?>
            </ul>
        </div>

        <!--side bar-->
        <?php require_once("./component/sidebar.php"); ?>

        <!--tam thoi xoa truyen khoi danh sach-->
        <script>
            function delete_story (element_id) {
                document.getElementById(element_id+"-story").classList.add("d-none")
            }
        </script>

        <?php $btntop=false; require_once("./component/footer.php"); ?>
        
        <script language="JavaScript" src="./js/sidebarType1.js"></script>
        <script language="JavaScript" src="./js/jsheader.js"></script>
        <script language="JavaScript" src="./js/story-list.js"></script>
    </body>
</html>