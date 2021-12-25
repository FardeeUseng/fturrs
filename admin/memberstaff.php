<?php

   session_start();
   require('../dbconnect.php');

   // Start Access permission Admin

   if(!isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Admin

   // Start Show table staff

   $sql = "SELECT * FROM staff INNER JOIN building ON staff.bd_Id = building.bd_Id";
   $result = mysqli_query($connect,$sql);
   // End Show table staff

?>

<!DOCTYPE html>
<html lang="en">

<!---------- start head ---------->

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
                     <h3>ข้อมูลสมาชิก</h3>
                  </div>
               </div>
               <div class="content-search d-flex mt-5 mb-4">                 
                     <select class="form-select" aria-label="Default select example" onchange="location = this.value;" id="login">
                        <option selected>ผู้ดูแลห้องประชุม</option>
                        <option value="member.php">ข้อมูลผู้ใช้งานทั่วไป</option>
                     </select>
               </div>
               <div class="content-table bg-dark">
                  
                  <!---------- Start Table staff ---------->

                  <table class="text-center table table-bordered">
                     <thead>
                        <tr>
                           <th>ลำดับ</th>
                           <th>อีเมล</th>
                           <th>Password</th>
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
                           <td><?php echo $row['st_pass']; ?></td>
                           <td><?php echo $row['st_name']; ?></td>                           
                           <td><?php echo $row['st_phone']; ?></td>
                           <td><?php echo $row['bd_name']; ?></td>
                           <td><a href="deletememberstaff.php?id=<?php echo $row['staff_Id']; ?>" class="btn btn-danger" onclick="return confirm('คุณต้องการลบผู้ใช้รายนี้ใช้รึไม่')">ลบ</a></td>
                           <td><a href="../admin/editmemberstaff.php?id=<?php echo $row['staff_Id']; ?>" class="btn btn-warning" onclick="return confirm('คุณต้องการที่จะแก้ไขข้อมูลผู้ใช้รายนี้ใช้รึไม่')">แก้ไข</a></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
                  <!---------- End Table staff ---------->

               </div>

               <!---------- Start content-footer staff ---------->

               <div class="content-footer row">
                  <div class="content-footer-left col-xl-7">
                     <p class="">จาก 1 ถึง 20 ทั้งหมด 100</p>
                  </div>
                  <div class="content-footer-right col-xl-5">
                     <p></p>
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