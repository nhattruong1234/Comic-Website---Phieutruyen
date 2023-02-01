<?php
    session_start();


    require_once ('./database/connect_database.php');


    if(isset($_SESSION['user_id'])) {
        $sql = "select count(*) sl from login where id_user = ".$_SESSION['user_id']." and password = '".$_POST['current_pass']."'";
        $ketqua = EXECUTE_RESULT($sql);

        if($ketqua[0]['sl'] == 0) {
            echo "Mật khẩu không chính xác";
            return;
        }
        else {
            date_default_timezone_set('asia/ho_chi_minh');
            $time = date('Y-m-d H:i:s');
            $sql = "update login set `password` = '".trim($_POST['new_passI'])."' where id_user = ".$_SESSION['user_id'];
            EXECUTE($sql);
            $sql = "update login set updated_at = '".$time."' where id_user = ".$_SESSION['user_id'];
            EXECUTE($sql);
        }
        header("Location: ./account.php");
        die();
    }
?>