<?php

   session_start();
   require('../dbconnect.php');

   $id = $_GET["id"];
   $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN organization ON reservation.org_Id = organization.org_Id LEFT JOIN major ON reservation.major_Id = major.major_Id WHERE rserv_Id = $id";
   $result = mysqli_query($connect, $sql);
   $row = mysqli_fetch_assoc($result);

   // Start Access permission Staff and Admin

   if(!isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Staff and Admin

   if($_POST){
      $rserv_id = $_POST["id"];
      $rserv_status = $_POST["rserv_status"];
      $sql = "UPDATE reservation SET rserv_status = '$rserv_status' WHERE rserv_Id = $rserv_id";
      $result = mysqli_query($connect, $sql);

      if($result){
         header("location:bookingedit.php");
         exit();
      }else{
         echo "เกิดข้อผิดพลาด" . mysqli_error($connect);
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
   /********** End Content **********/

   /********** Start Edit Booking **********/

   .editbooking{
      background-color:#D7E6D5;
      width:auto;
      margin:50px 0px;
      border-radius:3px;
      padding-top:30px;
   }
   .editbooking-container h3{
      font-size:40px;
      margin-bottom:25px;
      color:#585858;
   }
   .editbooking-container input,.editbooking-container select{
      background-color:#BAC9B8;
      border: 2px solid #3D5538;
      border-radius:6px;
      height:60px;
      width:640px;
      margin-bottom:25px;
      margin-left:10px;
      color:#585858;
      font-size:30px;
      padding-left:20px;
   }
   .editbooking-button button:nth-child(1){
      background-color:#FBA535;
      
   }
   .editbooking-button button:nth-child(1):hover{
      background-color:#F6B35B;
      
   }
   .editbooking-button button:nth-child(2){
      background-color:#F61414;
      margin-left:20px;
   }
   .editbooking-button button:nth-child(2):hover{
      background-color:#EE5151;
   }
   .editbooking-button button{
      border:none;
      border-radius:5px;
      margin-top:10px;
      width:180px;
      height:50px;
      color:#FAFCF9;
      font-size:30px;
   }
   .editbooking-building select{
      margin-left:110px;
   }
   .editbooking-room select{
      margin-left:144px;
   }
   .editbooking-startdate input{
      margin-left:38px;
   }
   .editbooking-enddate input{
      margin-left:42px;
   }
   .editbooking-starttime input{
      margin-left:31px;
   }
   .editbooking-endtime input{
      margin-left:37px;
   }
   .editbooking-email input{
      margin-left:125px;
   }
   .editbooking-phone input{
      margin-left:65px;
   }
   .editbooking-status select{
      margin-left:65px;
   }
   /********** End Edit Booking **********/

   /********** Start 1800px screen **********/

   @media screen and (min-width:1800px){
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
      .content-container{
         margin-left:20px;
      }
      .editbooking-container input,.editbooking-container select{
         height:60px;
         width:940px;
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
         width:0px;
         height:50px;
      }
      .content-header-h h3{
         font-size:30px;
      }
      .editbooking-container h3{
         font-size:30px;
      }
      .editbooking-container input,.editbooking-container select{
         height:50px;
         width:400px;;
         font-size:25px;
      }
      .editbooking-building select{
         margin-left:84px;
      }
      .editbooking-room select{
         margin-left:109px;
      }
      .editbooking-startdate input{
         margin-left:29px;
      }
      .editbooking-enddate input{
         margin-left:33px;
      }
      .editbooking-starttime input{
         margin-left:25px;
      }
      .editbooking-endtime input{
         margin-left:29px;
      }
      .editbooking-email input{
         margin-left:96px;
      }
      .editbooking-phone input{
         margin-left:51px;
      }
      .editbooking-status select{
         margin-left:52px;
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
      .editbooking-building{
         display:block;
      }
      .editbooking-container input,.editbooking-container select{
         height:50px;
         width:400px;;
         margin-left:0px;
         margin-top:-20px;
      }
      .editbooking-button button{
         width:150px;
         height:50px;
         font-size:28px;
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
      .editbooking-container h3{
         font-size:25px;
      }
      .editbooking-container input,.editbooking-container select{
         height:45px;
         width:310px;
         font-size:18px;
      }
      .editbooking-button button{
         font-size:25px;
         height:40px;
         width:100px;
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
               <a href="../index.php"><h3 class="ml-3">FTU RRS</h3></a>
            </div>

            <!---------- Start main-manu-items ---------->

            <?php include('../master/main-menu-user.php') ?>
            <!---------- End main-manu-items ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('../master/inform.php'); ?>
            <?php endif ?>

         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mt-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/edit.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>แก้ไขการจองห้อง</h3>
                  </div>
               </div>

               <!---------- Start Edit booking ---------->
               
               <div class="editbooking">
                  <div class="editbooking-container p-4">
                     <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="editbooking-name d-md-flex">
                           <h3>ชื่อ-นามสกุล: </h3>
                           <input type="text" name="name" value="<?php echo $row['peoplename'] ?>" disabled>
                        </div>
                        <div class="editbooking-building d-md-flex">
                           <h3>อาคาร: </h3>
                           <select name="building">
                              <?php echo "<option value='{$row['bd_Id']}' selected disabled>{$row['bd_name']}</option>"; ?>
                           </select>
                        </div>
                        <div class="editbooking-room d-md-flex">
                           <h3>ห้อง: </h3>
                           <select name="room">
                              <?php echo "<option value='{$row['room_Id']}' selected disabled>{$row['r_name']}</option>"; ?>
                           </select>
                        </div>
                        <div class="editbooking-startdate d-md-flex">
                           <h3>เริ่มต้นวันที่: </h3>
                           <input type="date" name="startdate" value="<?php echo $row['startdate']; ?>" disabled>
                        </div>
                        <div class="editbooking-enddate d-md-flex">
                           <h3>สิ้นสุดวันที่: </h3>
                           <input type="date" name="enddate" value="<?php echo $row['enddate']; ?>" disabled>
                        </div>
                        <div class="editbooking-starttime d-md-flex">
                           <h3>เริ่มต้นเวลา: </h3>
                           <input type="time" name="starttime" value="<?php echo $row['starttime']; ?>" disabled>
                        </div>
                        <div class="editbooking-endtime d-md-flex">
                           <h3>สิ้นสุดเวลา: </h3>
                           <input type="time" name="endtime" value="<?php echo $row['endtime'] ?>" disabled>
                        </div>
                        <div class="editbooking-email d-md-flex">
                           <h3>อีเมล: </h3>
                           <input type="email" name="email" value="" disabled>
                        </div>
                        <div class="editbooking-phone d-md-flex">
                           <h3>เบอร์โทร: </h3>
                           <input type="number" name="phonenum" value="<?php echo $row['phone']; ?>" disabled>
                        </div>
                        <div class="editbooking-status d-md-flex">
                           <h3>สถานะ *: </h3>
                           <select name="rserv_status">
                              <?php
                                 if($row["rserv_status"] == "approve"){
                                    echo "<option value='approve' class='text-success' selected>อนุมัติ</option>";
                                    echo "<option value='disapproved' class='text-danger'>ไม่อนุมัติ</option>";
                                    echo "<option value='pendingApproval' class='text-primary'>รอการอนุมัติ</option>";
                                 }elseif($row["rserv_status"] == "disapproved"){
                                    echo "<option value='อนุมัติ' class='text-success'>อนุมัติ</option>";
                                    echo "<option value='disapproved' class='text-danger' selected>ไม่อนุมัติ</option>";
                                    echo "<option value='pendingApproval' class='text-primary'>รอการอนุมัติ</option>";
                                 }else{
                                    echo "<option value='อนุมัติ' class='text-success'>อนุมัติ</option>";
                                    echo "<option value='disapproved' class='text-danger'>ไม่อนุมัติ</option>";
                                    echo "<option value='pendingApproval' class='text-primary' selected>รอการอนุมัติ</option>";
                                 }
                              ?>
                           </select>
                        </div>
                        <div class="editbooking-button">
                           <button type="submit" onclick="return confirm('ยืนยันที่จะแก้ไขข้อมูล?')">แก้ไข</button>
                           <button type="reset" onclick="javascript:location.href='bookingedit.php'">ยกเลิก</button>
                        </div>
                     </form>                    
                  </div>
               </div>
               <!---------- End Edit booking ---------->

               <!-- Start content-footer -->
               
               <div class="content-footer row">
               

               </div>
               <!-- End content-footer -->

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

</body>
</html>