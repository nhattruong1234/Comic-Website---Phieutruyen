<?php 
    session_start();


    require_once ('./database/connect_database.php');


    $data = isset($_POST['data']) ? $_POST['data'] : false;


    if ($data == "danh-dau-da-doc" && isset($_SESSION['user_id'])){
        $sql = "update notification set status = 'Đã đọc' where status = 'Chưa đọc' and id_user = ".$_SESSION['user_id'];
        EXECUTE($sql);
        require_once("./component/notification.php");
        die();
    }
?>