<?php
    session_start();

    require_once ('./database/connect_database.php');

    $data = isset($_POST['data']) ? $_POST['data'] : false;
    
    if ($data == "xoa-theo-doi" && isset($_SESSION['user_id'])){
        $sql = "delete from follow where id = ".$_POST['id_follow'];
        EXECUTE($sql);
        echo $sql;
    }

    die();
?>