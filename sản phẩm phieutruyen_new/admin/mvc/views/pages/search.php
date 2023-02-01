<!-- <!DOCTYPE html>
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

    <link rel="stylesheet" type="text/css" href="./css/topbar.css">
    <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/pagination.css">
    <link rel="stylesheet" type="text/css" href="./css/breadcrumb.css">
    <link rel="stylesheet" type="text/css" href="./css/category.css">
    <link rel="stylesheet" type="text/css" href="./css/Admin-NhatkyHD-DST.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head> 
<body>-->
     

<script language="JavaScript" src="./js/sidebarType1.js"></script>

<div class="container-xxl" style="padding: 0;" id="content">
    <!-- Tabpage -->
    
    <!-- Thanh breadcrumb --> 
    <div class="contain_nav_breadvrumb">
        <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                <li class="breadcrumb-item active">Quản lý truyện</li>
            </ol>
        </nav>
    </div>
    <h1 class="caption">QUẢN LÝ TRUYỆN</h1>
    <!--tab Nhật ký hoạt động -->
    <div class="tabs">
        <input type="radio" id="StoryDetail" name="tabs" >
        <label for="StoryDetail">Nhật ký hoạt động</label>
        <div class="row tab" style="height: 1280px;">
            <div class="row-1 cmd-btn">
                <button class="story-item-btn">
                    <i class='bx bxs-trash'></i>
                    <p>Xóa</p>
                </button>
                <button class="story-item-btn">
                    <i class='bx bxs-check-circle'></i>
                    <p>Chọn tất cả</p>
                </button>
                <button class="story-item-btn">
                    <i class='bx bxs-x-circle'></i>
                    <p>Bỏ chọn tất cả</p>
                </button>
            </div>
            <div class="row workspace" style="height: 95%;">
                <div class="listchapter">
                    <ul class="col">
                        <li>
                            <div class="row story-block-item">
                                <img class="col-3" src="./img/kimetsunoyaiba.jpg" alt="ava-str">
                                <div class="col-9" style="width: 79%;">
                                    <div class="row-3 story-block-item-detail">
                                        <h3>Kimetsu no yaiba</h3>
                                        <p>Tình trạng:</p>
                                        <p>Người chỉnh sửa:</p>
                                        <p>Cập nhật:</p>
                                        <p>Hoạt động:</p>
                                    </div>
                                </div>
                                <div class="col-1 checkbox-item">
                                    <input type="checkbox">
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="row story-block-item">
                                <img class="col-3" src="./img/kimetsunoyaiba.jpg" alt="ava-str">
                                <div class="col-9" style="width: 79%;">
                                    <div class="row-3 story-block-item-detail">
                                        <h3>Kimetsu no yaiba</h3>
                                        <p>Tình trạng:</p>
                                        <p>Người chỉnh sửa:</p>
                                        <p>Cập nhật:</p>
                                        <p>Hoạt động:</p>
                                    </div>
                                </div>
                                <div class="col-1 checkbox-item">
                                    <input type="checkbox">
                                </div>
                            </div>
                        </li>                                             
                    </ul>
                </div>
            </div>
        </div>

        <!-- tab quản lý truyện -->
        <input type="radio" id="StoryList" name="tabs" checked="checked">
        <label for="StoryList">Danh sách truyện</label>
        <div class="row tab" style="height: 1280px;">
            <!--The loai-->
            <form id="category-content" class="tab" style="order: 0;" method="POST" action="?url=comic/search" >
                <div class="categories" id="The-loai">
                    <label class="caption">Thể loại</label>
                    <?php  foreach ($data['tag'] as $tag): ?>
                        <div class="fcategory">
                            <input type="checkbox" name="q" id="cSport" value="<?=$tag['id']?>">
                            <label for="q"><?=$tag['name']?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <!--Quoc gia-->
                <div class="categories" id="The-loai">
                    <label class="caption">Quốc gia</label>
                    <?php foreach ($data['country'] as $country):?>
                        <div class="fcategory">
                            <input type="checkbox" name="q1" id="cVIE" value="<?=$country['id']?>">
                            <label for="q"><?=$country['name']?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <!--Tinh trang-->
                <div class="categories" id="Tinh-trang">
                    <label class="caption">Tình trạng</label>
                    <div class="fcategory">
                        <input type="checkbox" name="q" id="cCompleted">
                        <label for="q">Đã hoàn thành</label>
                    </div>
                    <div class="fcategory">
                        <input type="checkbox" name="q" id="cInProgress">
                        <label for="q">Đang tiến hành</label>
                    </div>
                    <div class="fcategory">
                        <input type="checkbox" name="q" id="cDropped">
                        <label for="q">Tạm ngưng</label>
                    </div>
                </div>
                <button type="submit" id="search-story-input">Tìm kiếm</button>
            </form>
                <div class="row-1 cmd-btn">
                    <button class="story-item-btn">
                        <i class='bx bxs-trash'></i>
                        <p>Xóa</p>
                    </button>
                    <button class="story-item-btn">
                        <i class='bx bxs-check-circle'></i>
                        <p>Chọn tất cả</p>
                    </button>
                    <button class="story-item-btn">
                        <i class='bx bxs-x-circle'></i>
                        <p>Bỏ chọn tất cả</p>
                    </button>
                </div>
                <div class="row workspace" style="height: 60%;">
                    <div class="listchapter">
                        <ul class="col">
                        <?php  foreach ($data['search'] as $search): ?>
                            <li>
                                <div class="row story-block-item">
                                    <img class="col-3" src=".<?= $search['coverphoto']?>" alt="ava-str">
                                    <div class="col-9" style="width: 79%;">
                                        <div class="row-3 story-block-item-detail">
                                            <h3><?= $search['name']?></h3>
                                            <p>Tình trạng: <?= $search['status']?></p>
                                            <p>Người đăng: <?= $search['account_name']?></p>
                                            <p>Cập nhật: <?= $search['updated_at']?></p>
                                            <!-- <p><?= $_POST['q'], $_POST['q1'], $search['id']; ?></p> -->
                                        </div>
                                        <div class="row-1 story-block-item-btn">
                                            <button class="story-item-btn">
                                                <i class='bx bx-detail'></i>
                                                <p>Trang truyện</p>
                                            </button>
                                            <a style="text-decoration: none" href="?url=comic/delete/<?= $search['id'] ?>" onclick="return confirm('Bạn có muốn xóa truyện này ?');">
                                            <button class="story-item-btn"><i style="color: #212529;" class='bx bxs-trash' aria-hidden="true"></i>
                                            <p style="color: #212529;">Xóa</p>
                                            </button></a>
                                        </div>
                                    </div>
                                    <div class="col-1 checkbox-item">
                                        <input type="checkbox">
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
    <script language="javascript" src="./js/jsheader.js"></script>
  
</body>
</html>