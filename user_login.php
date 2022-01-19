<?php
   session_start();
   require('dbconnect.php');

   $errors = array();
   if($_POST){
      $email = $_POST['email'];
      $password = $_POST['password'];

      if(empty($email)){
         array_push($errors, "กรุณากรอกอีเมล");
      }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         array_push($errors, "รูปแบบอีเมลไม่ถูกต้อง");
      }
      elseif(empty($password)){
         array_push($errors, "กรุณากรอกรหัสผ่าน");
      }
      
      if(count($errors) == 0){
         $sql = "SELECT * FROM users WHERE us_email = '$email' AND us_pass = '$password'";
         $result = mysqli_query($connect, $sql);
         $row = mysqli_fetch_assoc($result);

         if(mysqli_num_rows($result) == 1){
            $_SESSION['user_login'] = $row['users_Id'];
            $_SESSION['name'] = $row['us_name'];
            $_SESSION['male'] = $row['us_sex'] == "male";
            // $_SESSION['success'] = "Now your are log In";
            header('location:index.php');
         }else{
            array_push($errors, "อีเมล หรือ รหัสผ่านไม่ถูกต้อง");
            }
      }else {
            array_push($errors,"กรุณากรอก อีเมล หรือ รหัสผ่าน");
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
   <?php require("./master/head.php") ?>
<body>
<style>
   *{
      margin:0;
      padding:0;
      box-sizing:border-box;
   }
   body{
      height:100%;
      font-family: SukhumvitSet, sans-serif;
      background-color:#BAC9B8;
   }

   /********** Start header **********/
   .header-container{
      height:217px;
      background-color:#BAC9B8;
   }
   .header-logo-left img{
      width:120px;
      height:120px;
   }
   .header-logo-right h1{
      color:#585858;
      font-size:45px;
      font-weight:bold;
   }
   .header-signup-item a{
      color:#585858;
      font-size:30px;
   }
   .header-signup-item a:hover{
      color:#3C94EC;
      text-decoration:none;
   }
   /********** End header **********/

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
   .user-form h2{
      font-size:45px;
      color:#585858;
   }
   .user-form input{
      margin:10px 0;
      width:332px;
      background-color:#FBA535;
      border:2px solid #707070;
      border-radius:4px;
      height:55px;
   }
   ::placeholder{
      font-size:23px;
      padding-left:95px;
      color:#585858;
   }
   .user-form input[type]{
      font-size:23px;
      color:#3D5538;
      padding-left:20px;
   }
   .user-form button{
      margin-top:10px;
      margin-left:52px;
      width:220px;
      height:60px;
      border:none;
      background-color:#3D5538;
      border-radius: 5px;
      font-size:30px;
      color:#F0F8FF;
   }
   .user-form button:hover{
      background-color:#597154;
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

   /********** Start Register **********/
   .image-container img{
      background-color:#E9F1E6;
      width:1150px;
   }

   /********** End Register **********/

   /********** start footer **********/
   .footer{
      background-color:#BAC9B8;
   }
   .footer-link li img{
      width:40px;
      height:40px;
   }
   .footer-link li{
      list-style: none;
   }
   .footer-top{
      display:flex;
      height:74px;
      justify-content:center;
      align-items:center;
   }
   .footer-top h3{
      font-size:40px;
      color:#585858;
      font-weight:bold;
   }
   .footer-buttom{
      display:flex;
      height:74px;
      justify-content:center;
   }
   .footer-link{
      width:350px;
      height:70px;
      align-items:center;
      justify-content:space-between;
   }
   /********** end footer **********/

</style>
   
<!---------- start header ---------->
<header>
   <div class="container-fluid">
      <div class="header-container row">
         <div class="header-logo d-flex col-xl-8">
            <div class="header-logo-left col-xl-2 d-flex align-items-center pl-5">
               <img src="img/Ftu_logo.png">
            </div>
            <div class="header-logo-right col-xl-10 d-flex align-items-center">
               <h1>FTU Room Reservation System</h1>
            </div>
         </div>
      </div>
   </div>
</header>
<!---------- end header ---------->

<!---------- start content ---------->
<div class="content">
   <div class="container-fluid">
      <div class="main row">
         <div class="main-menu p-0 col-xl-4">
            <div class="main-menu-logo d-flex">
               <img src="img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>
            <div class="logo-user d-flex my-2">
               <img src="img/menu-logo/users.png" alt="">
            </div>     
            <?php if (count($errors) > 0) : ?>
               <div class="alert-danger mt-5 mb-3 align-items-center d-flex pl-3" style="height:50px;font-size:15px;margin:0 150px;border-radius:3px;">
                     <?php foreach ($errors as $error) : ?>
                        <?php echo $error ?>
                     <?php endforeach ?>
                  </div>
               <?php endif ?>      
            <div class="login">
               <form class="user-form" action="" method="post">
                  <h2 class="text-center">เข้าสู่ระบบ</h2>
                  <input type="text" name="email" placeholder="E-mail" require><br>
                  <input type="password" name="password" placeholder="Password" require><br>
                  <button type="submit">LogIn</button>
               </form>
               
            </div>  
            <div class="login-link mt-4 text-center">
               <a class="text-center" href="register.php">สมัครสมาชิก</a>
               <a class="text-center" href="index.php">กลับสู่หน้าหลัก</a>
            </div>         
         </div>
         <div class="image col-xl-8 p-0">
            <div class="image-container">
               <img src="img/5302.jpg" alt="">
            </div>
         </div>
      </div>
   </div>
</div>
<!---------- end content ---------->

<!---------- start footer ---------->
<footer>
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl">
            <div class="footer-top">
            <h3>Fatoni University</h3>
         </div>
         <div class="footer-buttom">
            <ul class="footer-link d-flex">
               <li><a href="#"><img src="img/menu-logo/globe-grid.png" alt=""></a></li>
               <li><a href="#"><img src="img/menu-logo/facebook.png" alt=""></a></li>
               <li><a href="#"><img src="img/menu-logo/instagram.png" alt=""></a></li>
               <li><a href="#"><img src="img/menu-logo/twitter.png" alt=""></a></li>
               <li><a href="#"><img src="img/menu-logo/youtube.png" alt=""></a></li>
            </ul>
         </div>
         </div>
      </div>
   </div>
</footer>
<!---------- end footer ---------->
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>