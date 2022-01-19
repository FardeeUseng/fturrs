<?php
   session_start();
   require("./dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">

<!---------- Start head ---------->

<head>
   <?php include('./master/head.php') ?>
</head>
<!---------- End head ---------->
<body>

<!---------- Start style ---------->

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
   <?php if(isset($_SESSION['admin_login'])){ ?>
   .main-manu-items li:nth-child(12){
      position:relative;
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(12) h3{
      color:#F0F8FF;
   }
   <?php }elseif(isset($_SESSION['staff_login'])){ ?>
   .main-manu-items li:nth-child(10){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(10) h3{
      color:#F0F8FF;
   }
   <?php }elseif(isset($_SESSION['user_login'])){ ?>
   .main-manu-items li:nth-child(6){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(6) h3{
      color:#F0F8FF;
   }
   <?php }else{ ?>
   .main-manu-items li:nth-child(4){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(4) h3{
      color:#F0F8FF;
   }
   <?php } ?>
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
   .custom-select option{
      background-color:#E9F1E6;
   }
   /********** End Content **********/

   /********** Start About us detail **********/

   .aboutus{
      background-color:#D7E6D5;
      width:1170px;
      margin:50px 0px;
      border-radius:3px;
   }
   .aboutus-container h3{
      font-size:40px;
      margin-bottom:25px;
      color:#585858;
   }
   .aboutus-left img {
      width:500px;
      height:300px;
   }
   .aboutus-right h4{
      font-size:30px;
      color:#585858;
   }
   .aboutus-right p{
      font-size:20px;
      color:#585858;
   }
   .aboutus-title h4{
      text-align:center;
      color:#585858;
      font-size:30px;
   }
   .aboutus-advisor-img{
      justify-content:center;
      
   }
   .aboutus-advisor-img img{
      width:170px;
      height: 170px;
      border-radius:50%;
   }
   .aboutus-bottom p{
      text-align:center;
      color:#585858;
      font-size:20px;
      margin-top:-15px;
   }
   .aboutus-developer img{
      width:170px;
      height:170px;
      border-radius:50%;
      margin-left:50px;
   }
   
   /********** End About us detail **********/

</style>
<!---------- End style ---------->
   
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
               <img src="./img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>

            <!---------- Start main-manu-items ---------->

               <?php include('./master/main-menu.php') ?>
            <!---------- End main-manu-items ---------->

            <!---------- Start inform ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('./master/inform.php'); ?>
            <?php endif ?>
            <!---------- End inform ---------->

         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mx-5 my-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="./img/menu-logo/about-us.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>เกี่ยวกับเรา</h3>
                  </div>
               </div>

               <!---------- Start Aboutus detail ---------->

               <div class="aboutus">
                  <div class="aboutus-container p-5">
                     <div class="aboutus-top d-flex row mb-5">
                        <div class="aboutus-left col-xl-6">
                           <img src="./img/5302.jpg" class="shadow">
                        </div>
                        <div class="aboutus-right col-xl-6 pt-3">
                           <h4>จุดประสงค์การพัฒนาระบบ</h4>
                           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde necessitatibus dolorem officiis consequuntur totam sint. Alias amet excepturi culpa qui quisquam repellendus corrupti, id sequi eaque natus eos quas illo. Nesciunt ducimus iure vitae, molestias obcaecati cupiditate eos quibusdam ipsam.</p>
                        </div>
                     </div> 
                     <div class="aboutus-bottom pt-5">
                        <div class="aboutus-title">
                           <h4>ทีมพัฒนาระบบ</h4>
                        </div>
                        <div class="aboutus-advisor">
                           <div class="aboutus-advisor-img d-flex">
                              <img class="mt-3 shadow" src="img/aj_sahidan.jpg" alt="">
                           </div>
                           <div class="aboutus-advisor-title">
                              <p class="text-center mt-3">ด.ร.สาฮีดัน อับดุลมานะ</p>                                                         
                              <p class="text-center">อาจารย์สาขาวิชาวิทยาการข้อมูล</p>
                              <p class="text-center">ที่ปรึกษา</p>
                           </div>
                           
                        </div>
                        <div class="aboutus-developer d-flex row mt-4">
                           <div class="aboutus-dev1 col-xl-6">
                              <div class="aboutus-dev1 float-right mr-5">
                                 <img src="img/fardee.jpg" class="shadow" alt="">
                                 <p class="text-center mt-3">นายฟัรดี อูเซ็ง</p>
                                 <p class="text-center">นักศึกษาสาขาเทคโนโลยีสารเทศ</p>
                                 <p class="text-center">ผู้พัฒนาระบบ</p>
                              </div>
                           </div>
                           <div class="aboutus-dev2 col-xl-6">
                              <div class="aboutus-dev2 float-left ml-5">
                                 <img src="img/ding.jpg" class="shadow" alt="">
                                 <p class="text-center mt-3">นายนูรดิน เจะเลาะ</p>
                                 <p class="text-center">นักศึกษาสาขาเทคโนโลยีสารเทศ</p>
                                 <p class="text-center">ผู้พัฒนาระบบ</p>
                              </div>  
                           </div>
                        </div>
                     </div>         
                  </div>
               </div>
               <!---------- End Aboutus detail ---------->

            </div>
         </div>
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