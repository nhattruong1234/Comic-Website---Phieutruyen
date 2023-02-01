<?php
    session_start();

    require_once ('./database/connect_database.php');

    if(!isset($_GET['cm']) || !isset($_GET['id'])) {
        header("location: ./");
    }

    if(!isset($_SESSION['user_id'])) {
        header("location: ./comic.php?comic=".$_GET['cm']);
    }

    if(isset($_GET['id'])) {
        if($_GET['id'] == -1 && isset($_GET['name'])) {
            EXECUTE("insert into follow (id_comic, id_user) values (".$_GET['cm'].", ".$_SESSION['user_id'].")");
            $ktra = EXECUTE_RESULT("select id_user, name from comic where id=".$_GET['cm']);
            EXECUTE("insert into notification (id_user, type, content, link) values (".$ktra[0]['id_user'].", 'Theo dõi truyện', '".$_GET['name']." đang theo dõi truyện ".$ktra[0]['name']."', '#')");
        }
        else EXECUTE("delete from follow where id=".$_GET['id']." and id_comic=".$_GET['cm']." and id_user=".$_SESSION['user_id']);
        header("location: ./comic.php?comic=".$_GET['cm']);
        die();
    }

    header("location: ./");

?>