<?php

   session_start();
   require('../dbconnect.php');

   // Start select room

   $rid = $_GET['id'];
   $sql = "SELECT * FROM room INNER JOIN staff ON room.staff_Id = staff.staff_Id INNER JOIN building ON room.bd_Id = building.bd_Id WHERE room_Id = $rid";
   $result = mysqli_query($connect, $sql);
   $row = mysqli_fetch_assoc($result);
   $equip_arr = array("โปรเจคเตอร์","ที่ฉายโปรเจคเตอร์","ไมค์","ลำโพง","จอมอนิเตอร์","จอLED");
   // End select room 

   // Start Access permission Staff and Admin

   if(!isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Staff and Admin

   // Start add room

   $errors = array();
   if($_POST){
      $room_id = mysqli_real_escape_string($connect, $_POST["id"]);
      $roomname = mysqli_real_escape_string($connect, $_POST["roomname"]);
      $coderoom = mysqli_real_escape_string($connect, $_POST["coderoom"]);
      $roomcapacity = mysqli_real_escape_string($connect, $_POST["roomcapacity"]);
      $roomfloor = mysqli_real_escape_string($connect, $_POST["roomfloor"]);
      $roomstatus = mysqli_real_escape_string($connect, $_POST["roomstatus"]);
      $equipment = implode(",",$_POST["equipment"]);
      $r_note = mysqli_real_escape_string($connect, $_POST["r_note"]);

      if(empty($roomname)){
         array_push($errors, "กรุณากรอกชื่อห้อง");
      }elseif(empty($coderoom)){
         array_push($errors, "กรุณากรอกหมายเลขห้อง");
      }elseif(empty($roomcapacity)){
         array_push($errors, "กรุณากรอกความจุห้อง");
      }elseif(empty($roomfloor)){
         array_push($errors, "กรุณากรอกชั้นของห้อง");
      }else{
         if(count($errors) == 0){
            $sql = "UPDATE room SET r_name = '$roomname', r_code = '$coderoom', r_capacity = $roomcapacity, r_floor = $roomfloor, r_status = '$roomstatus', r_equipment = '$equipment', r_note = '$r_note' WHERE room_Id = $room_id";
            $result = mysqli_query($connect,$sql);
      
            if($result){
               header("location:editroom.php");
               exit();
            }else{
               echo "ไม่สามารถแก้ไขข้อมูลห้องได้" . mysqli_error($connect);
            }
         }
      }
   }
   // End add room

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
   .main-manu-items li:nth-child(9){
      background-color:#3D5538;
      position:relative;
   }
   .main-manu-items li:nth-child(9) h3{
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

   .editbooking{
      background-color:#D7E6D5;
      width:auto;
      margin:50px 0px;
      border-radius:3px;
   }
   .editbooking-container h3{
      font-size:30px;
      margin-bottom:25px;
      color:#585858;
   }
   .editbooking-container input,.editbooking-container select,textarea{
      background-color:#BAC9B8;
      border: 2px solid #3D5538;
      border-radius:6px;
      height:60px;
      width:470px;
      margin-bottom:25px;
      margin-left:5px;
      color:#585858;
      font-size:30px;
      padding-left:20px;
   }
   .editbooking-container select{
      width:200px;
   }
   .editbooking-equipment{
      display:flex;
   }
   .editbooking-equipment-items1,.editbooking-equipment-items2{
      margin-left:102px;
   }
   .editbooking-equipment label{
      font-size:30px;
      margin:0 20px;
      color:#585858;
   }
   #addroom-items{
      width:25px;
      height:25px
   }
   /* .editbooking-roomimage input{
      padding-left:5px;
      padding-top:2.5px;
   } */
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
   .editbooking-building input{
      margin-left:100px;
   }
   .editbooking-name input{
      margin-left:70px;
   }
   .editbooking-nameroom input{
      margin-left:90px;
   }
   .editbooking-coderoom input {
      margin-left:80px;
   }
   .editbooking-capacity input{
      margin-left:97px;
   }
   .addroom-floor input{
      margin-left:142px;
   }
   .editbooking-status select{
      margin-left:97px;
      width:470px;
   }
   textarea{
      height:100px;
      margin-left:60px;
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
      .main-menu-logo h3{
         font-size:45px;
      }
      .editbooking-container h3{
         font-size:40px;
      }
      .editbooking-container input,.editbooking-container select,textarea{
         width:900px;
      }
      .editbooking-container select{
         width:900px;
      }
      .editbooking-building input{
         margin-left:150px;
      }
      .editbooking-name input{
         margin-left:108px;
      }
      .editbooking-nameroom input{
         margin-left:135px;
      }
      .editbooking-coderoom input {
         margin-left:122px;
      }
      .editbooking-capacity input{
         margin-left:145px;
      }
      .addroom-floor input{
         margin-left:205px;
      }
      .editbooking-status select{
         margin-left:146px;
         width:900px;
      }
      .editbooking-equipment-items1{
         margin-left:105px;
      }
      .editbooking-equipment-items1 input{
         margin-left:25px;
      }
      textarea{
         margin-left:97px;
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
      .editbooking-container h3{
         font-size:26px;
      }
      .editbooking-container input,.editbooking-container select{
         width:290px;
         font-size:26px;
         height:60px;
      }
      textarea{
         width:290px;
         font-size:26px;
      }
      .addroom-floor input{
         margin-left:135px;
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
      .editbooking-container input, .editbooking-container select{
         font-size:18px;
         margin-left:0px;
         width:300px;
         margin-top:-20px;
         height:43px;
      }
      .editbooking-container textarea{
         margin-left:0px;
         width:300px;
         margin-top:-20px;
         font-size:18px;
      }
      .editbooking-equipment{
         display:block;
      }
      .editbooking-equipment-items1{
         margin-left:0px;
      }
      .editbooking-equipment-items1 input{
         margin:0 8px;
      }
      .editbooking-button button{
         font-size:20px;
         width:100px;
         height:43px;
      }
   }
   /********** End 576px screen **********/

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

            <!---------- Start main-manu-items ---------->

            <?php include('../master/main-menu-user.php') ?>
            <!---------- /ul main-manu-items ---------->

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
                     <img src="../img/menu-logo/edit1.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>แก้ไขห้องประชุม</h3>
                  </div>
               </div>

               <!---------- Start if error ---------->

               <?php if(count($errors) > 0): ?>
                  <div class="alert-danger mt-5 align-items-center d-flex pl-3" style="width:100%;height:50px;font-size:20px;">
                     <?php foreach($errors as $error): ?>
                        <?php echo $error; 
                        ?>
                     <?php endforeach ?>
                  </div>
               <?php endif ?>
               <!---------- End if Error ---------->

               <!---------- Start Form Edit booking ---------->
               <div class="editbooking">
                  <div class="editbooking-container p-3 p-sm-5">
                     <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $rid ?>">
                        <div class="editbooking-building d-sm-flex">
                           <h3>อาคาร: </h3>
                           <input type="text" name="building" value="<?php echo $row['bd_name']; ?>" disabled>
                           </select>
                        </div>
                        <div class="editbooking-name d-sm-flex">
                           <h3>ชื่อผู้ดูแล: </h3>
                           <input type="text" name="name" value="<?php echo $row['st_name']; ?>" disabled>
                        </div>
                        <div class="editbooking-nameroom d-sm-flex">
                           <h3>ชื่อห้อง: </h3>
                           <input type="text" name="roomname" value="<?php echo $row['r_name']; ?>">
                        </div>
                        <div class="editbooking-coderoom d-sm-flex">
                           <h3>เลขห้อง: </h3>
                           <input type="text" name="coderoom" value="<?php echo $row['r_code']; ?>">
                        </div>
                        <div class="editbooking-capacity d-sm-flex">
                           <h3>ความจุ: </h3>
                           <input type="number" name="roomcapacity" value="<?php echo $row['r_capacity']; ?>">
                        </div>
                        <div class="addroom-floor d-sm-flex">
                           <h3>ชั้น: </h3>
                           <input type="number" name="roomfloor" value="<?php echo $row['r_floor']; ?>">
                        </div>
                        <div class="editbooking-status d-sm-flex">
                           <h3>สถานะ: </h3>
                           <select name="roomstatus">
                           <?php
                              if($row["r_status"] == "available"){
                                 echo "<option value='available' selected>ใช้งานได้</option>";
                                 echo "<option value='notavailable'>ปิดปรับปรุง</option>";
                              }else{
                                 echo "<option value='available'>ใช้งานได้</option>";
                                 echo "<option value='notavailable' selected>ปิดปรับปรุง</option>";
                              }
                           ?>
                           </select>
                        </div>
                        <!-- <div class="editbooking-roomimage d-flex">
                           <h3>รูปห้อง : </h3>
                           <input style="margin-left:126px;width:690px;" type="file" name="roomimage" value="">
                        </div>                         -->
                        <div class="editbooking-equipment">
                           <h3>อุปกรณ์:</h3>
                           <div class="editbooking-equipment-items">
                              <div class="editbooking-equipment-items1 d-flex">
                                 <div class="">
                                    <?php
                                    $equipment = explode(",",$row['r_equipment']);
                                    foreach($equip_arr as $value){
                                       if(in_array($value,$equipment)){
                                          echo "<input type='checkbox' name='equipment[]' value='$value' id='addroom-items' checked>$value";
                                       }else {
                                          echo "<input type='checkbox' name='equipment[]' value='$value' id='addroom-items'>$value";
                                       }
                                       
                                    }
                                    ?>                     
                                    <!-- <input type="checkbox" name="equipment[]" value="โปรเจคเตอร์" id="addroom-items">
                                    <label for="">โปรเจคเตอร์</label> -->
                                 </div>
                                 <!-- <div class="">                       
                                    <input type="checkbox" name="equipment[]" value="ที่ฉายโปรเจคเตอร์" id="addroom-items">
                                    <label for="">ที่ฉายโปรเจคเตอร์</label>
                                 </div>
                                 <div class="">                       
                                    <input type="checkbox" name="equipment[]" value="ไมค์" id="addroom-items">
                                    <label for="">ไมค์</label>
                                 </div> -->
                              </div>
                              <!-- <div class="editbooking-equipment-items2 d-flex">
                                 <div class="">                       
                                    <input type="checkbox" name="equipment[]" vlaue="ลำโพง" id="addroom-items">
                                    <label for="">ลำโพง</label>
                                 </div>
                                 <div class="">                       
                                    <input type="checkbox" name="equipment[]" value="จอมอนิเตอร์" id="addroom-items">
                                    <label for="">จอมอนิเตอร์</label>
                                 </div>
                                 <div class="">                       
                                    <input type="checkbox" name="equipment[]" value="จอLED" id="addroom-items">
                                    <label for="">จอ LED</label>
                                 </div>
                              </div> -->
                           </div>
                        </div>
                        <div class="addroom-note d-sm-flex">
                           <h3>หมายเหตุ: </h3>
                           <textarea name="r_note" value="" placeholder="หมายเหตุ(ถ้ามี)"><?php echo $row['r_note']; ?></textarea>
                        </div>
                        <div class="editbooking-button mt-3">
                           <button type="submit" onclick="return confirm('ยืนยันที่จะแก้ไขข้อมูลห้องนี้?')">แก้ไข</button>
                           <button type="reset">ยกเลิก</button>
                        </div>
                     </form>                    
                  </div>
               </div>
               <!---------- End Form Edit booking ---------->

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

<!---------- start footer ---------->

<footer>
   <?php include('../master/footer-user.php'); ?>
</footer>
<!---------- end footer ---------->

</html>