<?php
    require_once ('./database/connect_database.php');

    if(isset($_POST['email']) && isset($_POST['type']) && isset($_POST['title']) && isset($_POST['content'])) {
        $sql = "insert into feedback (email, type, title, content) values ('".$_POST['email']."', '".$_POST['type']."', '".$_POST['title']."', '".$_POST['content']."')";
        EXECUTE($sql);
        header("Location: ./feedback.php");
    }



?>