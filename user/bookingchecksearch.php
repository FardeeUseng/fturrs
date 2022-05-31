<?php

   session_start();
   require('../dbconnect.php');

   // Start Access permission User, Staff and Admin

   if(!isset($_SESSION['user_login']) and !isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission User, Staff and Admin

   $sql3 = "SELECT * FROM building";
   $result3 = mysqli_query($connect, $sql3);
   while($row3 = mysqli_fetch_assoc($result3)){
      $buildings[] = $row3['bd_name']; 
   }

   if(isset($_SESSION['staff_login'])){
      if(isset($_GET['page'])){
         $page = $_GET['page'];
      }else{
         $page = 1;  // เลขหน้าที่จะแสดง
      }
      if(isset($_GET['page'])){

         $buildingst = $_SESSION['building'];
         $id = $_SESSION['staff_login'];
         $record_show = 12; // จำนวนข้อมูลที่จะแสดง
         $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น

      // Query Total Product
         $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN staff ON reservation.staff_Id = staff.staff_Id WHERE bd_name LIKE '%$buildingst%' AND reservation.staff_Id = $id";
         $query_total = mysqli_query($connect, $sql_total);
         $row_total = mysqli_num_rows($query_total);
      
         $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด
      
         $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN staff ON reservation.staff_Id = staff.staff_Id WHERE bd_name LIKE '%$buildingst%' AND reservation.staff_Id = $id"; 
         $sql .= " LIMIT $offset,$record_show";

         $result = mysqli_query($connect, $sql);
         $order = 1;
      // End Pagination for staff logIn
      }

      if(isset($_POST['sbuilding'])){
         $id = $_SESSION['staff_login'];
         $building = $_POST['building'];
         $page = 1;  // เลขหน้าที่จะแสดง

         $record_show = 12; // จำนวนข้อมูลที่จะแสดง
         $offset = ($page - 1) * $record_show;
         // Query Total Product
         $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN staff ON reservation.staff_Id = staff.staff_Id WHERE bd_name LIKE '%$building%' AND reservation.staff_Id = $id";
         $query_total = mysqli_query($connect, $sql_total);
         $row_total = mysqli_num_rows($query_total);
      
         $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด

         $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN staff ON reservation.staff_Id = staff.staff_Id WHERE bd_name LIKE '%$building%' AND reservation.staff_Id = $id";
         $sql .= " LIMIT $offset,$record_show";

         if($building == "allbuilding"){
            header("location:bookingcheck.php");
            unset($_SESSION['building']);
            exit();
         }
         $result = mysqli_query($connect, $sql);
         $_SESSION['building'] = $building;
         $order = 1;
      }
   }elseif(isset($_SESSION['admin_login'])){
      if(isset($_GET['page'])){
         $page = $_GET['page'];
      }else{
         $page = 1;  // เลขหน้าที่จะแสดง
      }
      if(isset($_GET['page'])){

         $buildingst = $_SESSION['building'];
         $id = $_SESSION['admin_login'];
         $record_show = 12; // จำนวนข้อมูลที่จะแสดง
         $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น

      // Query Total Product
         $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN admin ON reservation.admin_Id = admin.admin_Id WHERE bd_name LIKE '%$buildingst%' AND reservation.admin_Id = $id";
         $query_total = mysqli_query($connect, $sql_total);
         $row_total = mysqli_num_rows($query_total);
      
         $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด
      
         $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN admin ON reservation.admin_Id = admin.admin_Id WHERE bd_name LIKE '%$buildingst%' AND reservation.admin_Id = $id"; 
         $sql .= " LIMIT $offset,$record_show";

         $result = mysqli_query($connect, $sql);
         $order = 1;
      // End Pagination for staff logIn
      }

      if(isset($_POST['sbuilding'])){
         $id = $_SESSION['admin_login'];
         $building = $_POST['building'];
         $page = 1;  // เลขหน้าที่จะแสดง

         $record_show = 12; // จำนวนข้อมูลที่จะแสดง
         $offset = ($page - 1) * $record_show;
         // Query Total Product
         $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN admin ON reservation.admin_Id = admin.admin_Id WHERE bd_name LIKE '%$building%' AND reservation.admin_Id = $id";
         $query_total = mysqli_query($connect, $sql_total);
         $row_total = mysqli_num_rows($query_total);
      
         $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด

         $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN admin ON reservation.admin_Id = admin.admin_Id WHERE bd_name LIKE '%$building%' AND reservation.admin_Id = $id";
         $sql .= " LIMIT $offset,$record_show";

         if($building == "allbuilding"){
            header("location:bookingcheck.php");
            unset($_SESSION['building']);
            exit();
         }
         $result = mysqli_query($connect, $sql);
         $_SESSION['building'] = $building;
         $order = 1;
      }
   }elseif(isset($_SESSION['user_login'])){
      if(isset($_GET['page'])){
         $page = $_GET['page'];
      }else{
         $page = 1;  // เลขหน้าที่จะแสดง
      }
      if(isset($_GET['page'])){

         $buildingst = $_SESSION['building'];
         $id = $_SESSION['user_login'];
         $record_show = 12; // จำนวนข้อมูลที่จะแสดง
         $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น

      // Query Total Product
         $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN users ON reservation.users_Id = users.users_Id WHERE bd_name LIKE '%$buildingst%' AND reservation.users_Id = $id";
         $query_total = mysqli_query($connect, $sql_total);
         $row_total = mysqli_num_rows($query_total);
      
         $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด
      
         $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN users ON reservation.users_Id = users.users_Id WHERE bd_name LIKE '%$buildingst%' AND reservation.users_Id = $id"; 
         $sql .= " LIMIT $offset,$record_show";

         $result = mysqli_query($connect, $sql);
         $order = 1;
      // End Pagination for staff logIn
      }

      if(isset($_POST['sbuilding'])){
         $id = $_SESSION['user_login'];
         $building = $_POST['building'];
         $page = 1;  // เลขหน้าที่จะแสดง

         $record_show = 12; // จำนวนข้อมูลที่จะแสดง
         $offset = ($page - 1) * $record_show;
         // Query Total Product
         $sql_total = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN users ON reservation.users_Id = users.users_Id WHERE bd_name LIKE '%$building%' AND reservation.users_Id = $id";
         $query_total = mysqli_query($connect, $sql_total);
         $row_total = mysqli_num_rows($query_total);
      
         $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด

         $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN users ON reservation.users_Id = users.users_Id WHERE bd_name LIKE '%$building%' AND reservation.users_Id = $id";
         $sql .= " LIMIT $offset,$record_show";

         if($building == "allbuilding"){
            header("location:bookingcheck.php");
            unset($_SESSION['building']);
            exit();
         }
         $result = mysqli_query($connect, $sql);
         $_SESSION['building'] = $building;
         $order = 1;
      }
   }

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
      color:#585858;
   }
   .main-manu-items li:nth-child(4){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(4) h3{
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
   .content-search-button{
      background-color:#3D5538;
      color:#F0F8FF;
   }
   .content-search{
      justify-content:flex-end;
   }
   .content-search form{
      width:400px;
   }
   .custom-select option{
      background-color:#E9F1E6;
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
      .content-search form{
         width:350px;
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
         font-size:12px;
      }
      .content-table th:nth-child(3), .content-table td:nth-child(3), .content-table th:nth-child(4), .content-table td:nth-child(4), .content-table th:nth-child(5), .content-table td:nth-child(5){
         display:none;
      }
   }
   /********** End 576px screen **********/

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
               <a href="../index.php"><img src="../img/menu-logo/online-booking.png" alt=""></a>
               <a href="../index.php"><h3 class="ml-3">FTU RRS</h></a>
            </div>
            
            <!---------- start main-manu-items ---------->

               <?php include('../master/main-menu-user.php') ?>
            <!---------- End main-manu-items ---------->

            <!---------- start Inform ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('../master/inform.php'); ?>
            <?php endif ?>
            <!---------- start Inform ---------->

         </div>

         <div class="main-content col-xl-9">
            <div class="content-container mt-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/booking2.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>การจองห้องของคุณ</h3>
                  </div>
               </div>

               <!---------- Start Search building ---------->

               <div class="content-search d-flex mt-5 mb-4">
                  <form action="" method="post" class="input-group">                  
                     <select class="custom-select" name="building" id="">
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
               </div>
               <!---------- End Search building ---------->

               <!--------- Start Content-table ---------->

               <div class="content-table bg-dark">
                  <table class="text-center table table-bordered">
                     <thead>
                        <tr>
                           <th>ลำดับ</th>
                           <th>ชื่อผู้จอง</th>
                           <th>เริ่ม</th>
                           <th>สิ้นสุด</th>
                           <th>ห้อง</th>
                           <th>ชื่อห้องประชุม</th>
                           <th>สถานะ</th>
                           <th>ยกเลิก</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                           <td><?php echo $order++; ?></td>
                           <td><?php echo $row["peoplename"] ?></td>                           
                           <td><?php echo date("d-m-y",strtotime($row["startdate"])). " / " .date("H:m",strtotime($row["starttime"])) ?></td>
                           <td><?php echo date("d-m-y",strtotime($row["enddate"])). " / " .date("H:m",strtotime($row["endtime"])) ?></td>
                           <td><?php echo $row["r_code"] ?></td>
                           <td><?php echo $row["r_name"] ?></td>                           
                           <?php
                              if($row["rserv_status"] == "อนุมัติ"){
                                 echo "<td class='text-success'>อนุมัติ</td>";
                              }elseif($row["rserv_status"] == "ไม่อนุมัติ"){
                                 echo "<td class='text-danger'>ไม่อนุมัติ</td>";
                              }else{
                                 echo "<td class='text-primary'>รอการอนุมัติ</td>";
                              }
                           ?>
                           
                           <td><a href="canclebooking.php?id=<?php echo $row["rserv_Id"] ?>" class="btn btn-danger p-1" onclick="return confirm('ยืนยันที่ต้องการยกเลิกการจอง')">ยกเลิก</a></td>
                        </tr>
                     <?php } ?>
                     </tbody>
                  </table>
               </div>
               <!--------- End Content-table ---------->

               <div class="content-footer row">
                  <div class="content-footer-left col-xl-7">
                     
                  </div>
                  <div class="content-footer-right d-flex justify-content-end col-xl-5">

                     <!--------- Start Pagination ---------->

                     <?php include("../master/pagination.php"); ?>
                     <!--------- End Pagination ---------->

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
   <?php include('../master/footer-user.php') ?>
</footer>
<!---------- end footer ---------->

</body>
</html>