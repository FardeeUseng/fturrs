<?php

   session_start();
   require('../dbconnect.php');
   
   // Start select reservation

   $id = $_GET["id"];
   $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN organization ON reservation.org_Id = organization.org_Id LEFT JOIN major ON reservation.major_Id = major.major_Id WHERE rserv_Id = $id";
   $result = mysqli_query($connect, $sql);
   $row = mysqli_fetch_assoc($result);
   // End select reservation

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
   .main-manu-items li:nth-child(6){
      background-color:#3D5538;
      position:relative;
   }
   .main-manu-items li:nth-child(6) h3{
      color:#F0F8FF;
   }
   /********** End Main menu **********/

   /********** Start Content Title **********/

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
   /********** End Content Title**********/

   /********** Start Cintent detail **********/

   .booking-detail{
      background-color:#D7E6D5;
      width:auto;
      margin:50px 0px;
      border-radius:3px;
   }
   .booking-detail-container h3{
      margin-left:25px;
      font-size:35px;
      margin-bottom:30px;
      color:#585858;
   }
   .booking-detail-container p{
      margin-left:35px;
      color:#585858;
      font-size:30px;
   }
   /********** End Cintent detail **********/

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
      .booking-header{
         height:70px;
      }
      .content-title-img img{
         width:50px;
         height:50px;
      }
      .content-header-h h3{
         font-size:30px;
      }
      .booking-detail-container h3{
         font-size:25px;
      }
      .booking-detail-container p{
         font-size:22px;
         margin-left:35px;
      }
   }
   /********** End 1200px screen **********/

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
      .booking-detail-container h3,.booking-detail-container p{
         font-size:18px;
      }
      .booking-detail-container p{
         margin-left:5px;
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
               <img src="../img/menu-logo/online-booking.png" alt="">
               <h3 class="ml-3">FTU RRS</h>
            </div>

            <!---------- Start main-manu-items ---------->

            <?php include('../master/main-menu-user.php') ?>
            <!---------- End main-manu-items ---------->

            <!---------- Start inform ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('../master/inform.php'); ?>
            <?php endif ?>
            <!---------- End inform ---------->

         </div>

         <div class="main-content col-xl-9">
            <div class="content-container mt-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/booking.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>รายละเอียดการจองห้อง</h3>
                  </div>
               </div>

               <!---------- Start booking-detail ---------->

               <div class="booking-detail">
                  <div class="booking-detail-container py-5 px-sm-5">
                     <div class="booking-detail-name d-flex">
                        <h3>ชื่อผู้จอง : </h3>
                        <p><?php echo $row["peoplename"]; ?></p>
                     </div>
                     <div class="booking-detail-building d-flex">
                        <h3>อาคาร : </h3>
                        <p><?php echo $row["bd_name"] ?></p>
                     </div>
                     <div class="booking-detail-room d-flex">
                        <h3>เลขห้อง : </h3>
                        <p><?php echo $row["r_code"] ?></p>
                     </div>
                     <div class="booking-detail-nameroom d-flex">
                        <h3>ชื่อห้อง : </h3>
                        <p><?php echo $row["r_name"] ?></p>
                     </div>
                     <div class="booking-detail-start d-flex">
                        <h3>เริ่ม : </h3>
                        <p><?php echo date("d-m-Y",strtotime($row["startdate"])). " / " .date("H:m",strtotime($row["starttime"])) ?></p>
                     </div>
                     <div class="booking-detail-end d-flex">
                        <h3>สิ้นสุด : </h3>
                        <p><?php echo date("d-m-Y",strtotime($row["enddate"])). " / " .date("H:m",strtotime($row["endtime"])) ?></p>
                     </div>
                     <div class="booking-detail-obj d-flex">
                        <h3>จุดประสงค์ : </h3>
                        <p><?php echo $row['obj'] ?></p>
                     </div>
                     <div class="booking-detail-status d-flex">
                        <h3>สถานะ : </h3>
                        <?php 
                           if($row["rserv_status"] === "approve"){
                              echo "<p class='text-success'>อนุมัติ</p>";
                           }elseif($row["rserv_status"] === "disapproved"){
                              echo "<p class='text-danger'>ไม่อนุมัติ</p>";
                           }else{
                              echo "<p class='text-primary'>รอการอนุมัติ</p>";
                           }
                        ?>
                     </div>
                     <div class="booking-detail-email d-flex">
                        <h3>อีเมล : </h3>
                        <p></p>
                     </div>
                     <div class="booking-detail-phone d-flex">
                        <h3>เบอร์โทร : </h3>
                        <p><?php echo $row['phone'] ?></p>
                     </div>                   
                     <div class="booking-detail-nameroom d-flex">
                        <h3>จำนวนผู้เข้าร่วม : </h3>
                        <p><?php echo $row['numpeople'] ?></p>
                     </div>
                     <div class="booking-detail-nameroom d-flex">
                        <h3>รหัสนักศึกษา/บุคลากร : </h3>
                        <p><?php echo $row['people_Id'] ?></p>
                     </div>
                     <div class="booking-detail-nameroom d-flex">
                        <h3>สังกัดองค์กร/คณะ : </h3>
                        <p><?php echo $row['org_name'] ?></p>
                     </div>
                     <div class="booking-detail-nameroom d-flex">
                        <h3>หน่วยงาน/สาขาวิชา/ชมรม: </h3>
                        <p><?php echo $row['major_name'] ?></p>
                     </div>
                     
                  </div>
               </div>
               <!---------- End booking-detail ---------->

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