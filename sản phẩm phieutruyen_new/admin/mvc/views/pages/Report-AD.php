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
    <link rel="stylesheet" type="text/css" href="css/style-Report.css">
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

    <div class="container-xxl"  id="content">
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
    <h2 class="caption">PHẢN HỒI</h2>
    <div class="form-content">
        <form action="/action_page.php">
            <div class="mb-3 mt-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="mb-3">
                <label for="report" class="form-label">Phản hồi:</label>
                <select class="form-select" id="report">
                    <option selected disabled value="">Chọn loại phản hồi</option>
                    <option>Lỗi ảnh truyện</option>
                    <option>Báo cáo vi phạm</option>
                    <option>Lỗi trang web</option>
                    <option>Khác</option>
                </select>
            </div>
            <div class="mb-3 mt-3">
                <label for="title" class="form-label">Tiêu đề:</label>
                <input type="email" class="form-control" id="title" placeholder="Tiêu đề" name="title">
              </div>
            <div>
                <label for="comment">Chi tiết:</label>
                <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
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
                <p class="footer_foot">&#169 2020 - Bản quyền thuộc về PhieuTruyen.com</p>            
            </div>
        </div>
    </footer>
    <script language="JavaScript" src="/js/sidebarType1.js"></script>
    <script language="JavaScript" src="/js/jsheader.js"></script>   
</body>
</html>