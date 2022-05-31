<?php
   session_start();
   require('../dbconnect.php');

   // Start select building

   $sql = "SELECT * FROM building";
   $result = mysqli_query($connect,$sql);
   $row = mysqli_fetch_assoc($result);
   // End select building

   // Start Access permission Admin

   if(!isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Admin

   // Start If insert member

   $errors = array();
   if($_POST){
      $email = mysqli_real_escape_string($connect, $_POST['email']);
      $password = mysqli_real_escape_string($connect, $_POST['password']);
      $cpassword = mysqli_real_escape_string($connect, $_POST['confirmpassword']);
      $name = mysqli_real_escape_string($connect, $_POST['name']);
      $sex = mysqli_real_escape_string($connect, $_POST['sex']);
      $phone = mysqli_real_escape_string($connect, $_POST['phonenumber']);
      $building = mysqli_real_escape_string($connect, $_POST['building']);
      $memberstatus = mysqli_real_escape_string($connect, $_POST['memberstatus']);

      if(empty($email)){
         array_push($errors,"กรุณากรอกอีเมล");
      }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
         array_push($errors, "รูปแบบอีเมลไม่ถูกต้อง");
      }elseif(empty($password)){
         array_push($errors,"กรุณากรอกรหัสผ่าน");
      }elseif($password != $cpassword){
         array_push($errors, "รหัสผ่านไม่ตรงกัน");
      }elseif(strlen($password) > 20 || strlen($password) < 6){
         array_push($errors, "รหัสผ่านต้องมีความยาว 5 ถึง 20 ตัวอักษร");
      }elseif(empty($name)){
         array_push($errors, "กรุณากรอกชื่อ-นามสกุล");
      }elseif(empty($sex)){
         array_push($errors, "กรุณาเลือกเพศ");
      }elseif(empty($phone)){
         array_push($errors, "กรุณากรอกเบอร์โทรศัพท์");
      }elseif(empty($memberstatus)){
         array_push($errors, "กรุณาเลือกสถานะผู้ใช้");
      }else {

         if($memberstatus === "staff"){
            $check_user = "SELECT * FROM staff WHERE st_email = '$email' LIMIT 1";
            $result = mysqli_query($connect,$check_user);
            $row = mysqli_fetch_assoc($result);

            if($row){
               if($row['st_email'] === '$email'){
                  array_push($errors, "มีอีเมลนี้ในระบบแล้ว");
               }
            }elseif(empty($building)){
               array_push($errors, "กรุณาเลือกอาคาร");

            }elseif (count($errors) == 0) {
               $rpassword = md5($password);
               $sql = "INSERT INTO staff(bd_Id,st_pass,st_name,st_sex,st_email,st_phone) VALUES($building,'$rpassword','$name','$sex','$email','$phone')";
               mysqli_query($connect,$sql);
               $_SESSION['success'] = "คุณได้เพิ่ม " . $name . " สำเร็จ !!";
               header('location:memberstaff.php');
            }else{
               $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            }
         }elseif($memberstatus === "admin"){
            $check_user = "SELECT * FROM admin WHERE ad_email = '$email' LIMIT 1";
            $result = mysqli_query($connect,$check_user);
            $row = mysqli_fetch_assoc($result);

            if($row){
               if($row['ad_email'] === '$email'){
                  array_push($errors, "มีอีเมลนี้ในระบบแล้ว");
               }
            }elseif (count($errors) == 0) {
               $rpassword = md5($password);
               $sql = "INSERT INTO admin(ad_email, ad_pass, ad_name, ad_sex, ad_phone) VALUES('$email','$rpassword','$name','$sex','$phone')";
               mysqli_query($connect,$sql);
               // $_SESSION['success'] = "คุณได้เพิ่ม " . $name . " สำเร็จ !!";
               header('location:memberstaff.php');
            }else{
               $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            }
         }elseif($memberstatus === "user"){
            $check_user = "SELECT * FROM users WHERE us_email = '$email' LIMIT 1";
            $result = mysqli_query($connect,$check_user);
            $row = mysqli_fetch_assoc($result);

            if($row){
               if($row['us_email'] === '$email'){
                  array_push($errors, "มีอีเมลนี้ในระบบแล้ว");
               }
            }elseif (count($errors) == 0) {
               $rpassword = md5($password);
               $sql = "INSERT INTO users(us_email, us_pass, us_name, us_sex, us_phone) VALUES('$email','$rpassword','$name','$sex','$phone')";
               mysqli_query($connect,$sql);
               $_SESSION['success'] = "คุณได้เพิ่ม " . $name . " สำเร็จ !!";
               header('location:member.php');
            }else{
               $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            }            
         }            
      }
   }
   // End If insert member
?>

<!DOCTYPE html>
<html lang="en">

<!---------- Start head ---------->

<head>
   <?php include('../master/head-user.php') ?>
   <script src="../bootstrap/js/jquery-3.6.0.min.js"></script>
</head>
<!---------- End head ---------->

<body>

<!---------- Start jquery ---------->

<script>
   $(document).ready(function(){
      $("#addroom-status").change(function(){
         if(this.value == "staff"){
            $("#addmember-building").show()
         }else if(this.value == "selectStatus"){
            $("#addmember-building").hide()
         }else if(this.value == "user"){
            $("#addmember-building").hide()
         }else if(this.value == "admin"){
            $("#addmember-building").hide()
         }
      })
   })
</script>
<!---------- End jquery ---------->

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
   }
   .main-manu-items li:nth-child(10){
      background-color:#3D5538;
      position:relative;
   }
   .main-manu-items li:nth-child(10) h3{
      color:#F0F8FF;
   }
   /********** End Main menu **********/

   /********** Start Content **********/

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

   /********** Start Edit Booking **********/

   .addmember{
      background-color:#D7E6D5;
      width:auto;
      margin:50px 0px;
      border-radius:3px;
   }
   .addmember-container h3{
      font-size:30px;
      margin-bottom:25px;
      color:#585858;
   }
   .addmember-container input,.addmember-container select{
      background-color:#BAC9B8;
      border: 2px solid #3D5538;
      border-radius:6px;
      height:60px;
      width:600px;
      margin-bottom:25px;
      margin-left:10px;
      color:#585858;
      font-size:30px;
      padding-left:20px;
   }
   .addmember-button button:nth-child(1){
      background-color:#3D5538;
   }
   .addmember-button button:nth-child(1):hover{
      background-color:#566D51;
   }
   .addmember-button button:nth-child(2){
      background-color:#F61414;
      margin-left:20px;
   }
   .addmember-button button:nth-child(2):hover{
      background-color:#EE5151;
   }
   .addmember-button button{
      border:none;
      border-radius:5px;
      margin-top:10px;
      width:180px;
      height:50px;
      color:#FAFCF9;
      font-size:30px;
   }
   .addmember-email input{
      margin-left:130px;
   }
   .addmember-password input{
      margin-left:70px;
   }
   .addmember-cpassword input{
      margin-left:20px;
   }
   .addmember-name input{
      margin-left:40px;
   }
   .addmember-sex select{
      margin-left:144px;
      width:600px;
   }
   .addmember-phone input{
      margin-left:85px;
   }
   .addroom-status select{
      margin-left:110px;
      
   }
   /********** End Edit Booking **********/

   /********** Start 1800px screen **********/

   @media screen and (min-width:1800px){
      .content-container{
         margin:30px 20px;
      }
      .main-menu-logo{
         height:150px;
      }
      .main-menu-logo img{
         width:100px;
         height:100px;
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
      .main-menu-logo h3{
         font-size:45px;
      }
      .addmember-container h3{
         font-size:40px;
      }
      .addmember-container input,.addmember-container select{
         width:850px;
         margin-left:20px;
      }
      .addmember-email input{
         margin-left:190px;
      }
      .addmember-password input{
         margin-left:109px;
      }
      .addmember-cpassword input{
         margin-left:42px;
      }
      .addmember-name input{
         margin-left:70px;
      }
      .addmember-sex select{
         margin-left:207px;
      }
      .addmember-phone input{
         margin-left:128px;
      }
      .addroom-status select{
         margin-left:163px;
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
      .addmember-container h3{
         font-size:30px;
      }
      .addmember-container input,.addmember-container select{
         width:420px;
         margin-left:20px;
      }
      .addmember-email input{
         margin-left:129px;
      }
      .addmember-password input{
         margin-left:69px;
      }
      .addmember-name input{
         margin-left:41px;
      }
      .addmember-sex select{
         margin-left:145px;
      }
      .addmember-phone input{
         margin-left:85px;
      }
      .addroom-status select{
         margin-left:110px;
      }
   }
   /********** End 1200px screen **********/

   /********** Start 767px screen **********/

   @media screen and (max-width:767px){
      <?php if(isset($_SESSION['admin_login'])){ ?>
         .main-content{
            min-height:920px;
         }
      <?php }elseif(isset($_SESSION['staff_login'])){ ?>
         .main-content{
            min-height:780px;
         }
      <?php }else{ ?>
         .main-content{
            min-height:520px;
         }
      <?php } ?>
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
      .addmember-container input, .addmember-container select{
         margin-left:0px;
         width:500px;
         margin-top:-20px;
      }
   }
   /********** End 767px screen **********/

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
      .content-title{
         height:55px;
      }
      .content-title-img img{
         margin-left:-25px;
         width:35px;
         height:35px;
      }
      .content-title h3{
         margin-top:7px;
         font-size:22px;
         margin-left:-10px;
      }
      .main-menu-logo img{
         width:50px;
         height:50px;
      }
      .main-menu-logo h3{
         font-size: 25px;
      }
      .addmember-container h3{
         font-size:25px;
      }
      .addmember-container input, .addmember-container select{
         font-size:18px;
         margin-left:0px;
         width:300px;
         margin-top:-25px;
         height:43px;
      }
      .addmember-container textarea{
         margin-left:0px;
         width:300px;
         margin-top:-20px;
         font-size:18px;
      }

      .addmember-container button{
         font-size:20px;
         width:100px;
         height:43px;
      }
   }
   /********** End 576px screen **********/

</style>
<!---------- End style ---------->
   
<!---------- start header ---------->

<header>
   <?php include('../master/header-user.php') ?>
</header>
<!---------- end header ---------->


<!---------- start content ---------->

<div class="content">
   <div class="container-fluid">
      <div class="main row">
         <div class="main-menu p-0 col-xl-3">
            <div class="main-menu-logo d-flex">
               <a href="../index.php"><img src="../img/menu-logo/online-booking.png" alt=""></a>
               <a href="../index.php"><h3 class="ml-3">FTU RRS</h3></a>
            </div>
            
               <!---------- start main-menu ---------->

               <?php include('../master/main-menu-user.php') ?>
               <!---------- end main-menu ---------->

            <!---------- start inform ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('../master/inform.php'); ?>
            <?php endif ?>
            <!---------- end inform ---------->

         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mt-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/staff.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>เพิ่มสมาชิก</h3>
                  </div>
               </div>

               <!---------- Start if error ---------->

               <?php if(count($errors) > 0): ?>
                  <div class="alert-danger mt-5 align-items-center d-flex pl-3" style="width:100%;height:50px;font-size:20px;">
                  <?php foreach($errors as $error): ?>
                        <?php echo $error; 
                        ?>
                     <?php endforeach ?>
                  </div>
               <?php endif ?>
               <!---------- End if error ---------->

               <!---------- Start Add member ---------->

               <div class="addmember">
                  <div class="addmember-container p-3 p-sm-5">
                     <form action="" method="post">
                        <div class="addmember-email d-md-flex">
                           <h3>อีเมล: </h3>
                           <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="addmember-password d-md-flex">
                           <h3>Password: </h3>
                           <input type="password" name="password" placeholder="password" required>
                        </div>
                        <div class="addmember-cpassword d-md-flex">
                           <h3>ยืนยันรหัสผ่าน: </h3>
                           <input type="password" name="confirmpassword" placeholder="ยืนยันรหัสผ่าน" required>
                        </div>
                        <div class="addmember-name d-md-flex">
                           <h3>ชื่อ-นามสกุล: </h3>
                           <input type="text" name="name" value="" placeholder="ชื่อ-นามสกุล"required>
                        </div>                   
                        <div class="addmember-sex d-md-flex">
                           <h3>เพศ:</h3>
                           <select name="sex" required>
                              <option selected disabled>เลือก</option>
                              <option value="male">ชาย</option>
                              <option value="female">หญิง</option>
                           </select>
                        </div>                   
                        <div class="addmember-phone d-md-flex">
                           <h3>เบอร์โทร: </h3>
                           <input type="number" name="phonenumber" placeholder="เบอร์โทร" required>
                        </div>  
                        
                        <div class="addroom-status d-md-flex disble" >
                           <h3>สถานะ: </h3>
                           <select id="addroom-status" name="memberstatus">
                              <option value="" selected>เลือกสถานะผู้ใช้งาน</option>
                              <option value="staff">ผู้ดูแลห้องประชุม</option>
                              <option value="user">ผู้ใช้งานทั่วไป</option>
                              <option value="admin">ผู้ดูแลระบบ</option>
                           </select>
                        </div>    
                        <div id="addmember-building" class="addmember-building" style="display:none;">
                           <div class="d-md-flex">
                              <h3>ดูแลห้องประชุม: </h3>
                              <select name="building">
                                 <option value="" selected>เลือกอาคาร</option>
                              <?php
                                 foreach($result as $value){
                                    echo "<option value='{$value['bd_Id']}'>{$value['bd_name']}</option>";
                                 }
                              ?>
                              </select>
                           </div>
                        </div>                    
                        
                        <div class="addmember-button mt-3">
                           <button type="submit">ยืนยัน</button>
                           <button type="reset">ยกเลิก</button>
                        </div>
                     </form>                    
                  </div>
               </div>
               <!---------- End addmember ---------->

               <!---------- Start content-footer ---------->
               <div class="content-footer row">
               
               </div>
               <!---------- End content-footer ---------->

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