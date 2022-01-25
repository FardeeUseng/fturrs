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
   $sql_total = "SELECT * FROM staff LEFT JOIN building ON staff.bd_Id = building.bd_Id";
   $query_total = mysqli_query($connect, $sql_total);
   $row_total = mysqli_num_rows($query_total);

   $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด

   $sql = "SELECT * FROM staff LEFT JOIN building ON staff.bd_Id = building.bd_Id"; 
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

<!---------- Start Style ---------->

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
   .content-search{
      justify-content:flex-end;
   }
   .content-search select {
      background-color:#3D5538;
      color:#E9F1E6;
      border-radius:5px;
      font-size:22px;
      width: 210px;
      height: 50px;
      padding-left:20px;
      border:none;
   }
   /********** End Content **********/

   /********** Start table **********/

   .content-table th{
      font-size:20px;
      font-weight: normal;
      padding:20px 2px;
   }
   .content-table td{
      font-size:16px;
      font-weight: normal;
      padding:20px 1px;
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
      .content-table th{
         font-size:25px;
         padding:25px 5px;
      }
      .content-table td{
         font-size:20px;
         padding:20px 5px;
      }
   }
   /********** Start 1800px screen **********/

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
      .content-table th{
         font-size:18px;
      }
      .content-table td{
         font-size:15px;
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
      .content-table th{
         font-size:17px;
      }
      .content-table td{
         font-size:14px;
      }
      .content-search select{
         font-size:20px;
         width:205px;
         height:40px;
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
      .content-search form{
         width:250px;
      }
      .content-table th{
         font-size:14px;
      }
      .content-table td, .content-table a{
         font-size:10px;
      }
      .content-table th:nth-child(5), .content-table td:nth-child(5){
         display:none;
      }
   }
   /********** End 576px screen **********/

</style>
<!---------- End Style ---------->
   
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
                        <option selected>ผู้ดูแลห้องประชุม</option>
                        <option value="member.php">ข้อมูลผู้ใช้งานทั่วไป</option>
                     </select>
                     <!---------- End Select member ---------->

               </div>
               <div class="content-table bg-dark">
                  
                  <!---------- Start Table staff ---------->

                  <table class="text-center table table-bordered">
                     <thead>
                        <tr>
                           <th>ลำดับ</th>
                           <th>อีเมล</th>
                           <th>ชื่อ-นามสกุล</th>
                           <th>เบอร์โทร</th>                           
                           <th>ดูแลห้องประชุมอาคาร</th>
                           <th>ลบ</th>
                           <th>แก้ไข</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr>
                           <td><?php echo $row['staff_Id']; ?></td>                   
                           <td><?php echo $row['st_email']; ?></td>
                           <td><?php echo $row['st_name']; ?></td>                           
                           <td><?php echo $row['st_phone']; ?></td>
                           <td><?php echo $row['bd_name']; ?></td>
                           <td><a href="deletememberstaff.php?id=<?php echo $row['staff_Id']; ?>" class="btn btn-danger p-1 px-sm-3" onclick="return confirm('คุณต้องการลบผู้ใช้รายนี้ใช้รึไม่')">ลบ</a></td>
                           <td><a href="../admin/editmemberstaff.php?id=<?php echo $row['staff_Id']; ?>" class="btn btn-warning p-1" onclick="return confirm('คุณต้องการที่จะแก้ไขข้อมูลผู้ใช้รายนี้ใช้รึไม่')">แก้ไข</a></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
                  <!---------- End Table staff ---------->

               </div>

               <!---------- Start content-footer staff ---------->

               <div class="content-footer row">
                  <div class="content-footer-left col-xl-7">
                     
                  </div>
                  <div class="content-footer-right d-flex justify-content-end col-xl-5">

                     <!---------- Start pagination ---------->

                     <?php include("../master/pagination.php"); ?>
                     <!---------- End pagination ---------->

                  </div>
               </div>
               <!---------- End content-footer staff ---------->

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