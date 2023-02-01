<?php
    session_start();


    if(isset($_SESSION['user_id'])) {
        header("Location: ./");
        die();
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
  <link rel="stylesheet" href="./css/formDK-DN.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="./Bootstrap/js/bootstrap.js">
  <link rel="stylesheet" href="./Bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <!--change-password-->
    <script type="text/javascript">
        function validateForm() {
            $password = $('#inputPassword1').val();
            $confimpass = $('#inputPassword2').val();
            if($password != $confimpass) {
                alert("Mật khẩu không khớp")
                return false
            }
            return true
        }
    </script>
<!-- //form// -->
    <div class="container-xxl contain">
        <div class="logo">
            <img src="./img/image.png" alt="logo">
            <h2>PhieuTruyen.com</h2>
        </div>
        <form action="./action_register.php" method="POST" onsubmit="return validateForm();">
            <h2>ĐĂNG KÝ TÀI KHOẢN</h2><br>

            <div class="form-group">
                <input class="form-control" type="name" name="username" placeholder="Tên đăng nhập"  minlength="6">
            </div> 
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Mật khẩu"  minlength="6">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="passwordII" placeholder="Nhập lại mật khẩu"  minlength="6">
            </div>  
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <input class="input1" type="submit" value="Đăng ký">
                <p><b>Bạn đã có tài khoản? <a href="./login.php">Đăng nhập</a></b></p>
        </form>
    </div>
</body>
</html>
