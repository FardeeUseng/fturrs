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
   .logo-user{
      margin: auto;
      width:100%;
      justify-content:center;
   }
   .logo-user img{
      width:200px;
      height:200px;
   }
   .profile-edit{
      display:flex;
      justify-content:center;
   }
   .profile-edit button{
      background-color:#3D5538;
      height:45px;
      width:300px;
      color:#fff;
      font-size:25px;
      border:2px solid #3D5538;
      border-radius: 5px;
      margin-top:20px;
   }
   .profile-edit h2{
      font-size:40px;
      color:#585858;
   }
   .profile-edit a{
      font-size:30px;
      color:#585858;
      background-color:#FBA535;
      padding:5px 10px;
      border-radius:5px;
      border:3px solid #975703;
   }
   .profile-edit a:hover{
      text-decoration:none;
      background-color:#FCB353;
   }
   .login-link a{
      color:#585858;
      font-size:22px;
   }
   .login-link a:hover{
      color:#2780BB;
      text-decoration:none;
   }

   /********** end Main menu **********/

   /********** Start Content **********/
   .content-title{
      height:100px;
      background-color:#BAC9B8;
      border-radius:10px;
      align-items:center;
      margin:30px;
   }
   .content-title img{
      height:70px;
      width:70px;
   }
   .content-title h3{
      font-size:45px;
      color:#585858;
   }
   .main-content{
      background-color:#E9F1E6;
   }
   .profile-detail{
      background-color:#D7E6D5;
      width:1070px;
      margin:50px 30px;;
   }
   .profile-detail-container h3{
      font-size:40px;
      margin-bottom:25px;
      color:#585858;
   }
   .profile-detail-container input,.profile-detail-container select{
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
   .profile-detail-container select{
      width:200px;
   }
   /********** End Content **********/

</style>
   
<!---------- start header ---------->

<header>
   <?php include('../master/head-user.php') ?>
</header>
<!---------- end header ---------->

<!---------- start content ---------->

<div class="content">
   <div class="container-fluid">
      <div class="main row">
         <div class="main-menu col-xl-4">
            <div class="main-menu-logo d-flex">
               <img src="../img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>
            <div class="logo-user d-flex mt-2">
               <img src="../img/menu-logo/profile.png" alt="">
            </div> 

            <!----------- Start form Edit Profile ---------->

            <div class="profile-edit mt-3">           
               <form action="" method="post">               
                  <h2 class="text-center">ฟัรดี อูเซ็ง</h2>
                  <button type="submit">ยืนยันแก้ไขข้อมูล</button>
            </div> 
            <div class="login-link mt-4 text-center">
               <a class="text-center" href="index.php">กลับสู่หน้าหลัก</a>
            </div>         
         </div>
         <div class="main-content col-xl-8">
            <div class="main-content-container">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/profile.png" alt="">
                  </div>
                  <div class="content-header-h ml-4">
                     <h3>แก้ไขข้อมูลส่วนตัว</h3>
                  </div>
               </div>
               <div class="profile-detail">
                  <div class="profile-detail-container p-5">
                        <div class="profile-detail-name d-flex">
                           <h3>ชื่อ-นามสกุล : </h3>
                           <input type="text" name="name" value="ฟัรดี อูเซ็ง" require>
                        </div>
                        <div class="profile-detail-username d-flex">
                           <h3>Username : </h3>
                           <input style="margin-left:36px;" type="text" name="username" value="Admin1122" require>
                        </div>
                        <div class="profile-detail-password d-flex">
                           <h3>Password : </h3>
                           <input style="margin-left:48px;" type="password" name="password" value="faaa1122" require>
                        </div>
                        <div class="profile-detail-sex d-flex">
                           <h3>เพศ : </h3>
                           <select name="sex"  style="margin-left:148px;">
                              <option value="male">ชาย</option>
                              <option value="female">หญิง</option>
                           </select>
                        </div>
                        <div class="profile-detail-email d-flex">
                           <h3>อีเมล : </h3>
                           <input style="margin-left:130px;" type="email" name="email" value="Fatdee006@gmail.com" require>
                        </div>
                        <div class="profile-detail-phone d-flex">
                           <h3>เบอร์โทร : </h3>
                           <input style="margin-left:71px;" type="number" name="phonenum" value="0650505204" require>
                        </div>
                     </form>
                     <!----------- End form Edit Profil ---------->
                  </div>
               </div>
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