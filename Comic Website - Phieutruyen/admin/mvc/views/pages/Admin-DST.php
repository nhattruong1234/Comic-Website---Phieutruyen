
<script language="JavaScript" src="./js/sidebarType1.js"></script>

<div class="container-xxl" style="padding: 0;" id="content">

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
                <button class="story-item-btn" >
                    <i class='bx bxs-check-circle'></i>
                    <p>Chọn tất cả</p>
                </button>
                <button class="story-item-btn" >
                    <i class='bx bxs-x-circle'></i>
                    <p>Bỏ chọn tất cả</p>
                </button>
            </div>
            <div class="row workspace" style="height: 95%;">
                <div class="listchapter">
                    <ul class="col">
                    <?php  foreach ($data['nkhd'] as $nkhd): ?>
                        <?php if ($nkhd['status'] == 1): ?> 
                        <li>
                            <div class="row story-block-item">
                                <img class="col-3" src="<?= $nkhd['coverphoto']?>" alt="ava-str">
                                <div class="col-9" style="width: 79%;">
                                    <div class="row-3 story-block-item-detail">
                                        <h3><?= $nkhd['name']?></h3>
                                        <p>Tình trạng: Đã duyệt</p>
                                        <p>Người chỉnh sửa: <?= $nkhd['account_name']?></p>
                                        <p>Cập nhật: <?= $nkhd['updated_at_chapter']?></p>
                                        <p>Hoạt động: Cập nhật chương <?= $nkhd['id_chapter']?></p>
                                    </div>
                                </div>
                                <div class="col-1 checkbox-item">
                                    <input type="checkbox" >
                                </div>
                            </div>
                        </li>
                        <?php endif; ?>                         
                    <?php endforeach; ?>   
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
                    <?php  foreach ($data['country'] as $country): ?>
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
                    <button type="submit" class="story-item-btn">
                        <i class='bx bxs-trash'></i>
                        <p>Xóa</p>
                    </button>
                    <button class="story-item-btn" id="checkall">
                        <i class='bx bxs-check-circle'></i>
                        <p>Chọn tất cả</p>
                    </button>
                    <button class="story-item-btn" id="uncheckall">
                        <i class='bx bxs-x-circle'></i>
                        <p>Bỏ chọn tất cả</p>
                    </button>
                </div>
                <div class="row workspace" style="height: 60%;">
                    <div class="listchapter">
                        <ul class="col">
                        <?php  foreach ($data['comic'] as $comic): ?>
                            <?php if ($comic['status'] != 'Chờ duyệt'): ?>                                                     
                            <li>
                                <div class="row story-block-item">
                                    <img class="col-3" src="<?= $comic['coverphoto']?>" alt="ava-str">
                                    <div class="col-9" style="width: 79%;">
                                        <div class="row-3 story-block-item-detail">
                                            <h3><?= $comic['name']?></h3>
                                            <p>Tình trạng: Đã duyệt</p>
                                            <p>Người đăng: <?= $comic['author']?></p>
                                            <p>Cập nhật: <?= $comic['updated_at']?></p>
                                        </div>
                                        <div class="row-1 story-block-item-btn">
                                            <button class="story-item-btn">
                                                <i class='bx bx-detail'></i>
                                                <p>Trang truyện</p>
                                            </button>
                                            <a style="text-decoration: none" href="?url=comic/chapter_detail/<?= $comic['id'] ?>">
                                            <button class="story-item-btn">
                                                <i style="color: #212529;" class='bx bx-detail'></i>
                                                <p style="color: #212529;">Các chương</p>
                                            </button></a>
                                            <a style="text-decoration: none" href="?url=comic/delete/<?= $comic['id'] ?>" onclick="return confirm('Bạn có muốn xóa truyện này ?');">
                                            <button class="story-item-btn">
                                                <i style="color: #212529;" class='bx bxs-trash' aria-hidden="true"></i>
                                                <p style="color: #212529;">Xóa</p>
                                            </button></a>
                                        </div>
                                    </div>
                                    <div class="col-1 checkbox-item">
                                        <input type="checkbox" class="checkbox" >
                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>                         
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
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