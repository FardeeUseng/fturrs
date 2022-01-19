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
   // End select building

   // Start pagination for staff login

   if(isset($_SESSION['staff_login'])){

      $st_bd = $_SESSION['staff_bd'];
      $rservstatusst = $_SESSION['building'];

      if(isset($_GET['page'])){
         $page = $_GET['page'];
      }else{
         $page = 1;  // เลขหน้าที่จะแสดง
      }         
      $record_show = 12; // จำนวนข้อมูลที่จะแสดง
      $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น

      // Query Total Product
      $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE rserv_status = '$rservstatusst' AND building.bd_Id = $st_bd ORDER BY rserv_status ASC";
      $query_total = mysqli_query($connect, $sql_total);
      $row_total = mysqli_num_rows($query_total);
   
      $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด
   
      $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE rserv_status = '$rservstatusst' AND building.bd_Id = $st_bd ORDER BY rserv_status ASC"; 
      $sql .= " LIMIT $offset,$record_show";
      $result = mysqli_query($connect, $sql);
      // $_SESSION['building'] = $building;

      if(isset($_POST['status'])){

         $st_bs = $_SESSION['staff_bd'];
         $rservstatus = $_POST['rservstatus'];
         $page = 1;  // เลขหน้าที่จะแสดง

         $record_show = 12; // จำนวนข้อมูลที่จะแสดง
         $offset = ($page - 1) * $record_show;
         // Query Total Product
         $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE rserv_status = '$rservstatus' AND building.bd_Id = $st_bd";

         $query_total = mysqli_query($connect, $sql_total);
         $row_total = mysqli_num_rows($query_total);
      
         $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด

         $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE rserv_status = '$rservstatus' AND building.bd_Id = $st_bd";
         $sql .= " LIMIT $offset,$record_show";

         if($rservstatus == "allstatus"){
            header("location:bookingedit.php");
            exit();
         }
         $result = mysqli_query($connect, $sql);
         $_SESSION['building'] = $rservstatus;
         $_SESSION['rservstatus'] = $rservstatus;
      }
   }
   // End pagination for staff login

   // Start pagination for admin login

   if(isset($_SESSION['admin_login'])){

      $rservstatusad = $_SESSION['building'];
      if(isset($_GET['page'])){
         $page = $_GET['page'];
      }else{
         $page = 1;  // เลขหน้าที่จะแสดง
      }         
      $record_show = 1; // จำนวนข้อมูลที่จะแสดง
      $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น

      // Query Total Product
      $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE rserv_status = '$rservstatusad' ORDER BY rserv_status ASC";
      $query_total = mysqli_query($connect, $sql_total);
      $row_total = mysqli_num_rows($query_total);
   
      $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด
   
      $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE rserv_status = '$rservstatusad' ORDER BY rserv_status ASC"; 
      $sql .= " LIMIT $offset,$record_show";
      $result = mysqli_query($connect, $sql);
      // $_SESSION['building'] = $building;
      
      if(isset($_POST['status'])){

         // Query Total Product
         $rservstatus = $_POST['rservstatus'];
         $page = 1;  // เลขหน้าที่จะแสดง
         $record_show = 1; // จำนวนข้อมูลที่จะแสดง
         $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น

         $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE rserv_status = '$rservstatus'";
         $query_total = mysqli_query($connect, $sql_total);
         $row_total = mysqli_num_rows($query_total);
      
         $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด

         $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE rserv_status = '$rservstatus'";
         $sql .= " LIMIT $offset,$record_show";

         if($rservstatus == "allstatus"){
            header("location:bookingedit.php");
            exit();
         }
         $result = mysqli_query($connect, $sql);
         $_SESSION['building'] = $rservstatus;
         $_SESSION['rservstatus'] = $rservstatus;
      }
   }
   // End pagination for admin login

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

                     <!---------- start search reservation status ---------->

                     <form method="post" class="input-group" style="width:350px">
                        <button class="content-search-button px-2 rounded-left" type="submit" name="status">เลือกสถานะ</button>
                        <?php if($_SESSION['rservstatus'] === "pendingApproval"): ?> 
                           <select class="custom-select" name="rservstatus" >
                              <option value="allstatus">สถานะทั้งหมด</option>
                              <option value="pendingApproval" selected>รอการอนุมัติ</option>
                              <option value="approve">อนุมัติ</option>
                              <option value="disapproved">ไม่อนุมัติ</option>
                           </select>
                        <?php elseif($_SESSION['rservstatus'] === "approve"): ?>
                           <select class="custom-select" name="rservstatus" >
                              <option value="allstatus">สถานะทั้งหมด</option>
                              <option value="pendingApproval">รอการอนุมัติ</option>
                              <option value="approve" selected>อนุมัติ</option>
                              <option value="disapproved">ไม่อนุมัติ</option>
                           </select>
                        <?php elseif($_SESSION['rservstatus'] === "disapproved"): ?>
                           <select class="custom-select" name="rservstatus" >
                              <option value="allstatus">สถานะทั้งหมด</option>
                              <option value="pendingApproval">รอการอนุมัติ</option>
                              <option value="approve">อนุมัติ</option>
                              <option value="disapproved" selected>ไม่อนุมัติ</option>
                           </select>
                        <?php else: ?>
                           <select class="custom-select" name="rservstatus" >
                              <option value="allstatus">สถานะทั้งหมด</option>
                              <option value="pendingApproval">รอการอนุมัติ</option>
                              <option value="approve">อนุมัติ</option>
                              <option value="disapproved">ไม่อนุมัติ</option>
                           </select> 
                        <?php endif ?>                                                           
                     </form>
                     <!---------- End search reservation status ---------->

                  </div>
                  <div class="content-search-building d-flex col-xl-7">

                     <!---------- Start search building ---------->

                     <form action="bookingeditsearch.php" method="post" class="input-group">                  
                        <select class="custom-select" name="building">                           
                           <?php
                              $sql2 = "SELECT * FROM building";
                              $result2 = mysqli_query($connect, $sql2);
                              $row2 = mysqli_fetch_array($result2);
                              if(isset($_SESSION['staff_login'])){
                                 echo "<option value='{$_SESSION['bd_Id']}'>{$_SESSION['bd_name']}</option>";
                              }else{
                                 echo "<option value='allbuilding'>อาคารทั้งหมด</option>";
                                 foreach($result2 as $value){
                                    echo "<option name='building' value='{$value['bd_name']}'>{$value['bd_name']}</option>";
                                 }
                              }
                           ?>
                        </select>
                        <?php if(isset($_SESSION['staff_login'])){
                           echo "<button class='content-search-button px-2 rounded-right' type='submit' name='sbuilding' disabled>ค้นหา</button>";
                        }else{
                           echo "<button class='content-search-button px-2 rounded-right' type='submit' name='sbuilding'>ค้นหา</button>";
                        } ?>
                        
                     </form>
                     <!---------- End search building ---------->

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
                              if($row["rserv_status"] === "approve"){
                                 echo "<td class='text-success'>อนุมัติ</td>";
                              }elseif($row["rserv_status"] === "pendingApproval"){
                                 echo "<td class='text-primary'>รอการอนุมัติ</td>";
                              }else{
                                 echo "<td class='text-danger'>ไม่อนุมัติ</td>";
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

                     <!---------- start pagination ---------->

                     <?php include("../master/pagination.php"); ?>
                     <!---------- End pagination ---------->
                     
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