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
      height:130px;
      width:100%;
      justify-content:center;
      align-items:center;
   }
   .main-menu-logo img{
      width:80px;
      height:80px;
   }
   .main-menu-logo h3{
      font-size:35px;
      font-weight: bold;
      color:#585858;
   }
   .main-menu-logo a{
      text-decoration:none;
      color:#585858;
   }
   <?php if(isset($_SESSION['admin_login'])){ ?>
   .main-manu-items li:nth-child(13){
      position:relative;
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(13) h3{
      color:#F0F8FF;
   }
   <?php }elseif(isset($_SESSION['staff_login'])){ ?>
   .main-manu-items li:nth-child(11){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(11) h3{
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

   .content-container{
      margin:25px 8px;
   }
   .content-title{
      height:80px;
      background-color:#BAC9B8;
      border-radius:10px;
      align-items:center;
   }
   .content-title img{
      height:60px;
      width:60px;
   }
   .content-title h3{
      font-size:35px;
      color:#585858;
   }
   .custom-select option{
      background-color:#E9F1E6;
   }
   /********** End Content **********/

   /********** Start About us detail **********/

   .aboutus{
      background-color:#D7E6D5;
      width:auto;
      margin:50px 0px;
      border-radius:3px;
   }

   .aboutus-container h3{
      font-size:10px;
      margin-bottom:20px;
      color:#585858;
   }
   .aboutus-left img {
      width:380px;
      height:250px;
      margin:30px 30px;
   }
   .aboutus-right h4{
      margin-left:10px;
      margin-top:30px;
      font-size:28px;
      color:#585858;
      margin-bottom:20px;
   }
   .aboutus-right p{
      margin-left:10px;
      width:370px;
      font-size:19px;
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
      width:150px;
      height: 150px;
      border-radius:50%;
   }
   .aboutus-bottom p{
      text-align:center;
      color:#585858;
      font-size:20px;
      margin-top:-15px;
   }
   .aboutus-developer img{
      width:150px;
      height:150px;
      border-radius:50%;
      margin-left:50px;
   }
   /********** End About us detail **********/

   /********** Start 1800px screen **********/

   @media screen and (min-width:1800px){
      .content-container{
         margin:30px 20px;
      }
      .aboutus-left img {
         width:580px;
         height:350px;
      }
      .aboutus-right h4{
         margin-top:50px;
         font-size:35px;
      }
      .aboutus-right p{
         width:500px;
         font-size:25px;
      }
      .aboutus-advisor-img img{
         width:170px;
         height: 170px;
      }
      .aboutus-developer img{
         width:170px;
         height:170px;
      }
      .main-menu-logo img{
         width:100px;
         height:100px;
      }
      .main-menu-logo h3{
         font-size:45px;
      }
      .main-menu-logo{
         height:150px;
      }
   }
   /********** End 1800px screen **********/

   /********** Start 1200px screen **********/

   @media screen and (max-width:1200px){
      <?php if(isset($_SESSION['admin_login'])){ ?>
         .main-content{
            min-height:970px;
         }
      <?php }elseif(isset($_SESSION['staff_login'])){ ?>
         .main-content{
            min-height:830px;
         }
      <?php }else{ ?>
         .main-content{
            min-height:411px;
         }
      <?php } ?>
      .main{
         position:relative;
      }
      .main-menu{
         display:none;
         position:absolute;
         z-index:1;
         width:280px;
      }
      .main-menu{
         display:none;
      }
      .content-title{
         height:70px;
      }
      .content-title-img img{
         width:50px;
         height:50px;
      }
      .content-header-h h3{
         font-size:30px;
      }
      .aboutus-left img {
         width:400px;
         height:260px;
      }
      .aboutus-left{
         display:flex;
         justify-content:center;
      }
      .aboutus-right{
         display:flex;
         justify-content:center;
      }
      .aboutus-right h4, p{
         text-align:center;
      }
      .aboutus-advisor-img img{
         width:120px;
         height: 120px;
      }
      .aboutus-developer img{
         width:120px;
         height:120px;
      }
      .aboutus-dev1-1 img{
         margin-left:47px;
      }
      .aboutus-bottom p{
         font-size:16px;
      }
   }
   /********** End 1200px screen **********/

   /********** Start 767px screen **********/

   @media screen and (max-width:767px){
      .content-title{
         height:60px;
      }
      .content-title-img img{
         width:40px;
         height:40px;
      }
      .content-title-h h3{
         font-size:30px;
      }
      .main-menu-logo img{
         width:50px;
         height:50px;
      }
      .main-menu-logo h3{
         font-size:30px;
      }
   }
   /********** End 767px screen **********/

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
      .content-title{
         height:55px;
      }
      .content-title-img img{
         margin-left:0px;
         width:35px;
         height:35px;
      }
      .content-title h3{
         font-size:22px;
         margin-left:-10px;
         margin-top:10px;
      }
      .main-menu-logo img{
         width:50px;
         height:50px;
      }
      .main-menu-logo h3{
         font-size: 25px;
      }
      .aboutus-left img{
         width:250px;
         height:150px;
      }
      .aboutus-right h4{
         font-size:22px;
      }
      .aboutus-right p{
         width:auto;
         margin-right:10px;
         font-size:16px;
      }
      .aboutus-dev1,.aboutus-dev2{
         display:flex;
         justify-content:center;
      }
      .aboutus-dev1{
         /* margin-left:30px; */
      }
      .aboutus-dev1-1 p{
         font-size:14px;
         width:200px;
         margin-left:50px;
      }
      .aboutus-dev2-1 p{
         font-size:14px;
         width:200px;
         margin-left:-50px;
      }
      .aboutus-dev1-1 img{
         margin-left:100px;
      }
      .aboutus-dev2-1 img{
         margin-left:5px;
      }
      .aboutus-bottom img{
         width:100px;
         height:100px;
      }
   }
   /********** End 576px screen **********/

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
               <a href="index.php"><img src="./img/menu-logo/online-booking.png" alt=""></a>
               <a href="index.php"><h3 class="ml-3">FTU RRS</h></a>
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
            <div class="content-container my-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-4">
                     <img src="./img/menu-logo/about-us.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>เกี่ยวกับเรา</h3>
                  </div>
               </div>

               <!---------- Start Aboutus detail ---------->

               <div class="aboutus">
                  <div class="aboutus-container">
                     <div class="aboutus-top d-flex row my-3">
                        <div class="aboutus-left col-xl-6 col-md-12">
                           <img src="./img/IMG_3351.JPG" class="shadow">
                        </div>
                        <div class="aboutus-right col-xl-6 col-md">
                           <div class="aboutus-right1">
                              <h4>จุดประสงค์การพัฒนาระบบ</h4>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde necessitatibus dolorem officiis consequuntur totam sint. Alias amet excepturi culpa qui quisquam repellendus corrupti, id sequi eaque natus eos quas illo. Nesciunt ducimus iure vitae, molestias obcaecati cupiditate eos quibusdam ipsam.</p>
                           </div>
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
                           <div class="aboutus-dev1 col-xl-6 col-md-6 col-sm-6">
                              <div class="aboutus-dev1-1 float-right mr-5">
                                 <img src="img/fardee.jpg" class="shadow" alt="">
                                 <p class="text-center mt-3">นายฟัรดี อูเซ็ง</p>
                                 <p class="text-center">นักศึกษาสาขาเทคโนโลยีสารเทศ</p>
                                 <p class="text-center">ผู้พัฒนาระบบ</p>
                              </div>
                           </div>
                           <div class="aboutus-dev2 col-xl-6 col-md-6 col-sm-6">
                              <div class="aboutus-dev2-1 float-left ml-5">
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

</body>
</html>