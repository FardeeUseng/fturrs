<?php
   session_start();
   require("dbconnect.php");

   $building = $_POST['building'];
   $sql = "SELECT * FROM reservation INNER JOIN building ON reservation.bd_Id = building.bd_Id INNER JOIN room ON reservation.room_Id = room.room_Id WHERE bd_name LIKE '%$building%' ORDER BY bd_name ASC"; 
   $result = mysqli_query($connect, $sql);

   $sql3 = "SELECT * FROM building";
   $result3 = mysqli_query($connect, $sql3);
   while($row3 = mysqli_fetch_assoc($result3)){
      $buildings[] = $row3['bd_name']; 
   }

   if($_POST){
      $building = $_POST['building'];
      $sql = "SELECT * FROM reservation INNER JOIN building ON reservation.bd_Id = building.bd_Id INNER JOIN room ON reservation.room_Id = room.room_Id WHERE bd_name LIKE '%$building%' ORDER BY bd_name ASC"; 
      $result = mysqli_query($connect, $sql);
      if($_POST["building"] == "allbuilding"){
         header("location:bookingdetail.php");
         exit();
      }
   }
?>

<!DOCTYPE html>
<html lang="en">

<!---------- start head ---------->

<head>
   <?php include('./master/head.php') ?>
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
   .main-manu-items li:nth-child(2){
      background-color:#3D5538;
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
      font-size:30px;
      font-weight: normal;
   }
   .content-table td{
      font-size:20px;
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
                  <form method="post" class="input-group">                  
                     <select class="custom-select" name="building" id="">
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
                     
                     <button class="content-search-button px-2 rounded-right" type="submit">ค้นหา</button>
                  </form>
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
                           <th>รหัสห้อง</th>
                           <th>ห้องประชุม</th>                           
                           <th>สถานะ</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php while($row=mysqli_fetch_array($result)){ ?>
                        <tr>
                           <td><?php echo $row["rserv_Id"]; ?></td>
                           <td><?php echo $row["peoplename"]; ?></td>
                           <td><?php echo $row["startdate"]. " / " .$row["starttime"] ?></td>
                           <td><?php echo $row["enddate"]. " / " .$row["endtime"] ?></td>
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
                           
                        </tr>
                     <?php } ?>
                     </tbody>
                  </table>
               </div>
               <!---------- End content-table ---------->

               <div class="content-footer row">
                  <div class="content-footer-left col-7">
                     <p class="">จาก 1 ถึง 20 ทั้งหมด 100</p>
                  </div>
                  <div class="content-footer-right col-5">
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
   <?php include('./master/footer.php'); ?>
</footer>
<!---------- end footer ---------->

   <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>