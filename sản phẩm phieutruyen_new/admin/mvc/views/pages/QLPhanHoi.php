<!DOCTYPE html>
<html lang="vi" class>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Đọc truyện tranh Manga, Manhua, Manhwa, Comic online hay và cập nhật thường xuyên tại PhieuTruyen.Com">
    <meta property="og:site_name" content="PhieuTruyen.Com">
    <meta name="Author" content="PhieuTruyen.Com">
    <meta name="keyword" content="doc truyen tranh, manga, manhua, manhwa, comic">
    <title>Đọc truyện tranh Manga, Manhua, Manhwa, Comic Online</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/topbar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/breadcrumb.css">
    <link rel="stylesheet" href="./css/pagination.css">    
    <link rel="stylesheet" href="./css/QLPhanHoi.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
<script language="JavaScript" src="./js/sidebarType1.js"></script>
<div class="container-xxl" style="padding: 0;" id="content">

    <!-- Tabpage -->
    <div class="container-xxl tabs">
        <!-- Thanh breadcrumb --> 
        <div class="contain_nav_breadvrumb">
            <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                    <li class="breadcrumb-item active">Quản lý phản hồi</li>
                </ol>
            </nav>
        </div>
        <!--tab Nhận -->
        <input type="radio" id="PHDN" name="tabs" checked="checked">
        <label for="PHDN">Phản hồi đã nhận</label>
        <div class="row tab" method="POST" action="?url=contact/markall_feedback">       
            <div class="row-1 cmd-btn">
                <button type="submit" name="mark" class="story-item-btn">
                    <i class="bi bi-star"></i>
                    <p>Đánh dấu</p>
                </button>
                <button class="story-item-btn" id="checkall">
                    <i class='bx bxs-check-circle'></i>
                    <p>Chọn tất cả</p>
                </button>
                <button class="story-item-btn" id="uncheckall">
                    <i class='bx bxs-x-circle'></i>
                    <p>Bỏ chọn tất cả</p>
                </button>
                <button type="" name="delete" class="story-item-btn">
                    <i class='bx bxs-trash'></i>
                    <p>Xóa</p>
                </button>
            </div>
            <ul class="contentRP">
                <?php foreach ($data['contact'] as $contact): ?>
                    <?php if ($contact['status'] == '0'): ?>   
                    <li class="report-bar" id="report1">
                        <input type="checkbox" class="checkbox" name="checkbox" value="<?= $contact['id'] ?>">
                        <a style="margin: 18px 1px" href="?url=contact/mark_feedback/<?= $contact['id'] ?>" onclick="return confirm('Bạn muốn đánh dấu phản hồi?');">
                        <button class="close-cmt btn btn-warning mark-button" type="button">
                            <i class="bi bi-star"></i>
                        </button></a>
                        <a class="user-avt"><img src="https://tapchianhdep.com/wp-content/uploads/2020/01/tong-hop-hinh-anh-dep-va-de-thuong-cua-pikachu.jpg"></a>
                        <div class="report-bar-info">
                            <p>Người gửi: <a><?= $contact['email'] ?></a></p>
                            <p><i class="bi bi-clock"></i><?= $contact['created_at'] ?></p>
                            <a class="report-content"><?= $contact['type'] ?></a>
                        </div>
                        <a href="?url=contact/mark_bin/<?= $contact['id'] ?>" onclick="return confirm('Đưa phản hồi vào thùng rác?');" >
                        <button class="close-cmt btn btn-danger delete-button" type="button">
                        <i class="bi bi-trash" aria-hidden="true"></i></button></a>
                    </li>
                    <?php endif; ?>                    
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- tab Gửi -->
        <input type="radio" id="PHDG" name="tabs">
        <label for="PHDG">Phản hồi đã gửi</label>
        <div class="row tab">
            <div class="row-1 cmd-btn">
                <button class="story-item-btn">
                    <i class="bi bi-star"></i>
                    <p>Đánh dấu</p>
                </button>
                <button class="story-item-btn">
                    <i class='bx bxs-check-circle'></i>
                    <p>Chọn tất cả</p>
                </button>
                <button class="story-item-btn">
                    <i class='bx bxs-x-circle'></i>
                    <p>Bỏ chọn tất cả</p>
                </button>
                <button class="story-item-btn">
                    <i class='bx bxs-trash'></i>
                    <p>Xóa</p>
                </button>
            </div>
            <ul class="contentRP">
                <!-- <li class="report-bar" id="report1">
                    <input type="checkbox">
                    <button class="close-cmt btn btn-warning mark-button" type="button">
                        <i class="bi bi-star"></i>
                    </button>
                    <a class="user-avt"><img src="./MicrosoftTeams-image.png"></a>
                    <div class="report-bar-info">
                        <p>Người gửi: <a>S*MP</a></p>
                        <p><i class="bi bi-clock"></i> dd:mm</p>
                        <a class="report-content">Về vấn đề lỗi ảnh khi đọc truyện</a>
                    </div>
                    <button class="close-cmt btn btn-danger delete-button" type="button">
                        <i class="bi bi-trash"></i>
                    </button>
                </li>
                <li class="report-bar" id="report2">
                    <input type="checkbox">
                    <button class="close-cmt btn btn-warning mark-button" type="button">
                        <i class="bi bi-star"></i>
                    </button>
                    <a class="user-avt"><img src="./MicrosoftTeams-image.png"></a>
                    <div class="report-bar-info">
                        <p>Người gửi: <a>S*MP</a></p>
                        <p><i class="bi bi-clock"></i> dd:mm</p>
                        <a class="report-content">Về vấn đề lỗi ảnh khi đọc truyện</a>
                    </div>
                    <button class="close-cmt btn btn-danger delete-button" type="button">
                        <i class="bi bi-trash"></i>
                    </button>
                </li> -->
            </ul>
        </div>

        <!-- tab Đánh dấu-->
        <input type="radio" id="PHDD" name="tabs">
        <label for="PHDD">Phản hồi đánh dấu</label>
        <div class="row tab">
            <div class="row-1 cmd-btn">
                <button class="story-item-btn">
                    <i class="bi bi-star"></i>
                    <p>Đánh dấu</p>
                </button>
                <button class="story-item-btn">
                    <i class='bx bxs-check-circle'></i>
                    <p>Chọn tất cả</p>
                </button>
                <button class="story-item-btn">
                    <i class='bx bxs-x-circle'></i>
                    <p>Bỏ chọn tất cả</p>
                </button>
                <button class="story-item-btn">
                    <i class='bx bxs-trash'></i>
                    <p>Xóa</p>
                </button>
            </div>
            <ul class="contentRP">
                <?php foreach ($data['contact'] as $contact): ?>
                    <?php if ($contact['status'] == 1): ?>                                                                     
                    <li class="report-bar" id="report1">
                        <input type="checkbox" class="checkbox">
                        <a style="margin: 18px 1px" href="?url=contact/mark_feedback/<?= $contact['id'] ?>" onclick="return confirm('Bạn muốn đánh dấu phản hồi?');">
                        <button class="close-cmt btn btn-warning mark-button" type="button">
                            <i class="bi bi-star"></i>
                        </button></a>
                        <a class="user-avt"><img src="https://tapchianhdep.com/wp-content/uploads/2020/01/tong-hop-hinh-anh-dep-va-de-thuong-cua-pikachu.jpg"></a>
                        <div class="report-bar-info">
                            <p>Người gửi: <a><?= $contact['email'] ?></a></p>
                            <p><i class="bi bi-clock"></i><?= $contact['created_at'] ?></p>
                            <a class="report-content"><?= $contact['content'] ?></a>
                        </div>
                        <a href="?url=contact/mark_bin/<?= $contact['id'] ?>" onclick="return confirm('Đưa phản hồi vào thùng rác?');" >
                        <button class="close-cmt btn btn-danger delete-button" type="button">
                        <i class="bi bi-trash" aria-hidden="true"></i></button></a>
                    </li>
                    <?php endif; ?>                    
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- tab Xóa-->
        <input type="radio" id="PHDX" name="tabs">
        <label for="PHDX">Thùng rác</label>
        <div class="row tab">
            <div class="row-1 cmd-btn">
                <button class="story-item-btn">
                    <i class="bi bi-star"></i>
                    <p>Đánh dấu</p>
                </button>
                <button class="story-item-btn" id="checkall">
                    <i class='bx bxs-check-circle'></i>
                    <p>Chọn tất cả</p>
                </button>
                <button class="story-item-btn" id="uncheckall">
                    <i class='bx bxs-x-circle'></i>
                    <p>Bỏ chọn tất cả</p>
                </button>
                <button class="story-item-btn">
                    <i class='bx bxs-trash'></i>
                    <p>Xóa</p>
                </button>
            </div>
            <ul class="contentRP">
                <?php foreach ($data['contact'] as $contact): ?>
                    <?php if ($contact['status'] == 2): ?>                                                                     
                    <li class="report-bar" id="report1">
                        <input type="checkbox" class="checkbox">
                        <a style="margin: 18px 1px" style="text-decoration: none" href="?url=contact/mark_feedback/<?= $contact['id'] ?>" onclick="return confirm('Bạn muốn đánh dấu phản hồi?');">
                        <button class="close-cmt btn btn-warning mark-button" type="button">
                            <i class="bi bi-star"></i>
                        </button></a>
                        <a class="user-avt"><img src="https://tapchianhdep.com/wp-content/uploads/2020/01/tong-hop-hinh-anh-dep-va-de-thuong-cua-pikachu.jpg"></a>
                        <div class="report-bar-info">
                            <p>Người gửi: <a><?= $contact['email'] ?></a></p>
                            <p><i class="bi bi-clock"></i><?= $contact['created_at'] ?></p>
                            <a class="report-content"><?= $contact['content'] ?></a>
                        </div>
                        <a href="?url=contact/delete/<?= $contact['id'] ?>" onclick="return confirm('Xóa phản hồi?');" >
                        <button class="close-cmt btn btn-danger delete-button" type="button">
                        <i class="bi bi-trash" aria-hidden="true"></i></button></a>
                    </li>
                    <?php endif; ?>                    
                <?php endforeach; ?>              
            </ul>
        </div>
    </div>
</div>
<script language="javascript" src="./js/jsheader.js"></script>
<script language="javascript" src="./js/jsheader.js"></script>
    <script>
        $(document).ready(function() {
            $("#checkall").click(function() {
                $(".checkbox").prop("checked", true);           
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#uncheckall").click(function() {
                $(".checkbox").prop("checked", false);              
            })
        });
    </script>
</body>
</html>