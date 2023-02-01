<script language="javascript">
    function danh_dau_da_doc(){
        $data = "danh-dau-da-doc";
        $.ajax({
            url : "action_noti_markread.php",
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


<style>
    .form_search {
        width: 500px;
        height: inherit;
    }
</style>

<!--header-->
<header id="top-bar">
    <div class="container-xxl d-flex justify-content-between position-relative">
        <div id="top-bar-left">
            <a class="logo" href="./">
                <img src="./img/image.png" alt="logo">
            </a>
            <div class="search-bar">
                <form class="form_search" action="./search.php" method="GET">
                    <input type="text" placeholder="Nhập tên truyện" name="search" id="search-name">
                    <button class="search-button align-content-center">
                    <i class="bi bi-search align-middle" style="font-size: 20px;"></i>
                </button>
                </form>
            </div>
        </div>

        <?php
            if (isset($_SESSION['user_id'])) {
                echo '<style>
                #chua-dang-nhap {
                    display: none;
                }
                </style>';
            } else {
                echo '<style>
                #da-dang-nhap {
                    display: none;
                }
                </style>';
            }
        ?>

        <div class="top-bar-right" id="chua-dang-nhap">
            <button id="login-button" onclick="location.href='./login.php';">Đăng nhập</a></button>
            <button id="register-button" onclick="location.href='./register.php';">Đăng ký</button>
        </div>
        <!--Da dang nhap-->
        <div class="top-bar-right" id="da-dang-nhap">
            <div id="notification-button">
                <?php if(isset($_SESSION["user_id"])) require_once("./component/notification.php"); ?>
            </div>

            <button id="account-button" onclick="open_list('account-setting-list'), close_list('notification-list')">
                <img src=
                "<?php
                    if (isset($_SESSION['user_id']) && $user[0]['avatar'] != NULL) echo $user[0]['avatar'];
                    else echo './img/logo.png'
                ?>">
            </button>

            <div id="account-setting-list">
                <a href="./account.php">Quản lý thông tin tài khoản</a>
                <a href="./mycomic.php">Quản lý truyện đã đăng</a>
                <a href="./logout.php">Đăng xuất</a>
            </div>
        </div>
    </div>
</header>