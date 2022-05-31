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
   $id = $_GET['id'];
   $sql = "SELECT * FROM staff LEFT JOIN building ON staff.bd_Id = building.bd_Id WHERE staff_Id = $id";
   $result = mysqli_query($connect,$sql);
   $row = mysqli_fetch_assoc($result);
   
   // ENd Show Table Users

   // Start If update member

   $errors = array();
   if($_POST){
      $id = mysqli_real_escape_string($connect, $_POST['id']);
      $building = mysqli_real_escape_string($connect, $_POST['building']);
      $email = mysqli_real_escape_string($connect, $_POST['email']);
      $password = mysqli_real_escape_string($connect, $_POST['password']);
      $cpassword = mysqli_real_escape_string($connect, $_POST['confirmpassword']);
      $name = mysqli_real_escape_string($connect, $_POST['name']);
      $phone = mysqli_real_escape_string($connect, $_POST['phonenumber']);
      $sex = mysqli_real_escape_string($connect, $_POST['sex']);

      if(empty($building)){
         array_push($errors, "กรุณาเลือกอาคาร");
      }elseif(empty($email)){
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
         $rpassword = md5($password);
         $query = "UPDATE staff SET bd_Id = '$building', st_pass = '$rpassword', st_name = '$name', st_sex = '$sex',st_email = '$email', st_phone = '$phone' WHERE staff_Id = $id";
         mysqli_query($connect,$query);
         $_SESSION['success1'] = "เพิ่มข้อมูลเรียบร้อย";
         header('location:memberstaff.php');
      }else{
         $_SESSION['error'] = "มีบางอย่างผิดพลาด";
      }
      
   }
   // End If update member

   $sql3 = "SELECT * FROM building";
   $result3 = mysqli_query($connect, $sql3);
   while($row3 = mysqli_fetch_assoc($result3)){
      $buildings[] = $row3['bd_name']; 
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
   .main-manu-items li:nth-child(11){
      background-color:#3D5538;
      position:relative;
   }
   .main-manu-items li:nth-child(11) h3{
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

   .edituser{
      background-color:#D7E6D5;
      width:auto;
      margin:50px 0px;
      border-radius:3px;
   }
   .edituser-container h3{
      font-size:30px;
      margin-bottom:25px;
      color:#585858;
   }
   .edituser-container input,.edituser-container select{
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
   /* .edituser-container select{
      width:200px;
   } */
   /* .edituser-equipment-items1,.addroom-equipment-items2{
      margin-left:102px;
   } */
   /* #edituser-items{
      width:25px;
      height:25px
   } */
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
   .edituser-email input{
      margin-left:134px;
   }
   .edituser-password input{
      margin-left:73px;
   }
   .edituser-confirmpassword input{
      margin-left:23px;
   }
   .edituser-name input{
      margin-left:45px;
   }
   .edituser-phone input{
      margin-left:88px;
   }
   .edituser-sex select{
      margin-left:147px;
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
      .edituser-container h3{
         font-size:40px;
      }
      .edituser-container input,.edituser-container select{
         width:850px;
         margin-left:20px;
      }
      .edituser-email input{
         margin-left:187px;
      }
      .edituser-password input{
         margin-left:106px;
      }
      .edituser-confirmpassword input{
         margin-left:40px;
      }
      .edituser-name input{
         margin-left:68px;
      }
      .edituser-phone input{
         margin-left:127px;
      }
      .edituser-sex select{
         margin-left:206px;
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
      .edituser-container h3{
         font-size:30px;
      }
      .edituser-container input,.edituser-container select{
         width:430px;
         margin-left:20px;
      }
      .edituser-email input{
         margin-left:122px;
      }
      .edituser-password input{
         margin-left:62px;
      }
      .edituser-confirmpassword input{
         margin-left:10px;
      }
      .edituser-name input{
         margin-left:32px;
      }
      .edituser-phone input{
         margin-left:75px;
      }
      .edituser-sex select{
         margin-left:135px;
      }
      .addroom-building select{
         margin-left:10px;
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
      .edituser-container input, .edituser-container select{
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
      .edituser-container h3{
         font-size: 25px;
      }
      .edituser-container input, .edituser-container select{
         font-size:18px;
         margin-left:0px;
         width:300px;
         margin-top:-20px;
         height:43px;
      }
      .edituser-container textarea{
         margin-left:0px;
         width:300px;
         margin-top:-20px;
         font-size:18px;
      }
      .edituser-button button{
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

            <!---------- Start main-manu-items ---------->

            <?php include('../master/main-menu-user.php') ?>
            <!---------- End main-manu-items ---------->

            <!---------- Start inform ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('../master/inform.php'); ?>
            <?php endif ?>
            <!---------- Start inform ---------->

         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mt-4">
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
                  <div class="edituser-container p-3 p-sm-5">
                     <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="addroom-building d-md-flex">
                           <h3>ดูแลห้องประชุม: </h3>
                           <select name="building">
                              <?php
                                 foreach($buildings as $value){
                                    if($value == $row['bd_name']){
                                       echo "<option value='{$row['bd_Id']}' selected>{$row['bd_name']}</option>";
                                    }
                                 }
                              ?>
                           </select>
                        </div>
                        <div class="edituser-email d-md-flex">
                           <h3>อีเมล: </h3>
                           <input type="email" name="email" placeholder="Email" value="<?php echo $row['st_email']; ?>" require>
                        </div>  
                        <div class="edituser-password d-md-flex">
                           <h3>Password: </h3>
                           <input type="password" name="password" placeholder="password" value="<?php echo $row['st_pass']; ?>" require>
                        </div>
                        <div class="edituser-confirmpassword d-md-flex">
                           <h3>ยืนยันรหัสผ่าน: </h3>
                           <input type="password" name="confirmpassword" placeholder="ยืนยันรหัสผ่าน" value="<?php echo $row['st_pass'] ?>" require>
                        </div>
                        <div class="edituser-name d-md-flex">
                           <h3>ชื่อ-นามสกุล: </h3>
                           <input type="text" name="name" value="<?php echo $row['st_name'] ?>" placeholder="ชื่อ-นามสกุล" require>
                        </div>                 
                        <div class="edituser-phone d-md-flex">
                           <h3>เบอร์โทร: </h3>
                           <input type="number" name="phonenumber" placeholder="เบอร์โทร" value="<?php echo $row['st_phone']; ?>" require>
                        </div>                          
                        <div class="edituser-sex d-md-flex">
                           <h3>เพศ: </h3>
                           <select name="sex">
                           <?php
                           if($row['st_sex'] == "male"){
                              echo "<option value='male' selected>ชาย</option>
                                    <option value='female'>หญิง</option>";
                           }else{
                              echo "<option value='male'>ชาย</option>
                                    <option value='female' selected>หญิง</option>";
                           }                           
                           ?> 
                           </select>
                        </div>                     
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

</body>
</html>