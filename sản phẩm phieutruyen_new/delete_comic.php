<?php 
    session_start();

    require_once ('./database/connect_database.php');

    $data = isset($_POST['data']) ? $_POST['data'] : false;

    if ($data == "xoa-truyen" && isset($_SESSION['user_id'])){
        $sql = "delete from tag_comic where id_comic = ".$_POST['sid'];
        EXECUTE($sql);
        $sql = "delete from readed rd join chapter chap on rd.id_chapter = chap.id join comic cm on chap.id_comic = cm.id where cm.id = ".$_POST['sid'];
        EXECUTE($sql);
        $sql = "delete from page pg join chapter chap on pg.id_chapter = chap.id join comic cm on chap.id_comic = cm.id where cm.id = ".$_POST['sid'];
        EXECUTE($sql);
        $sql = "delete from other_name_comic where id_comic = ".$_POST['sid'];
        EXECUTE($sql);
        $sql = "delete from like_comment where id_comic = ".$_POST['sid'];
        EXECUTE($sql);
        $sql = "delete from follow where id_comic = ".$_POST['sid'];
        EXECUTE($sql);
        $sql = "delete from comment where id_comic = ".$_POST['sid'];
        EXECUTE($sql);
        $sql = "delete from chapter where id_comic = ".$_POST['sid'];
        EXECUTE($sql);
        $sql = "delete from comic where id = ".$_POST['sid'];
        EXECUTE($sql);
    }
    die();
?>