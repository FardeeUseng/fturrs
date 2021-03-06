<?php
   session_start();
   require('dbconnect.php');

   // Start if staff login

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
         $sql = "SELECT * FROM staff LEFT JOIN building ON staff.bd_Id = building.bd_Id WHERE st_email = '$email' AND st_pass = '$password'";
         $result = mysqli_query($connect, $sql);
         $row = mysqli_fetch_assoc($result);

         if(mysqli_num_rows($result) == 1){
            $_SESSION['staff_login'] = $row['staff_Id'];
            $_SESSION['name'] = $row['st_name'];
            $_SESSION['bd_Id'] = $row['bd_Id'];
            $_SESSION['staff_bd'] = $row['bd_Id'];
            $_SESSION['bd_name'] = $row['bd_name'];
            $_SESSION['male'] = $row['st_sex'] == "male";
            $_SESSION['us_prof'] = $row['st_profile'];
            // $_SESSION['success'] = "Now your are log In";
            header('location:index.php');
         }else{
            array_push($errors, "อีเมล หรือ รหัสผ่านไม่ถูกต้อง");
            }
      }else {
            array_push($errors,"กรุณากรอก อีเมล หรือ รหัสผ่าน");
      }
   }
   // End if staff login

?>

<!DOCTYPE html>
<html lang="en">

   <!---------- start head ---------->

   <?php require("./master/head.php") ?>
   <script src="./bootstrap/js/bootstrap.min.js"></script>
   <!---------- End head ---------->

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

   /********** Start 1200px screen **********/

   @media screen and (max-width:1200px){
      .hamberger-menu i{
         display:none;
      }
      .image{
         display:none;
      }
      .content{
         height:800px;
      }
      .header-logo-left{
         margin-left:-60px;
      }
   }
   /********** Start 1200px screen **********/

   /********** Start 767px screen **********/

   @media screen and (max-width:767px){
      .header-logo-left{
         margin-left:-40px;
      }
      .main-menu-logo img{
         height:80px;
         width:80px;
      }
      .main-menu-logo h3{
         font-size:40px;
      }
      .logo-user img{
         width:130px;
         height:130px;
      }
      .login h2{
         font-size:40px;
      }
      .login input{
         height: 50px;
      }
      .user-form button{
         height:50px;
         font-size:25px;
      }
   }
   /********** Start 767px screen **********/

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
      .main-menu-logo img{
         height:60px;
         width:60px;
      }
      .main-menu-logo h3{
         font-size:30px;
      }
      .logo-user img{
         width:100px;
         height:100px;
      }
      .login h2{
         font-size:30px;
      }
      .login input{
         height: 40px;
         width:300px;
      }
      .user-form button{
         height:40px;
         font-size:23px;
         width:150px;
         margin-left:75px;
      }
   }
   /********** Start 576px screen **********/

</style>
   
<!---------- start header ---------->

<header>
   <?php include("./master/header.php") ?>
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
            
            <!---------- Start if have Error ---------->

            <?php if (count($errors) > 0) : ?>
               <div class="alert-danger mt-5 mb-3 align-items-center d-flex pl-3" style="height:50px;font-size:15px;margin:0 150px;">
                  <?php foreach ($errors as $error) : ?>
                     <?php echo $error ?>
                  <?php endforeach ?>
               </div>
            <?php endif ?>  
            <!---------- End if have Error ---------->

            <!---------- Start Staff LogIn ---------->

            <div class="login">
               <form class="user-form" action="" method="post">
                  <h2 class="text-center">เข้าสู่ระบบ</h2>
                  <input type="text" name="email" placeholder="E-mail" require><br>
                  <input type="password" name="password" placeholder="Password" require><br>
                  <button type="submit">LogIn</button>
               </form>               
            </div>  
            <!---------- End Staff LogIn ---------->

            <div class="login-link mt-4 text-center">
               <a class="text-center" href="register.php">สมัครสมาชิก</a>
               <a class="text-center" href="index.php">กลับสู่หน้าหลัก</a>
            </div>         
         </div>
         <div class="image col-xl-8 p-0">
            <div class="image-container">
               <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel" style="width:95%;height:90%">
                  <ol class="carousel-indicators">
                     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <img src="img/IMG_3351.JPG" class="d-block w-100" alt="...">
                     </div>
                     <div class="carousel-item">
                        <img src="img/IMG_3344.JPG" class="d-block w-100" alt="...">
                     </div>
                     <div class="carousel-item">
                        <img src="img/IMG_3318.JPG" class="d-block w-100" alt="...">
                     </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!---------- end content ---------->

<!---------- start footer ---------->

<footer>
   <?php include("./master/footer.php") ?>
</footer>
<!---------- end footer ---------->

</body>
</html>