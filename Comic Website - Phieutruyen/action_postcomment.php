<?php
    session_start();

    require_once ('./database/connect_database.php');

    var_dump($_POST);

    if(isset($_POST) && isset($_SESSION['user_id']) && $_POST['content'] != '') {
        if((int)$_POST['id_replay'] == -1)
            $sql = $sql = "insert into comment (id_comic, id_user, type, content) values (".$_POST['id_comic'].", ".$_SESSION['user_id'].", 'Bình luận truyện', '".$_POST['content']."')";
        else
            $sql = "insert into comment (id_reply, id_comic, id_user, type, content) values (".$_POST['id_replay'].", ".$_POST['id_comic'].", ".$_SESSION['user_id'].", 'Bình luận truyện', '".$_POST['content']."')";
        EXECUTE($sql);

        $sql = "insert into notification (id_user, type, content, link) values (".$_POST['user_comic'].", 'Bình luận truyện', '".$_POST['account']." đã bình luận truyện của bạn.', '".$_POST['link']."')";
        echo $sql;
        EXECUTE($sql);

        if((int)$_POST['id_replay'] != -1 && (int)$_POST['id_replay'] != $_SESSION['user_id']) {
            $sql = "insert into notification (id_user, type, content, link) values (".$_POST['id_usreplay'].", 'Trả lời bình luận truyện', '".$_POST['account']." đã trả lời bình luận của bạn.', '".$_POST['link']."')";
            EXECUTE($sql);
        }
    }

    if(isset($_POST['chapter'])) {
        header("Location: ./read.php?comic=".$_POST['id_comic']."&chapter=".$_POST['chapter']);
    }
    else header("Location: ./comic.php?comic=".$_POST['id_comic']);
    die();
?>