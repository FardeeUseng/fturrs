<?php

   session_start();
   require('../dbconnect.php');
   
   $id = $_GET["id"];
   $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN organization ON reservation.org_Id = organization.org_Id LEFT JOIN major ON reservation.major_Id = major.major_Id WHERE rserv_Id = $id";
   $result = mysqli_query($connect, $sql);
   $row = mysqli_fetch_assoc($result);

   // Start Access permission Staff and Admin

   if(!isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Staff and Admin

?>
<!DOCTYPE html>
<html lang="en">

<!---------- start head ---------->

<head>
   <?php include('../master/head-user.php') ?>
</head>
<!---------- End head ---------->

<body>
<style>

   /********** Start Main menu **********/

   .main-content{
      background-color:#E9F1E6;
   }
   .main-menu{
      background-color:#BAC9B8;
   }
   .main-menu-logo{
      height:160px;
      width:100%;
      justify-content:center;
      align-items:center;
   }
   .main-menu-logo img{
      width:100px;
      height:100px;
   }
   .main-menu-logo h3{
      font-size:45px;
      font-weight: bold;
      color:#585858;
   }
   .main-manu-items li:nth-child(6){
      background-color:#3D5538;
      position:relative;
   }
   .main-manu-items li:nth-child(6) h3{
      color:#F0F8FF;
   }
   /********** End Main menu **********/

   /********** Start Content Title **********/

   .content-title{
      height:100px;
      background-color:#BAC9B8;
      border-radius:10px;
      align-items:center;
   }
   .content-title img{
      height:70px;
      width:70px;
   }
   .content-title h3{
      font-size:45px;
      color:#585858;
   }
   /********** End Content Title**********/

   /********** Start Cintent detail **********/

   .booking-detail{
      background-color:#D7E6D5;
      width:1170px;
      margin:50px 0px;
      border-radius:3px;
   }
   .booking-detail-container h3{
      font-size:40px;
      margin-bottom:35px;
      color:#585858;
   }
   .booking-detail-container p{
      margin-left:15px;
      color:#585858;
      font-size:30px;
   }
   /********** End Cintent detail **********/

</style>
   
<!---------- start header ---------->

<header>
   <?php include('../master/header-user.php') ?>
</header>
<!---------- end header ---------->


<!---------- start content ---------->

<div class="content">
   <div class="container-fluid">
      <div class="main row">
         <div class="main-menu p-0 col-xl-3">
            <div class="main-menu-logo d-flex">
               <img src="../img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>

            <!---------- Start main-manu-items ---------->

            <?php include('../master/main-menu-user.php') ?>
            <!---------- End main-manu-items ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('../master/inform.php'); ?>
            <?php endif ?>

         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mx-5 my-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/booking.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>รายละเอียดการจองห้อง</h3>
                  </div>
               </div>

               <!---------- Start booking-detail ---------->

               <div class="booking-detail">
                  <div class="booking-detail-container p-5">
                     <div class="booking-detail-name d-flex">
                        <h3>ชื่อผู้จอง : </h3>
                        <p style="margin-left:80px"><?php echo $row["peoplename"]; ?></p>
                     </div>
                     <div class="booking-detail-building d-flex">
                        <h3>อาคาร : </h3>
                        <p style="margin-left:117px"><?php echo $row["bd_name"] ?></p>
                     </div>
                     <div class="booking-detail-room d-flex">
                        <h3>ห้อง : </h3>
                        <p style="margin-left:150px"><?php echo $row["r_code"] ?></p>
                     </div>
                     <div class="booking-detail-nameroom d-flex">
                        <h3>ชื่อห้อง : </h3>
                        <p style="margin-left:103px"><?php echo $row["r_name"] ?></p>
                     </div>
                     <div class="booking-detail-start d-flex">
                        <h3>เริ่ม : </h3>
                        <p style="margin-left:168px"><?php echo date("d-m-Y",strtotime($row["startdate"])). " / " .date("H:m",strtotime($row["starttime"])) ?></p>
                     </div>
                     <div class="booking-detail-end d-flex">
                        <h3>สิ้นสุด : </h3>
                        <p style="margin-left:123px"><?php echo date("d-m-Y",strtotime($row["enddate"])). " / " .date("H:m",strtotime($row["endtime"])) ?></p>
                     </div>
                     <div class="booking-detail-obj d-flex">
                        <h3>จุดประสงค์ : </h3>
                        <p style="margin-left:48px"><?php echo $row['obj'] ?></p>
                     </div>
                     <div class="booking-detail-status d-flex">
                        <h3>สถานะ : </h3>
                        <?php 
                           if($row["rserv_status"] === "approve"){
                              echo "<p class='text-success' style='margin-left:113px'>อนุมัติ</p>";
                           }elseif($row["rserv_status"] === "disapproved"){
                              echo "<p class='text-danger' style='margin-left:113px'>ไม่อนุมัติ</p>";
                           }else{
                              echo "<p class='text-primary' style='margin-left:113px'>รอการอนุมัติ</p>";
                           }
                        ?>
                     </div>
                     <div class="booking-detail-email d-flex">
                        <h3>อีเมล : </h3>
                        <p style="margin-left:137px"></p>
                     </div>
                     <div class="booking-detail-phone d-flex">
                        <h3>เบอร์โทร : </h3>
                        <p style="margin-left:75px"><?php echo $row['phone'] ?></p>
                     </div>                   
                     <div class="booking-detail-nameroom d-flex">
                        <h3>จำนวนผู้เข้าร่วม : </h3>
                        <p style="margin-left:30px"><?php echo $row['numpeople'] ?></p>
                     </div>
                     <div class="booking-detail-nameroom d-flex">
                        <h3>รหัสนักศึกษา/บุคลากร : </h3>
                        <p style="margin-left:30px"><?php echo $row['people_Id'] ?></p>
                     </div>
                     <div class="booking-detail-nameroom d-flex">
                        <h3>สังกัดองค์กร/คณะ : </h3>
                        <p style="margin-left:30px"><?php echo $row['org_name'] ?></p>
                     </div>
                     <div class="booking-detail-nameroom d-flex">
                        <h3>หน่วยงาน/สาขาวิชา/ชมรม: </h3>
                        <p style="margin-left:30px"><?php echo $row['major_name'] ?></p>
                     </div>
                     
                  </div>
               </div>
               <!---------- End booking-detail ---------->

            </div>
         </div>
      </div>  
   </div>
</div>
<!---------- end content ---------->

<!---------- start footer ---------->

<footer>
   <?php include('../master/footer-user.php'); ?>
</footer>
<!---------- end footer ---------->

   <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>