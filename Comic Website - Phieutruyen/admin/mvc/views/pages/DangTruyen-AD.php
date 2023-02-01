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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/topbar.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/style-DangTruyen.css">
    <link rel="stylesheet" type="text/css" href="css/breadcrumb.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <!-- Thanh menu chính -->
    <header id="top-bar">
        <div class="container-xxl d-flex justify-content-between position-relative">
            <div id="top-bar-left">
                <a class="logo" href="">
                    <img src="/img/image.png" alt="logo">
                </a>
                <div class="search-bar">
                    <input type="text" placeholder="Nhập tên truyện" id="search-name">
                    <button class="search-button align-content-center" type="submit">
                        <i class="bi bi-search align-middle" style="font-size: 20px;"></i>
                    </button>
                </div>
            </div>
            <div class="top-bar-right" id="chua-dang-nhap"  style="display: none;">
                <button id="login-button">Đăng nhập</button>
                <button id="register-button">Đăng ký</button>
            </div>
            <!--Da dang nhap-->
            <div class="top-bar-right" id="da-dang-nhap">
                <div id="notification-button">
                    <button onclick="open_list('notification-list'), close_list('account-setting-list')">
                        <i class="bi bi-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        style="font-family: inherit; font-size: 0.75em;"> 8
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>
                    <div id="notification-list">
                        <div id="option-bar">
                            <button>
                                <i class="bi bi-check-circle"></i>
                                <p>Đánh dấu đã đọc</p>
                            </button>
                            <button onclick="turn_on_off_notifi('noti-btn-i', 'noti-btn-text')">
                                <i class="bi bi-bell-fill" id="noti-btn-i"></i>
                                <p id="noti-btn-text">Tắt thông báo</p>
                            </button>
                        </div>
                        <ul id="notification-list-content">
                            <li class="notification-box" id="notification-0">
                                <a href="#">Trường vừa trả lời bình luận của bạn
                                    <span class="badge bg-warning text-dark">Mới</span>
                                </a>
                                <p><i class="bi bi-clock"></i> dd:mm</p>
                            </li>
                            <li class="notification-box" id="notification-1">
                                <a href="#">Việt đang spam bình luận của bạn
                                    <span class="badge bg-warning text-dark">Mới</span>
                                </a>
                                <p><i class="bi bi-clock"></i> hh:mm DD:MM:YYYY</p>
                            </li>
                            <li class="notification-box" id="notification-2">
                                <a href="#">Việt đang spam bình luận của bạn
                                    <span class="badge bg-warning text-dark">Mới</span>
                                </a>
                                <p><i class="bi bi-clock"></i> dd:mm</p>
                            </li>
                            <li class="notification-box" id="notification-3">
                                <a href="#">Việt đang spam bình luận của bạn
                                    <span class="badge bg-warning text-dark">Mới</span>
                                </a>
                                <p><i class="bi bi-clock"></i> dd:mm</p>
                            </li>
                            <li class="notification-box" id="notification-4">
                                <a href="#">Việt đang spam bình luận của bạn
                                    <span class="badge bg-warning text-dark">Mới</span>
                                </a>
                                <p><i class="bi bi-clock"></i> dd:mm</p>
                            </li>
                            <li class="notification-box" id="notification-5">
                                <a href="#">Việt đang spam bình luận của bạn
                                    <span class="badge bg-warning text-dark">Mới</span>
                                </a>
                                <p><i class="bi bi-clock"></i> dd:mm</p>
                            </li>
                            <li class="notification-box" id="notification-6">
                                <a href="#">Việt đang spam bình luận của bạn
                                    <span class="badge bg-warning text-dark">Mới</span>
                                </a>
                                <p><i class="bi bi-clock"></i> dd:mm</p>
                            </li>
                            <li class="notification-box" id="notification-7">
                                <a href="#">Việt đang spam bình luận của bạn
                                    <span class="badge bg-warning text-dark">Mới</span>
                                </a>
                                <p><i class="bi bi-clock"></i> dd:mm</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <button id="account-button" onclick="open_list('account-setting-list'), close_list('notification-list')">
                    <img src="img/logo.png">
                </button>
                <div id="account-setting-list">
                    <a href="QLTTTK-AD.html">Quản lý thông tin tài khoản</a>
                    <a href="QLTruyen-AD.html">Quản lý truyện đã đăng</a>
                    <a href="#">Đăng xuất</a>
                </div>
                <script>
                </script>
            </div>
        </div>
    </header>

    <!--  -->

    <!-- Thanh công cụ -->
    <div class="sidebar">
        <div class="logo-detail" style="background-color: #B4A5FF;">
            <i class='bx bx-menu' id="btn-menu"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="/Home-AD.html">
                    <i class='bx bxs-home'></i>
                    <span class="links_name">Trang chủ</span>
                </a>
                <span class="tooltip">Trang chủ</span>
            </li>
            <li>
                <a href="/QLTKhoan.html">
                    <i class='bx bxs-user-detail' ></i>
                    <span class="links_name">Quản lý tài khoản người dùng</span>
                </a>
                <span class="tooltip">Quản lý tài khoản người dùng</span>
            </li>
            <li>
                <a href="/QLTruyen-AD.html">
                    <i class='bx bxs-book' ></i>
                    <span class="links_name">Quản lý truyện</span>
                </a>
                <span class="tooltip">Quản lý truyện</span>
            </li>
            <li>
                <a href="/QLDangTruyen.html">
                    <i class='bx bx-upload' ></i>
                    <span class="links_name">Quản lý đăng truyện</span>
                </a>
                <span class="tooltip">Quản lý đăng truyện</span>
            </li>
            <li>
                <a href="/QLPhanHoi.html">
                    <i class='bx bx-mail-send' ></i>
                    <span class="links_name">Quản lý phản hồi</span>
                </a>
                <span class="tooltip">Quản lý phản hồi</span>
            </li>
            <li  id="btn-light-dark">
                <a>
                    <i class='bx bxs-bulb'></i>
                    <span class="links_name">Bật/Tắt đèn</span>
                </a>
                <span class="tooltip">Bật/Tắt đèn</span>
            </li>
        </ul>
    </div>

    <div class="container-xxl" id="content">
        <!-- Thanh breadcrumb -->
        <div class="contain_nav_breadvrumb">
            <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                    <li class="breadcrumb-item">Item 2</li>
                    <li class="breadcrumb-item">Item 2</li>
                    <li class="breadcrumb-item active">Item 2</li>
                </ol>
            </nav>
        </div>
        <!--  -->
        <h1 class="caption">ĐĂNG TRUYỆN</h1>
        <!-- Tabpage -->
        <div class="tabs">
            <!-- tab nhập thông tin truyện -->
            <input type="radio" id="StoryDetail" name="tabs" checked="checked">
            <label for="StoryDetail">Thông tin truyện</label>
            <div class="row tab" style="height: 550px;">
                <div class="col-sm-3 story-avatar">                  
                    <div class="input-img">
                        <img src="img/logo.png" alt="avatar" id="acc-avatar">
                        <label for="file-input">
                            <i class="bi bi-camera-fill"></i>
                        </label>
                        <input type="file" class="form-select" class="form-control" aria-label="file example" id="file-input">
                    </div>
                    <div>
                        <h2>Ảnh bìa truyện</h2>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="row mb-3">
                        <label for="NameItem" class="col-sm-2 col-form-label col-form-label-sm">Tên truyện</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="NameItem">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="AnotherNameItem" class="col-sm-2 col-form-label col-form-label-sm">Tên khác</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="AnotherNameItem">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="AuthorName" class="col-sm-2 col-form-label col-form-label-sm">Tác giả</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="AuthorName">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="TypesOfTheItem" class="col-sm-2 col-form-label col-form-label-sm">Thể loại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="TypesOfTheItem">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="DetailItem" class="col-sm-2 col-form-label col-form-label-sm">Mô tả</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="DetailItem" name="text"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="uplbtn">
                    <button>Đăng truyện</button>
                </div>
                <!--  -->
            </div>
            <!-- tab đăng chương truyện -->
            <input type="radio" id="ChapterList" name="tabs">
            <label for="ChapterList">Danh sách chương</label>
            <div class="row tab" style="height: 550px;">
                <div class="row">
                    <div class="col mb-3">
                        <button class="ChapterListbtn" id="AddChapterBtn">Thêm chương</button>
                    </div>
                    <div class="col mb-3">
                        <button class="ChapterListbtn">Sắp xếp chương</button>
                    </div>
                    <div class="col mb-6" id="search-block">
                        <input type="text" placeholder="Tìm chương" id="search-chapter">
                        <button class="search-btn"><i class='bx bx-search-alt-2'></i></button>
                    </div>
                </div>
                <div class="row workspace">
                    <div class="listchapter">
                        <ul class="col">
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 18</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 17</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 16</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 15</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 14</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 13</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 12</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 11</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 10</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 9</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 8</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 7</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 6</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 5</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 4</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 3</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 2</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                            <li class="chapteritem">
                                <p class="col mb-6">Chương 1</p>
                                <button class="editchapter col-3">Chỉnh sửa chương</button>
                                <button class="delchapter col-3">Xóa chương</button>
                            </li>
                        </ul>
                    </div>
                   
                    <div class="upchapter">
                        <span class="TipLine">Thả file ảnh hoặc click vào đây</span>
                        <input type="file" name="UpFile" class="BoxUpChapter" multiple>
                    </div>
                    
                </div>
                <script>
                    let openupchapter = document.querySelector(".upchapter");
                    let AddChapBtn = document.querySelector("#AddChapterBtn");

                    AddChapBtn.addEventListener("click", () =>{
                        openupchapter.classList.toggle("open");
                    })
                </script>
                <div class="uplbtn">
                    <button>Đăng truyện</button>
                </div>
            </div>
            <!--  -->
        </div>
        <!--  -->
    </div>

    <footer class="site_footer">
        <div class="Grid" >
            <div class="Grid_row">
             <div class="Grid_Column">
                 
                 <h5 class="footer_heading" >About Us</h5>                  
                 <ul class="footer_list">
                     <li class="footer_item">
                         <a href="" class="footer_item_link">Đọc truyện miễn phí</a></li>
                     <li class="footer_item">
                         <a href="" class="footer_item_link">Hỗ trợ cho anh em đồng bào</a></li>
                     <li class="footer_item">
                         <a href="" class="footer_item_link">Tạo môi trường giao lưu</a></li>
                      <li class="footer_item">
                         <a href="" class="footer_item_link">Báo cáo</a></li>
                 </ul>
                 </div>
     
             <div class="Grid_Column">
                 <h5 class="footer_heading">Contact Us</h5>
                 <ul class="footer_list">
                     <li class="footer_item">
                         <a href="" class="footer_item_link">Email: Truyencuatui@example.com</a> </li>
                      <li class="footer_item">
                             <a href="" class="footer_item_link">Liên hệ QC</a></li>
                     <li class="footer_item">
                         <a a href="" class="footer_item_link">Telephone Contact</a></li>
                     <li class="footer_item">
                        <a href="" class="footer_item_link"> <address>
                            Địa chỉ
                         </address></a>
                     </li>
                     
                 </ul>
             </div>
            </div>             
        </div>
         <div class="footer_bottom">
             <div class="Grid">
          
                 <p class="footer_foot">&#169 2020 - Bản quyền thuộc về Truyencuatui</p>
             
             </div>
         </div>
     </footer>
    <script language="JavaScript" src="/js/DangTruyen.js"></script>
    <script language="JavaScript" src="/js/jsheader.js"></script>
    <script language="JavaScript" src="/js/sidebarType1.js"></script>
</body>
</html>