
<div class="container-xxl" style="padding: 0;" id="content">
    <!-- Tabpage -->
    
    <!-- Thanh breadcrumb --> 
    <div class="contain_nav_breadvrumb">
        <nav  class="nav_breadcrumb" aria-label="Page breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><i class='bx bxs-home'></i></li>
                <li class="breadcrumb-item active">Quản lý chương</li>
            </ol>
        </nav>
    </div>
    <h1 class="caption">QUẢN LÝ CHƯƠNG</h1>
    <!--tab Nhật ký hoạt động -->
    <div class="tabs" >
        <!-- tab quản lý truyện -->
        <input type="radio" id="StoryList" name="tabs" checked >
        <label for="StoryList" style="width:100%;">Quản lý chương</label>
        <div class="row tab" style="height: 1280px; ">          
                <div class="row-1 cmd-btn">
                    <button class="story-item-btn" id="checkall">
                        <i class='bx bxs-check-circle'></i>
                        <p>Duyệt tất cả</p>
                    </button>
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
                        <?php foreach ($data['comic_chapter'] as $comic_chapter): ?>
                            <?php if ($comic_chapter['status'] == 'Đã duyệt'): ?>
                                <li>
                                <div class="row story-block-item">
                                    <img class="col-3" src=".<?= $comic_chapter['coverphoto']?>" alt="ava-str">
                                    <div class="col-9" style="width: 79%;">
                                        <div class="row-3 story-block-item-detail">
                                            <h3><?= $comic_chapter['name_comic']?></h3>
                                            <p>Chương <?= $comic_chapter['index']?></p>
                                            <p>Tình trạng: Đã duyệt</p>
                                            <p>Cập nhật: <?= $comic_chapter['updated_at']?></p>
                                            <p><?=$comic_chapter['id_comic'] ?></p>
                                        </div>
                                        <div class="row-1 story-block-item-btn">
                                            
                                            <a href="?url=comic/delete_chapter/<?= $comic_chapter['id'] ?>" onclick="return confirm('Bạn muốn xóa chương khỏi danh sách ?');" style="text-decoration: none">
                                            <button class="story-item-btn">
                                                <i style="color: #212529;" class='bx bxs-trash'></i>
                                                <p style="color: #212529;">Xóa</p>
                                            </button></a>
                                            <button class="story-item-btn" onclick="location.href='./../read.php?comic=<?= $comic_chapter['id_comic'] ?>&chapter=<?= $comic_chapter['index']; ?>'">
                                                <i class='bx bx-book-reader'></i>
                                                <p>Đọc thử</p>
                                            </button>
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