<?php

    session_start();

    require_once ('./database/connect_database.php');

    if(!isset($_POST['data'])) {
        die();
    }
    
    if($_POST['data'] == "gui-mail-xac-nhan") {
        if(isset($_POST['name']) && isset($_POST['email'])) {
            $sql = "select id, COUNT(*) total from user us join login lg on us.id = lg.id_user where lg.username='".$_POST['name']."' and us.email='".$_POST['email']."'";
            $result = EXECUTE_RESULT($sql);
            if($result[0]['id'] == null) {
                echo '<h4 style="color:crimson;">Tên đăng nhập hoặc email không tồn tại.</h4>';
                die();
            }
            else {
                require_once("./action_reset_password.php");
            }
        }
    }

    EXECUTE($_POST['query']);
?>