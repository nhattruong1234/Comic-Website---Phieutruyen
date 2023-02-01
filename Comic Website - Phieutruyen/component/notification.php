<button onclick="open_list('notification-list'), close_list('account-setting-list')">
    <i class='bx bx-bell' ></i>
    <div id="so-thong-bao">

    <?php
        $now = time();
        if(isset($_SESSION['user_id'])) {
            $sql = "select avatar, account_name from user where id = ".$_SESSION['user_id'];
            $user = EXECUTE_RESULT($sql);

            $sql = "SELECT * from NOTIFICATION where id_user = ".$_SESSION['user_id']." order by created_at desc";
            $notification = EXECUTE_RESULT($sql);

            $sql = "SELECT count(*) total from NOTIFICATION where status='Chưa đọc' and id_user = ".$_SESSION['user_id']." order by created_at desc";
            $result = EXECUTE_RESULT($sql);
        }

        if(isset($_SESSION['user_id']) && $result[0]['total'] > 0) {
            echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
            style="font-family: inherit; font-size: 0.75em;" id="hienthisotb">'.$result[0]['total'].'
                <span class="visually-hidden">unread messages</span>
            </span>';
        }
    ?>

    </div>
</button>

<div id="notification-list">
    <div id="option-bar">
        <button id="danh-dau-da-doc" onclick="danh_dau_da_doc()">
            <i class="bi bi-check-circle"></i>
            <p>Đánh dấu đã đọc</p>
        </button>
        <button onclick="turn_on_off_notifi('noti-btn-i', 'noti-btn-text')">
            <i class='bx bx-bell-off' id="noti-btn-i"></i>
            <p id="noti-btn-text">Tắt thông báo</p>
        </button>
    </div>
    <ul id="notification-list-content">
        <?php
        if(isset($_SESSION['user_id'])) {
            $index = 0;
            foreach ($notification as $item) {
                $inmoi = ""; $unread ="";
                $time = $item['created_at'];                                                                                                                                                                                                                                                                                                            
                $time = date_parse_from_format('Y-m-d H:i:s', $time);
                $time_stamp = mktime($time['hour'],$time['minute'],$time['second'],$time['month'],$time['day'],$time['year']);
                if(($now - $time_stamp) <= 60*60){
                    $inmoi = "<span class=\"badge bg-warning text-dark\">Mới</span>";
                }
                if($item['status'] == "Chưa đọc"){
                    $unread = "<span class=\"badge bg-warning text-dark\">Chưa đọc</span>";
                }
                echo '<li class="notification-box" id="notification-'.$index.'">
                <a href="'.$item['link'].'">'.$item['content'].$inmoi.$unread.'</a>
                <p><i class="bi bi-clock"></i>'.$item['created_at'].'</p>
                </li>';
            }
        }
        ?>
    </ul>
</div>