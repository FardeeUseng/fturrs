<?php
    include './dbconnect.php'; // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
    include './thai_date.php';
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <?php include('./master/head.php'); ?>
    <link rel="stylesheet" href="./bootstrap/jquery.fancybox.css">
    <link rel="stylesheet" href="./bootstrap/fullcalendar/fullcalendar.css">
    <script src="./bootstrap/js/moment.min.js"></script>
    <script src="./bootstrap/fullcalendar/fullcalendar.min.js"></script>
    <script src="./bootstrap/jquery.fancybox.pack.js"></script>
</head>

<body>

    <?php

    $sql = "SELECT * FROM reservation WHERE rserv_Id ='" . $_GET['id'] . "' ";
    $result = $connect->query($sql);
    $rs = $result->fetch_object();

    if ($rs->rserv_status == 'approve') {
        $status =
            "<button class='btn btn-success btn-sm'>" .
            "<i class='fa fa-check pr-2'></i> อนุมัติ </button>";
    } else{
        $status =
            "<button class='btn btn-warning btn-sm'>" .
            "<i class='fa fa-refresh pr-2'></i> รออนุมัติ</button>";
    }

    ?>
    <div id="wrapper">

        <div class="row">

            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading mb-3">
                        <h3>รายละเอียดการขอใช้ห้อง</h3>
                    </div>
                    <div class="panel-body">
                        <label for="">ชื่อผู้ใช้ห้อง</label>
                        <div class="alert alert-success">
                            <?php echo $rs->peoplename; ?>
                        </div>
                        <label for="">วัน-เวลา การใช้ห้อง</label>
                        <div class="alert alert-info">
                            เริ่ม <?php echo thai(
                                    $rs->startdate
                                ); ?> - <?php echo thai($rs->enddate); ?>
                        </div>

                        <label for="">จุดประสงค์การเข้าใช้ห้อง</label>
                        <div class="alert alert-info">
                            <?php echo $rs->obj; ?>
                        </div>
                        <button class="btn btn-default btn-sm"> สถานะ </button>                           
                            <?php
                                echo $status;
                            ?> 
                    </div>

                </div>
            </div>

        </div>
    </div>
</body>

</html>