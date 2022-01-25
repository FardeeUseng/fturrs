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

<!---------- start Script ---------->

<script>
   // $(document).ready(function(){
   //    $("#logouser").mouseover(function(){
   //       $("#logouser").animate({"width" : "220px", "height" : "220px" }, "slow")
   //    })
      // $("#logouser").mouseout(function(){
      //    $("#logouser").animate({"width" : "200px", "height" : "200px"}, "slow")
      // })

   // })
</script>
<!---------- End Script ---------->

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
      height:150px;
      width:100%;
      justify-content:center;
      align-items:center;
   }
   .main-menu-logo img{
      width:80px;
      height:80px;
   }
   .main-menu-logo h3{
      font-size:45px;
      font-weight: bold;
      color:#585858;
   }
   .logo-user-load{
      margin: auto;
      height: 180px;
      width: 180px;
      justify-content:center;
      align-items:center;
      border-radius:50%;
   }
   .logo-user-load img{
      border-radius: 50%;
   }
   .logo-user{
      margin: auto;
      height: 180px;
      width: 180px;
      justify-content:center;
      align-items:center;
      background-color:#16451c;
      border-radius:50%;
   }
   .logo-user img{
      position:relative;
      width:200px;
      height:200px;
      /* border-radius:50%; */
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
   .upload-profile{
      position: absolute;
      display:none;
      background-color:#16451c;
      opacity:0.1;
      left:207px;
      top:278px;
      width: 220px;
      height: 100px;
      border-bottom-left-radius: 190px 170px;
      border-bottom-right-radius: 190px 170px;
   }
   /********** end Main menu **********/

   /********** Start Content **********/

   .content-title{
      height:80px;
      background-color:#BAC9B8;
      border-radius:10px;
      align-items:center;
      margin-top:30px;
      margin-left:20px;
      margin-right:20px;
   }
   .content-title img{
      height:60px;
      width:60px;
      border-radius:50%;
   }
   .content-title h3{
      font-size:35px;
      color:#585858;
   }
   .main-content{
      background-color:#E9F1E6;
   }
   .profile-detail{
      background-color:#D7E6D5;
      width:auto;
      margin:50px 20px;;
   }
   .profile-detail-container h3{
      font-size:30px;
      margin-bottom:25px;
      color:#585858;
   }
   .logo-user-load img{
      width:200px;
      height:200px;
      margin:8px 8px;
   }
   /********** End Content **********/

   /********** Start 1800px screen **********/

   @media screen and (min-width:1800px){
      .main-menu-logo{
         height:150px;
      }
      .main-menu-logo img{
         width:100px;
         height:100px;
      }
      .main-menu-logo h3{
         font-size:45px;
      }
      .content-title{
         height:100px;
      }
      .content-title img{
         height:70px;
         width:70px;
      }
      .content-title h3{
         font-size:45px;
      }
      .profile-detail-container h3{
         font-size:35px;
      }
   }
   /********** End 1800px screen **********/

   /********** Start 1200px screen **********/

   @media screen and (max-width:1200px){
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
      .main-menu-logo img{
         width:70px;
         height:70px;
      }
      .main-menu-logo h3{
         font-size: 30px;
      }
      .logo-user-load img{
         width:150px;
         height:150px;
         margin:8px 8px;
      }
      .profile-edit h2{
         font-size:30px;
      }
      .profile-edit a{
         font-size:22px;
      }
      .hamberger-menu i{
         display:none;
      }
      .profile-detail-container h3{
         font-size:25px;
         margin-left:-30px;
      }
      .logo-user, .logo-user img{
         width:150px;
         height:150px;
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
      .content-header-h h3{
         font-size:30px;
      }
      .main-menu-logo img{
         width:50px;
         height:50px;
      }
      .main-menu-logo h3{
         font-size: 25px;
      }
      .logo-user-load img{
         width:120px;
         height:120px;
         margin:8px 8px;
      }
      .profile-edit a{
         font-size:16px;
      }
      .profile-detail{
         margin-left:0px;
         margin-right:0px;;
      }
      .content-title{
         margin-left:0px;
         margin-right:0px;
      }
   }
   /********** End 767px screen **********/

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
      .logo-user-load img{
         width:150px;
         height:150px;
      }
      .content-header-h h3{
         font-size:25px;
      }
      .content-title-img img{
         margin-left:-20px;
      }
   }
   /********** End 576px screen **********/

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
         <div class="main-menu col-xl-4 col-md-4 col-sm-4">
            <div class="main-menu-logo d-flex">
               <img src="../img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>

            <!---------- start header profile ---------->

            <?php if(isset($_SESSION['us_prof'])){?>
               <div class="logo-user-load d-flex mt-2">                  
                  <img class="shadow" id="logouser" src="../img/profiles/<?php echo $_SESSION['us_prof']; ?> ">                  
               </div>
            <?php }else{ ?>
               <?php if(isset($_SESSION['male'])){?>
                  <?php if($_SESSION['male'] == "male" ){?>
                     <div class="logo-user d-flex mt-2 shadow">                  
                        <img id="logouser" src="../img/menu-logo/boy1.png">                  
                     </div>
                  <?php }else{ ?>
                     <div class="logo-user d-flex mt-2">                  
                        <img id="logouser" src="../img/menu-logo/gilr1.png">                  
                     </div>
                  <?php } ?>                      
               <?php } ?>                      
            <?php } ?>      
            <!---------- start header profile ---------->
                           
            <div class="profile-edit mt-3">
               <h2 class="text-center"><?php echo "$name"; ?></h2>
               <p class="text-center mt-4"><a href="profileedit.php" onclick="return confirm('คุณแน่ใจที่จะแก้ไขข้อมูลส่วนตัว?')">แก้ไขข้อมูลส่วนตัว</a></p>  
            </div>  
            <div class="login-link mt-4 text-center">
               <a class="text-center" href="../index.php">กลับสู่หน้าหลัก</a>
               <!-- <a href="#"> -->
                  <!-- <div class="upload-profile" id="upload-profile">
                     <label for="uploadProfile"></label>
                  </div> -->
               <!-- </a> -->
            </div>         
         </div>
         

         <!----------- Start Profile Detail ---------->

         <div class="main-content col-xl-8 col-md-8 col-sm-8">
            <div class="main-content-container">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">                     
                     <img class="shadow" src="../img/menu-logo/profile.png">
                  </div>
                  <div class="content-header-h ml-4">
                     <h3>ข้อมูลส่วนตัว</h3>
                  </div>
               </div>

               <!---------- start edit profile success ---------->

               <?php if(isset($_SESSION['editprofilesuccess'])){ ?>
                  <div class="alert-primary mt-5 align-items-center d-flex pl-3" style="height:50px;font-size:20px;margin:0 30px;">
                     <?php echo $_SESSION['editprofilesuccess'];
                           unset($_SESSION['editprofilesuccess']);
                     ?>
                  </div>
               <?php } ?>
               <!---------- End edit profile success ---------->

               <!---------- start profile detail ---------->

               <div class="profile-detail">
                  <div class="profile-detail-container p-5">
                     <div class="profile-detail-name d-flex">
                        <h3>ชื่อ - นามสกุล: </h3>
                        <h3 class="ml-2"><?php echo $name; ?></h3>
                     </div>
                     <div class="profile-detail-email d-flex">
                        <h3>อีเมล: </h3>
                        <h3 class="ml-2"><?php echo $email; ?></h3>
                     </div>
                     <div class="profile-detail-password d-flex">
                        <h3>Password: </h3>
                        <h3 class="ml-2"><?php echo $password; ?></h3>
                     </div>
                     <div class="profile-detail-sex d-flex">
                        <h3>เพศ: </h3>
                        <h3 class="ml-2">
                           <?php if($sex == "male"){
                              echo "ชาย";
                           }else{
                              echo "หญิง";
                           } ?>
                        </h3>
                     </div>
                     <div class="profile-detail-phone d-flex">
                        <h3>เบอร์โทร: </h3>
                        <h3 class="ml-2"><?php echo $phone; ?></h3>
                     </div>
                  </div>
               </div>
               <!---------- end profile detail ---------->

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