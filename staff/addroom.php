<?php

   session_start();
   require('../dbconnect.php');

   // Start select building

   $sql1 = "SELECT * FROM building";
   $result1 = mysqli_query($connect, $sql1);
   // End select building

   // Start Access permission Staff and Admin

   if(!isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Staff and Admin

   

   error_reporting(0);
   ini_set('display_errors', 0);

   // Start if addroom

   $errors = array();

   if($_POST){ 

      $building = mysqli_real_escape_string($connect, $_POST['building']);
      $staff = mysqli_real_escape_string($connect, $_POST['staff']);
      $room = mysqli_real_escape_string($connect, $_POST['roomname']);
      $coderoom = mysqli_real_escape_string($connect, $_POST['coderoom']);
      $capacity = mysqli_real_escape_string($connect, $_POST['roomcapacity']);
      $floor = mysqli_real_escape_string($connect, $_POST['roomfloor']);
      $status = mysqli_real_escape_string($connect, $_POST['roomstatus']);
      $roomimage = mysqli_real_escape_string($connect, $_POST['roomimage']);
      isset($_POST['equipment']) ? $equipment = implode(",",$_POST["equipment"]) : $equipment = '';
      $note = mysqli_real_escape_string($connect, $_POST['note']);

      if(empty($building)){
         array_push($errors, "กรุณาเลือกอาคาร");
      }else{
         if(count($errors) == 0){
            $sql = "INSERT INTO room(bd_Id,staff_Id,r_name,r_capacity,r_img,r_status,r_code,r_floor,r_equipment,r_note) VALUES($building,$staff,'$room',$capacity,'$roomimage','$status','$coderoom','$floor','$equipment','$note')";
            $result = mysqli_query($connect,$sql);
   
            if($result){
               header('location:../checkroom.php');
            exit();
            }
            else{
               echo mysqli_error($connect);
            }
         }
      }
   }
   // End if addroom
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
      font-size:45px;
      font-weight: bold;
      color:#585858;
   }
   .main-menu-logo a{
      text-decoration:none;
   }
   .main-manu-items li:nth-child(8){
      background-color:#3D5538;
      position:relative;
   }
   .main-manu-items li:nth-child(8) h3{
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

   .addroom{
      background-color:#D7E6D5;
      width:auto;
      margin:50px 0px;
      border-radius:3px;
   }
   .addroom-container h3{
      font-size:30px;
      margin-bottom:25px;
      color:#585858;
   }
   .addroom-container input,.addroom-container select,textarea{
      background-color:#BAC9B8;
      border: 2px solid #3D5538;
      border-radius:6px;
      height:60px;
      width:450px;
      margin-bottom:25px;
      margin-left:10px;
      color:#585858;
      font-size:30px;
      padding-left:20px;
   }
   .addroom-container select{
      width:450px;
   }
   .addroom-equipment{
      display:flex;
   }
   .addroom-equipment-items1,.addroom-equipment-items2{
      margin-left:95px;
   }
   .addroom-equipment label{
      font-size:20px;
      margin:0 10px;
      color:#585858;
   }
   #addroom-items{
      width:25px;
      height:25px
   }
   .addroom-roomimage input{
      padding-left:5px;
      padding-top:2.5px;
   }
   .addroom-button button:nth-child(1){
      background-color:#3D5538;
      
   }
   .addroom-button button:nth-child(1):hover{
      background-color:#566D51;
      
   }
   .addroom-button button:nth-child(2){
      background-color:#F61414;
      margin-left:20px;
   }
   .addroom-button button:nth-child(2):hover{
      background-color:#EE5151;
   }
   .addroom-button button{
      border:none;
      border-radius:5px;
      margin-top:10px;
      width:180px;
      height:50px;
      color:#FAFCF9;
      font-size:30px;
   }
   textarea{
      height:100px;
   }
   .addroom-floor input{
      margin-left:162px;
   }
   .addroom-name select{
      margin-left:90px;
   }
   .addroom-coderoom input{
      margin-left:30px;
   }
   .addroom-building select{
      margin-left:122px;
   }
   .addroom-nameroom input{
      margin-left:110px;
   }
   .addroom-capacity input{
      margin-left:118px;
   }
   .addroom-status select {
      margin-left:116px;
   }
   .addroom-note textarea{
      margin-left:78px;
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
         font-size:35px;
         color:#585858;
      }
      .addroom-container h3{
         font-size:35px;
      }
      .addroom-container input,.addroom-container select,textarea{
         width:850px;
      }
      /* .addroom-container select{
         width:850px;
      } */
      .addroom-floor input{
         margin-left:170px;
      }
      .addroom-coderoom input{
         margin-left:16px;
      }
      .addroom-name select{
         margin-left:85px;
      }
      .addroom-equipment label{
         font-size:30px;
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
      .addroom-container input,.addroom-container select,textarea{
         width:370px;
         font-size:25px;
      }
      .addroom-equipment-items label{
         font-size:16px;
      }
      .addroom-container h3{
         font-size:25px;
      }
      #addroom-items{
         width:15px;
         height:15px
      }
      .addroom-floor input{
         margin-left:117px;
      }
      .addroom-name select{
         margin-left:60px;
      }
      .addroom-coderoom input{
         margin-left:10px;
      }
      .addroom-building select{
         margin-left:87px;
      }
      .addroom-nameroom input{
         margin-left:77px;
      }
      .addroom-capacity input{
         margin-left:82px;
      }
      .addroom-status select {
         margin-left:80px;
      }
      .addroom-note textarea{
         margin-left:48px;
      }
      .addroom-equipment-items1, .addroom-equipment-items2{
         margin-left:60px;
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
      .addroom-container input,.addroom-container select, .addroom-note textarea{
         /* display:block; */
         width:400px;
         font-size:25px;
         margin-left:0px;
         margin-top:-20px;
      }
      .addroom-equipment{
         display:block;
      }
      .addroom-equipment-items1, .addroom-equipment-items2{
         margin-left:0px;
      }
   }
   /********** End 767px screen **********/

   /********** Start 567px screen **********/

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
      .addroom-container input,.addroom-container select, .addroom-note textarea{
         width:300px;
         height:43px;
         font-size:23px;
      }
      .addroom-equipment-items label{
         margin-left:0px;
      }
      .addroom-button button{
         width:90px;
         height:43px;
         font-size:20px;
      }
   }
   /********** End 567px screen **********/

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
            <!---------- Start main-manu-items ---------->
            
            <!---------- Start inform ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('../master/inform.php'); ?>
            <?php endif ?>
            <!---------- End inform ---------->
            
         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mt-4 my-md-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/insert1.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>เพิ่มห้องประชุม</h3>
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

               <!---------- Start Addroom --------->

               <div class="addroom">
                  <div class="addroom-container p-3 p-sm-5">
                     <form method="post">
                        <div class="addroom-building d-md-flex">
                           <h3>อาคาร: </h3>
                           <select name="building" id="building" required>       
                              <option selected disabled>เลือกอาคาร</option>                  
                              <?php
                                 foreach($result1 as $value){
                                    echo "<option value='{$value['bd_Id']}'>{$value['bd_name']}</option>";
                                 }
                              ?>
                           </select>
                        </div>
                        <div class="addroom-name d-md-flex">
                           <h3>ชื่อผู้ดูแล: </h3>
                           <select name="staff" id="staff" >
                           </select>                        
                        </div>
                        <div class="addroom-nameroom d-md-flex">
                           <h3>ชื่อห้อง: </h3>
                           <input type="text" name="roomname" required>
                        </div>
                        <div class="addroom-coderoom d-md-flex">
                           <h3>หมายเลขห้อง: </h3>
                           <input type="text" name="coderoom" required>
                        </div>
                        <div class="addroom-capacity d-md-flex">
                           <h3>ความจุ: </h3>
                           <input type="number" name="roomcapacity" required>
                        </div>
                        <div class="addroom-floor d-md-flex">
                           <h3>ชั้น: </h3>
                           <input type="number" name="roomfloor" required>
                        </div>
                        <div class="addroom-status d-md-flex">
                           <h3>สถานะ: </h3>
                           <select name="roomstatus" required>
                              <option value="available">ใช้งานได้</option>
                              <option value="notavailable">ปิดปรับปรุง</option>
                           </select>
                        </div>

                        <div class="addroom-equipment">
                           <h3>อุปกรณ์:</h3>
                           <div class="addroom-equipment-items">
                              <div class="addroom-equipment-items1 d-flex">
                                 <div class="">                       
                                    <input type="checkbox" name="equipment[]" value="โปรเจคเตอร์" id="addroom-items">
                                    <label for="">โปรเจคเตอร์</label>
                                 </div>
                                 <div class="">                       
                                    <input type="checkbox" name="equipment[]" value="ที่ฉายโปรเจคเตอร์" id="addroom-items">
                                    <label for="">ที่ฉายโปรเจคเตอร์</label>
                                 </div>
                                 <div class="">                       
                                    <input type="checkbox" name="equipment[]" value="ไมค์" id="addroom-items">
                                    <label for="">ไมค์</label>
                                 </div>
                              </div>
                              <div class="addroom-equipment-items2 d-flex">
                                 <div class="">                       
                                    <input type="checkbox" name="equipment[]" value="ลำโพง" id="addroom-items">
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
                              </div>
                           </div>
                        </div>
                        <div class="addroom-note d-md-flex">
                           <h3>หมายเหตุ: </h3>
                           <textarea name="note" placeholder="หมายเหตุ(ถ้ามี)"></textarea>
                        </div>
                        <div class="addroom-button mt-3">
                           <button type="submit">ยืนยัน</button>
                           <button type="reset">ยกเลิก</button>
                        </div>
                     </form>                    
                  </div>
               </div>
               <!---------- End Addroom --------->

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

<!---------- Start script ---------->

<script type="text/javascript">
  $('#building').change(function() {
    var id_building = $(this).val();

      $.ajax({
      type: "POST",
      url: "aj_addroom.php",
      data: {id:id_building,function:'building'},
      success: function(data){
          $('#staff').html(data); 
      }
    });
  });
</script>
<!---------- End script ---------->

