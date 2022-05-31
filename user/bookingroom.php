<?php

   session_start();
   require('../dbconnect.php');

   // Start Select building information

   $sql = "SELECT * FROM building";
   $result = mysqli_query($connect,$sql);
   $row = mysqli_fetch_assoc($result);
   // Start Select building information
   
   // Start Access permission User, Staff and Admin

   if(!isset($_SESSION['user_login']) and !isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission User, Staff and Admin

   error_reporting(0);
   ini_set('display_errors', 0);

   $errors = array();

   // Start if booking room
   if($_POST){

      $building = mysqli_real_escape_string($connect, $_POST["building"]);
      $room = mysqli_real_escape_string($connect, $_POST["room"]);
      $name = mysqli_real_escape_string($connect, $_POST["name"]);
      $phone = mysqli_real_escape_string($connect, $_POST["phonenumber"]);
      $numpeople = mysqli_real_escape_string($connect, $_POST["numpeople"]);
      $peopleId = mysqli_real_escape_string($connect, $_POST["peopleId"]);
      $obj = mysqli_real_escape_string($connect, $_POST["obj"]);
      $org = mysqli_real_escape_string($connect, $_POST["organization"]);
      $major = mysqli_real_escape_string($connect, $_POST["major"]);
      $startdate = mysqli_real_escape_string($connect, $_POST["startdate"]);
      $starttime = mysqli_real_escape_string($connect, $_POST["starttime"]);
      $enddate = mysqli_real_escape_string($connect, $_POST["enddate"]);
      $endtime = mysqli_real_escape_string($connect, $_POST["endtime"]);

      // Start Insert data for users, staff, admin

      if(isset($_SESSION['user_login'])){
         $id = $_SESSION['user_login'];
         $sql = "INSERT INTO reservation(bd_Id, room_Id, peoplename, phone, numpeople, people_Id, obj, org_Id, major_Id, startdate, starttime,enddate, endtime, rserv_status, users_Id) VALUES($building, $room, '$name', '$phone', '$numpeople', '$peopleId', '$obj', '$org', '$major','$startdate','$starttime','$enddate','$endtime', 'pendingApproval', $id)";
      }elseif(isset($_SESSION['staff_login'])){
         $id = $_SESSION['staff_login'];
         $sql = "INSERT INTO reservation(bd_Id, room_Id, peoplename, phone, numpeople, people_Id, obj, org_Id, major_Id, startdate, starttime,enddate, endtime, rserv_status, staff_Id) VALUES($building, $room, '$name', '$phone', '$numpeople', '$peopleId', '$obj', '$org', '$major','$startdate','$starttime','$enddate','$endtime', 'pendingApproval', $id)";
      }elseif(isset($_SESSION['admin_login'])){
         $id = $_SESSION['admin_login'];
         $sql = "INSERT INTO reservation(bd_Id, room_Id, peoplename, phone, numpeople, people_Id, obj, org_Id, major_Id, startdate, starttime,enddate, endtime, rserv_status, admin_Id) VALUES($building, $room, '$name', '$phone', '$numpeople', '$peopleId', '$obj', '$org', '$major','$startdate','$starttime','$enddate','$endtime', 'pendingApproval', $id)";
      }
      // End Insert data for users, staff, admin

      // Start If success

      $result = mysqli_query($connect, $sql);
      if($result){
         header("location:../user/bookingcheck.php");
         exit();
      }
      // End If success

      // if(empty($building)){
      //    array_push($errors, "กรุณาเลือกอาคาร");
      // }elseif(empty($room)){
      //    array_push($errors, "กรุณาเลือกห้อง");
      // }elseif(empty($name)){
      //    array_push($errors, "กรุณากรอกชื่อผู้จอง");
      // }elseif(empty($phone)){
      //    array_push($errors, "กรุณากรอกเบอร์โทรศัพท์");
      // }elseif(empty($numpeople)){
      //    array_push($errors, "กรุณากรอกจำนวนผู้เข้าร่วม");
      // }elseif(empty($peopleId)){
      //    array_push($errors, "กรุณากรอกรหัสนักศึกษา/รหัสบุคลากร/เลขประจำตัวประชาชน");
      // }elseif(empty($obj)){
      //    array_push($errors, "กรุณากรอกจุดประสงค์การขอใช้ห้อง");
      // }elseif(empty($startdate)){
      //    array_push($errors, "กรุณากรอกวันที่เริ่มใช้ห้อง");
      // }elseif(empty($startdate)){
      //    array_push($errors, "กรุณากรอกเวลาเริ่มใช้ห้อง");
      // }elseif(empty($enddate)){
      //    array_push($errors, "กรุณากรอกวันที่สิ้นสุดการใช้ห้อง");
      // }elseif(empty($endtime)){
      //    array_push($errors, "กรุณากรอกเวลาสิ้นสุดการใช้ห้อง");
      // }else {
      //    if(count($errors) == 0){
      //       $sql = "INSERT INTO reservation(bd_Id, room_Id, peoplename, phone, numpeople, people_Id, obj, org_Id, major_Id, startdate, starttime,enddate, endtime, rserv_status) VALUES($building, $room, '$name', '$phone', '$numpeople', '$peopleId', '$obj', '$org', '$major','$startdate','$starttime','$enddate','$endtime', 'รอการอนุมัติ')";
      
      //       $result = mysqli_query($connect, $sql);

      //    if($result){
      //       header("location:../bookingdetail.php");
      //       exit();}
      //    // }else{
      //    //    echo "เกิดข้อผิดพลาด" . mysqli_error($connect);
      //    // }
      //    }
      // }
   }
   // End if booking room
?>

<!DOCTYPE html>
<html lang="en">

<!---------- start head ---------->

<head>
   <?php include('../master/head-user.php') ?>
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
   .main-manu-items li:nth-child(5){
      background-color:#3D5538;
      position:relative;
   }
   .main-manu-items li:nth-child(5) h3{
      color:#F0F8FF;
   }
   /********** end Main menu **********/

   /********** Start booking**********/

   .booking{
      background-color:#E9F1E6;
   }

   .booking-header{
      height:80px;
      background-color:#BAC9B8;
      border-radius:10px;
      align-items:center;
   }
   .booking-header img{
      height:60px;
      width:60px;
   }
   .booking-header h3{
      font-size:35px;
      color:#585858;
   }
   .booking-fill{
      padding-left:15px;
   }
   .booking-fill h4{
      font-size:30px;
      color:#585858;
   }
   .booking-fill input,textarea{
      background-color:#BAC9B8;
      border:2px solid #3D5538;
      border-radius:5px;
      width:400px;
      height:60px;
      padding:0 15px;
   }
   .booking-fill select{
      width:400px;
      height:60px;
      background-color:#BAC9B8;
      border:2px solid #3D5538;
      border-radius:5px;
      font-size:23px;
      color:#3D5538;
   }
   .booking-fill-items7 button{
      width:200px;
      height:60px;
      border:none;
      background-color:#3D5538;
      border-radius: 5px;
      font-size:35px;
      color:#F0F8FF;
   }
   .booking-fill-items7 button:hover{
      background-color:#597154;
   }
   .booking-fill-items7 a{
      font-size:35px;
      color:#F0F8FF;
   }
   .booking-fill-items7 a:hover{
      text-decoration:none;
      color:#F0F8FF;
   }
   ::placeholder{
      font-size:23px;
      color:#3D5538;
   }
   .booking-building option,.booking-room option{
      font-size:23px;
   }
   .booking-question{
      font-size:25px;
   }
   .booking-fill input[type]{
      font-size:23px;
      color:#3D5538;
   }
   .booking-obj textarea{
      width:827px;
      height:100px;
      padding:10px;
   }
   /********** End Register **********/

   /********** Start 1800px screen **********/

   @media screen and (min-width:1800px){
      .booking-container{
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
         font-weight: bold;
         color:#585858;
      }
      .booking-header img{
         height:70px;
         width:70px;
      }
      .booking-header h3{
         font-size:45px;
      }
      .booking-fill input,textarea{
         width:500px;
      }
      .booking-fill select{
         width:500px;
      }
      .booking-obj textarea{
         width:1164px;
      }
      .booking-fill h4{
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
      .booking-fill{
         padding-left:50px;
      }
      .booking-fill input, .booking-fill select{
         width:500px;
         height:50px;
      }
      .booking-fill h4{
         font-size:25px;
      }
      .booking-obj textarea{
         width:665px;
         height:100px;
      }
      .booking-fill-items7 button{
         width:150px;
         height:50px;
         font-size:25px;
      }
      .booking-building, .booking-room, .booking-name, .booking-phone, .booking-numpeople, .booking-studentId, .booking-startdate, .booking-starttime, .booking-endtime, .booking-enddate{
         display:flex;
      }
      .booking-building select{
         margin-left: 100px;
      }
      .booking-room select{
         margin-left: 123px;
      }
      .booking-name input{
         margin-left: 80px;
      }
      .booking-phone input{
         margin-left: 77px;
      }
      .booking-numpeople input{
         margin-left: 10px;
      }
      .booking-studentId input{
         margin-left: 33px;
      }
      .booking-startdate input{
         margin-left: 53px;
      }
      .booking-starttime input{
         margin-left: 51px;
      }
      .booking-enddate input{
         margin-left: 75px;
      }
      .booking-endtime input{
         margin-left: 55px;
      }
      .booking-org select, .booking-major select{
         width:665px;
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
      .booking-fill input, .booking-fill select{
         width:350px;
      }
      .booking-obj textarea{
         width:530px;
      }
      .booking-org select, .booking-major select{
         width:530px;
      }
   }
   /********** End 767px screen **********/

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
      .booking-header{
         height:55px;
      }
      .booking-header-img img{
         margin-left:-25px;
         width:35px;
         height:35px;
      }
      .booking-header-h h3{
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
      .booking-fill{
         padding-left:0px;
      }
      .booking-fill input, .booking-fill select, .booking-fill textarea{
         margin-left:0px;
         width:300px;
      }
      .booking-building, .booking-room, .booking-name, .booking-phone, .booking-numpeople, .booking-studentId, .booking-startdate, .booking-starttime, .booking-enddate, .booking-endtime{
         display:block;
      }
      .booking-fill-items7 button{
         font-size:20px;
         width:100px;
         height:43px;
      }
   }
   /********** End 576px screen **********/
   
</style>

<!---------- End Style ---------->
   
<!---------- start header ---------->

<header>
   <?php include('../master/header-user.php'); ?>
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

            <!---------- Start inform ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('../master/inform.php'); ?>
            <?php endif ?>
            <!---------- End inform ---------->

         </div>
         <div class="booking col-xl-9">
            <div class="booking-container mt-4">
               <div class="booking-header d-flex">
                  <div class="booking-header-img ml-5">
                     <img src="../img/menu-logo/booking1.png" alt="">
                  </div>
                  <div class="booking-header-h ml-4">
                     <h3>จองห้องประชุม</h3>
                  </div>
                  
               </div>

               <!---------- Start error ---------->

               <?php if(count($errors) > 0): ?>
                  <div class="alert-danger mt-5 align-items-center d-flex pl-3" style="width:100%;height:50px;font-size:20px;">
                     <?php foreach($errors as $error): ?>
                        <?php echo $error; 
                        ?>
                     <?php endforeach ?>
                  </div>
               <?php endif ?>
               <!---------- End Error ---------->

               <!---------- Start Booking Form ---------->

               <div class="booking-fill my-5">
                  <form action="" method="post">
                     <div class="booking-fill-items1 row">
                        <div class="booking-building col-xl-6 mb-4">
                           <h4>อาคาร:</h4>
                           <select name="building" id="building" class="pl-2" required>
                              <option selected disabled>เลือกอาคาร</option>
                              <?php  
                              foreach($result as $value){
                                 echo "<option value='{$value['bd_Id']}'>{$value['bd_name']}</option>";
                              }
                              ?>
                           </select>
                        </div>
                        <div class="booking-room col-xl-6 mb-4">
                           <h4>ห้อง:</h4>
                           <select name="room" id="room" class="pl-2" required>
                              <option selcted disable>เลือก</option>
                           </select>                              
                           
                        </div>
                     </div>
                     <div class="booking-fill-items2 row">
                        <div class="booking-name col-xl-6 mb-4">
                           <h4>ชื่อผู้จอง:</h4>
                           <input type="text" name="name" placeholder="ชื่อผู้จอง" required>
                        </div>
                        <div class="booking-phone col-xl-6 mb-4">
                           <h4>เบอร์โทร:</h4>
                           <input type="number" name="phonenumber" placeholder="เบอร์โทร" required>
                        </div>
                     </div>
                     <div class="booking-fill-items3 row">
                        <div class="booking-numpeople col-xl-6 mb-4">
                           <h4>จำนวนผู้เข้าร่วม:</h4>
                           <input type="number" name="numpeople" placeholder="จำนวนผู้เข้าร่วม" required>
                        </div>
                        <div class="booking-studentId col-xl-6 mb-4">
                           <h4>รหัสนักศึกษา/บุคลากร:</h4>
                           <input type="number" name="peopleId" placeholder="รหัสนักศึกษา/บุคลากร" required>
                        </div>
                     </div>
                     <div class="booking-fill-items4 row mb-4">
                        <div class="booking-obj col-xl ">
                           <h4>จุดประสงค์การใช้ห้อง:</h4>
                           <textarea name="obj" placeholder="จุดประสงค์การใช้ห้อง" required></textarea>
                        </div>
                     </div>
                     <div class="booking-fill-items1 row">
                        <div class="booking-org col-xl-6 mb-4">
                           <h4>สังกัดองค์กร/คณะ:</h4>
                           <input type="text" name="organization" id="" placeholder="สังกัดองค์กร/คณะ" required>
                        </div>
                        <div class="booking-major colo-xl-6 mb-4 ml-3">
                           <h4>หน่วยงาย/สาขา/ชมรม/กลุ่ม:</h4>
                           <input type="text" name="major" id="" placeholder="หน่วยงาย/สาขา/ชมรม/กลุ่ม" required>
                        </div>
                        <!-- <div class="booking-org col-xl-6 mb-4">
                           <h4>สังกัดองค์กร/คณะ:</h4>
                           <?php  
                              // $sql2 = "SELECT * FROM organization";
                              // $result2 = mysqli_query($connect,$sql2);
                           ?>
                           <select name="organization" class="pl-2" required>
                              <option selected disabled>เลือก</option>
                              <?php //foreach($result2 as $value){
                                 //echo "<option value='{$value['org_Id']}'>{$value['org_name']}</option>";
                              //} ?>
                              <option value="">อื่น ๆ</option>
                           </select>
                        </div>
                        <div class="booking-major col-xl-6 mb-4">
                           <h4>หน่วยงาย/สาขา/ชมรม/กลุ่ม:</h4>
                           <?php  
                              // $sql3 = "SELECT * FROM major";
                              // $result3 = @mysqli_query($connect,$sql3); 
                           ?>
                           <select name="major" class="pl-2" required>                              
                              <option selected disabled>เลือก</option>
                              <?php
                                 // foreach($result3 as $value){
                                 //    echo "<option value='{$value['major_Id']}'>{$value['major_name']}</option>";
                                 // }
                              ?>
                              
                              <option value="">อื่นๆ</option>
                           </select>
                        </div> -->
                     </div>
                     <div class="booking-fill-items5 row">
                        <div class="booking-startdate col-xl-6 mb-4">
                           <h4>วันที่เริ่มต้น:</h4>
                           <input type="date" name="startdate" required>
                        </div>
                        <div class="booking-starttime col-xl-6 mb-4">
                           <h4>เวลาเริ่มต้น:</h4>
                           <input type="time" name="starttime" required>
                        </div>
                     </div>
                     <div class="booking-fill-items6 row mb-5">
                        <div class="booking-enddate col-xl-6 mb-4">
                           <h4>วันสิ้นสุด:</h4>
                           <input type="date" name="enddate" required>
                        </div>
                        <div class="booking-endtime col-xl-6">
                           <h4>เวลาสิ้นสุด:</h4>
                           <input type="time" name="endtime" required>
                        </div>
                     </div>
                     <div class="booking-fill-items7 mb-5 d-flex">
                        <button type="submit">ส่ง</button>
                        <button type="reset" class="bg-danger ml-3">ยกเลิก</button>
                     </div>
                  </form>
               </div>
               <!---------- End Booking Form ---------->

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

<!---------- Start Scipt ---------->

<script type="text/javascript">
   $('#building').change(function() {
      var id_building = $(this).val();

         $.ajax({
         type: "POST",
         url: "aj_booking.php",
         data: {id:id_building,function:'building'},
         success: function(data){
            $('#room').html(data); 
         }
      });
   });
</script>
<!---------- Start Scipt ---------->