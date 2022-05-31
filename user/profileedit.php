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

<!---------- start script ---------->

<script>
   $(document).ready(function(){

      $("#uploadimg").on("change", function(e){
         var filename = e.target.value.split('\\').pop();
         $("#label_span").text(filename);
      })
      $("#uploadimgg").click(function(){
         $("#submit").show()
      })
   })
</script>
<!---------- end script ---------->

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
      height:130px;
      width:100%;
      justify-content:center;
      align-items:center;
   }
   .main-menu-logo img{
      width:80px;
      height:80px;
   }
   .logo-user-load img{
      width:150px;
      height:150px;
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
      width:180px;
      height:180px;
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
   .upload-profile input{
      display:none;
   }
   .upload-profile label{
      background-color:#3D5538;
   }
   .upload-file label{
      display:flex;
      justify-content:center;
      align-items:center;
      color:white;
      font-size:25px;
      border-radius:5px;
      width:300px;
      height:45px;
      background-color:#5F745A;
      cursor:pointer;
      margin-top:20px;
      margin-bottom:20px;
   }

   /********** end Main menu **********/

   /********** Start Content **********/
   .content-title{
      height:80px;
      background-color:#BAC9B8;
      border-radius:10px;
      align-items:center;
      margin:30px;
   }
   .content-title img{
      height:60px;
      width:60px;
   }
   .content-title h3{
      font-size:35px;
      color:#585858;
   }
   .profile-detail{
      background-color:#D7E6D5;
      width:auto;
      margin:50px 30px;;
   }
   .profile-detail-container h3{
      font-size:30px;
      margin-bottom:25px;
      color:#585858;
   }
   .profile-detail-container input,.profile-detail-container select{
      background-color:#BAC9B8;
      border: 2px solid #3D5538;
      border-radius:6px;
      height:60px;
      width:450px;
      margin-bottom:25px;
      margin-left:10px;
      color:#585858;
      font-size:30px;
      padding-left:20px;
   }
   .profile-detail-email input {
      margin-left:100px;
   }
   .profile-detail-password input {
      margin-left:40px;
   }
   .profile-detail-sex select {
      margin-left:115px;
   }
   .profile-detail-phone input {
      margin-left:55px;
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
      .profile-detail-container input,.profile-detail-container select{
         width:700px;
      }
      .profile-detail-email input {
         margin-left:112px;
      }
      .profile-detail-sex select {
         margin-left:125px;
      }
   }
   /********** End 1800px screen **********/

   /********** Start 1800px screen **********/
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
      .upload-file label, .profile-edit button{
         width:200px;
         font-size:22px;
      }
      .profile-detail-container input, .profile-detail-container select{
         width:350px;
         font-size:25px;
         height:50px;
      }
      .profile-detail-email input {
         margin-left:-25px;
         margin-top:-20px;
      }
      .profile-detail-password input {
         margin-left:-25px;
         margin-top:-20px;
      }
      .profile-detail-sex select {
         margin-left:-25px;
         margin-top:-20px;
      }
      .profile-detail-phone input {
         margin-left:-25px;
         margin-top:-20px;
      }
      .profile-detail-container h3{
         font-size:28px;
      }
      .profile-detail-name input{
         margin-left:-25px;
         margin-top:-20px;
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
      .upload-file label, .profile-edit button{
         width:175px;
         font-size:20px;
      }
   }
   /********** End 576px screen **********/

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
      .profile-detail-container input, .profile-detail-container select{
         width:300px;
         font-size:20px;
         height:50px;
      }
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
      .profile-edit button{
         margin-top:0px;
      }
   }
   /********** End 576px screen **********/

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
         <div class="main-menu col-xl-4 col-md-4 col-sm-4">
            <div class="main-menu-logo d-flex">
               <a href="../index.php"><img src="../img/menu-logo/online-booking.png" alt=""></a>
               <a href="../index.php"><h3 class="ml-3">FTU RRS</h></a>
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
            <!---------- end header profile ---------->

            <!----------- Start form Edit Profile ---------->

            <div class="profile-edit mt-3">           
               <form action="profileeditdata.php" method="post" enctype="multipart/form-data">       
                  <div class="upload-file">
                     <label for="uploadimg" id="uploadimgg" class="shadow">
                        <i class="fas fa-cloud-upload-alt mr-2"></i>
                        <span id="label_span">อัพโหลดรูป</span>
                     </label>
                     <input type="file" name="file" accept="image/*" id="uploadimg" class="d-none">
                  </div>
                  <button type="submit" name="update" class="shadow" onclick="return confirm('คุณต้องการแก้ไขข้อมูลของคุณใช้หรือไหม?')">ยืนยันแก้ไขข้อมูล</button>
            </div> 
            <div class="login-link mt-4 text-center">
               <a class="text-center" href="../index.php">กลับสู่หน้าหลัก</a>
            </div>         
         </div>
         <div class="main-content col-xl-8 col-md-8 col-sm-8">
            <div class="main-content-container">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/profile.png" alt="">
                  </div>
                  <div class="content-header-h ml-4">
                     <h3>แก้ไขข้อมูลส่วนตัว</h3>
                  </div>
               </div>

               <!---------- start if edit profile error ---------->

               <?php if(isset($_SESSION['error_profile'])){ ?>
                  <div class="alert-danger mt-5 align-items-center d-flex pl-3" style="height:50px;font-size:20px;margin:0 30px;">
                     <?php echo $_SESSION['error_profile']; 
                           unset($_SESSION['error_profile']);
                     ?>
                  </div>
               <?php } ?>
               <!---------- End if edit profile error ---------->

               <!---------- start profile detail ---------->

               <div class="profile-detail">
                  <div class="profile-detail-container p-5">
                     <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="profile-detail-name d-xl-flex">
                           <h3>ชื่อ-นามสกุล: </h3>
                           <input type="text" name="name" value="<?php echo $name; ?>" require>
                        </div>
                        <div class="profile-detail-email d-xl-flex">
                           <h3>อีเมล: </h3>
                           <input type="email" name="email" value="<?php echo $email; ?>" require>
                        </div>
                        <div class="profile-detail-password d-xl-flex">
                           <h3>Password: </h3>
                           <input type="text" name="password" value="<?php echo $password; ?>" require>
                        </div>
                        <div class="profile-detail-sex d-xl-flex">
                           <h3>เพศ: </h3>
                           <select name="sex">
                           <?php if($sex == "male"){
                              echo "<option value='male' select>ชาย</option>";
                              echo "<option value='female'>หญิง</option>";
                           }else{
                              echo "<option value='female' select>หญิง</option>";
                              echo "<option value='male'>ชาย</option>";
                           } ?>
                           </select>
                        </div>
                        <div class="profile-detail-phone d-xl-flex">
                           <h3>เบอร์โทร: </h3>
                           <input type="number" name="phonenum" value="<?php echo $phone; ?>" require>
                        </div>
                     </form>
                     <!----------- End form Edit Profil ---------->
                  </div>
               </div>
               <!---------- end profile detail ---------->

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

</body>
</html>