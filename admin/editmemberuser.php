<?php
   session_start();
   require('../dbconnect.php');

   // Start Access permission Admin

   if(!isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Admin
   
   // Start Show Table Users

   $sql = "SELECT * FROM users";
   $result = mysqli_query($connect,$sql);
   $row = mysqli_fetch_assoc($result);
   $id = $_GET['id'];
   // ENd Show Table Users

   // If Post for update users
   $errors = array();
   if($_POST){
      $id = $_POST['id'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['confirmpassword'];
      $name = $_POST['name'];
      $phone = $_POST['phonenumber'];
      $sex = $_POST['sex'];

      if(empty($email)){
         array_push($errors,"กรุณากรอกอีเมล");
      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         array_push($errors,"รูปแบบอีเมลไม่ถูกต้อง");
      }elseif(empty($password)){
         array_push($errors,"กรุณากรอกรหัสผ่าน");
      }elseif($password != $cpassword){
         array_push($errors,"รหัสผ่านไม่ตรงกัน");
      }elseif(empty($name)){
         array_push($errors, "กรุณากรอกชื่อ");
      }elseif(empty($phone)){
         array_push($errors,"กรุณากรอกเบอร์โทรศัพท์");
      }elseif(empty($sex)){
         array_push($error,"กรุณาเลือกเพศ");
      }elseif(count($errors) == 0){
         $query = "UPDATE users SET us_pass = '$password',us_name = '$name',us_sex = '$sex',us_email = '$email', us_phone = '$phone' WHERE users_Id = $id";
         mysqli_query($connect,$query);
         $_SESSION['success1'] = "เพิ่มข้อมูลเรียบร้อย";
         header('location:member.php');
      }

         if(count($errors) == 0){
            $rpassword = md5($password);
            $query = "UPDATE users SET us_pass = '$password',us_name = '$name',us_sex = '$sex',us_email = '$email', us_phone = '$phone' WHERE users_Id = $id";
            mysqli_query($connect,$query);
            $_SESSION['success1'] = "แก้ไขข้อมูลเรียบร้อย";
            header('location:member.php');
         }else{
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
         }
      
   }
?>

<!DOCTYPE html>
<html lang="en">

<!---------- start header ---------->

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
   .main-manu-items li:nth-child(11){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(11) h3{
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

   .edituser{
      background-color:#D7E6D5;
      width:1170px;
      margin:50px 0px;
      border-radius:3px;
   }
   .edituser-container h3{
      font-size:40px;
      margin-bottom:25px;
      color:#585858;
   }
   .edituser-container input,.edituser-container select{
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
   .edituser-container select{
      width:200px;
   }
   .edituser-equipment-items1,.addroom-equipment-items2{
      margin-left:102px;
   }
   #edituser-items{
      width:25px;
      height:25px
   }
   .edituser-button button:nth-child(1){
      background-color:#FBA535;
   }
   .edituser-button button:nth-child(1):hover{
      background-color:#F6B35B;
   }
   .edituser-button button:nth-child(2){
      background-color:#F61414;
      margin-left:20px;
   }
   .edituser-button button:nth-child(2):hover{
      background-color:#EE5151;
   }
   .edituser-button button{
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

            <!---------- Start main-manu-items ---------->

            <?php include('../master/main-menu-user.php') ?>
            <!---------- End main-manu-items ---------->

         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mx-5 my-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/team.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>แก้ไขข้อมูลสมาชิก</h3>
                  </div>
               </div>

               <!---------- Start If error ---------->

               <?php foreach($errors as $error){ ?>
                  <div class="alert alert-danger mt-5">
                     <?php echo "$error"; ?>
                  </div>
               <?php } ?>
               <!---------- ENd If error ---------->
               
               <!---------- Start Edit User ---------->

               <div class="edituser">                  
                  <div class="edituser-container p-5">
                     <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="edituser-email d-flex">
                           <h3>อีเมล : </h3>
                           <input style="margin-left:181px;width:690px;" type="email" name="email" placeholder="Email" value="<?php echo $row['us_email']; ?>" require>
                        </div>  
                        <div class="edituser-password d-flex">
                           <h3>Password : </h3>
                           <input style="margin-left:103px;width:690px;" type="text" name="password" placeholder="password" value="<?php echo $row['us_pass']; ?>" require>
                        </div>
                        <div class="edituser-confirmpassword d-flex">
                           <h3>ยืนยันรหัสผ่าน : </h3>
                           <input style="margin-left:35px;width:690px;" type="text" name="confirmpassword" placeholder="ยืนยันรหัสผ่าน" value="<?php echo $row['us_pass'] ?>" require>
                        </div>
                        <div class="edituser-name d-flex">
                           <h3>ชื่อ-นามสกุล : </h3>
                           <input style="margin-left:63px;width:690px;" type="text" name="name" value="<?php echo $row['us_name'] ?>" placeholder="ชื่อ-นามสกุล" require>
                        </div>                 
                        <div class="edituser-phonenumber d-flex">
                           <h3>เบอร์โทร : </h3>
                           <input style="margin-left:123px;width:690px;padding-left:20px;" type="number" name="phonenumber" placeholder="เบอร์โทร" value="<?php echo $row['us_phone']; ?>" require>
                        </div>                          
                        <div class="edituser-sex d-flex">
                           <h3>เพศ : </h3>
                           <select name="sex"  style="margin-left:200px;width:690px;">
                           <?php
                           if($row['us_sex'] == "male"){
                              echo "<option value='male' selected>ชาย</option>
                                    <option value='female'>หญิง</option>";
                           }else{
                              echo "<option value='male'>ชาย</option>
                                    <option value='female' selected>หญิง</option>";
                           }                           
                           ?> 
                           </select>
                        </div>    
                        <!-- <div class="addroom-status d-flex">
                           <h3>สถานะ : </h3>
                           <select name="memberstatus"  style="margin-left:158px;width:690px;">
                              <option>เลือกสถานะผู้ใช้งาน</option>
                              <option value="staff">ผู้ดูแลห้องประชุม</option>
                              <option value="user">ผู้ใช้งานทั่วไป</option>
                           </select>
                        </div>     -->
                        <!-- <div class="addroom-building d-flex">
                           <h3>ดูแลห้องประชุม : </h3>
                           <select name="building"  style="margin-left:15px;width:690px;">
                              <option select>เลือกอาคาร</option>
                              <option value="11">วิทยาศาสตร์และเทคโนโลยี</option>
                              <option value="12">ศิลปศาสตร์และสังคมศาสตร์</option>
                              <option value="13">ศึกษาศาสตร์</option>
                              <option value="14">อิสลามศึกษา</option>
                           </select>
                        </div>                     -->                        
                        <div class="edituser-button mt-3">
                           <button onclick="return confirm('คุณแน่ใจที่จะแก้ไขข้อมูลชุดนี้?')" type="submit">แก้ไข</button>
                           <button type="reset">ยกเลิก</button>
                        </div>
                     </form>                    
                  </div>
               </div>
               <!---------- Start Edit User ---------->

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