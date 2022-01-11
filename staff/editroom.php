<?php

   session_start();
   require('../dbconnect.php');

   $sql = "SELECT * FROM room INNER JOIN staff ON room.staff_Id = staff.staff_Id";
   $result = mysqli_query($connect,$sql);

   // Start Access permission Staff and Admin

   if(!isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Staff and Admin

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
   .main-manu-items li:nth-child(9){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(9) h3{
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
   .content-search-button{
      background-color:#3D5538;
      color:#F0F8FF;
   }
   .content-search{
      justify-content:flex-end;
   }
   .content-search form{
      width:500px;
   }
   .custom-select option{
      background-color:#E9F1E6;
   }
   /********** End Content **********/

   /********** Start table **********/
   .content-table th{
      font-size:25px;
      font-weight: normal;
   }
   .content-table td{
      font-size:18px;
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

   /********** Start Footer **********/
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
   /********** End Footer **********/
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
                     <img src="../img/menu-logo/edit1.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>แก้ไขห้องประชุม</h3>
                  </div>
               </div>
               <div class="content-search d-flex mt-5 mb-4">
                  <form method="post" class="input-group">                  
                     <select class="custom-select" id="">
                        <option value="allbuilding" selected>อาคารทั้งหมด</option>
                        <option value="scienceandit">วิทยาศาสตร์และเทคโนโลยี</option>
                        <option value="arts">ศิลปศาสตร์และสังคมศาสตร์</option>
                        <option value="education">ศึกษาศาสตร์</option>
                        <option value="islamic">อิสลามศึกษา</option>
                     </select>
                     <button class="content-search-button px-2 rounded-right" type="submit">ค้นหา</button>
                  </form>
               </div>

               <!---------- Start content-table ---------->

               <div class="content-table bg-dark">
                  <table class="text-center table table-bordered">
                     <thead>
                        <tr>
                           <th>ลำดับ</th>
                           <th>ชื่อห้องประชุม</th>
                           <th>รองรับจำนวน</th>
                           <th>ผู้ดูแล</th>
                           <th>โทร</th>                           
                           <th>เพิ่มเติม</th>
                           <th>สถานะ</th>
                           <th>ลบห้อง</th>
                           <th>แก้ไข</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                           <td><?php echo $row['room_Id']; ?></td>
                           <td><?php echo $row['r_name']; ?></td>
                           <td><?php echo $row['r_capacity']; ?></td>
                           <td><?php echo $row['st_name']; ?></td>                                                      
                           <td><?php echo $row['st_phone']; ?></td>
                           <td><a href="../roommoredetail.php?id=<?php echo $row['room_Id']; ?>">ดูเพิ่มเติม</a></td>
                           <?php  
                           if($row['r_status'] == "available"){
                              echo "<td class='text-success'>ใช้งานได้</td>";
                           }else{
                              echo "<td class='text-danger'>ปิดปรับปรุง</td>";
                           }
                           ?>
                           <td><a href="./deleteroom.php?id=<?php echo $row['room_Id']; ?>" class="btn btn-danger" onclick="return confirm('ยืนยันที่จะลบข้อมูลห้องนี้?')">ลบ</a></td>
                           <td><a href="./editroomitems.php?id=<?php echo $row['room_Id']; ?>" class="btn btn-warning" onclick="return confirm('ยืนยันที่จะแก้ไขข้อมูลห้องนี้?')">แก้ไข</a></td>                           
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
               <!---------- End content-table ---------->

               <div class="content-footer row">
                  <div class="content-footer-left col-xl-7">
                     <p class="">จาก 1 ถึง 20 ทั้งหมด 100</p>
                  </div>
                  <div class="content-footer-right col-xl-5">
                     <p></p>
                  </div>
               </div>
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