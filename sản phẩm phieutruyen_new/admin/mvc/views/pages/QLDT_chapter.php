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
    <link rel="stylesheet" type="text/css" href="css/QLDangTruyen.css">
    <link rel="stylesheet" type="text/css" href="css/breadcrumb.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
     <!-- Thanh menu chính -->

    <div class="container-xxl" id="content">
         <!-- Thanh breadcrumb -->
         <div class="contain_nav_breadvrumb">
            <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                    <li class="breadcrumb-item">Quản lý đăng truyện</li>
                    
                </ol>
            </nav>
        </div>
        <!--  -->
        <h1 class="caption">QUẢN LÝ ĐĂNG TRUYỆN</h1>
        <!-- Tabpage -->
        <div class="tabs">
            <!-- tab nhập thông tin truyện -->
            <input type="radio" id="StoryDetail" name="tabs" >
            <label for="StoryDetail">Truyện mới chờ phê duyệt</label>
            <div class="row tab" style="height: 800px;">
                <div class="row-1 cmd-btn">
                    <button class="story-item-btn">
                        <i class='bx bx-recycle'></i>
                        <p>Duyệt tự động</p>
                    </button>
                    <button class="story-item-btn">
                        <i class='bx bx-check'></i>
                        <p>Duyệt</p>
                    </button>
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
                <div class="row workspace">
                    <div class="listchapter">
                        <ul class="col">
                        <?php  foreach ($data['post_comic'] as $post_comic): ?>
                            <?php if ($post_comic['status'] == 0): ?>                                                     
                            <li>
                                <div class="row story-block-item">
                                    <img class="col-3" src="<?= $post_comic['coverphoto']?>" alt="ava-str">
                                    <div class="col-9" style="width: 79%;">
                                        <div class="row-3 story-block-item-detail">
                                            <h3><?=$post_comic['name']?></h3>  
                                            <p>Tình trạng: Chờ duyệt</p>
                                            <p>Cập nhật:</p>
                                        </div>
                                        <div class="row-1 story-block-item-btn">
                                            <a style="text-decoration: none" href="?url=post_comic/duyet_comic/<?= $post_comic['id'] ?>" onclick="return confirm('Bạn muốn duyệt truyện?');">
                                            <button class="story-item-btn">
                                                <i style="color: #212529;" class='bx bx-check'></i>
                                                <p style="color: #212529;">Duyệt</p>
                                            </button></a>
                                            <a style="text-decoration: none" href="?url=post_comic/chapter_detail/<?= $post_comic['id'] ?>">
                                            <button class="story-item-btn">
                                                <i style="color: #212529;" class='bx bx-detail'></i>
                                                <p style="color: #212529;">Các chương</p>
                                            </button></a>
                                            <a href="?url=post_comic/delete_comic/<?= $post_comic['id'] ?>" onclick="return confirm('Bạn muốn xóa truyện khỏi danh sách chờ duyệt?');" style="text-decoration: none">
                                            <button class="story-item-btn">
                                                <i style="color: #212529;" class='bx bxs-trash'></i>
                                                <p style="color: #212529;">Xóa</p>
                                            </button></a>
                                            <button class="story-item-btn">
                                                <i class='bx bx-book-reader'></i>
                                                <p>Đọc thử</p>
                                            </button>
                                            <button class="story-item-btn">
                                                <i class='bx bx-detail'></i>
                                                <p>Mô tả</p>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-1 checkbox-item">
                                        <input type="checkbox">
                                    </div>
                                </div>
                            </li>  
                            <?php endif; ?>                         
                        <?php endforeach; ?>
                        </ul>
                    </div>                              
                </div>                          
            </div>
            <!-- tab đăng chương truyện -->
            <input type="radio" id="ChapterList" name="tabs" checked="checked">
            <label for="ChapterList">Chương mới chờ phê duyệt</label>
            <div class="row tab" style="height: 800px;">
                <div class="row-1 cmd-btn">
                    <button class="story-item-btn">
                        <i class='bx bx-recycle'></i>
                        <p>Duyệt tự động</p>
                    </button>
                    <button class="story-item-btn">
                        <i class='bx bx-check'></i>
                        <p>Duyệt</p>
                    </button>
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
                <div class="row workspace">
                    <div class="listchapter">
                        <ul class="col">
                        <?php  foreach ($data['chapter'] as $chapter): ?>    
                            <?php if ($chapter['status'] == 0): ?>                                                                     
                            <li>
                                <div class="row story-block-item">
                                    <img class="col-3" src="<?= $chapter['coverphoto']?>" alt="ava-str">
                                    <div class="col-9" style="width: 79%;">
                                        <div class="row-3 story-block-item-detail">
                                            <h3><?= $chapter['name']?></h3>
                                            <p>Chương <?= $chapter['index']?></p>
                                            <p>Tình trạng: Chờ duyệt</p>
                                            <p>Cập nhật:</p>
                                        </div>
                                        <div class="row-1 story-block-item-btn">
                                            <a style="text-decoration: none" href="?url=post_comic/duyet_chapter/<?= $chapter['id'] ?>" onclick="return confirm('Bạn muốn duyệt truyện?');">
                                            <button class="story-item-btn">
                                                <i style="color: #212529;" class='bx bx-check'></i>
                                                <p style="color: #212529;">Duyệt</p>
                                            </button></a>                                            
                                            <a href="?url=post_comic/delete_chapter/<?= $chapter['id'] ?>" onclick="return confirm('Bạn muốn xóa chương khỏi danh sách chờ duyệt?');" style="text-decoration: none">
                                            <button class="story-item-btn">
                                                <i style="color: #212529;" class='bx bxs-trash'></i>
                                                <p style="color: #212529;">Xóa</p>
                                            </button></a>
                                            <button class="story-item-btn">
                                                <i class='bx bx-book-reader'></i>
                                                <p>Đọc thử</p>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-1 checkbox-item">
                                        <input type="checkbox">
                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>                         
                            <?php endforeach; ?>
                        </ul>
                    </div>         
                </div>   
            </div>
            <!--  -->
        </div>
        <!--  -->
    </div> 
    <script language="JavaScript" src="./js/sidebarType1.js"></script>
    <script language="JavaScript" src="./js/DangTruyen.js"></script>
    <script language="JavaScript" src="./js/jsheader.js"></script>   
</body>
</html>