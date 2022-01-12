<?php
   session_start();
   require('dbconnect.php');

   $errors = array();

   if($_POST){
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['confirmpassword'];
      $name = $_POST['name'];
      $sex = $_POST['sex'];
      $phone = $_POST['phone'];

      if(empty($email)){
         array_push($errors, "กรุณากรอกอีเมล");
      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         array_push($errors, "รูปแบบอีเมลไม่ถูกต้อง");
      }elseif(empty($password)){
         array_push($errors, "กรุณากรอกรหัสผ่าน");
      }elseif($password != $cpassword){
         array_push($errors, "รหัสผ่านไม่ตรงกัน");
      }elseif(strlen($password) > 20 || strlen($password) < 6){
         array_push($errors, "รหัสผ่านต้องมีความยาว 5 ถึง 20 ตัวอักษร");
      }

      $check_user = "SELECT * FROM users WHERE us_email = '$email' LIMIT 1";
      $result = mysqli_query($connect,$check_user);
      $row = mysqli_fetch_assoc($result);

      if($row){
         if($row['us_email'] === $email){
            array_push($errors, "มีอีเมลนี้ในระบบแล้ว");
         }
      }

      if(count($errors) == 0){
         $rpassword = md5($password);
         $sql = "INSERT INTO users (us_pass,us_name,us_sex,us_email,us_phone) VALUES('$password','$name','$sex','$email','$phone')";
         mysqli_query($connect, $sql);

         $_SESSION['username'] = $name;
         $_SESSION['success'] = "Now you are log In";
         header('location:index.php');
      }else{
         $_SESSION['error'] = "มีบางอย่างผิดพลาด";
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ระบบจองห้องประชุมออนไลน์</title>
   <link rel="icon" href="img/menu-logo/online-booking.png">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="font/tahomo.ttf">
   <link rel="stylesheet" href="font/SukhumvitSet-Medium.ttf">
   <link rel="stylesheet" href="bootstrap/js/jquery-3.6.0.min.js">
</head>
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
   /********** end Main menu **********/

   /********** Start Register **********/
   .register{
      background-color:#E9F1E6;
   }
   .register-header{
      height:100px;
      background-color:#BAC9B8;
      border-radius:10px;
      align-items:center;
   }
   .register-header img{
      height:70px;
      width:70px;
   }
   .register-header h3{
      font-size:45px;
      color:#585858;
   }
   .register-fill h4{
      font-size:35px;
      color:#585858;
   }
   .register-fill input{
      background-color:#BAC9B8;
      border:2px solid #3D5538;
      border-radius:5px;
      width:500px;
      height:60px;
      padding:0 15px;
   }
   .register-fill select{
      width:200px;
      height:60px;
      background-color:#BAC9B8;
      border:2px solid #3D5538;
      border-radius:5px;
      font-size:23px;
      color:#3D5538;
   }
   .register-fill-items5 button{
      width:220px;
      height:60px;
      border:none;
      background-color:#3D5538;
      border-radius: 5px;
      font-size:35px;
      color:#F0F8FF;
   }
   .register-fill-items5 button:hover{
      background-color:#597154;
   }
   .register-fill-items5 a{
      font-size:35px;
      color:#F0F8FF;
   }
   .register-fill-items5 a:hover{
      text-decoration:none;
      color:#F0F8FF;
   }

   ::placeholder{
      font-size:23px;
      color:#3D5538;
   }
   .register-sex option{
      font-size:23px;
   }
   .register-question{
      font-size:25px;
   }
   .register-fill input[type]{
      font-size:23px;
      color:#3D5538;
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
         <div class="main-menu p-0 col-xl-3">
            <div class="main-menu-logo d-flex">
               <img src="img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>
         </div>
         <div class="register col-xl-9">
            <div class="register-container mx-5 my-4">
               <div class="register-header d-flex">
                  <div class="register-header-img ml-5">
                     <img src="img/menu-logo/users.png" alt="">
                  </div>
                  <div class="register-header-h ml-4">
                     <h3>สมัครสมาชิก</h3>
                  </div>
               </div>
               <?php if (count($errors) > 0) : ?>
                  <div class="alert-danger mt-5 align-items-center d-flex pl-3" style="height:50px;font-size:20px;">
                     <?php foreach ($errors as $error) : ?>
                        <?php echo $error ?>
                     <?php endforeach ?>
                  </div>
               <?php endif ?>
               <div class="register-fill my-5">
                  <form method="post">
                     <div class="register-fill-items1 row mb-4">
                        <div class="register-email col-xl-6">
                           <h4>อีเมล</h4>
                           <input type="email" name="email" placeholder="อีเมล" required>
                        </div>
                        <div class="register-password col-xl-6">
                           <h4>รหัสผ่าน</h4>
                           <input type="password" name="password" placeholder="Password" required>
                        </div>
                     </div>
                     <div class="register-fill-items2 row mb-4">
                        <div class="register-cpassword col-xl-6">
                           <h4>ยืนยันรหัสผ่าน</h4>
                           <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
                        </div>
                        <div class="register-name col-xl-6">
                           <h4>ชื่อ-นามสกุล</h4>
                           <input type="text" name="name" placeholder="ชื่อ - นามสกุล" required>
                        </div>
                     </div>
                     <div class="register-fill-items3 row mb-4 mb-5">
                        <div class="register-sex col-xl-6">
                           <h4>เพศ</h4>
                           <select name="sex" class="pl-2" required>
                              <option select>เลือก</option>
                              <option value="male">ชาย</option>
                              <option value="female">หญิง</option>
                           </select>
                        </div>
                        <div class="register-phone col-xl-6">
                           <h4>เบอร์โทร</h4>
                           <input type="text" name="phone" placeholder="เบอร์โทรศัพท์" required>
                        </div>
                     </div>
                     <div class="register-fill-items5 mb-5 d-flex">
                        <button type="submit">สมัคร</button>
                        <a href="index.php" class="bg-danger ml-3 px-5" style="border-radius:5px">ยกเลิก</a>
                     </div>
                  </form>
                  <span class="register-question">สมัครสมาชิกแล้ว? <a href="./user_login.php">เข้าสู่ระบบ</a></span>
               </div>
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