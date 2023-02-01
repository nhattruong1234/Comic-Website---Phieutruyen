<?php
    session_start();
    unset($_SESSION['user_id']);
    if(isset($_SESSION['isadmin'])) unset($_SESSION['isadmin']);
    header("location: ./");
?>