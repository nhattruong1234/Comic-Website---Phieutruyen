<?php
    session_start();
    
    require_once ('./database/connect_database.php');

    if(!isset($_SESSION['user_id'])) {
        die();
    }




if ($_SERVER['REQUEST_METHOD'] !== 'POST')
  {
      // Dữ liệu gửi lên server không bằng phương thức post
      echo "Phải Post dữ liệu";
      die;
  }

  // Kiểm tra có dữ liệu fileupload trong $_FILES không
  // Nếu không có thì dừng
  if (!isset($_FILES["file-input"]))
  {
      echo "Dữ liệu không đúng cấu trúc";
      die;
  }

  // Kiểm tra dữ liệu có bị lỗi không
  if ($_FILES["file-input"]['error'] != 0)
  {
    echo "Dữ liệu upload bị lỗi";
    die;
  }

  // Đã có dữ liệu upload, thực hiện xử lý file upload

  //Thư mục bạn sẽ lưu file upload
  $target_dir    = "./upload/avatar/";
  //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
  $target_file   = $target_dir . basename($_FILES["file-input"]["name"]);

  $allowUpload   = true;

  //Lấy phần mở rộng của file (jpg, png, ...)
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  // Cỡ lớn nhất được upload (bytes)
  $maxfilesize   = 100000000;

  ////Những loại file được phép upload
  $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');


  if(isset($_POST["submit"])) {
      //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
      $check = getimagesize($_FILES["file-input"]["tmp_name"]);
      if($check !== false)
      {
          echo "Đây là file ảnh - " . $check["mime"] . ".";
          $allowUpload = true;
      }
      else
      {
          echo "Không phải file ảnh.";
          $allowUpload = false;
      }
  }

  // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
  // Bạn có thể phát triển code để lưu thành một tên file khác
// Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
$target_file_new = $target_dir."_".time().".".$imageFileType;
if (file_exists($target_file_new)) {
    $target_file_new= $target_file_new."_".time();
}
  // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
  if ($_FILES["file-input"]["size"] > $maxfilesize)
  {
      echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
      $allowUpload = false;
  }


  // Kiểm tra kiểu file
  if (!in_array($imageFileType,$allowtypes ))
  {
      echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
      $allowUpload = false;
  }


  if ($allowUpload)
  {
      // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
      if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target_file_new))
      {
          $sql = "update user set avatar = '".$target_file."' where id = ".$_SESSION['user_id'];
          EXECUTE($sql);
          echo "File ". basename( $_FILES["file-input"]["name"]).
          " Đã upload thành công.";

          echo "File lưu tại " . $target_file;
      }
      else
      {
          echo "Có lỗi xảy ra khi upload file.";
      }
  }
  else
  {
      echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
  }


  header("Location: ./account.php");
  die();
?>