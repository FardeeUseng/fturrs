<?php
   session_start();
   require("dbconnect.php");

   // Start Pagination

   if(isset($_GET['page'])){
      $page = $_GET['page'];
   }else{
      $page = 1;  // เลขหน้าที่จะแสดง
   }

   $record_show = 12; // จำนวนข้อมูลที่จะแสดง
   $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น

   // Query Total Product
   $sql_total = "SELECT * FROM reservation";
   $query_total = mysqli_query($connect, $sql_total);
   $row_total = mysqli_num_rows($query_total);

   $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด

   $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id ORDER BY rserv_status DESC"; 
   $sql .= " LIMIT $offset,$record_show";

   $result = mysqli_query($connect, $sql);
   // End Pagination

?>

<!DOCTYPE html>
<html lang="en">

<!---------- start head ---------->

<head>
   <?php include('./master/head.php') ?>
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
   .main-manu-items li:nth-child(2){
      background-color:#3D5538;
      position:relative;
   }
   .main-manu-items li:nth-child(2) h3{
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
   .content-footer-bottom{
      height:50px;
      align-items:center;
   }
   .content-footer-bottom img{
      width:50px;
      height:50px;
   }
   .content-footer-bottom p {
      margin:10px;
      font-size:25px;
      color:#585858;
   }
   /********** End Content **********/

   /********** Start Content Table **********/

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
   /********** End Content Table **********/

</style>
<!---------- End Inform ---------->
   
<!---------- start header ---------->

<header>
   <?php include('./master/header.php') ?>
</header>
<!---------- end header ---------->


<!---------- start content ---------->

<div class="content">
   <div class="container-fluid">
      <div class="main row">
         <div class="main-menu p-0 col-xl-3">
            <div class="main-menu-logo d-flex">
               <img src="img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>
            
            <!---------- Start main-manu-items ---------->

               <?php include('./master/main-menu.php') ?>
            <!---------- End main-manu-items ---------->
            
            <!---------- Start Inform ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('./master/inform.php'); ?>
            <?php endif ?>
            <!---------- End Inform ---------->

         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mx-5 my-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="img/menu-logo/booking.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>ข้อมูลการจองห้องประชุม</h3>
                  </div>
               </div>
               <div class="content-search d-flex mt-5 mb-4">

                  <!---------- Start building information ---------->

                  <form action="bookingdetailsearch.php" method="post" class="input-group">                  
                     <select class="custom-select" name="building" id="">
                        <option value="" selected disabled>อาคารทั้งหมด</option>
                        <?php
                           $sql2 = "SELECT * FROM building";
                           $result2 = mysqli_query($connect, $sql2);
                           $row2 = mysqli_fetch_array($result2);
                           foreach($result2 as $value){
                              echo "<option value='{$value['bd_name']}'>{$value['bd_name']}</option>";
                           }
                        ?>
                     </select>
                     <button class="content-search-button px-2 rounded-right" type="submit" name="sbuilding">ค้นหา</button>
                  </form>
                  <!---------- End building information ---------->

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
                           <th>รหัสห้อง</th>
                           <th>ห้องประชุม</th>                           
                           <th>สถานะ</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                           <td><?php echo $row["rserv_Id"]; ?></td>
                           <td><?php echo $row["peoplename"]; ?></td>
                           <td><?php echo date("d-m-y",strtotime($row["startdate"])). " / " .date("H:m",strtotime($row["starttime"])) ?></td>
                           <td><?php echo date("d-m-y",strtotime($row["enddate"])). " / " .date("H:m",strtotime($row["endtime"])) ?></td>
                           <td><?php echo $row["bd_name"] ?></td>
                           <td><?php echo $row["r_code"] ?></td>
                           <td><?php echo $row["r_name"] ?></td>
                           <?php
                              if($row["rserv_status"] === "approve"){
                                 echo "<td class='text-success'>อนุมัติ</td>";
                              }elseif($row["rserv_status"] === "disapproved"){
                                 echo "<td class='text-danger'>ไม่อนุมัติ</td>";
                              }else{
                                 echo "<td class='text-primary'>รอการอนุมัติ</td>";
                              }
                           ?>
                           
                        </tr>
                     <?php } ?>
                     </tbody>
                  </table>
                  <!-- <div id="pagination_controls"><?php echo $paginationCtrls; ?></div> -->
               </div>
               <!---------- End content-table ---------->

               <div class="content-footer row">
                  <div class="content-footer-left col-7">
                     
                  </div>

                  <!---------- Start Pagination ---------->

                  <div class="content-footer-right d-flex justify-content-end col-5">
                     <?php include("./master/pagination.php"); ?>
                  </div>
                  <!---------- End Pagination ---------->

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!---------- end content ---------->

<!---------- start footer ---------->

<footer>
   <?php include('./master/footer.php'); ?>
</footer>
<!---------- end footer ---------->

   <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>