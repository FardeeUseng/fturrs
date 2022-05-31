<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
include ('dbconnect.php'); 

$json_data= array();

$q ="SELECT * FROM reservation LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN building ON reservation.bd_Id = building.bd_Id";


$result = $connect->query($q);

while ($rs = $result->fetch_object()) {
    if ($rs->rserv_status == '') {
        $color = '#FFFFFF';
        //FF0000
    }
    if ($rs->rserv_status == 'approve') {
        $color = '#02d667';
        //FF0000
    }
    if ($rs->rserv_status == 'pendingApproval') {
        $color = '#FF9900';
        //FF0000
    }
    $json_data[] = [
        'id' => $rs->rserv_Id,
        'title' =>
            $rs->r_name . ',' . $rs->bd_name,
        'start' => $rs->startdate . ' ' . $rs->starttime,
        'end' => $rs->enddate . ' ' . $rs->endtime,
        'url' => 'showEventsData.php?id=' . $rs->rserv_Id,
        'color' => $color,
    ];
    
}
$json = json_encode($json_data);
echo $json;

//แสดงข้อมูลแบบง่ายๆ นะครับ ส่วนเรื่องความปลอดภัยของข้อมูล ต้องมีเงื่อนไขในการเข้าถึงข้อมูลด้วยนะครับ ถ้าไม่อยากให้ที่อื่นเรียใช้ข้อมูลได้ 