<?php
    session_start();

    require_once ('./database/connect_database.php');

    if(isset($_SESSION['user_id'])) {
        //PHAN TRANG
        $sql = "SELECT count(*) as total from comic where id_user = ".$_SESSION['user_id'];
        $result = EXECUTE_RESULT($sql);
        $total_records = $result[0]['total'];
        
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
        
        $total_page = ceil($total_records / $limit);
        
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        
        $start = ($current_page - 1) * $limit;
        $start = $start >= 0 ? $start : 0;
        
        $sql = "SELECT * from comic where id_user = ".$_SESSION['user_id']." LIMIT $start, $limit";
        $comic = EXECUTE_RESULT($sql);

        $now = time();
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF"
    crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="./css/topbar.css">
    <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/breadcrumb.css">
    <link rel="stylesheet" type="text/css" href="./css/pagination.css">
    <link rel="stylesheet" type="text/css" href="./css/QLTruyen.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script language="javascript">
        function xoa(id_truyen){
            $data = "xoa-truyen";
            $.ajax({
                url : "delete_comic.php",
                type : "post",
                dataType:"text",
                data : {
                    data : $data,
                    sid : id_truyen
                },
                success : function (result){}
            });
        }

        function xoa_truyen(id_truyen, name) {
            if (!confirm("Bạn chăc chắn muốn xóa truyện '"+name+"'?"))
                return;
            xoa(id_truyen);
        }
    </script>
</head>
<body>
    <?php require_once("./component/header.php"); ?>
    
    <?php require_once("./component/sidebar.php"); ?>

    <div class="container-xxl" id="content">
        <!-- Thanh breadcrumb --> 
        <div class="contain_nav_breadvrumb">
            <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                    <li class="breadcrumb-item active">Quản lý truyện đã đăng</li>
                </ol>
            </nav>
        </div>

        <div>
            <h1 class="caption">Quản lý truyện đã đăng</h1>

            <?php
            if(isset($_SESSION['user_id'])) {
                $index = 1;
                foreach ($comic as $item) {
                    echo '<div class="story-bar" id="sb-'.($index++).'">
                    <img src="'.$item['coverphoto'].'">
                    <div class="story-bar-info">
                        <div class="story-bar-info-detail">
                            <h3 style="font-weight: bold; cursor: pointer;" onclick="location.href=\'./comic.php?comic='.$item['id'].'\'">'.$item['name'].'</h3>
                            <p>Tình trạng: '.$item['status'].'</p>
                            <p>Cập nhập: '.$item['updated_at'].'</p>
                            </div>
                        <div class="story-setting-option">
                            <div class="column3">
                                <button ><a href="./postcomic.php?comic='.$item['id'].'"><i class="fa fa-list-ul" style="color: black;"></i> Quản lí chương</a></button>
                            </div>
                        </div>
                    </div>
                    <button class="close-cmt btn btn-danger delete-button" type="button" onclick="xoa_truyen('.$item['id'].', \''.$item['name'].'\')">
                        <i class="bi bi-trash"></i>
                    </button>
                    </div>';
                }
            }
            ?>

            <!--story 5-->   
            <a href="./postcomic.php" class="story-bar" id="add-New-Story"><i class="fa fa-plus-circle"></i>Đăng truyện mới</a>
            
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

    <?php $btntop = false; require_once("./component/footer.php"); ?>

    <script language="javascript" src="./js/jsheader.js"></script>
    <script language="javascript" src="./js/sidebarType1.js"></script>
</body>
</html>

