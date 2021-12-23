<?php

   session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ระบบจองห้องประชุมออนไลน์</title>
   <link rel="icon" href="../img/menu-logo/online-booking.png">
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../font/tahomo.ttf">
   <link rel="stylesheet" href="../font/SukhumvitSet-Medium.ttf">
   <link rel="stylesheet" href="../bootstrap/js/jquery-3.6.0.min.js">
</head>
<body>
<style>
   *{
      margin:0;
      padding:0;
      box-sizing:border-box;
   }
   body{
      height:100%;
      font-family: SukhumvitSet, sans-serif;
      background-color:#BAC9B8;
   }

   /********** Start header **********/
   .header-container{
      height:217px;
      background-color:#BAC9B8;
   }
   .header-logo-left img{
      width:120px;
      height:120px;
   }
   .header-logo-right h1{
      color:#585858;
      font-size:45px;
      font-weight:bold;
   }
   .header-signup-item a{
      color:#585858;
      font-size:30px;
   }
   .header-signup-item a:hover{
      color:#3C94EC;
      text-decoration:none;
   }
   /********** End header **********/

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
   .main-manu-items li img{
      width:50px;
      height:50px;
   }
   .main-manu-items li a{
      display:flex;
   }
   .main-manu-items li{
      list-style:none;
      padding:20px;
      height:90px;
      list-style: none;
      align-items: center;
      padding-left:30px;
   }
   .main-manu-items li h3{
      align-items:center;
      margin-left:20px;
      display:inline;
      color:#585858;
   }
   .main-manu-items li a:hover{
      text-decoration:none;
   }
   .main-manu-items li a{
      display:flex;
      align-items:center;
   }
   .main-manu-items li:nth-child(5){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(5) h3{
      color:#F0F8FF;
   }
   .main-manu-items li:hover,.main-manu-items a h3:hover{
      background-color:#72916C;
      color:#F0F8FF;
   }
   /********** end Main menu **********/

   /********** Start booking**********/
   .booking{
      background-color:#E9F1E6;
   }
   .booking-header{
      height:100px;
      background-color:#BAC9B8;
      border-radius:10px;
      align-items:center;
   }
   .booking-header img{
      height:70px;
      width:70px;
   }
   .booking-header h3{
      font-size:45px;
      color:#585858;
   }
   .booking-fill h4{
      font-size:35px;
      color:#585858;
   }
   .booking-fill input{
      background-color:#BAC9B8;
      border:2px solid #3D5538;
      border-radius:5px;
      width:500px;
      height:60px;
      padding:0 15px;
   }
   .booking-fill select{
      width:500px;
      height:60px;
      background-color:#BAC9B8;
      border:2px solid #3D5538;
      border-radius:5px;
      font-size:23px;
      color:#3D5538;
   }
   .booking-fill-items5 button{
      width:220px;
      height:60px;
      border:none;
      background-color:#3D5538;
      border-radius: 5px;
      font-size:35px;
      color:#F0F8FF;
   }
   .booking-fill-items5 button:hover{
      background-color:#597154;
   }
   .booking-fill-items5 a{
      font-size:35px;
      color:#F0F8FF;
   }
   .booking-fill-items5 a:hover{
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
   /********** End Register **********/

   /********** start footer **********/
   .footer{
      background-color:#BAC9B8;
   }
   .footer-link li img{
      width:40px;
      height:40px;
   }
   .footer-link li{
      list-style: none;
   }
   .footer-top{
      display:flex;
      height:74px;
      justify-content:center;
      align-items:center;
   }
   .footer-top h3{
      font-size:40px;
      color:#585858;
      font-weight:bold;
   }
   .footer-buttom{
      display:flex;
      height:74px;
      justify-content:center;
   }
   .footer-link{
      width:350px;
      height:70px;
      align-items:center;
      justify-content:space-between;
   }
   /********** end footer **********/

</style>
   
<!---------- start header ---------->
<header>
   <div class="container-fluid">
      <div class="header-container row m-0 d-flex align-items-center">
         <div class="header-logo col-xl-8 m-0 row d-flex align-items-center">
            <div class="header-logo-left col-xl-2 pl-5 ">
               <img src="../img/Ftu_logo.png">
            </div>
            <div class="header-logo-right col-xl-10 ">
               <h1>FTU Room Reservation System</h1>
            </div>
         </div>
         <?php if(isset($_SESSION['name'])){?>
         <div class="header-signup col-xl-4 m-0 row d-flex align-items-center" style="height:90px;">
            <div class="header-signup-name col-xl-6">
               <h3 class="float-right">
                  <?php echo $_SESSION['name']; ?>
               </h3>
            </div>
            <div class="header-signup-img col-xl-6">
               <img style="width:85px;height:85px;margin-right:20px;" src="./img/menu-logo/profile.png" alt="">
               <a href="../index.php?logout='1'" class="btn btn-danger">ออกจารระบบ</a>
            </div>
         </div>
         <?php }else{ ?>
         <div class="header-signup-item justify-content-end d-flex pr-5 col-xl-4 m-0" style="width:100px;">
            <a href="login.php" class="text-right">เข้าสู่ระบบ /</a>
            <a href="register.php" class="text-right">สมัครสมาชิก</a>
         </div>
         <?php } ?>
      </div>
   </div>
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
            <ul class="main-manu-items">
               <li><a href="../index.php"><img src="../img/menu-logo/calendar.png" alt=""><h3>ปฎิทินการจองห้องประชุม</h3></a></li>
               <li><a href="../bookingdetail.php"><img src="../img/menu-logo/booking.png" alt=""><h3>ข้อมูลการจองห้องประชุม</h3></a></li>
               <li><a href="../checkroom.php"><img src="../img/menu-logo/meeting-room.png" alt=""><h3>รายการห้องประชุม</h3></a></li>
               <li><a href="../user/bookingcheck.php"><img src="../img/menu-logo/booking2.png" alt=""><h3>การจองห้องของคุณ</h3></a></li>
               <li><a href="../user/bookingroom.php"><img src="../img/menu-logo/booking1.png" alt=""><h3>จองห้องประชุม</h3></a></li>
               <li><a href="../staff/bookingrequest.php"><img src="../img/menu-logo/regulation.png" alt=""><h3>คำขอใช้ห้องประชุม</h3></a></li>
               <li><a href="../staff/bookingedit.php"><img src="../img/menu-logo/edit.png" alt=""><h3>แก้ไขการจองห้อง</h3></a></li>
               <li><a href="../staff/addroom.php"><img src="../img/menu-logo/insert1.png" alt=""><h3>เพิ่มห้องประชุม</h3></a></li>
               <li><a href="../staff/editroom.php"><img src="../img/menu-logo/edit1.png" alt=""><h3>แก้ไขห้องประชุม</h3></a></li>
               <li><a href="../admin/addmember.php"><img src="../img/menu-logo/staff.png" alt=""><h3>เพิ่มสมาชิก</h3></a></li>
               <li><a href="../admin/member.php"><img src="../img/menu-logo/team.png" alt=""><h3>สมาชิก</h3></a></li>
               <li><a href="#"><img src="../img/menu-logo/about-us.png" alt=""><h3>เกี่ยวกับเรา</h3></a></li>
            </ul>
         </div>
         <div class="booking col-xl-9">
            <div class="booking-container mx-5 my-4">
               <div class="booking-header d-flex">
                  <div class="booking-header-img ml-5">
                     <img src="../img/menu-logo/booking1.png" alt="">
                  </div>
                  <div class="booking-header-h ml-4">
                     <h3>จองห้องประชุม</h3>
                  </div>
                  
               </div>
               <div class="booking-fill my-5">
                  <form action="#" method="post">
                     <div class="booking-fill-items1 row">
                        <div class="booking-building col-xl-6 mb-4">
                           <h4>อาคาร</h4>
                           <select name="building" class="pl-2" require>
                              <option select>เลือก</option>
                              <option value="scienceandit">วิทยาศาสตร์และเทคโนโลยี</option>
                              <option value="arts">ศิลปศาสตร์และสังคมศาสตร์</option>
                              <option value="education">ศึกษาศาสตร์</option>
                              <option value="islamic">อิสลามศึกษา</option>
                           </select>
                        </div>
                        <div class="booking-room col-xl-6 mb-4">
                           <h4>ห้อง</h4>
                           <select name="building" class="pl-2" require>
                              <option select>เลือก</option>
                              <option value="scienceandit">104-11วิจัย</option>
                              <option value="arts">101-11คอม</option>
                              <option value="education">ลานกิจกรรม</option>
                              <option value="islamic">101-1ห้องประชุม</option>
                           </select>
                        </div>
                     </div>
                     <div class="booking-fill-items2 row mb-4">
                        <div class="booking-name col-xl-6">
                           <h4>ชื่อผู้จอง</h4>
                           <input type="text" name="name" placeholder="ชื่อผู้จอง" require>
                        </div>
                        <div class="booking-phone col-xl-6">
                           <h4>เบอร์โทร</h4>
                           <input type="number" name="phonenumber" placeholder="เบอร์โทร" require>
                        </div>
                     </div>
                     <div class="booking-fill-items3 row mb-4">
                        <div class="booking-numpeople col-xl-6 mb-4">
                           <h4>จำนวนผู้เข้าร่วม</h4>
                           <input type="number" name="numpeople" placeholder="จำนวนผู้เข้าร่วม" require>
                        </div>
                        <div class="booking-email col-xl-6">
                           <h4>จุดประสงค์</h4>
                           <input type="text" name="obj" placeholder="จุดประสงค์" require>
                        </div>
                     </div>
                     <div class="booking-fill-items4 row mb-4">
                        <div class="booking-startdate col-xl-6 mb-4">
                           <h4>วันที่เริ่มต้น</h4>
                           <input type="date" name="startdate" require>
                        </div>
                        <div class="booking-starttime col-xl-6">
                           <h4>เวลาเริ่มต้น</h4>
                           <input type="time" name="starttime" require>
                        </div>
                     </div>
                     <div class="booking-fill-items4 row mb-5">
                        <div class="booking-enddate col-xl-6 mb-4">
                           <h4>วันสิ้นสุด</h4>
                           <input type="date" name="enddate" require>
                        </div>
                        <div class="booking-endtime col-xl-6">
                           <h4>เวลาสิ้นสุด</h4>
                           <input type="time" name="endtime" require>
                        </div>
                     </div>
                     <div class="booking-fill-items5 mb-5 d-flex">
                        <button type="submit">ส่ง</button>
                        <button type="reset" class="bg-danger ml-3">ยกเลิก</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!---------- end content ---------->

<!---------- start footer ---------->
<footer>
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl">
            <div class="footer-top">
            <h3>Fatoni University</h3>
         </div>
         <div class="footer-buttom">
            <ul class="footer-link d-flex">
               <li><a href="#"><img src="../img/menu-logo/globe-grid.png" alt=""></a></li>
               <li><a href="#"><img src="../img/menu-logo/facebook.png" alt=""></a></li>
               <li><a href="#"><img src="../img/menu-logo/instagram.png" alt=""></a></li>
               <li><a href="#"><img src="../img/menu-logo/twitter.png" alt=""></a></li>
               <li><a href="#"><img src="../img/menu-logo/youtube.png" alt=""></a></li>
            </ul>
         </div>
         </div>
      </div>
   </div>
</footer>
<!---------- end footer ---------->
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>