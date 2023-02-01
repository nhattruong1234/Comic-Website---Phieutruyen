<?php
    require_once("../database/connect_database.php");
    $sql = "select count(*) total from user";
    $total_member = EXECUTE_RESULT($sql);

    $sql = "select count(*) total from feedback where status='0'";
    $total_chapter = EXECUTE_RESULT($sql);

    $sql = "select count(*) total from comic where status='Chờ duyệt'";
    $total_comic = EXECUTE_RESULT($sql);
?>

<div class="container-xxl" id="content">
    <div class="row">
        <div class="col-4 detail-block" id="NumOfMember-block">
            <div class="icon-block">
                <i class='bx bx-user-circle'></i>
            </div>
            <div class="content-block">
                <h3>THÀNH VIÊN</h3>
                <p><?php echo $total_member[0]['total']; ?></p>
            </div>
        </div>
        <div class="col-4 detail-block" id="WaitingStory-block">
            <div class="icon-block">
                <i class='bx bx-time-five'></i>
            </div>
            <div class="content-block">
                <h3>TRUYỆN CHỜ DUYỆT</h3>
                <p><?php echo $total_comic[0]['total']; ?></p>
            </div>
        </div>
        <div class="col-4 detail-block" id="Report-block">
            <div class="icon-block">
                <i class='bx bx-envelope'></i>
            </div>
            <div class="content-block">
                <h3>PHẢN HỒI</h3>
                <p><?php echo $total_chapter[0]['total']; ?></p>
            </div>
        </div>
    </div>
    <script>
        let abcdefg = "qwertyuiop";
    </script>
    <div class="row" style="height: max-content !important; flex-direction: column; padding: 0;">
        <div class="card">
            <div class="body-card">
                <h3>Biểu đồ lượt truy cập gần đây</h3>
                <hr>
                <div class="canvas-content">
                    <canvas id="ViewsChart"></canvas>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="body-card">
                <h3>Biểu đồ số chương truyện đã đăng gần đây</h3>
                <hr>
                <div class="canvas-content">
                    <canvas id="NumOfChapChart"></canvas>
                </div>
            </div> 
        </div>
    </div>
</div>
<script language="JavaScript" src="./js/chart.js"></script>