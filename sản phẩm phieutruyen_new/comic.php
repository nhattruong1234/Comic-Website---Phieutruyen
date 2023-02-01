<?php
    session_start();


    require_once ('./database/connect_database.php');

    $user = [];

    $comic_id = 0;
    if(isset($_GET['comic'])) {
        $comic_id = (int)$_GET['comic'];
    }
    else {
        header("Location: ./");
        die();
    }

    $sql_cm = "select cm.id, cm.coverphoto, cm.id_user, cm.name, cm.author, cm.status, cm.total_view, cm.total_chapter, cm.detail, cm.created_at, cm.updated_at, count(fl.id_user) follow from comic cm left join follow fl on cm.id = fl.id_comic where cm.status != 'Chờ duyệt' and cm.id = ".$comic_id." group by cm.id";
    $sql_ch = "select * from chapter where status='Đã duyệt' and id_comic = ".$comic_id;

    if(isset($_SESSION["user_id"])) {
        $sql = "select isadmin from login where id_user = ".$_SESSION["user_id"];
        $result = EXECUTE_RESULT($sql);
        if($result[0]["isadmin"] == 1) {
            $sql_cm = "select cm.id, cm.coverphoto, cm.id_user, cm.name, cm.author, cm.status, cm.total_view, cm.total_chapter, cm.detail, cm.created_at, cm.updated_at, count(fl.id_user) follow from comic cm left join follow fl on cm.id = fl.id_comic where cm.id = ".$comic_id." group by cm.id";
            $sql_ch = "select * from chapter where id_comic = ".$comic_id;
        }
    }

    $comic = EXECUTE_RESULT($sql_cm);

    if(is_null($comic[0]['id'])) {
        header("Location: ./");
        die();
    }

    $sql = "select * from tag_comic tm join tag tg on tm.id_tag = tg.id where id_comic = ".$comic_id;
    $theloai = EXECUTE_RESULT($sql);

    $chapter = EXECUTE_RESULT($sql_ch);
?>


<!DOCTYPE html>
<html lang="vi" class>
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
    <link rel="stylesheet" type="text/css" href="./css/breadcrumb.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/style-Storywall.css">
    <link rel="stylesheet" type="text/css" href="./css/style-DT.css">

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
    <?php require_once("./component/sidebar.php"); ?>

    <div class="container-xxl" id="content">
        <!-- Thanh breadcrumb --> 
        <div class="contain_nav_breadvrumb">
            <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                    <li class="breadcrumb-item active"><?php echo $comic[0]['name']; ?></li>
                </ol>
            </nav>
        </div>

        <div class="banner">
            <img src="<?php echo $comic[0]['coverphoto']; ?>" alt="<?php echo $comic[0]['name']; ?>" id="banner-1-img">
            <div class="banner-info">
                <h1 class="banner-info-title"><?php echo $comic[0]['name']; ?></h1>
                <p class="banner-info-detail">Tình trạng truyện: <?php echo $comic[0]['status']; ?></p>
                <p class="banner-info-detail">Lượt xem: <?php echo $comic[0]['total_view']; ?></p>
                <p class="banner-info-detail">Lượt theo dõi: <?php echo $comic[0]['follow']; ?></p>
                <div class="banner-info-category">
                    <?php
                        foreach($theloai as $item) {
                            echo '<button class="category btn-outline-primary" onclick="location.href=\'./typecomic.php?tagid'.$item['id'].'=on\';">'.$item['name'].'</button>';
                        }
                    ?>
                </div>
                <div class="list-btn-contain">
                    <?php
                        echo '<button class="list-btn" style="width: fit-content;" onclick="location.href=\'./action_follow.php?cm='.$comic_id;

                        if(isset($_SESSION['user_id'])) {
                            $ktra = EXECUTE_RESULT("select id, count(*) total from follow where id_comic= ".$comic_id." and id_user=".$_SESSION['user_id']);
                            if($ktra[0]['total']) {
                                echo '&id='.$ktra[0]['id'].'\'"><i class=\'bx bxs-heart\'></i> Đang theo dõi</button>';
                            }
                            else echo '&id=-1&name='.$user[0]['account_name'].'\'"><i class=\'bx bxs-heart\'></i> Theo dõi</button>';
                        }
                        else echo '&id=-1\'"><i class=\'bx bxs-heart\'></i> Theo dõi</button>';
                    ?>
                    <button class="list-btn" 
                        <?php
                            if(count($chapter) == 0) {
                                echo 'style="display: none;" ';
                            }
                            echo 'onclick="location.href=\'./read.php?comic='.$comic_id.'&chapter=1\'"';
                        ?>                    
                    ><i class='bx bxs-book-open'></i> Đọc từ đầu</button>
                </div>
                <p class="banner-info-detail"><?php echo $comic[0]['detail']; ?> </p>
            </div>
        </div>

        <h2 class="caption">DANH SÁCH CHƯƠNG</h2>

        <div class="row workspace">
            <div class="listchapter">
                <ul class="col">
                    <?php
                        foreach ($chapter as $item) {
                            echo '<li class="chapteritem">
                            <a href="./read.php?comic='.$comic_id.'&chapter='.$item['index'].'" class="col mb-10">Chương '.$item['index'].': '.$item['name'].'</a>
                            <p class="date-upload col-2">'.$item['updated_at'].'</p>
                        </li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>


    <!--Bình luận-->
    <?php if($comic[0]["status"] != "Chờ duyệt") require_once("./component/comment.php"); ?>

    <?php $btntop=false; require_once("./component/footer.php"); ?>
    <script language="JavaScript" src="./js/jsheader.js"></script>
    <script language="JavaScript" src="./js/sidebarType1.js"></script>
</body>
</html>