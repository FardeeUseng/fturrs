<?php

   session_start();
   require('../dbconnect.php');
   
   // Start Access permission User, Staff and Admin

   if(!isset($_SESSION['user_login']) and !isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission User, Staff and Admin

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
   .main-manu-items li:nth-child(5){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(5) h3{
      color:#F0F8FF;
   }
   /********** end Main menu **********/

   /********** Start booking**********/

   .booking{
      background-color:#E9F1E6;
   }
   .booking-header{
      height:100px;
      background-color:#BAC9B8;
      border-radius:10px;
      align-items:center;
   }
   .booking-header img{
      height:70px;
      width:70px;
   }
   .booking-header h3{
      font-size:45px;
      color:#585858;
   }
   .booking-fill h4{
      font-size:35px;
      color:#585858;
   }
   .booking-fill input{
      background-color:#BAC9B8;
      border:2px solid #3D5538;
      border-radius:5px;
      width:500px;
      height:60px;
      padding:0 15px;
   }
   .booking-fill select{
      width:500px;
      height:60px;
      background-color:#BAC9B8;
      border:2px solid #3D5538;
      border-radius:5px;
      font-size:23px;
      color:#3D5538;
   }
   .booking-fill-items5 button{
      width:220px;
      height:60px;
      border:none;
      background-color:#3D5538;
      border-radius: 5px;
      font-size:35px;
      color:#F0F8FF;
   }
   .booking-fill-items5 button:hover{
      background-color:#597154;
   }
   .booking-fill-items5 a{
      font-size:35px;
      color:#F0F8FF;
   }
   .booking-fill-items5 a:hover{
      text-decoration:none;
      color:#F0F8FF;
   }
   ::placeholder{
      font-size:23px;
      color:#3D5538;
   }
   .booking-building option,.booking-room option{
      font-size:23px;
   }
   .booking-question{
      font-size:25px;
   }
   .booking-fill input[type]{
      font-size:23px;
      color:#3D5538;
   }
   /********** End Register **********/

</style>
   
<!---------- start header ---------->

<header>
   <?php include('../master/header-user.php'); ?>
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
            
            <!---------- start main-manu-items ---------->

               <?php include('../master/main-menu-user.php') ?>
            <!---------- End main-manu-items ---------->

         </div>
         <div class="booking col-xl-9">
            <div class="booking-container mx-5 my-4">
               <div class="booking-header d-flex">
                  <div class="booking-header-img ml-5">
                     <img src="../img/menu-logo/booking1.png" alt="">
                  </div>
                  <div class="booking-header-h ml-4">
                     <h3>จองห้องประชุม</h3>
                  </div>
                  
               </div>

               <!---------- Start Booking Form ---------->

               <div class="booking-fill my-5">
                  <form action="#" method="post">
                     <div class="booking-fill-items1 row">
                        <div class="booking-building col-xl-6 mb-4">
                           <h4>อาคาร</h4>
                           <select name="building" class="pl-2" require>
                              <option select>เลือก</option>
                              <option value="scienceandit">วิทยาศาสตร์และเทคโนโลยี</option>
                              <option value="arts">ศิลปศาสตร์และสังคมศาสตร์</option>
                              <option value="education">ศึกษาศาสตร์</option>
                              <option value="islamic">อิสลามศึกษา</option>
                           </select>
                        </div>
                        <div class="booking-room col-xl-6 mb-4">
                           <h4>ห้อง</h4>
                           <select name="building" class="pl-2" require>
                              <option select>เลือก</option>
                              <option value="scienceandit">104-11วิจัย</option>
                              <option value="arts">101-11คอม</option>
                              <option value="education">ลานกิจกรรม</option>
                              <option value="islamic">101-1ห้องประชุม</option>
                           </select>
                        </div>
                     </div>
                     <div class="booking-fill-items2 row mb-4">
                        <div class="booking-name col-xl-6">
                           <h4>ชื่อผู้จอง</h4>
                           <input type="text" name="name" placeholder="ชื่อผู้จอง" require>
                        </div>
                        <div class="booking-phone col-xl-6">
                           <h4>เบอร์โทร</h4>
                           <input type="number" name="phonenumber" placeholder="เบอร์โทร" require>
                        </div>
                     </div>
                     <div class="booking-fill-items3 row mb-4">
                        <div class="booking-numpeople col-xl-6 mb-4">
                           <h4>จำนวนผู้เข้าร่วม</h4>
                           <input type="number" name="numpeople" placeholder="จำนวนผู้เข้าร่วม" require>
                        </div>
                        <div class="booking-email col-xl-6">
                           <h4>จุดประสงค์</h4>
                           <input type="text" name="obj" placeholder="จุดประสงค์" require>
                        </div>
                     </div>
                     <div class="booking-fill-items4 row mb-4">
                        <div class="booking-startdate col-xl-6 mb-4">
                           <h4>วันที่เริ่มต้น</h4>
                           <input type="date" name="startdate" require>
                        </div>
                        <div class="booking-starttime col-xl-6">
                           <h4>เวลาเริ่มต้น</h4>
                           <input type="time" name="starttime" require>
                        </div>
                     </div>
                     <div class="booking-fill-items4 row mb-5">
                        <div class="booking-enddate col-xl-6 mb-4">
                           <h4>วันสิ้นสุด</h4>
                           <input type="date" name="enddate" require>
                        </div>
                        <div class="booking-endtime col-xl-6">
                           <h4>เวลาสิ้นสุด</h4>
                           <input type="time" name="endtime" require>
                        </div>
                     </div>
                     <div class="booking-fill-items5 mb-5 d-flex">
                        <button type="submit">ส่ง</button>
                        <button type="reset" class="bg-danger ml-3">ยกเลิก</button>
                     </div>
                  </form>
               </div>
               <!---------- End Booking Form ---------->

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