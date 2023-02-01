<?php
    session_start();


    require_once ('./database/connect_database.php');


    if(isset($_SESSION['user_id'])) {
            
        if(isset($_POST['username'])) {
            $sql = "update user set account_name = '".$_POST['username']."' where id = ".$_SESSION['user_id'];
            EXECUTE($sql);
        }
        if(isset($_POST['gmail'])) {
            $sql = "update user set email = '".$_POST['gmail']."' where id = ".$_SESSION['user_id'];
            EXECUTE($sql);
        }
        if(isset($_POST['dateofbith'])) {
            $sql = "update user set dateofbirth = '".$_POST['dateofbith']."' where id = ".$_SESSION['user_id'];
            EXECUTE($sql);
        }
        if(isset($_POST['sex'])) {
            $sql = "update user set sex = '".$_POST['sex']."' where id = ".$_SESSION['user_id'];
            EXECUTE($sql);
        }
        if(isset($_POST['facebook'])) {
            $sql = "update user set facebook = '".$_POST['facebook']."' where id = ".$_SESSION['user_id'];
            EXECUTE($sql);
        }
        echo "CẬP NHẬT THÔNG TIN THÀNH CÔNG";
        header("Location: ./account.php");
    }
?>