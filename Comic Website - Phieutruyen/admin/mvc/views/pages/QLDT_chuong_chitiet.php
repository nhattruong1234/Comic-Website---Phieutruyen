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
                <div class="row workspace" style="height: 60%;">
                    <div class="listchapter">
                        <ul class="col">
                        <?php  foreach ($data['post_comic'] as $post_comic): ?>    
                            <?php if ($post_comic['status'] == 0): ?>                                                                     
                            <li>
                                <div class="row story-block-item">
                                    <img class="col-3" src="<?= $post_comic['coverphoto']?>" alt="ava-str">
                                    <div class="col-9" style="width: 79%;">
                                        <div class="row-3 story-block-item-detail">
                                            <h3><?= $post_comic['name']?></h3>
                                            <p>Chương <?= $post_comic['index']?></p>
                                            <p>Tình trạng: Chờ duyệt</p>
                                            <p>Cập nhật: <?= $post_comic['created_at']?></p>
                                        </div>
                                        <div class="row-1 story-block-item-btn">
                                            <a style="text-decoration: none" href="?url=post_comic/duyet_chuong/<?= $post_comic['index'] ?>" onclick="return confirm('Bạn muốn duyệt truyện?');">
                                            <button class="story-item-btn">
                                                <i style="color: #212529;" class='bx bx-check'></i>
                                                <p style="color: #212529;">Duyệt</p>
                                            </button></a>
                                            <a href="?url=post_comic/xoa_chuong/<?= $post_comic['id'] ?>" onclick="return confirm('Bạn muốn xóa chương khỏi danh sách chờ duyệt?');" style="text-decoration: none">
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