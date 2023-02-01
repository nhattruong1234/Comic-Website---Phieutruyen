<?php

    session_start();

    require_once ('./database/connect_database.php');

    if(!isset($_POST['data'])) {
        die();
    }
    else {
        $sql = "select pg.id, pg.link_page, pg.index, chap.name total from page pg join chapter chap on pg.id_chapter = chap.id where chap.index = ".$_POST['indexchapter']." and chap.id_comic=".$_POST['comicid'];
        $result = EXECUTE_RESULT($sql);
        foreach($result as $item) {
            echo '<div id="chapter-'.$_POST['indexchapter'].'-index-'.$item['index'].'" class="div-chapter chapter-'.$_POST['indexchapter'].'">
                <img src="'.$item['link_page'].'" alt="page-chapter-'.$_POST['indexchapter'].'">
                <button class="delete-button" onclick="xoa_anh('.$item['id'].', 1, \'chapter-'.$_POST['indexchapter'].'-index-'.$item['index'].'\');" type="button" >
                    <i class="bi bi-x"></i>
                </button>
            </div>';
        }
    }


?>