<button class="btntop" id="btntop">
    <i class='bx bx-send bx-rotate-270' ></i>
</button>

<?php
    if($btntop === null) $btntop = true;
    if($btntop != false) echo '<script>document.getElementById("btntop").setAttribute("style", "display:none;");</script>';
?>

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
                <li class="footer_item">
                    <a href="" class="footer_item_link">Tải App</a></li>
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