<?php
    session_start();

    require_once ('./database/connect_database.php');

    if(isset($_SESSION['user_id'])) {
        header("Location: ./login.php");
        die();
    }
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $sql = "select *, count(*) sl from login where username = '".$_POST['username']."' and password = '".$_POST['password']."'";
        $ketqua = EXECUTE_RESULT($sql);

        if($ketqua[0]['sl'] == 0) {
            echo "Mật khẩu không chính xác";
            header("Location: ./login.php");
            die();
        }
        
        $_SESSION['user_id'] = $ketqua[0]['id_user'];

        if($ketqua[0]['isadmin'] == 1) {
            $_SESSION['isadmin'] = 1;
            header("Location: ./admin/?url=home");
            die();
        }
    }
    else {
        header("Location: ./");
        die();
    }

    header("Location: ./");
    die();

?>