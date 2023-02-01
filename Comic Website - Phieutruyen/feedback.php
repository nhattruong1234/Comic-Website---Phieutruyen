<?php
    session_start();

    require_once ('./database/connect_database.php');
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
    <link rel="stylesheet" href="./css/style-Report.css">
    <link rel="stylesheet" href="./css/topbar.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/breadcrumb.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./Bootstrap/js/bootstrap.js">
    <link rel="stylesheet" href="./Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <?php require_once("./component/header.php"); ?>

    <script>
        function open_list(element_id) {
            document.getElementById(element_id).classList.toggle("visible");
        }

        function close_list(element_id) {
            let list = document.getElementById(element_id);
            if (list.classList.contains("visible"))
            document.getElementById(element_id).classList.remove("visible");
        }

        function turn_on_off_notifi (element_id_i, element_id_t) {
            let newtext = document.getElementById(element_id_t);
            let icon_btn = document.getElementById(element_id_i)
            if (icon_btn.classList.contains("bi-bell")) {
                newtext.innerHTML = "Bật thông báo";
                icon_btn.classList.replace("bi-bell", "bi-bell-fill");
            } else {
                newtext.innerHTML = "Tắt thông báo";
                icon_btn.classList.replace("bi-bell-fill", "bi-bell");
            }
        }
    </script>
    
    <?php require_once("./component/sidebar.php"); ?>

    <div class="container-xxl"  id="content">
    <!-- Thanh breadcrumb --> 
    <div class="contain_nav_breadvrumb">
        <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                <li class="breadcrumb-item active">Phản hồi</li>
            </ol>
        </nav>
    </div>
    <!--  -->
    <h2 class="caption">PHẢN HỒI</h2>
    <div class="form-content">
        <form action="./action_feedback.php" method="POST">
            <div class="mb-3 mt-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="mb-3">
                <label for="report" class="form-label">Phản hồi:</label>
                <select class="form-select" id="report" name="type">
                    <option selected disabled value="">Chọn loại phản hồi</option>
                    <option>Lỗi ảnh truyện</option>
                    <option>Báo cáo vi phạm</option>
                    <option>Lỗi trang web</option>
                    <option>Khác</option>
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" placeholder="Tiêu đề" name="title">
              </div>
            <div>
                <label for="comment">Chi tiết:</label>
                <textarea class="form-control" rows="5" id="comment" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    </div>

    <?php $btntop = true; require_once("./component/footer.php"); ?>

    <script language="JavaScript" src="./js/sidebarType1.js"></script>
</body>
</html>