<?php
    $user = [];
    if(isset($_SESSION['user_id'])) {
        $sql = "select avatar, account_name from user where id = ".$_SESSION['user_id'];
        $user = EXECUTE_RESULT($sql);
    }
?>

<!--Bình luận-->
<div class="container-xxl" id="comment-area">
    <h2 class="caption">BÌNH LUẬN</h2>
    <!--nhap binh luan-->
    <div class="comment comment-input" id="comment-0" style="display: inline-block;">
        <div class="comment-info">
            <a class="user-avt"><img src=
                "<?php
                    if(isset($_SESSION['user_id'])) {
                        echo $user[0]['avatar'];
                    }
                    else {
                        echo "./img/logo.png";
                    }
                ?>"
            ></a>
            <p class="user-name">
                <?php
                    if(isset($_SESSION['user_id'])) {
                        echo $user[0]['account_name'];
                    }
                    else {
                        echo "taikhoan";
                    }
                ?>
            </p>
        </div>
        <form id="user-comment-0" name="comment" method="POST" action="./action_postcomment.php">
            <textarea name="content" placeholder="Bình luận..."></textarea>
            <input type="text" name="id_replay" value="<?php echo '-1'; ?>" style="display: none;">
            <input type="text" name="id_comic" value="<?php echo $comic_id; ?>" style="display: none;">
            <input type="text" name="user_comic" value="<?php echo $comic[0]['id_user']; ?>" style="display: none;">
            <input type="text" name="link" value="./comic.php?comic=<?php echo $comic_id; ?>" style="display: none;">
            <input type="text" name="account" value="<?php echo $user[0]['account_name']; ?>" style="display: none;">
            <input type="submit"  class="send-cmt">
        </form>
    </div>
    
    <?php
        function print_comment($id_cm, $comic_id, $id_us_comic, $user) {
            $sql = "select cm.id idm, cm.id_user, cm.content, cm.created_at, us.id, us.account_name, us.avatar from comment cm join user us on cm.id_user = us.id ";
            if($id_cm == -1 ) $sql = $sql." where cm.id_reply is null and cm.id_comic = ".$comic_id." order by cm.created_at desc";
            else $sql = $sql." where cm.id_reply = ".$id_cm." and cm.id_comic = ".$comic_id." order by cm.created_at desc";
            $comment_ = EXECUTE_RESULT($sql);
            foreach($comment_ as $item) {
                echo '<div class="comment" id="comment-'.$item['idm'].'">
                <div class="comment-info">
                    <a class="user-avt"><img src="'.$item['avatar'].'"></a>
                    <a class="user-name">'.$item['account_name'].'</a>
                    <p class="comment-time">'.$item['created_at'].'</p>
                </div>
                <div class="comment-content">
                    <p>'.$item['content'].'</p>
                </div>
                <div class="comment-reaction">
                    <button class="bi ';
                    if(isset($_SESSION['user_id'])) {
                        $ktra = EXECUTE_RESULT("select count(*) total from like_comment where id_comment = ".$item['idm']." and id_user = ".$_SESSION['user_id']);
                        if($ktra[0]['total'] != 0)
                            echo 'bi-suit-heart-fill" type="button" id="like-comment-'.$item['idm'].'" onclick="thump_up('.$item['idm'].', '.$_SESSION['user_id'].', \''.$user[0]['account_name'].'\', '.$item['id_user'].', '.$comic_id.')"> Đã thích</button>';
                        else 
                            echo 'bi-suit-heart" type="button" id="like-comment-'.$item['idm'].'" onclick="thump_up('.$item['idm'].', '.$_SESSION['user_id'].', \''.$user[0]['account_name'].'\', '.$item['id_user'].', '.$comic_id.')"> Thích</button>';
                    }
                    else
                        echo 'bi-suit-heart"  type="button" id="like-comment-'.$item['idm'].'"> Thích</button>';
                    
                    echo '<button class="bi bi-reply" type="button" onclick="reply_comment('.$item['idm'].')"> Phản hồi</button>
                </div>';
                
                print_comment($item['idm'], $comic_id, $id_us_comic, $user);

                echo '<!--đây là reply 1 cmt-->
                <div class="comment comment-input" id="comment-'.$item['idm'].'-reply">
                    <div class="comment-info">
                        <a class="user-avt"><img src="';
                
                if(isset($_SESSION['user_id'])) echo $user[0]['avatar'];
                else echo './img/logo.png';
                
                echo '"></a>
                        <a class="user-name">';
                        
                if(isset($_SESSION['user_id'])) echo $user[0]['account_name'];
                else echo 'taikhoan';

                echo '</a>   
                    </div>
                    <form id="user-comment-0" name="comment" method="POST" action="./action_postcomment.php">
                        <textarea name="content" placeholder="Bình luận..."></textarea>
                        <input type="text" name="id_replay" value="'.$item['idm'].'" style="display: none;">
                        <input type="text" name="link" value="./comic.php?comic='.$comic_id.'" style="display: none;">
                        <input type="text" name="id_usreplay" value="'.$item['id_user'].'" style="display: none;">
                        <input type="text" name="id_comic" value="'.$comic_id.'" style="display: none;">
                        <input type="text" name="account" value="'.$user[0]['account_name'].'" style="display: none;">
                        <input type="text" name="user_comic" value="'.$id_us_comic.'" style="display: none;">
                        <input type="submit"  class="send-cmt">
                    </form>
                    <button class="close-cmt btn btn-danger delete-button" type="button">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
            </div>';
            }
        }

        print_comment(-1, $comic_id, $comic[0]['id_user'], $user);
    ?>

    <script>
        function reply_comment(button) {
            document.getElementById("comment-"+button+"-reply").classList.toggle("d-inline-block")
        }
        function close_comment(button) {
            document.getElementById("comment-"+button+"-reply").classList.toggle("d-inline-block")
        }
        function execute_query(query) {
            $data = "query";
            $.ajax({
                url : "action_query.php",
                type : "post",
                dataType:"text",
                data : {
                    data: $data,
                    query : $query
                },
                success : function (result){}
            });
        }
        function thump_up(id_cm, user, name, us_cm, cm) {
            let like = document.getElementById("like-comment-"+id_cm);
            if (like.classList.contains("bi-suit-heart"))
            {
                like.classList.replace("bi-suit-heart", "bi-suit-heart-fill")
                like.innerHTML=" Đã thích"
                $query = "insert into like_comment (id_comment, id_user) values ('"+id_cm+"', '"+user+"')"
                execute_query($query)
                $query = "insert into notification (id_user, type, content, link) values ('"+us_cm+"', 'Thích bình luận', '"+name+" đã thích bình luận của bạn.', './comic.php?comic="+cm+"')"
                execute_query($query)
            }
            else {
                like.classList.replace("bi-suit-heart-fill", "bi-suit-heart")
                like.innerHTML=" Thích"
                $query = "delete from like_comment where id_comment="+id_cm+" and id_user="+user
                execute_query($query)
            }
        }
    </script>
</div>