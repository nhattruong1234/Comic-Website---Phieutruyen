<?php
    $comic = EXECUTE_RESULT($sql);

    $index = 0;
    foreach ($comic as $item) {
        $inmoi = "";
        $time = $item['created_at'];                                                                                                                                                                                                                                                                                                            
        $time = date_parse_from_format('Y-m-d H:i:s', $time);
        $time_stamp = mktime($time['hour'],$time['minute'],$time['second'],$time['month'],$time['day'],$time['year']);
        if(($now - $time_stamp) <= 7*24*60*60){
            $inmoi = "<span class=\"badge bg-warning text-dark\">Mới</span>";
        }
        echo '<li class="story" id="1'.($index).'-story">
        <div class="story-i-tag">
            <span class="badge bg-info text-dark">'.($item['updated_at']).'</span>'.$inmoi.'
        </div>
        <a href="./comic.php?comic='.($item['idcomic']).'">
            <img src="'.($item['coverphoto']).'" alt="tk">
            <h6 class="story-title">'.($item['name']).'</h6>
        </a>
        <p class="story-chapter"><a href="./read.php?comic='.$item['idcomic'].'&chapter='.$item['total_chapter'].'">Chap '.($item['total_chapter']).'</a></p>
        <div class="story-info"  id="1'.($index++).'-story-info">
            <h1 class="story-info-title">'.($item['name']).'</h1>
            <p class="story-info-detail">Tình trạng truyện: '.($item['status']).'</p>
            <p class="story-info-detail">Lượt xem: '.($item['total_view']).'</p>
            <p class="story-info-detail">Lượt theo dõi: '.($item['tdoi']).'</p>
            <div class="story-info-category">';

            $sql = "select * from tag_comic str join tag tg on str.id_tag = tg.id where str.id_comic = ".$item['idcomic'];
            $theloai = EXECUTE_RESULT($sql);
            foreach ($theloai as $tl) {
                echo '<button class="category btn-outline-primary" onclick="location.href=\'./typecomic.php?tagid'.$tl['id'].'=on\';">'.$tl['name'].'</button>';
            }

            echo '</div>
            <p class="story-info-detail">'.($item['detail']).'</p>
        </div>
        </li>';
    }

?>