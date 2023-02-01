<div class="sidebar">
    <div class="logo-detail" style="background-color: #B4A5FF;">
        <i class='bx bx-menu' id="btn-menu"></i>
    </div>
    <ul class="nav-list">
    <?php
        if(isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1) {
            require_once("./component/sidebar_admin.php");
        }
        else {
            require_once("./component/sidebar_user.php");
        }
    ?>
    </ul>
</div>
<?php
    if(isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1) {
        require_once("./component/sidebar_admin.php");
    }
    else {
        require_once("./component/sidebar_user.php");
    }
?>
