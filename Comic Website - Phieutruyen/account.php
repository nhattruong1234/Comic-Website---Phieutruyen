<?php
    session_start();

    require_once ('./database/connect_database.php');
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
        <link rel="stylesheet" type="text/css" href="./css/topbar.css">
        <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
        <link rel="stylesheet" type="text/css" href="./css/style-QLTTTK.css">
        <link rel="stylesheet" type="text/css" href="./css/breadcrumb.css">
        <link rel="stylesheet" type="text/css" href="./css/footer.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <style>
            #luu-anh-dai-dien {
                position: absolute;
                cursor: pointer;
                top: 20px;
                left: 20px;
                width: 300px;
                height: 35px;
                background:#C4C4C4;
                border-radius: 5px;
                font-weight: bold;
            }
        </style>
        <?php require_once("./component/header.php"); ?>

        <?php require_once("./component/sidebar.php"); ?>
        
        <?php
            if(isset($_SESSION['user_id'])) {
                $sql = "select * from user ur join login lg on ur.id = lg.id_user where id = ".$_SESSION['user_id'];
                $user = EXECUTE_RESULT($sql);
            }
        ?>
        <!--QLTTTK-->
        <div class="contentQLTK container-xxl" id="content">
            <div class="contain_nav_breadvrumb">
                <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                        <li class="breadcrumb-item">Quản lý tài khoản</li>
                    </ol>
                </nav>
            </div>

            <div>
            <h1 class="caption">QUẢN LÝ THÔNG TIN TÀI KHOẢN</h1>
            <!--account-info-->
            <div class="account-info" id="acc-info">

                <div class="input-img" style="display: block; position: relative;">
                    
                    <img id="avatar-profile" src="
                        <?php
                            if ($user[0]['avatar'] != NULL) echo $user[0]['avatar'];
                            else echo './img/logo.png'
                        ?>" alt="avatar" id="acc-avatar">
                    <label for="file-input">
                        <i class="bi bi-camera-fill"></i>
                    </label>
                    <form id="abcnabx-avatar" method="POST" action="./update_photo.php" enctype="multipart/form-data">
                        <input type="file" class="form-select" class="form-control" aria-label="file example" id="file-input" name="file-input" style="display: none;">
                        <input type="submit" value="Cập nhật" id="luu-anh-dai-dien" style="display:none;">
                    </form>
                </div>

                <script>
                    document.getElementById("file-input").onchange = function () {
                        document.getElementById('luu-anh-dai-dien').setAttribute('style', 'display: inline-block');
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            // get loaded data and render thumbnail.
                            document.getElementById("avatar-profile").src = e.target.result;
                        };

                        // read the image file as a data URL.
                        reader.readAsDataURL(this.files[0]);
                    };

                </script>


                <!--account info detail-->
                <form class="account-info-detail" id="acc-info-detail" action="./update_info.php" method="POST">

                    <input type="text" class="form-control" name="accout" aria-label="Disabled input example" readonly value="<?php echo $user[0]['username']?>" id="acc-username">
                    <input type="text" class="form-control" name="username" placeholder="Tên người dùng" id="acc-name" value="<?php echo $user[0]['account_name']?>">
                    <input type="email" class="form-control" name="gmail" placeholder="Email" id="acc-email" value="<?php echo $user[0]['email']?>">
                    <div class="container d-flex flex-row justify-content-between" style="padding: 0;">
                        <input type="date" class="form-control" name="dateofbith" placeholder="Ngày sinh" id="acc-dob" value="<?php echo $user[0]['dateofbirth']?>">
                        <select class="form-select" style="max-width: 400px;" name="sex" id="acc-sex">
                            <option selected disabled value="">Chọn giới tính</option>

                            <?php
                                if($user[0]['sex'] == "Nam") {
                                    echo '<option selected>Nam</option>
                                    <option>Nữ</option>
                                    <option>Khác</option>';
                                }
                                else if($user[0]['sex'] == "Nữ") {
                                    echo '<option>Nam</option>
                                    <option selected>Nữ</option>
                                    <option>Khác</option>';
                                }
                                    else if($user[0]['sex'] == "Khác") {
                                            echo '<option>Nam</option>
                                            <option>Nữ</option>
                                            <option selected>Khác</option>';
                                        }
                                        else {
                                            echo '<option>Nam</option>
                                            <option>Nữ</option>
                                            <option>Khác</option>';
                                        }
                            ?>

                        </select>
                    </div>
                    <input type="text" class="form-control" name="id" placeholder="<?php echo $user[0]['id']?>" readonly id="acc-uid">
                    <input type="url" class="form-control" name="facebook" placeholder="Facebook" id="acc-fb" value="<?php echo $user[0]['facebook']?>">
                    <input type="submit" value="Cập nhật">
                </form>

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

                <div class="change-password container d-flex flex-column" id="c-password">
                <form method="POST" action="./update_password.php" onsubmit="return validateForm();">
                    <input type="password" class="form-control" required="true" id="inputPassword0" name="current_pass" placeholder="Mật khẩu hiện tại" minlength="6">
                    <input type="password" class="form-control" required="true" id="inputPassword1" name="new_passI" placeholder="Nhập mật khẩu mới" minlength="6">
                    <input type="password" class="form-control" required="true" id="inputPassword2" name="new_passII" placeholder="Nhập lại mật khẩu mới" minlength="6">
                    <button class="btn-outline-primary">Đổi mật khẩu</button>
                </form>
                </div>
                
            </div>
            </div>
        </div>

        <?php $btntop = true; require_once("./component/footer.php"); ?>

        <script language="JavaScript" src="./js/jsheader.js"></script>
        <script language="JavaScript" src="./js/sidebarType1.js"></script>
    </body>   
</html>