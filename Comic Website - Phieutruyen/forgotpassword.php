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
</head>

<body>
    <style>
        #notification {
            height: 50px;
            width: 100%;
            top: 0px;
            left: 0px;
            text-align: center;
            position:absolute;
        }
        #notification > h4 {
          font-weight: 800;
          margin-top: 10px;
        }
    </style>
    <div id="notification"">

    </div>


   <div class="container-xxl contain">
    <div class="logo">
      <img src="./img/image.png" alt="logo">
        <h2>PhieuTruyen.com</h2>
    </div>

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
    
    <form method="POST" action="./action_reset_password.php" onsubmit="return validateForm();">
      <h2>QUÊN MẬT KHẨU</h2><br>

      <div class="form-group">
        <input id="input-name" class="form-control" type="name" name="name" placeholder="Tên đăng nhập" required>
      </div>

      <div class="form-group">
        <input id="input-email" class="form-control" type="email" name="email" placeholder="Email" required>
      </div>  

      <div class="form-group ConfirmCode">
        <input class="form-control" type="code" name="code" placeholder="Mã xác nhận" style="margin: 0 0;">
        <div id="confim" class="CofirmCodeBtn" style="margin: 0 0;"><i class='bx bxs-send'></i></div>
      </div>
      <div>
        <input id="inputPassword1" class="form-control" type="password" name="password" placeholder="Mật khẩu mới">
      </div>  

      <div class="form-group">
        <input id="inputPassword2" class="form-control" type="password" name="password" placeholder="Nhập lại mật khẩu">
      </div> 

      <button id="btn-login" class="input1">Gửi</button>
      <p><b>Bạn chưa có tài khoản? <a href="./register.php">Đăng kí</a></b></p>
    </form>


    <script>
      const div_notification = document.getElementById("notification");
      const h_notification = document.getElementById("display-notification");
      function display_notification(type) {
        switch (type) {
          case 0:
            div_notification.removeAttribute("style");
            notification.setAttribute("style", "color:green;");
            notification.textContent = "Mật khẩu thay đổi thanh công.";
            window.location="./login.php";
            break;
          case 1:
            div_notification.removeAttribute("style");
            notification.setAttribute("style", "color:red;");
            notification.textContent = "Tên đăng nhập hoặc email không tồn tại.";
            break;
          case 2:
            div_notification.removeAttribute("style");
            notification.setAttribute("style", "color:red;");
            notification.textContent = "Mã xác nhận không hợp lệ.";
            break;
        }
      }

      document.getElementById("confim").onclick = function() {
        const email = document.getElementById("input-email");
        const name = document.getElementById("input-name");
        let _email = email.value;
        let _name = name.value;
        $data = "gui-mail-xac-nhan";
        $.ajax({
          url : "action_query.php",
          type : "post",
          dataType:"text",
          data : {
            data : $data,
            email : _email,
            name : _name
          },
          success : function (result){
            $('#notification').html(result);
          }
        });
      }

      document.getElementById("btn-login").onclick = function() {
        const email = document.getElementById("input-email");
        const name = document.getElementById("input-name");
        const password = document.getElementById("inputPassword1").value;
        const confimpass = document.getElementById("inputPassword2").value;
        if($password != $confimpass) {
          document.getElementById("notification").innerHTML = '<h4 style="color:crimson;">Mật khẩu không khớp.</h4>';
        }
      }

    </script>

   </div>
</body>
</html>
