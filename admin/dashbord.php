<?php
   session_start();
   require('../dbconnect.php');

   // Start Access permission Admin

   if(!isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Admin

   // Start If insert member


   // End If insert member
?>

<!DOCTYPE html>
<html lang="en">

<!---------- Start head ---------->

<head>

   <?php include('../master/head-user.php') ?>
   <!-- <script src="../bootstrap/js/bootstrap.min.js"></script> -->
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
   .main-manu-items li:nth-child(12){
      background-color:#3D5538;
      position:relative;
   }
   .main-manu-items li:nth-child(12) h3{
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
   .custom-select option{
      background-color:#E9F1E6;
   }
   /********** End Content **********/

   /********** Start Edit Booking **********/

   .addmember{
      width:auto;
      margin:50px 0px;
      border-radius:3px;
   }
   .addmember-container h3{
      font-size:30px;
      margin-bottom:25px;
      color:#585858;
   }

   .allBuilding, .allRoom, .allAdmin, .allStaff, .allUser, .allRoomApprove, .allRoomDependApprove {
      display:flex;
      flex-direction:column;
      width:285px;
      height:170px;
      margin:20px 0;
      border-radius:10px;
      justify-content:center;
      align-items:center;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      padding-top:10px;
      cursor:pointer;
   }
   .allBuilding:hover, .allRoom:hover, .allAdmin:hover, .allStaff:hover, .allUser:hover, .allRoomApprove:hover, .allRoomDependApprove:hover {
      background-color:#72916C;
   }

   .dashbord p img {
      width:20px;
      height:20px;
      margin-right:8px;
   }

   .dashbord h2 {
      font-size:35px;
      color:#585858;
   }
   
   .dashbord h3 {
      font-size:30px;
      color:#585858;
   }

   .dashbord p {
      font-size:20px;
      text-decoration:none;
      cursor:pointer;
      color:#00A6F6;
   }

   .allBuilding {
      background-color:#8D99AE;
   }

   .allBuilding p , .allRoom p, .allAdmin p, .allRoomApprove h2, .allRoomApprove h3{
      color: #fff;
   }

   .allRoom {
      background-color:#E26D5C;
   }

   .allAdmin {
      background-color:#F77F00;
   }

   .allStaff {
      background-color: #FCBF49;
   }

   .allUser {
      background-color:#EAE2B7;
   }

   .allRoomApprove{
      background-color:
      #3D5538;
   }

   .allRoomDependApprove {
      background-color:#EF959D;
   }
   
   /********** End Edit Booking **********/

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
      .content-title{
         height:100px;
      }
      .content-title img{
         height:70px;
         width:70px;
      }
      .content-title h3{
         font-size:45px;
      }
      .main-menu-logo h3{
         font-size:45px;
      }
      .allBuilding, .allRoom, .allAdmin, .allStaff, .allUser, .allRoomApprove, .allRoomDependApprove {
         width:400px;
         margin:40px 0;
         height:180px;
      }
      .dashbord h2 {
         font-size:40px;
      }
      
      .dashbord h3 {
         font-size:35px;
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
      .allBuilding, .allRoom, .allAdmin, .allStaff, .allUser, .allRoomApprove, .allRoomDependApprove {
         width:300px;
         margin:20px 10px;
         height:170px;
      }
      .dashbord h2 {
         font-size:35px;
      }
      
      .dashbord h3 {
         font-size:30px;
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
      .allBuilding, .allRoom, .allAdmin, .allStaff, .allUser, .allRoomApprove, .allRoomDependApprove {
         width:250px;
         margin:20px 10px;
         height:150px;
      }
      .dashbord h2 {
         font-size:30px;
      }
      .dashbord h3 {
         font-size:25px;
      }
      .dashbord p {
         font-size:15px;
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
         margin-top:7px;
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
      .allBuilding, .allRoom, .allAdmin, .allStaff, .allUser, .allRoomApprove, .allRoomDependApprove {
         width:180px;
         margin:20px 0px;
         height:120px;
      }
      .dashbord h2 {
         font-size:23px;
      }
      .dashbord h3 {
         font-size:20px;
      }
      .dashbord p {
         font-size:12px;
      }
   }
   /********** End 576px screen **********/

   @media screen and (max-width:396px){
      .allBuilding, .allRoom, .allAdmin, .allStaff, .allUser, .allRoomApprove, .allRoomDependApprove {
         width:140px;
         margin:20px 0px;
         height:100px;
      }
      .allRoomDependApprove h2{
         font-size:15px;
      }
      .dashbord p {
         font-size:8px;
      }

   }

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
               <a href="../index.php"><img src="../img/menu-logo/online-booking.png" alt=""></a>
               <a href="../index.php"><h3 class="ml-3">FTU RRS</h3></a>
            </div>
            
               <!---------- start main-menu ---------->

               <?php include('../master/main-menu-user.php') ?>
               <!---------- end main-menu ---------->

            <!---------- start inform ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('../master/inform.php'); ?>
            <?php endif ?>
            <!---------- end inform ---------->

         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mt-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/business-report.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>เเดชบอร์ด</h3>
                  </div>
               </div>

               <!---------- Start Add member ---------->

               <div class="dashbord">
                  <div class="dashbord-container row d-flex justify-content-between p-3">
                     <div class="allBuilding" id="brow">
                        <?php
                           $bsql = "SELECT * FROM building";
                           $bresult = mysqli_query($connect, $bsql);
                           $brow = mysqli_num_rows($bresult);
                        ?>
                        <h2>อาคาร</h2>
                        <h3><?php echo $brow; ?> อาคาร</h3>
                        <p><img src="../img/menu-logo/office-building.png" alt="">ดูอาคารทั้งหมด</p>
                     </div>            
                     <div class="allRoom" id="rrow">
                        <?php
                           $rsql = "SELECT * FROM room";
                           $rresult = mysqli_query($connect, $rsql);
                           $rrow = mysqli_num_rows($rresult);
                        ?>
                        <h2>ห้องประชุม</h2>
                        <h3><?php echo $rrow; ?> ห้อง</h3>
                        <p><img src="../img/menu-logo/round-table.png" alt="">ดูห้องประชุมทั้งหมด</p>
                     </div>            
                     <div class="allAdmin" id="arow">
                        <?php
                           $asql = "SELECT * FROM admin";
                           $aresult = mysqli_query($connect, $asql);
                           $arow = mysqli_num_rows($aresult);
                        ?>
                        <h2>ผู้ดูแลระบบ</h2>
                        <h3><?php echo $arow; ?> คน</h3>
                        <p><img src="../img/menu-logo/admin.png" alt="">ดูผู้ดูแลระบบทั้งหมด</p>
                     </div>            
                     <div class="allStaff" id="srow">
                        <?php
                           $ssql = "SELECT * FROM staff";
                           $sresult = mysqli_query($connect, $ssql);
                           $srow = mysqli_num_rows($sresult);
                        ?>
                        <h2>ผู้ดูแลห้อง</h2>
                        <h3><?php echo $srow; ?> คน</h3>
                        <p><img src="../img/menu-logo/staff.png" alt="">ดูผู้ดูแลห้องทั้งหมด</p>
                     </div>            
                     <div class="allUser" id="urow">
                        <?php
                           $usql = "SELECT * FROM users";
                           $uresult = mysqli_query($connect, $usql);
                           $urow = mysqli_num_rows($uresult);
                        ?>
                        <h2>ผู้ใช้งาน</h2>
                        <h3><?php echo $urow; ?> คน</h3>
                        <p><img src="../img/menu-logo/user.png" alt="">ดูผู้ใช้งานทั้งหมด</p>
                     </div>            
                     <div class="allRoomApprove" id="arrow">
                        <?php
                           $arsql = "SELECT * FROM reservation WHERE rserv_status = 'approve'";
                           $arresult = mysqli_query($connect, $arsql);
                           $arrow = mysqli_num_rows($arresult);
                        ?>
                        <h2>ห้องที่อนุมัติ</h2>
                        <h3><?php echo $arrow; ?> ห้อง</h3>
                        <p><img src="../img/menu-logo/correct.png" alt="">ดูห้องที่อนุมัติทั้งหมด</p>
                     </div>            
                     <div class="allRoomDependApprove" id="pprow">
                        <?php
                           $prsql = "SELECT * FROM reservation WHERE rserv_status = 'pendingApproval'";
                           $prresult = mysqli_query($connect, $prsql);
                           $prrow = mysqli_num_rows($prresult);
                        ?>
                        <h2>ห้องที่รอการอนุมัติ</h2>
                        <h3><?php echo $prrow; ?> ห้อง</h3>
                        <p><img src="../img/menu-logo/waiting.png" alt="">ดูห้องที่รอการอนุมัติทั้งหมด</p>
                     </div>            
                  </div>
               </div>
               <!---------- End addmember ---------->

               <!---------- Start content-footer ---------->
               <div class="content-footer row">
               
               </div>
               <!---------- End content-footer ---------->

            </div>
         </div>
      </div>  
   </div>
</div>
<!---------- end content ---------->

<?php include("../master/modal.php"); ?>

<!---------- start footer ---------->

<footer>
   <?php include('../master/footer-user.php'); ?>
</footer>
<!---------- end footer ---------->
<button id="button">Submit</button>
</body>
</html>

<script>
   $(document).ready(function(){

      $('#brow').click(function(){
         $.ajax({
            url:"./process.php",
            method:"post",
            data:{
               "brow":1,
            },
            success:function(data){
               $('#bDetail').html(data)
               $('#allBuiling').modal('show')
            }
         })
      })
      $('#rrow').click(function(){
         $.ajax({
            url:"./process.php",
            method:"post",
            data:{
               "rrow":1
            },
            success:function(data){
               $('#rDetail').html(data)
               $('#allRoom').modal('show')
            }
         })
      })
      $('#arow').click(function(){
         $.ajax({
            url:"./process.php",
            method:"post",
            data:{
               "arow":1
            },
            success:function(data){
               $('#aDetail').html(data)
               $('#adminModal').modal('show')
            }
         })
      })
      $('#srow').click(function(){
         $.ajax({
            url:"./process.php",
            method:"post",
            data:{
               "srow":1
            },
            success:function(data){
               $('#sDetail').html(data)
               $('#staffModal').modal('show')
            }
         })
      })
      $('#urow').click(function(){
         $.ajax({
            url:"./process.php",
            method:"post",
            data:{
               "urow":1
            },
            success:function(data){
               $('#uDetail').html(data)
               $('#userModal').modal('show')
            }
         })
      })
      $('#arrow').click(function(){
         $.ajax({
            url:"./process.php",
            method:"post",
            data:{
               "arrow":1
            },
            success:function(data){
               $('#arDetail').html(data)
               $('#arModal').modal('show')
            }
         })
      })
      $('#pprow').click(function(){
         $.ajax({
            url:"./process.php",
            method:"post",
            data:{
               "pprow":1
            },
            success:function(data){
               $('#ppDetail').html(data)
               $('#ppModal').modal('show')
            }
         })
      })
   })
</script>
