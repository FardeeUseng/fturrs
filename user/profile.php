<?php

   session_start();
   require('../dbconnect.php');
   
   // Start Access permission User, Staff and Admin

   if(!isset($_SESSION['user_login']) and !isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission User, Staff and Admin

   //show table if have session User or Staff or Admin
   if(isset($_SESSION['admin_login'])){
      $id = $_SESSION['admin_login'];
      $sql = "SELECT * FROM admin WHERE admin_Id = $id";
      $result = mysqli_query($connect,$sql);
      $row = mysqli_fetch_assoc($result);

      $name = $row['ad_name'];
      $email = $row['ad_email'];
      $password = $row['ad_pass'];
      $sex = $row['ad_sex'];
      $phone = $row['ad_phone'];
   }elseif (isset($_SESSION['staff_login'])) {
      $id = $_SESSION['staff_login'];
      $sql = "SELECT * FROM staff WHERE staff_Id = $id";
      $result = mysqli_query($connect,$sql);
      $row = mysqli_fetch_assoc($result);

      $name = $row['st_name'];
      $email = $row['st_email'];
      $password = $row['st_pass'];
      $sex = $row['st_sex'];
      $phone = $row['st_phone'];
   }elseif (isset($_SESSION['user_login'])) {
      $id = $_SESSION['user_login'];
      $sql = "SELECT * FROM users WHERE users_Id = $id";
      $result = mysqli_query($connect,$sql);
      $row = mysqli_fetch_assoc($result);

      $name = $row['us_name'];
      $email = $row['us_email'];
      $password = $row['us_pass'];
      $sex = $row['us_sex'];
      $phone = $row['us_phone'];
   }

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
   .login{
      display:flex;
      justify-content:center;
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
   /********** End Content **********/

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
         <div class="main-menu col-xl-4">
            <div class="main-menu-logo d-flex">
               <img src="../img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>
            <div class="logo-user d-flex mt-2">
               <img src="../img/menu-logo/profile.png" alt="">
            </div>            
            <div class="profile-edit mt-3">
               <h2 class="text-center"><?php echo "$name"; ?></h2>
               <p class="text-center mt-4"><a href="profileedit.php">แก้ไขข้อมูลส่วนตัว</a></p>  
            </div>  
            <div class="login-link mt-4 text-center">
               <a class="text-center" href="../index.php">กลับสู่หน้าหลัก</a>
            </div>         
         </div>

         <!----------- Start Profile Detail ---------->

         <div class="main-content col-xl-8">
            <div class="main-content-container">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/profile.png" alt="">
                  </div>
                  <div class="content-header-h ml-4">
                     <h3>ข้อมูลส่วนตัว</h3>
                  </div>
               </div>
               <?php if(isset($_SESSION['editprofilesuccess'])){ ?>
                  <div class="alert alert-primary">
                     <?php echo $_SESSION['editprofilesuccess'];
                           unset($_SESSION['editprofilesuccess']);
                     ?>
                  </div>
               <?php } ?>
               <div class="profile-detail">
                  <div class="profile-detail-container p-5">
                     <div class="profile-detail-name d-flex">
                        <h3>ชื่อ - นามสกุล : </h3>
                        <h3 class="ml-3"><?php echo $name; ?></h3>
                     </div>
                     <div class="profile-detail-email d-flex">
                        <h3>อีเมล : </h3>
                        <h3 class="ml-3"><?php echo $email; ?></h3>
                     </div>
                     <div class="profile-detail-password d-flex">
                        <h3>Password : </h3>
                        <h3 class="ml-3"><?php echo $password; ?></h3>
                     </div>
                     <div class="profile-detail-sex d-flex">
                        <h3>เพศ : </h3>
                        <h3 class="ml-3">
                           <?php if($sex == "male"){
                              echo "ชาย";
                           }else{
                              echo "หญิง";
                           } ?>
                        </h3>
                     </div>
                     <div class="profile-detail-phone d-flex">
                        <h3>เบอร์โทร : </h3>
                        <h3 class="ml-3"><?php echo $phone; ?></h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!----------- End Profile Detail ---------->

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