<?php
   session_start();
   require('dbconnect.php');

   // Start if register

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
         header('location:user_login.php');
      }else{
         $_SESSION['error'] = "มีบางอย่างผิดพลาด";
      }
   }
   // End if register

?>

<!DOCTYPE html>
<html lang="en">

<!---------- Start head ---------->

<?php require("./master/head.php") ?>
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
      display:block;
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
   .register-container{
      margin-left:20px;
      margin-right:20px;
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

   /********** Start 1200px screen **********/

   @media screen and (max-width:1200px){
      .register-header{
         height:70px;
      }
      .register-header-img img{
         width:50px;
         height:50px;
      }
      .register-header-h h3{
         font-size:30px;
      }
      .main-menu{
         display:none;
      }
      .register-fill{
         margin-left:20px;
      }
      .register-fill input{
         width:600px;
         height:55px;
      }
      .register-fill select{
         height:55px;
      }
      .register-fill-items5 button{
         width:170px;
         height:50px;
         font-size:30px;
      }
      .register-fill-items5 a{
         font-size:30px;
      }
      .hamberger-menu i{
         display:none;
      }
      .header-logo-left{
         margin-left:-60px;
      }
   }
   /********** End 1200px screen **********/

   /********** Start 767px screen **********/

   @media screen and (max-width:767px){
      .register-header{
         height:60px;
      }
      .content-title-img img{
         width:40px;
         height:40px;
      }
      .main-menu-logo img{
         width:50px;
         height:50px;
      }
      .main-menu-logo h3{
         font-size:30px;
      }
      .register-fill h4{
         font-size:30px;
      }
      .register-fill input{
         width:480px;
         height:55px;
      }
      .header-logo-left{
         margin-left:-40px;
      }
   }
   /********** End 767px screen **********/

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
      .register-header{
         height:55px;
      }
      .register-header-img img{
         margin-left:-25px;
         width:35px;
         height:35px;
      }
      .register-header-h h3{
         margin-top:10px;
         font-size:22px;
         margin-left:-10px;
      }
      .register-fill {
         margin-left:0px;
      }
      .register-fill input{
         width:300px;
         height:40px;
      }
      .register-fill select{
         height:40px;
      }
      .register-fill h4{
         font-size:23px;
      }
      ::placeholder{
         font-size:18px;
      }
      .register-fill-items5 button{
         font-size:22px;
         width:80px;
         height:40px;
      }
      .register-fill-items5 a{
         font-size:22px;
         padding:0px 10px;
      }
      .register-question{
         font-size:16px;
      }
   }
   /********** End 576px screen **********/

</style>
   
<!---------- start header ---------->

<?php include("./master/header.php") ?>
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
            <div class="register-container mt-4">
               <div class="register-header d-flex">
                  <div class="register-header-img ml-5">
                     <img src="img/menu-logo/users.png" alt="">
                  </div>
                  <div class="register-header-h ml-4">
                     <h3>สมัครสมาชิก</h3>
                  </div>
               </div>

               <!---------- Start if have Error ---------->

               <?php if (count($errors) > 0) : ?>
                  <div class="alert-danger mt-5 align-items-center d-flex pl-3" style="height:50px;font-size:20px;">
                     <?php foreach ($errors as $error) : ?>
                        <?php echo $error ?>
                     <?php endforeach ?>
                  </div>
               <?php endif ?>
               <!---------- End if have Error ---------->

               <!---------- Start Register ---------->

               <div class="register-fill my-5">
                  <form method="post">
                     <div class="register-fill-items1 row mb-4">
                        <div class="register-email col-xl-6 mb-4">
                           <h4>อีเมล</h4>
                           <input type="email" name="email" placeholder="อีเมล" required>
                        </div>
                        <div class="register-password col-xl-6">
                           <h4>รหัสผ่าน</h4>
                           <input type="password" name="password" placeholder="Password" required>
                        </div>
                     </div>
                     <div class="register-fill-items2 row mb-4">
                        <div class="register-cpassword col-xl-6 mb-4">
                           <h4>ยืนยันรหัสผ่าน</h4>
                           <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
                        </div>
                        <div class="register-name col-xl-6">
                           <h4>ชื่อ-นามสกุล</h4>
                           <input type="text" name="name" placeholder="ชื่อ - นามสกุล" required>
                        </div>
                     </div>
                     <div class="register-fill-items3 row mb-4 mb-5">
                        <div class="register-sex col-xl-6 mb-4">
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
                        <a href="index.php" class="bg-danger ml-3 px-sm-5" style="border-radius:5px">ยกเลิก</a>
                     </div>
                  </form>
                  <span class="register-question">สมัครสมาชิกแล้ว? <a href="./user_login.php">เข้าสู่ระบบ</a></span>
               </div>
               <!---------- End Register ---------->

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

<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>