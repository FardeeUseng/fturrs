<?php
   session_start();
   require('../dbconnect.php');
   $sql = "SELECT * FROM building";
   $result = mysqli_query($connect,$sql);
   $row = mysqli_fetch_assoc($result);

   // Start Access permission Admin

   if(!isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Admin

   // If Post

   $errors = array();
   if($_POST){
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['confirmpassword'];
      $name = $_POST['name'];
      $sex = $_POST['sex'];
      $phone = $_POST['phonenumber'];
      $building = $_POST['building'];

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
      }else {
         $check_user = "SELECT * FROM staff WHERE st_email = '$email' LIMIT 1";
         $result = mysqli_query($connect,$check_user);
         $row = mysqli_fetch_assoc($result);

         if($row){
            if($row['st_email'] === '$email'){
               array_push($errors, "มีอีเมลนี้ในระบบแล้ว");
            }
         }elseif (count($errors) == 0) {
            $rpassword = md5($password);
            $sql = "INSERT INTO staff(bd_Id,st_pass,st_name,st_sex,st_email,st_phone) VALUES('$building','$password','$name','$sex','$email','$phone')";
            mysqli_query($connect,$sql);
            $_SESSION['username'] = $name;
            $_SESSION['success'] = "Now you are Log In";
            header('location:memberstaff.php');
         }else{
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
         }
      }
   }
?>

<!DOCTYPE html>
<html lang="en">

<!---------- Start head ---------->

<head>
   <?php include('../master/head-user.php') ?>
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
   .main-manu-items li:nth-child(10){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(10) h3{
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
   .custom-select option{
      background-color:#E9F1E6;
   }
   /********** End Content **********/

   /********** Start Edit Booking **********/

   .addmember{
      background-color:#D7E6D5;
      width:1170px;
      margin:50px 0px;
      border-radius:3px;
   }
   .addmember-container h3{
      font-size:40px;
      margin-bottom:25px;
      color:#585858;
   }
   .addmember-container input,.addmember-container select{
      background-color:#BAC9B8;
      border: 2px solid #3D5538;
      border-radius:6px;
      height:60px;
      width:690px;
      margin-bottom:25px;
      margin-left:10px;
      color:#585858;
      font-size:30px;
      padding-left:20px;
   }
   .addmember-container select{
      width:200px;
   }
   .addmember-equipment{
      display:flex;
   }
   .addmember-equipment-items1,.addmember-equipment-items2{
      margin-left:102px;
   }
   .addmember-equipment label{
      font-size:30px;
      margin:0 20px;
      color:#585858;
   }
   #addmember-items{
      width:25px;
      height:25px
   }
   .addmember-roomimage input{
      padding-left:5px;
      padding-top:2.5px;
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
   /********** End Edit Booking **********/

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
         <div class="main-menu p-0 col-xl-3">
            <div class="main-menu-logo d-flex">
               <img src="../img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>
            <ul class="main-manu-items">
               <?php include('../master/main-menu-user.php') ?>
            </ul>
         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mx-5 my-4">
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
                  <div class="addmember-container p-5">
                     <form action="" method="post">
                        <div class="addmember-capacity d-flex">
                           <h3>อีเมล : </h3>
                           <input style="margin-left:181px;width:690px;" type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="addmember-nameroom d-flex">
                           <h3>Password : </h3>
                           <input style="margin-left:103px;width:690px;" type="password" name="password" placeholder="password" required>
                        </div>
                        <div class="addmember-nameroom d-flex">
                           <h3>ยืนยันรหัสผ่าน : </h3>
                           <input style="margin-left:35px;width:690px;" type="password" name="confirmpassword" placeholder="ยืนยันรหัสผ่าน" required>
                        </div>
                        <div class="addmember-coderoom d-flex">
                           <h3>ชื่อ-นามสกุล : </h3>
                           <input style="margin-left:63px;width:690px;" type="text" name="name" value="" placeholder="ชื่อ-นามสกุล"required>
                        </div>                   
                        <div class="addmember-coderoom d-flex">
                           <h3>เพศ :</h3>
                           <select name="sex" style="margin-left:200px;width:200px;" required>
                              <option selected disabled>เลือก</option>
                              <option value="male">ชาย</option>
                              <option value="female">หญิง</option>
                           </select>
                        </div>                   
                        <div class="addmember-roomimage d-flex">
                           <h3>เบอร์โทร : </h3>
                           <input style="margin-left:123px;width:690px;padding-left:20px;" type="number" name="phonenumber" placeholder="เบอร์โทร" required>
                        </div>  
                        
                        <!-- <div class="addroom-status d-flex disble">
                           <h3>สถานะ : </h3>
                           <select name="memberstatus"  style="margin-left:158px;width:690px;">
                              <option>เลือกสถานะผู้ใช้งาน</option>
                              <option value="">ผู้ดูแลห้องประชุม</option>
                              <option value="" disabled>ผู้ใช้งานทั่วไป</option>
                              <option value="" disabled>ผู้ดูแลระบบ</option>
                           </select>
                        </div>     -->
                        <div class="addmember-building d-flex">
                           <h3>ดูแลห้องประชุม : </h3>
                           <select name="building"  style="margin-left:15px;width:690px;" required>
                              <option selected disabled>เลือกอาคาร</option>
                           <?php
                              foreach($result as $value){
                                 echo "<option value='{$value['bd_Id']}'>{$value['bd_name']}</option>";
                              }
                           ?>
                           </select>
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

   <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>