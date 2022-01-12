<?php
   session_start();
   require('dbconnect.php');

   // Start Select tables Room, Staff, Building Code

   $sql = "SELECT * FROM room LEFT JOIN staff ON room.staff_Id = staff.staff_Id LEFT JOIN building ON room.bd_Id = building.bd_Id ORDER BY room.room_Id ASC";
   $result = mysqli_query($connect,$sql);
   // End Select tables Room, Staff, Building Code

?>

<!DOCTYPE html>
<html lang="en">

<!---------- start head ---------->

<head>
   <?php include('./master/head.php'); ?>
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
   /********** End table **********/

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
                  <form action="checkroomsearch.php" method="post" class="input-group">                  
                     <select class="custom-select" name="building" id="">
                        <option value="" selected disabled>อาคารทั้งหมด</option>
                        <?php
                           $sql2 = "SELECT * FROM building";
                           $result2 = mysqli_query($connect, $sql2);
                           $row2 = mysqli_fetch_array($result2);
                           foreach($result2 as $value){
                              echo "<option name='building' value='{$value['bd_name']}'>{$value['bd_name']}</option>";
                           }
                        ?>
                     </select>
                     <button class="content-search-button px-2 rounded-right" type="submit">ค้นหา</button>
                  </form>
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
   <?php include('./master/footer.php'); ?>
</footer>
<!---------- end footer ---------->

   <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>