<?php
   session_start();

   // Start User, Staff and Admin Log out Code
   if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['name']);
      unset($_SESSION['user_login']);
      unset($_SESSION['staff_login']);
      unset($_SESSION['admin_login']);
      unset($_SESSION['male']);
      header('location: index.php');
   }
   // End User, Staff and Admin Log out Code
?>

<!DOCTYPE html>
<html lang="en">

<!---------- start head ---------->

<head>
   <?php include('./master/head.php'); ?>
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
   .main-manu-items li:nth-child(1){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(1) h3{
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
   .content-footer-bottom{
      height:50px;
      align-items:center;
   }
   .content-footer-bottom img{
      width:50px;
      height:50px;
   }
   .content-footer-bottom p {
      margin:10px;
      font-size:25px;
      color:#585858;
   }
   .bottom-green{
      width:45px;
      height:45px;
      border:3px solid green;
      border-radius: 5px;
   }
   .bottom-orange{
      width:45px;
      height:45px;
      border:3px solid orange;
      border-radius: 5px;
   }
   /********** End Content **********/

</style>
   
<!---------- start header ---------->

<header>
   <?php include('./master/header.php') ?>
</header>
<!---------- end header ---------->

<!---------- start content ---------->

<div class="content">
   <div class="container-fluid">
      <div class="main row">
         <div class="main-menu p-0 col-xl-3">
            <div class="main-menu-logo d-flex">
               <img src="img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>

            <!---------- Start main-manu-items ---------->

               <?php include('./master/main-menu.php'); ?>
            <!---------- End main-manu-items ---------->
            
         </div>

         <!---------- Start main-content ---------->

         <div class="main-content col-xl-9">
            <div class="content-container mx-5 my-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="img/menu-logo/calendar.png" alt="">
                  </div>
                  <div class="content-header-h ml-4">
                     <h3>ปฏิทินการจองห้องประชุม</h3>
                  </div>
               </div>
               <div class="content-search d-flex mt-5 mb-4">
                  <form method="post" class="input-group">                  
                     <select class="custom-select" id="">
                        <option value="allbuilding" selected>อาคารทั้งหมด</option>
                        <option value="scienceandit">วิทยาศาสตร์และเทคโนโลยี</option>
                        <option value="arts">ศิลปศาสตร์และสังคมศาสตร์</option>
                        <option value="education">ศึกษาศาสตร์</option>
                        <option value="islamic">อิสลามศึกษา</option>
                     </select>
                     <button class="content-search-button px-2 rounded-right" type="submit">ค้นหา</button>
                  </form>
               </div>
               <div class="content-table bg-dark">
               </div>
               <div class="content-footer row">
                  <div class="content-footer-top">
                     <div class="content-footer-left col-7">
                     </div>
                     <div class="content-footer-right col-5">
                     </div>
                  </div>
                  <div class="content-footer-bottom d-flex">
                     <img src="img/menu-logo/color-wheel.png" alt="">
                     <p>สีสถานะห้องประชุม</p>
                     <div class="bottom-green bg-success"></div>
                     <p>อนุมัติ</p>
                     <div class="bottom-orange bg-warning"></div>
                     <p>รออนุมัติ</p>
                  </div>
               </div>
            </div>
         </div>
         <!---------- End main-content ---------->

      </div>
   </div>
</div>
<!---------- end content ---------->

<!---------- start footer ---------->

<footer>
   <?php include('./master/footer.php'); ?>
</footer>
<!---------- end footer ---------->

<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
