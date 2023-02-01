<?php
    session_start();

    require_once ('./database/connect_database.php');

    if(isset($_SESSION['user_id'])) {
        header("Location: ./");
        die();
    }
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
        $sql = "select count(*) sl from login where username = '".$_POST['username']."'";
        $ketqua = EXECUTE_RESULT($sql);

        if($ketqua[0]['sl'] != 0) {
            echo "Tên đăng nhập đã tồn tại";
            header("Location: ./register.php");
            die();
        }
        $sql = "select count(*) sl from user where email = '".$_POST['email']."'";
        $ketqua = EXECUTE_RESULT($sql);

        if($ketqua[0]['sl'] != 0) {
            echo "Email đã tồn tại";
            header("Location: ./register.php");
            die();
        }

        $sql = "insert into user (email, account_name) values ('".$_POST['email']."', '".$_POST['username']."')";
        EXECUTE($sql);
        $sql = "select id, count(*) total from user where email = '".$_POST['email']."'";
        $ketqua = EXECUTE_RESULT($sql);

        if($ketqua[0]['total'] == 0) {
            $_SESSION['user_id'] = $ketqua[0]['id_user'];
            header("Location: ./register.php");
            die();
        }

        $sql = "insert into login (username, password, id_user) values ('".$_POST['username']."', '".$_POST['password']."', ".$ketqua[0]['id'].")";
        EXECUTE($sql);
        $sql = "select id_user, count(*) total from login where username = '".$_POST['username']."'";
        $ketqua = EXECUTE_RESULT($sql);
        if($ketqua[0]['total'] == 0) {
            echo "Đăng kí không thành công";
            header("Location: ./register.php");
            die();
        }
        $_SESSION['user_id'] = $ketqua[0]['id_user'];
    }
    else {
        header("Location: ./register.php");
        die();
    }

    header("Location: ./account.php");
    die();

?>