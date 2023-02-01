<!DOCTYPE html>
<html lang="vi" class>
<head>
    <meta charset="utf-8">
    <title>Đọc truyện tranh Manga, Manhua, Manhwa, Comic example@gmal.com</title>
    <meta name="keyword" content="doc truyen tranh, manga, manhua, manhwa, comic">
    <meta name="description" content="Đọc truyện tranh Manga, Manhua, Manhwa, Comic example@gmal.com hay và cập nhật thường xuyên tại PhieuTruyen.Com">
    <meta property="og:site_name" content="PhieuTruyen.Com">
    <meta name="Author" content="PhieuTruyen.Com">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/topbar.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/breadcrumb.css">
    <link rel="stylesheet" href="./css/pagination.css">    
    <link rel="stylesheet" href="./css/QLTKhoan.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>   
<script language="JavaScript" src="./js/sidebarType1.js"></script>
    <div class="container-xxl" id="content">
        <!-- Thanh breadcrumb -->
        <div class="contain_nav_breadvrumb">
            <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                    <li class="breadcrumb-item">Quản lý tài khoản</li>
                </ol>
            </nav>
        </div>
        <!--  -->
        
        <h1 class="caption">Quản lý tài khoản</h1>
        <!-- Tabpage -->
        <div class="col mb-8" id="search-block">
            <input type="text" placeholder="Tìm tài khoản" id="search-account">
            <button class="search-btn"><i class='bx bx-search-alt-2'></i></button>
            <label class="input-group-text" for="SXaccount" id="SXaccountLabel"><i class="bi bi-filter-left"></i></label>
            <select class="form-select" id="SXaccount">
                <option selected>Sắp xếp theo ...</option>
                <option value="1">Theo UID</option>
                <option value="2">Theo tên</option>
                <option value="3">Theo ngày tạo tài khoản</option>
                <option value="4">Theo Tên đăng nhập</option>
            </select>
        </div>
        <div class="row workspace">
            <div class="listaccount">
                <li id="listaccountLabel">
                    <p class="accountUID">UID</p>
                    <p class="accountCDate">Ngày tạo</p>
                    <p class="accountName">Tên tài khoản</p>
                    <p class="accountStatus">Email</p>
                    <button class="editaccount col-3 invisible">Chỉnh sửa tài khoản</button>
                    <button class="delete-button delaccount col-3 invisible">Xóa tài khoản</button>
                </li>
                <ul class="col">                
                    <?php foreach ($data['user'] as $user): ?>
                    <li class="accountitem" id="acc1">
                        <p class="accountUID"><?= $user['id'] ?></p>
                        <p class="accountCDate"><?= $user['created_at'] ?></p>
                        <p class="accountName"><?= $user['account_name'] ?></p>
                        <p class="accountStatus"><?= $user['email'] ?></p>
                        <button class="editaccount col-3">Chỉnh sửa tài khoản</button>
                        <a href="?url=user/delete/<?= $user['id'] ?>" onclick="return confirm('Bạn muốn xóa tài khoản này ?');"><button class="delete-button delaccount col-3">Xóa tài khoản</button></a>
                    </li>
                    <?php endforeach; ?>                  
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
