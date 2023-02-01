<?php
    session_start();


    require_once ('./database/connect_database.php');

    // var_dump(($_POST));
    // var_dump($_FILES);

    // KIEM TRA TINH HOP LE
    if(!isset($_POST) && !isset($_SESSION['user_id'])) {
        header("location: ./");
        die();
    }
    
    $comic_id = (int)$_POST['comic-id'];
    $user_id = (int)$_SESSION['user_id'];
    $comic_name = "";

    if($comic_id != -1) {
        // CHINH SUA TRUYEN DA DANG
        if(isset($_POST['comic-name']) && isset($_POST['comic-author']) && isset($_POST['comic-detail'])) {
            // THAY DOI THONG TIN TRUYEN
            $sql = "update comic set updated_at=now(), name='".$_POST['comic-name']."', author='".$_POST['comic-author']."', detail='".$_POST['comic-detail']."'  where id = ".$comic_id;
            EXECUTE($sql);
            $comic_name = $_POST['comic-name'];
        }
        else {
            // LAY TEN TRUYEN
            $sql = "select name from comic where id=".$comic_id;
            $result = EXECUTE_RESULT($sql);
            $comic_name = $result[0]['name'];
        }
    }
    else {
        // DANG TRUYEN MOI
        if(isset($_POST['comic-name']) && isset($_POST['comic-author']) && isset($_POST['comic-detail'])) {
            // THEM THONG TIN TRUYEN MOI
            $comic_name = $_POST['comic-name'];
            $sql = "insert into comic (name, author, id_user, total_chapter, detail) values ('".$comic_name."', '".$_POST['comic-author']."', ".$user_id.", 0, '".$_POST['comic-detail']."')";
            EXECUTE($sql);

            $sql = "select id from comic where name='".$comic_name."' and author='".$_POST['comic-author']."' and detail='".$_POST['comic-detail']."' and id_user=".$user_id;
            $result = EXECUTE_RESULT($sql);
            $comic_id = $result[0]['id'];
        }
        else {
            die();
        }
    }

    if(isset($_POST['comic-name-other'])) {
        EXECUTE("delete from other_name_comic where id_comic = ".$comic_id);
        $arr_name = explode(',', $_POST['comic-name-other']);

        foreach($arr_name as $item) {
            if($item == "") continue;
            $sql = "insert into other_name_comic (id_comic, other_name) values (".$comic_id.", '".$item."')";
            EXECUTE($sql);
        }
    }
    
    if(isset($_POST['comic-tag'])) {
        EXECUTE("delete from tag_comic where id_comic = ".$comic_id);
        $arr_tag = explode(',', $_POST['comic-tag']);
        
        foreach($arr_tag as $item) {
            if($item == "") continue;
            $sql = "insert into tag_comic (id_comic, id_tag) values (".$comic_id.", (SELECT id FROM tag tg WHERE tg.name LIKE '".$item."'))";
            EXECUTE($sql);
        }
    }

    // XOA ANH
    if(isset($_POST['arr-idpage-del'])) {
        $arr_idpage_del = explode(',', $_POST['arr-idpage-del']);

        foreach($arr_idpage_del as $item) {
            if($item == "") continue;
            $sql = "delete from page where id=".$item;
            EXECUTE($sql);
        }
    }

    // XOA CHUONG
    if(isset($_POST['arr-idchapter-del'])) {
        $arr_idpage_del = explode(',', $_POST['arr-idchapter-del']);

        foreach($arr_idpage_del as $item) {
            if($item == "") continue;
            $sql = "delete from page where id_chapter=".$item;
            EXECUTE($sql);

            $sql = "delete from chapter where id=".$item;
            EXECUTE($sql);
        }
    }


    while(isset($_FILES['file-input']) && $_FILES['file-input']['size'] != 0) {
        // CAP NHAT ANH BIA
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            // Dữ liệu gửi lên server không bằng phương thức post
            break;
        }

        if (!isset($_FILES["file-input"])){
            break;
        }

        // Kiểm tra dữ liệu có bị lỗi không
        if ($_FILES["file-input"]['error'] != 0){
            break;
        }

        // Đã có dữ liệu upload, thực hiện xử lý file upload
        //Thư mục bạn sẽ lưu file upload
        $target_dir    = "./upload/comic/coverphoto/";
        //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
        $target_file   = $target_dir . basename($_FILES["file-input"]["name"]);

        $allowUpload   = true;

        //Lấy phần mở rộng của file (jpg, png, ...)
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        // Cỡ lớn nhất được upload (bytes)
        $maxfilesize   = 1000000;

        ////Những loại file được phép upload
        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

        if(isset($_POST["submit"])) {
            //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
            $check = getimagesize($_FILES["file-input"]["tmp_name"]);
            if($check !== false) {
                $allowUpload = true;
            }
            else {
                $allowUpload = false;
            }
        }

        // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
        $target_file_new = $target_dir.str_replace(' ', '_', $comic_name)."_".time().".".$imageFileType;
        if (file_exists($target_file_new)) {
            $target_file_new= $target_file_new."_".time();
        }

        // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
        if ($_FILES["file-input"]["size"] > $maxfilesize) {
            $allowUpload = false;
        }

        // Kiểm tra kiểu file
        if (!in_array($imageFileType,$allowtypes )) {
            $allowUpload = false;
        }

        if ($allowUpload) {
            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target_file_new)) {
                $sql = "select coverphoto from comic where id = ".$comic_id;
                $result = EXECUTE_RESULT($sql);
                $status = unlink($result[0]['coverphoto']);
                if ($status){
                } else {
                }

                $sql = "update comic set coverphoto = '".$target_file_new."' where id = ".$comic_id;
                EXECUTE($sql);



            } else {
            }
        } else {
        }

        break;
    }

    
    function them_trang_truyen($page, $chapter_id, $index_begin, $comic_name, $chapter_name) {
        $aaa = 0;
        if(isset($page['name'][0]) && $page['size'][0] != 0) {
            $total = count($page['name']);
        } else {
            $total = 0;
        }
        $kquatv = $index_begin + $total;
        for($index = 0; $index < $total; $index++) {
            //=================================================================================================
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                // Dữ liệu gửi lên server không bằng phương thức post
                return $index_begin;
            }
                
            if (!isset($page)){
                return $index_begin;
            }
        
            // Kiểm tra dữ liệu có bị lỗi không
            if ($page['error'][$index] != 0){
                return $index_begin;
            }
                
            // Đã có dữ liệu upload, thực hiện xử lý file upload
            //Thư mục bạn sẽ lưu file upload
            $target_dir    = "./upload/comic/pagecomic/";
            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $target_file   = $target_dir . basename($page["name"][$index]);
        
            $allowUpload   = true;
            
            //Lấy phần mở rộng của file (jpg, png, ...)
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            
            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 10000000;
        
            ////Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
    
            if(isset($_POST["submit"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check = getimagesize($page["tmp_name"][$index]);
                if($check !== false) {
                    $allowUpload = true;
                }
                else {
                    $allowUpload = false;
                }
            }
                
            // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
            
            $target_file_new = $target_dir.str_replace(' ', '_', $comic_name)."_".str_replace(' ', '_', $chapter_name)."_".($index_begin+$index+1)."_".time();
            
            if (file_exists($target_file_new.".".$imageFileType)) {
                $target_file_new = $target_file_new."_".($aaa++).".".$imageFileType;
                //echo "dia chi moi=".$target_file_new;
            }
            else {
                $target_file_new = $target_file_new.".".$imageFileType;
            }
            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($page["size"][$index] > $maxfilesize) {
                $allowUpload = false;
            }
                
                
            // Kiểm tra kiểu file
            if (!in_array($imageFileType,$allowtypes )) {
                $allowUpload = false;
            }

            if ($allowUpload) {
                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                if (move_uploaded_file($page["tmp_name"][$index], $target_file_new)) {
                    $sql = "insert into page (id_chapter, `index`, link_page) values (".$chapter_id.", ".($index_begin+$index+1).", '".$target_file_new."')";
                    EXECUTE($sql);
                    " Đã upload thành công.";
    
                    //echo "File lưu tại " . $target_file_new;
                } else {
                }
            } else {
            }
        
        }
        return $kquatv;
    }


    if(isset($_POST['chapter-updated']) && $_POST['chapter-updated'] != "") {
        $arr_chap = explode(',', $_POST['chapter-updated']);
        $arr_chap = array_unique($arr_chap);
        //var_dump($arr_chap);
        
        foreach($arr_chap as $index_chap) {
            $index_begin = 0;
            if($index_chap == "") continue;
            $chapter_name = "";
            if(isset($_POST['max-index-chapter'])) {
                if($index_chap > (int)$_POST['max-index-chapter']) {
                    if(!isset($_POST['name-chapter-'.$index_chap])) break;

                    $chapter_name = $_POST['name-chapter-'.$index_chap];
                    $sql = "insert into chapter (id_comic, `index`, name, total_page) values (".$comic_id.", ".$index_chap.", '".$chapter_name."', 0)";
                    EXECUTE($sql);
                }
            } else break;

            $sql = "select chap.id, chap.name, pg.index from chapter chap left join page pg on chap.id=pg.id_chapter where chap.id_comic = ".$comic_id." and chap.index = ".$index_chap." order by pg.index desc";
            $result = EXECUTE_RESULT($sql);
            $chapter_id = $result[0]['id'];
            $chapter_name = $result[0]['name'];
            if($result[0]['index'] != null) $index_begin = $result[0]['index'];


            $arr_name_chap = explode(',', $_POST["name-page-chapter-".$index_chap]);
            foreach($arr_name_chap as $name_chap) {
                if($name_chap == "") continue;
                $index_begin = them_trang_truyen($_FILES[$name_chap], $chapter_id, $index_begin, $comic_name, $chapter_name);
            }

        }
            
    }


    header("location: ./postcomic.php?comic=".$comic_id);
    die();
?>