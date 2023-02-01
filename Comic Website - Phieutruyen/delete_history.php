<?php 
    session_start();

    require_once ('./database/connect_database.php');

    $data = isset($_POST['data']) ? $_POST['data'] : false;

    if ($data == "xoa-ls-doc" && isset($_SESSION['user_id'])){
        $sql = "delete from readed where id = ".$_POST['id_history'];
        EXECUTE($sql);
        die('THANH CONG');
    }

    die('THAT BAI');
?>