<?php
   session_start();
   require('dbconnect.php');

   // Start Select all Building

   $sql3 = "SELECT * FROM building";
   $result3 = mysqli_query($connect, $sql3);
   while($row3 = mysqli_fetch_assoc($result3)){
      $buildings[] = $row3['bd_name']; 
   }
   // End Select all Building

   // Start Pagination

   if(isset($_GET['page'])){
      $page = $_GET['page'];
   }else{
      $page = 1;  // เลขหน้าที่จะแสดง
   }

   if(isset($_GET['page'])){
      $building = $_SESSION['building'];
      $record_show = 1; // จำนวนข้อมูลที่จะแสดง
      $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น
   
      // Query Total Product

      $sql_total = "SELECT * FROM room LEFT JOIN staff ON room.staff_Id = staff.staff_Id LEFT JOIN building ON room.bd_Id = building.bd_Id WHERE bd_name LIKE '%$building%'";
      $query_total = mysqli_query($connect, $sql_total);
      $row_total = mysqli_num_rows($query_total);
      
      $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด
   
      $sql = "SELECT * FROM room LEFT JOIN staff ON room.staff_Id = staff.staff_Id LEFT JOIN building ON room.bd_Id = building.bd_Id WHERE bd_name LIKE '%$building%'";
      $sql .= " LIMIT $offset,$record_show";
   
      $result = mysqli_query($connect, $sql);
   }
   
   if(isset($_POST['sbuilding'])){
   
      $building = $_POST['building'];
      $page = 1;  // เลขหน้าที่จะแสดง
   
      $record_show = 12; // จำนวนข้อมูลที่จะแสดง
      $offset = ($page - 1) * $record_show;  //เลขเริ่มต้น
      
      // Query Total Product

      $sql_total = "SELECT * FROM room LEFT JOIN staff ON room.staff_Id = staff.staff_Id LEFT JOIN building ON room.bd_Id = building.bd_Id WHERE bd_name LIKE '%$building%'";
      $query_total = mysqli_query($connect, $sql_total);
      $row_total = mysqli_num_rows($query_total);
      
      $page_total = ceil($row_total/$record_show); //จำนวนหน้าทั้งหมด
   
   
      $sql = "SELECT * FROM room LEFT JOIN staff ON room.staff_Id = staff.staff_Id LEFT JOIN building ON room.bd_Id = building.bd_Id WHERE bd_name LIKE '%$building%' ORDER BY bd_name";
         
      $sql .= " LIMIT $offset,$record_show";
         
      if($_POST["building"] == "allbuilding"){
         header("location:checkroom.php");
         unset($_SESSION['building']);
         exit();
      }
      $result = mysqli_query($connect, $sql);
      $_SESSION['building'] = $building;
   }
   // End Pagination

?>

<!DOCTYPE html>
<html lang="en">

<!---------- start head ---------->

<head>
   <?php include('./master/head.php'); ?>
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
   .main-manu-items li:nth-child(3){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(3) h3{
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

</style>
<!---------- End style ---------->
   
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

               <?php include('./master/main-menu.php'); ?>
            <!---------- Start main-manu-items ---------->
            
         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mx-5 my-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="img/menu-logo/meeting-room.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>รายการห้องประชุม</h3>
                  </div>
               </div>
               <div class="content-search d-flex mt-5 mb-4">

                  <!---------- start search building ---------->

                  <form method="post" class="input-group">                  
                     <select class="custom-select" name="building">
                        <option value="allbuilding">อาคารทั้งหมด</option>
                        <?php
                           foreach($buildings as $value){
                              if($value == $building){
                                 echo "<option value='$value' selected>$value</option>";
                              }else{
                                 echo "<option value='$value'>$value</option>";
                              }
                              
                           }
                        ?>
                     </select>
                     <button class="content-search-button px-2 rounded-right" type="submit" name="sbuilding">ค้นหา</button>
                  </form>
                  <!---------- End search building ---------->

               </div>

               <!---------- Start Content-table ---------->

               <div class="content-table bg-dark">
                  <table class="text-center table table-bordered">
                     <thead>
                        <tr>
                           <th>ลำดับ</th>
                           <th>อาคาร</th>
                           <th>ชื่อห้องประชุม</th>                           
                           <th>รองรับ</th>
                           <th>ผู้ดูแล</th>
                           <th>โทร</th>
                           <th>สถานะ</th>
                           <th>รายละเอียด</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php while($row=mysqli_fetch_array($result)){ ?>
                        <tr>
                           <td><?php echo $row['room_Id']; ?></td>
                           <td><?php echo $row['bd_name']; ?></td>
                           <td><?php echo $row['r_code'] . $row['r_name']; ?></td>                           
                           <td><?php echo $row['r_capacity'] ?></td>
                           <td><?php echo $row['st_name']; ?></td>
                           <td><?php echo $row['st_phone'] ?></td>
                           <td>
                              <?php 
                              if($row['r_status']=="available"){
                                 echo "<p class='text-success'>ใช้งานได้</p>";
                              }else if($row['r_status']=="notavailable"){
                                 echo "<p class='text-danger'>ปิดปรับปรุง</p>";
                              }
                              ?>
                           </td>
                           <td><a href="roommoredetail.php?id=<?php echo $row['room_Id']; ?>">ดูเพิ่มเติม</a></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
               <!---------- End Content-table ---------->

               <div class="content-footer row">
                  <div class="content-footer-left col-xl-7">                     
                  </div>

                  <!---------- Start pagination ---------->

                  <div class="content-footer-right d-flex justify-content-end col-xl-5">
                     <?php include("./master/pagination.php"); ?>
                  </div>
                  <!---------- End pagination ---------->
                  
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