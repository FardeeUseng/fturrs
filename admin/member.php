<?php

   session_start();
   require('../dbconnect.php');

   // Start Access permission Admin

   if(!isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Admin

   // Start pagination

   if(isset($_GET['page'])){
      $page = $_GET['page'];
   }else{
      $page = 1;  // เลขหน้าที่จะแสดง
   }

   $record_show = 12; // จำนวนข้อมูลที่จะแสดง
   $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น

   // Query Total Product
   $sql_total = "SELECT * FROM users";
   $query_total = mysqli_query($connect, $sql_total);
   $row_total = mysqli_num_rows($query_total);

   $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด

   $sql = "SELECT * FROM users"; 
   $sql .= " LIMIT $offset,$record_show";
   $result = mysqli_query($connect, $sql);

   // End pagination

?>

<!DOCTYPE html>
<html lang="en">

<!---------- start head ---------->

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
      position:relative;
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
   .content-search{
      justify-content:flex-end;
   }
   .content-search select {
      background-color:#3D5538;
      color:#E9F1E6;
      border-radius:5px;
      font-size:22px;
      width: 230px;
      height: 50px;
      padding-left:20px;
      border:none;
   }
   /********** End Content **********/

   /********** Start table **********/

   .content-table th{
      font-size:20px;
      font-weight: normal;
   }
   .content-table td{
      font-size:15px;
      font-weight: normal;
   }
   .content-table thead{
      background-color:#BAC9B8;
      color:#585858;
   }
   .content-table tbody{
      background-color:#CDD9CC;
      color:#585858;
   }
   /********** End table **********/

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
               <img src="../img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>

            <!---------- Start main-manu-items ---------->

               <?php include('../master/main-menu-user.php') ?>
            <!---------- Start main-manu-items ---------->

            <!---------- Start inform ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('../master/inform.php'); ?>
            <?php endif ?>
            <!---------- End inform ---------->

         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mx-5 my-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/team.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>ข้อมูลสมาชิก</h3>
                  </div>
               </div>

               <!---------- Start if success or error ---------->

               <?php if(isset($_SESSION['success'])){ 
                  error_reporting(0);
                  ?>                  
                  <div class="alert-success mt-5 align-items-center d-flex pl-3" style="width:100%;height:50px;font-size:20px;">
                     <?php
                        echo $_SESSION['success'];
                     ?>
                  </div>
               <?php }elseif(isset($_SESSION['error'])){ 
                  error_reporting(0);
                  ?>
                  <div class="alert-danger mt-5 align-items-center d-flex pl-3" style="width:100%;height:50px;font-size:20px;">
                     <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                     ?>
                  </div>
               <?php } 
                  unset($_SESSION['success']);
                  unset($_SESSION['error']);
               ?>               
               <!---------- End if success or error ---------->

               <div class="content-search d-flex mt-5 mb-4">

                  <!---------- Start Select member ---------->

                  <select class="form-select" aria-label="Default select example" onchange="location = this.value;" id="login">
                     <option selected>ข้อมูลผู้ใช้งานทั่วไป</option>
                     <option value="../admin/memberstaff.php">ผู้ดูแลห้องประชุม</option>
                  </select>
                  <!---------- End Select member ---------->

               </div>
               <div class="content-table bg-dark">
                  
                  <!---------- Start User table ---------->

                  <table class="text-center table table-bordered">
                     <thead>
                        <tr>
                           <th>ลำดับ</th>
                           <th>อีเมล</th>
                           <th>Password</th>
                           <th>ชื่อ-นามสกุล</th>
                           <th>เบอร์โทร</th>                           
                           <th>สถานะ</th>
                           <th>ลบ</th>
                           <th>แก้ไข</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr>
                           <td><?php echo $row['users_Id']; ?></td>                   
                           <td><?php echo $row['us_email']; ?></td>
                           <td><?php echo $row['us_pass']; ?></td>
                           <td><?php echo $row['us_name']; ?></td>                           
                           <td><?php echo $row['us_phone']; ?></td>
                           <td>ผู้ใช้งานทั่วไป</td>
                           <td><a href="deletememberuser.php?id=<?php echo $row['users_Id']; ?>" class="btn btn-danger px-3" onclick="return confirm('คุณต้องการลบผู้ใช้รายนี้ใช้รึไม่')">ลบ</a></td>
                           <td><a href="editmemberuser.php?id=<?php echo $row['users_Id']; ?>" class="btn btn-warning" onclick="return confirm('ยืนยันที่จะแก้ไขข้อมูล')">แก้ไข</a></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
                  <!---------- End User table ---------->
               </div>

               <!---------- Start content-footer ---------->

               <div class="content-footer row">
                  <div class="content-footer-left col-xl-7">                     
                  </div>

                  <div class="content-footer-right d-flex justify-content-end col-xl-5">
                     
                     <!---------- Start pagination ---------->

                     <?php include("../master/pagination.php"); ?>
                     <!---------- End pagination ---------->

                  </div>
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