<?php

   session_start();
   require('../dbconnect.php');

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
                        <h3>ชื่อ-นามสกุล : </h3>
                        <p>ฟัรดี อูเซ็ง</p>
                     </div>
                     <div class="booking-detail-building d-flex">
                        <h3>อาคาร : </h3>
                        <p style="margin-left:117px">วิทยาศาสตร์และเทคโนโลยี</p>
                     </div>
                     <div class="booking-detail-room d-flex">
                        <h3>ห้อง : </h3>
                        <p style="margin-left:150px">107-11</p>
                     </div>
                     <div class="booking-detail-nameroom d-flex">
                        <h3>ชื่อห้อง : </h3>
                        <p style="margin-left:103px">วิจัย</p>
                     </div>
                     <div class="booking-detail-start d-flex">
                        <h3>เริ่ม : </h3>
                        <p style="margin-left:168px">11/12/6408.00น.</p>
                     </div>
                     <div class="booking-detail-end d-flex">
                        <h3>สิ้นสุด : </h3>
                        <p style="margin-left:123px">11/12/6410.00น.</p>
                     </div>
                     <div class="booking-detail-obj d-flex">
                        <h3>จุดประสงค์ : </h3>
                        <p style="margin-left:48px">....</p>
                     </div>
                     <div class="booking-detail-status d-flex">
                        <h3>สถานะ : </h3>
                        <p style="margin-left:113px">อนุมัติ</p>
                     </div>
                     <div class="booking-detail-email d-flex">
                        <h3>อีเมล : </h3>
                        <p style="margin-left:137px">Fatdee006@gmail.com</p>
                     </div>
                     <div class="booking-detail-phone d-flex">
                        <h3>เบอร์โทร : </h3>
                        <p style="margin-left:75px">0650505204</p>
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