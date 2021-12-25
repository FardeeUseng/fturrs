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
   .main-manu-items li:nth-child(7){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(7) h3{
      color:#F0F8FF;
   }
   /********** End Main menu **********/

   /********** Start Content **********/

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
   .content-search-button{
      background-color:#3D5538;
      color:#F0F8FF;
   }
   .content-search{
      justify-content:flex-end;
   }
   .content-search form{
      width:500px;
   }
   .custom-select option{
      background-color:#E9F1E6;
   }
   /********** End Content **********/

   /********** Start Edit Booking **********/

   .editbooking{
      background-color:#D7E6D5;
      width:1170px;
      margin:50px 0px;
      border-radius:3px;
   }
   .editbooking-container h3{
      font-size:40px;
      margin-bottom:25px;
      color:#585858;
   }
   .editbooking-container input,.editbooking-container select{
      background-color:#BAC9B8;
      border: 2px solid #3D5538;
      border-radius:6px;
      height:60px;
      width:690px;
      margin-bottom:25px;
      margin-left:10px;
      color:#585858;
      font-size:30px;
      padding-left:20px;
   }
   .editbooking-container select{
      width:200px;
   }
   .editbooking-button button:nth-child(1){
      background-color:#FBA535;
      
   }
   .editbooking-button button:nth-child(1):hover{
      background-color:#F6B35B;
      
   }
   .editbooking-button button:nth-child(2){
      background-color:#F61414;
      margin-left:20px;
   }
   .editbooking-button button:nth-child(2):hover{
      background-color:#EE5151;
   }
   .editbooking-button button{
      border:none;
      border-radius:5px;
      margin-top:10px;
      width:180px;
      height:50px;
      color:#FAFCF9;
      font-size:30px;
   }
   /********** End Edit Booking **********/

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
                     <img src="../img/menu-logo/edit.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>แก้ไขการจองห้อง</h3>
                  </div>
               </div>

               <!---------- Start Edit booking ---------->
               
               <div class="editbooking">
                  <div class="editbooking-container p-5">
                     <form action="" method="post">
                        <div class="editbooking-name d-flex">
                           <h3>ชื่อ-นามสกุล : </h3>
                           <input type="text" name="name" value="ฟัรดี อูเซ็ง" require>
                        </div>
                        <div class="editbooking-building d-flex">
                           <h3>อาคาร : </h3>
                           <select name="building"  style="margin-left:110px;width:690px;">
                              <option select>เลือกอาคาร</option>
                              <option value="scienceandit">วิทยาศาสตร์และเทคโนโลยี</option>
                              <option value="arts">ศิลปศาสตร์และสังคมศาสตร์</option>
                              <option value="education">ศึกษาศาสตร์</option>
                              <option value="islamic">อิสลามศึกษา</option>
                           </select>
                        </div>
                        <div class="editbooking-room d-flex">
                           <h3>ห้อง : </h3>
                           <select name="room"  style="margin-left:143px;width:690px;">
                              <option select>เลือกห้อง</option>
                              <option value="rsumna">สัมมนา</option>
                              <option value="rit">คอม</option>
                              <option value="rresearch">วิจัย</option>
                              <option value="rmeeting">ประชุม</option>
                           </select>
                        </div>
                        <div class="editbooking-password d-flex">
                           <h3>เริ่มต้นวันที่ : </h3>
                           <input style="margin-left:38px;" type="date" name="startdate" value="" require>
                        </div>
                        <div class="editbooking-password d-flex">
                           <h3>สิ้นสุดวันที่ : </h3>
                           <input style="margin-left:44px;" type="date" name="enddate" value="" require>
                        </div>
                        <div class="editbooking-password d-flex">
                           <h3>เริ่มต้นเวลา : </h3>
                           <input style="margin-left:34px;" type="time" name="starttime" value="" require>
                        </div>
                        <div class="editbooking-password d-flex">
                           <h3>สิ้นสุดเวลา : </h3>
                           <input style="margin-left:40px;" type="time" name="endtime" value="" require>
                        </div>
                        <div class="editbooking-email d-flex">
                           <h3>อีเมล : </h3>
                           <input style="margin-left:130px;" type="email" name="email" value="" require>
                        </div>
                        <div class="editbooking-phone d-flex">
                           <h3>เบอร์โทร : </h3>
                           <input style="margin-left:71px;" type="number" name="phonenum" value="" require>
                        </div>
                        <div class="editbooking-button">
                           <button type="submit">แก้ไข</button>
                           <button type="reset">ยกเลิก</button>
                        </div>
                     </form>                    
                  </div>
               </div>
               <!---------- End Edit booking ---------->

               <!-- Start content-footer -->
               
               <div class="content-footer row">
               

               </div>
               <!-- End content-footer -->

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