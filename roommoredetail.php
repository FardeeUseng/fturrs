<?php
   session_start();
   require('dbconnect.php');

   // Start Select tables Room, Staff, Building Code

   $id = $_GET['id'];
   $sql = "SELECT * FROM room LEFT JOIN staff ON room.staff_Id = staff.staff_Id LEFT JOIN building ON room.bd_Id = building.bd_Id WHERE  room_Id = $id";
   $result = mysqli_query($connect,$sql);
   $row = mysqli_fetch_array($result);
   // End Select tables Room, Staff, Building Code

   // Start if upload room image

   $success = array();
   $errors = array();
   if(isset($_POST['upload'])){
      $r_Id = $_POST["room"];
      $check = getimagesize($_FILES["file"]["tmp_name"]);
      $name = $_FILES['file']['name'];

      if(!isset($name)){
         array_push($errors, "ไม่ได้แนบภาพ");
      }elseif($_FILES['file']['error'] != 0){
         array_push($errors, "การโหลดภาพไม่สำเร็จ");
      }else{

         if($check){
            $dir = "img/roomimg/";
            $fileImage = $dir . basename($_FILES["file"]["name"]);
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $fileImage)){
               $sql = "UPDATE room SET r_img = '$name' WHERE room_Id = $r_Id";
               $result = mysqli_query($connect, $sql);
               if($result){
                  array_push($success, "เพิ่มรูปห้องสำเร็จ");
                  
               }
            }else {
               array_push($errors, "เกิดข้อผิดพลาด");
            }
         }
      }
   }
   // End if upload room image

?>

<!DOCTYPE html>
<html lang="en">

<!---------- start head ---------->

<head>
   <?php include('./master/head.php'); ?>
</head>
<!---------- start head ---------->

<!---------- start Jquery ---------->

<script>
   $(document).ready(function(){

      $("#uploadimg").on("change", function(e){
         var filename = e.target.value.split('\\').pop();
         $("#label_span").text(filename);
      })
      $("#uploadimgg").click(function(){
         $("#submit").show()
      })
   })
</script>
<!---------- End Jquery ---------->

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
   .main-content{
      background-color:#E9F1E6;
   }
   .main-menu{
      background-color:#BAC9B8;
   }

   .main-manu-items li:nth-child(3){
      background-color:#3D5538;
      position:relative;
   }
   .main-manu-items li:nth-child(3) h3{
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
      font-size:45px;
      color:#585858;
   }
   /********** End Content Title**********/

   /********** Start Cintent detail **********/

   .room-detail{
      background-color:#D7E6D5;
      width:auto;
      margin:50px 0px;
      border-radius:3px;
   }
   .room-detail-container{
      padding-left:40px;
      padding-top: 40px;
      padding-bottom: 40px;
   }
   .room-detail-container h3{
      font-size:30px;
      margin-bottom:35px;
      color:#585858;
   }
   .room-detail-container p{
      margin-left:15px;
      color:#585858;
      font-size:25px;

   }
   .room-detail-image{
      position:relative;
      width:auto;
      height:500px;
      padding-top:50px;
      margin-left:30px;
      margin-right:30px;
      margin-bottom:20px;
   }
   .room-detail-image img{
      width:100%;
      height:100%;
   }

   .room-detail-image label{
      padding:7px 18px;
      background-color:#3D5538;
      color:white;
      font-size:25px;
      margin:180px 340px;
      width:250px;
      height:50px;
      border-radius:5px;
      cursor:pointer;
   }

   .room-detail-image button{
      display:none;
      position:absolute;
      font-size:25px;
      top:310px;
      left:390px;
      width:145px;
      background-color:#585858;
      color:white;
      padding: 3px 0px;
      border-radius:5px;
   }
   .notImg{
      width:auto;
      height:450px;
      background-color:#BAC9B8;
      border-radius:5px;
      color:#585858;
      justify-content:center;
      align-items: center;
   }
   .notImg img{
      margin-right:10px;
      width:50px;
      height:50px;
   }

   .notImg p{
      margin-top : 20px;
      font-size:25px;
   }
   .upload-img{
      width:auto;
      height:450px;
      background-color:#BAC9B8;
      border-radius:5px;
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
      .room-detail{
         padding-left:30px;
         padding-right:30px;
      }
      .room-detail-image{
         height:650px;
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
      .notImg, .upload-img{
         height:350px;
      }
      .room-detail-container{
         margin-top:-70px;
         margin-left:20px;
      }
   }
   /********** End 1200px screen **********/

   /********** Start 767px screen **********/

   @media screen and (max-width:767px){
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
      .room-detail-image label{
         margin:180px 140px;
      }
      .upload-img{
         height:400px;
      }
      .room-detail-image button{
         top:310px;
         left:200px;
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
      .notImg, .upload-img{
         height:250px;
         font-size:16px;
      }
      .notImg p{
         font-size:16px;
      }
      .room-detail-container{
         margin-left:0px;
         margin-top:-200px;
      }
      .room-detail-container h3, .room-detail-container p{
         font-size:20px;
      }
   }
   /********** End 576px screen **********/

</style>
<!---------- End Style ---------->
   
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
               <a href="index.php"><img src="img/menu-logo/online-booking.png" alt=""></a>
               <a href="index.php"><h3 class="ml-3">FTU RRS</h3></a>
            </div>

            <!---------- Start main-manu-items ---------->

               <?php include('./master/main-menu.php'); ?>
            <!---------- End main-manu-items ---------->

            <?php if(isset($_SESSION['staff_login']) OR isset($_SESSION['admin_login'])): ?>
               <?php include('./master/inform.php'); ?>
            <?php endif ?>

         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mt-4">
               
               <!---------- Start content-title ---------->

               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="img/menu-logo/meeting-room.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>รายการห้องประชุม</h3>
                  </div>
               </div>
               <!---------- Start content-title ---------->

               <!---------- Start Room detail Table---------->

               <div class="room-detail">
                  <div class="room-detail-image">

                     <!---------- Start upload room image if user is staff ---------->

                     <?php if(isset($_SESSION['staff_login'])){ ?>
                        <?php if($_SESSION['staff_bd'] == $row['bd_Id'] and $row['r_img'] == ''){ ?>

                           <div class="upload-img">
                              <form method="post" enctype="multipart/form-data">
                                 <input type="hidden" name="room" value="<?php echo $row['room_Id']; ?>">
                                 <div class="upload-file">
                                    <label for="uploadimg" id="uploadimgg" class="shadow">
                                       <i class="fas fa-cloud-upload-alt mr-2"></i>
                                       <span id="label_span">อัพโหลดรูปห้อง</span>
                                    </label>
                                 </div>                                                   
                                 <input type="file" name="file" accept="image/*" id="uploadimg" class="d-none">
                                 <button type="submit" name="upload" id="submit" class="shadow">อัพโหลด</button>
                              </form>
                           </div>
                        <?php }else{ ?>
                           <img src="./img/roomimg/<?php echo $row['r_img']; ?>" alt="">
                        <?php } ?>
                     <!---------- Start upload room image if user is staff ---------->
                     
                     <!---------- Start show room image if have ---------->

                     <?php }else{ ?>
                        <?php if($row['r_img'] == ''){ ?>
                           <div class="notImg d-flex">
                              <img src="./img/menu-logo/board-meeting.png" alt="">
                              <p>ไม่ได้อัพโหลดรูปห้อง</p>
                           </div>
                        <?php }else{ ?>
                           <img src="./img/roomimg/<?php echo $row['r_img']; ?>" alt="">
                        <?php } ?>
                     <?php } ?>
                     <!---------- End show room image if have ---------->

                  </div>
                  <div class="room-detail-container">
                     <div class="room-detail-items1 row">
                           <div class="room-detail-building d-flex col-xl-6 ">
                              <h3>อาคาร: </h3>
                              <p><?php echo $row['bd_name']; ?></p>
                           </div>
                           <div class="room-detail-name d-flex col-xl-6">
                              <h3>ชื่อผู้ดูแล: </h3>
                              <p><?php echo $row['st_name']; ?></p>
                           </div>
                     </div>
                     <div class="room-detail-items2 row">
                        <div class="room-detail-cideroom d-flex col-xl-6">
                           <h3>ห้อง: </h3>
                           <p><?php echo $row['r_code']; ?></p>
                        </div>
                        <div class="booking-detail-nameroom d-flex col-xl-6">
                           <h3>ชื่อห้อง: </h3>
                           <p><?php echo $row['r_name']; ?></p>
                        </div>
                     </div>
                     <div class="room-detail-items3 row">
                        <div class="room-detail-cap d-flex col-xl-6">
                           <h3>ความจุ: </h3>
                           <p><?php echo $row['r_capacity']; ?></p>
                        </div>
                        <div class="room-detail-status d-flex col-xl-6">
                           <h3>สถานะ: </h3>
                           <?php if($row['r_status'] == "available"){
                              echo "<p class='text-success'>ใช้งานได้</p>";
                           }else{
                              echo "<p class='text-danger'>ปิดปรับปรุง</p>";
                           } ?>
                        </div>
                     </div>
                     <div class="room-detail-items4 d-flex row">
                        <div class="addroom-floor d-flex col-xl-6">
                           <h3>ชั้น: <?php echo $row['r_floor']; ?></h3>
                        </div>
                        <div class="room-detail-equip d-flex col-xl-6">
                           <h3>อุปกรณ์: </h3>
                           <p><?php echo $row['r_equipment']; ?></p>
                        </div>
                     </div> 
                     <div class="room-detail-items5 d-flex row">
                        <div class="room-detail-note d-flex col-xl">
                           <h3>หมายเหตุ: </h3>
                           <p><?php echo $row['r_note'] ?></p>
                        </div>  
                     </div>                             
                  </div>
               </div>
               <!---------- End Room detail Table ---------->

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

</body>
</html>