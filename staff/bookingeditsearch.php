<?php

   session_start();
   require('../dbconnect.php');


   // Start Access permission Staff and Admin

   if(!isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // Start Access permission Staff and Admin

   // Start select building

   $sql3 = "SELECT * FROM building";
   $result3 = mysqli_query($connect, $sql3);
   while($row3 = mysqli_fetch_assoc($result3)){
      $buildings[] = $row3['bd_name']; 
   }
   // Start select building

   if(isset($_SESSION['admin_login'])){
      
      // Start Pagination for admin logIn
      
      if(isset($_GET['page'])){
         $page = $_GET['page'];
      }else{
         $page = 1;  // เลขหน้าที่จะแสดง
      }       
      
      $id = $_SESSION['admin_login'];
      $buildingad = $_SESSION['building'];

      $record_show = 12; // จำนวนข้อมูลที่จะแสดง
      $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น

      // Query Total Product
      $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE building.bd_name LIKE '%$buildingad%'";
      $query_total = mysqli_query($connect, $sql_total);
      $row_total = mysqli_num_rows($query_total);
   
      $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด
   
      $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE building.bd_name LIKE '%$buildingad%'"; 
      $sql .= " LIMIT $offset,$record_show";
      $result = mysqli_query($connect, $sql);

      if(isset($_POST['sbuilding'])){

         $building = $_POST['building'];
         $page = 1;  // เลขหน้าที่จะแสดง

         $record_show = 12; // จำนวนข้อมูลที่จะแสดง
         $offset = ($page - 1) * $record_show;
         // Query Total Product
         $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE bd_name LIKE '%$building%' ORDER BY rserv_status ASC";
         $query_total = mysqli_query($connect, $sql_total);
         $row_total = mysqli_num_rows($query_total);
      
         $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด

         $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE bd_name LIKE '%$building%' ORDER BY rserv_status ASC";
         $sql .= " LIMIT $offset,$record_show";
      
         if($building == "allbuilding"){
            header("location:bookingedit.php");
            exit();
         }
         $result = mysqli_query($connect, $sql);
         $_SESSION['building'] = $building;
         // unset($_SESSION['building']);
      }
      if(isset($_POST['status'])){

      }
   }
   // End Pagination for admin logIn

   // Start Pagination for staff logIn

   if(isset($_SESSION['staff_login'])){

      $id = $_SESSION['staff_login'];
      $bd_Id = $_SESSION['bd_Id'];
      // Start Pagination for staff logIn
      
      if(isset($_GET['page'])){
         $page = $_GET['page'];
      }else{
         $page = 1;  // เลขหน้าที่จะแสดง
      }         
      $record_show = 12; // จำนวนข้อมูลที่จะแสดง
      $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น

      // Query Total Product
      $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE bd_name LIKE '%$building%' AND building.bd_Id = $bd_Id ORDER BY rserv_status ASC";
      $query_total = mysqli_query($connect, $sql_total);
      $row_total = mysqli_num_rows($query_total);
   
      $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด
   
      $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE bd_name LIKE '%$building%' AND building.bd_Id = $bd_Id ORDER BY rserv_status ASC"; 
      $sql .= " LIMIT $offset,$record_show";
      $result = mysqli_query($connect, $sql);

      if(isset($_POST['sbuilding'])){
         $building = $_POST['building'];
         $page = 1;  // เลขหน้าที่จะแสดง

         $record_show = 12; // จำนวนข้อมูลที่จะแสดง
         $offset = ($page - 1) * $record_show;
         // Query Total Product
         $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE bd_name LIKE '%$building%' AND building.bd_Id = $bd_Id ORDER BY rserv_status ASC";

         $query_total = mysqli_query($connect, $sql_total);
         $row_total = mysqli_num_rows($query_total);
      
         $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด

         $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE bd_name LIKE '%$building%' AND building.bd_Id = $bd_Id ORDER BY rserv_status ASC";
         $sql .= " LIMIT $offset,$record_show";
      
         if($building == "allbuilding"){
            header("location:bookingedit.php");
            exit();
         }
         $result = mysqli_query($connect, $sql);
         $_SESSION['building'] = $building;
      }

   }
   // End Pagination for staff logIn
   
?>

<!DOCTYPE html>
<html lang="en">

<!---------- start head ---------->

<head>
   <?php include('../master/head-user.php') ?>
</head>
<!---------- End head ---------->

<body>

<!---------- start style ---------->

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
   .main-manu-items li:nth-child(7){
      background-color:#3D5538;
      position:relative;
   }
   .main-manu-items li:nth-child(7) h3{
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
   .content-search-building{
      justify-content:flex-end;
   }
   .content-search-building form{
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
      font-size:16px;
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
<!---------- end style ---------->
   
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

            <!---------- start inform ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('../master/inform.php'); ?>
            <?php endif ?>
            <!---------- end inform ---------->

         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mx-5 my-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/edit.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>แก้ไขการจองห้อง</h3>
                  </div>
               </div>
               <div class="content-search row d-flex mt-5 mb-4 ">
                  <div class="content-search-status d-flex col-xl-5">

                     <!---------- start Serach reservation status ---------->

                     <form action="bookingeditsearchstatus.php" method="post" class="input-group" style="width:350px">
                        <button class="content-search-button px-2 rounded-left" type="submit" name="status">เลือกสถานะ</button>                  
                        <select class="custom-select" name="rservstatus" >
                           <option value="allstatus">สถานะทั้งหมด</option>
                           <option value="pendingApproval">รอการอนุมัติ</option>
                           <option value="approve">อนุมัติ</option>
                           <option value="disapproved">ไม่อนุมัติ</option>
                        </select>                        
                     </form>
                     <!---------- End Serach reservation status ---------->

                  </div>
                  <div class="content-search-building d-flex col-xl-7">

                     <!---------- start Serach building ---------->

                     <form method="post" class="input-group">                  
                        <select class="custom-select" name="building">
                           <option value="allbuilding">อาคารทั้งหมด</option>
                           <?php
                              if(isset($_SESSION['building'])){
                                 foreach($buildings as $value){
                                    if($value == $_SESSION['building']){
                                       echo "<option value='$value' selected>$value</option>";
                                    }else{
                                       echo "<option value='$value'>$value</option>";
                                    }
                                 }
                              }else{
                                 foreach($buildings as $value){
                                    if($value == $building){
                                       echo "<option value='$value' selected>$value</option>";
                                    }else{
                                       echo "<option value='$value'>$value</option>";
                                    }                                    
                                 }
                              }
                           ?>
                        </select>
                        <button class="content-search-button px-2 rounded-right" type="submit" name="sbuilding">ค้นหา</button>
                     </form>
                     <!---------- End Serach building ---------->

                  </div>
               </div>

               <!---------- Start content-table ---------->

               <div class="content-table bg-dark">
                  <table class="text-center table table-bordered">
                     <thead>
                        <tr>
                           <th>ลำดับ</th>
                           <th>ชื่อผู้จอง</th>
                           <th>เริ่ม</th>
                           <th>สิ้นสุด</th>
                           <th>อาคาร</th>
                           <th>เลขห้อง</th>
                           <th>ห้องประชุม</th>
                           <th>เพิ่มเติม</th>
                           <th>สถานะ</th>
                           <th>แก้ไข</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                           <td><?php echo $row['rserv_Id'] ?></td>
                           <td><?php echo $row['peoplename'] ?></td>                           
                           <td><?php echo date("d-m-y",strtotime($row["startdate"])). " / " .date("H:m",strtotime($row["starttime"])) ?></td>
                           <td><?php echo date("d-m-y",strtotime($row["enddate"])). " / " .date("H:m",strtotime($row["endtime"])) ?></td>
                           <td><?php echo $row['bd_name'] ?></td>
                           <td><?php echo $row['r_code'] ?></td>
                           <td><?php echo $row['r_name'] ?></td>
                           <td><a href="peoplebookingdetail.php?id=<?php echo $row['rserv_Id']; ?>">ดูเพิ่มเติม</a></td>
                           <?php
                              if($row["rserv_status"] == "approve"){
                                 echo "<td class='text-success'>อนุมัติ</td>";
                              }elseif($row["rserv_status"] == "disapproved"){
                                 echo "<td class='text-danger'>ไม่อนุมัติ</td>";
                              }else {
                                 echo "<td class='text-primary'>รอการอนุมัติ</td>";
                              }
                           ?>
                           
                           <td><a href="../staff/editpeoplebooking.php?id=<?php echo $row['rserv_Id']; ?>" class="btn btn-warning" onclick="return confirm('ยืนยันที่จะแก้ไขการจองห้อง?')">แก้ไข</a></td>
                        </tr>
                     <?php } ?>                        
                     </tbody>
                  </table>
               </div>
               <!---------- End content-table ---------->

               <div class="content-footer row">
                  <div class="content-footer-left col-xl-7">
                     
                  </div>
                  <div class="content-footer-right d-flex justify-content-end col-xl-5">
                     
                     <!---------- start Pagination ---------->

                     <?php include("../master/pagination.php"); ?>
                     <!---------- end Pagination ---------->

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