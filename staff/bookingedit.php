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
   .main-manu-items li:nth-child(7){
      background-color:#3D5538;
   }
   .main-manu-items li:nth-child(7) h3{
      color:#F0F8FF;
   }
   .main-manu-items li:hover,.main-manu-items a h3:hover{
      background-color:#72916C;
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
      font-size:25px;
      font-weight: normal;
   }
   .content-table td{
      font-size:15px;
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

   /********** Start Footer **********/
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
   /********** End Footer **********/
</style>
   
<!---------- start header ---------->
<header>
   <div class="container-fluid">
      <div class="header-container row">
         <div class="header-logo d-flex col-xl-8">
            <div class="header-logo-left col-xl-2 d-flex align-items-center pl-5">
               <img src="../img/Ftu_logo.png">
            </div>
            <div class="header-logo-right col-xl-10 d-flex align-items-center">
               <h1>FTU Room Reservation System</h1>
            </div>
         </div>
         <div class="header-signup col-xl-4 ">
            <div class="header-signup-item float-right mr-3" style="margin-top:90px" >
               <a href="../login.php" class="text-right">เข้าสู่ระบบ /</a>
               <a href="../register.php" class="text-right">สมัครสมาชิก</a>
            </div>
         </div>
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
               <li><a href="../userbookingroom.php"><img src="../img/menu-logo/booking1.png" alt=""><h3>จองห้องประชุม</h3></a></li>
               <li><a href="../staff/bookingrequest.php"><img src="../img/menu-logo/regulation.png" alt=""><h3>คำขอใช้ห้องประชุม</h3></a></li>
               <li><a href="../staff/bookingedit.php"><img src="../img/menu-logo/edit.png" alt=""><h3>แก้ไขการจองห้อง</h3></a></li>
               <li><a href="../staff/addroom.php"><img src="../img/menu-logo/insert1.png" alt=""><h3>เพิ่มห้องประชุม</h3></a></li>
               <li><a href="../staff/editroom.php"><img src="../img/menu-logo/edit1.png" alt=""><h3>แก้ไขห้องประชุม</h3></a></li>
               <li><a href="../admin/addmember.php"><img src="../img/menu-logo/staff.png" alt=""><h3>เพิ่มสมาชิก</h3></a></li>
               <li><a href="../admin/member.php"><img src="../img/menu-logo/team.png" alt=""><h3>สมาชิก</h3></a></li>
               <li><a href="#"><img src="../img/menu-logo/about-us.png" alt=""><h3>เกี่ยวกับเรา</h3></a></li>
            </ul>
         </div>
         <div class="main-content col-xl-9">
            <div class="content-container mx-5 my-4">
               <div class="content-title d-flex">
                  <div class="content-title-img ml-5">
                     <img src="../img/menu-logo/edit.png" alt="">
                  </div>
                  <div class="content-title-h ml-4">
                     <h3>แก้ไขการจองห้อง</h3>
                  </div>
               </div>
               <div class="content-search d-flex mt-5 mb-4">
                  <form method="post" class="input-group">                  
                     <select class="custom-select" id="">
                        <option value="allbuilding" selected>อาคารทั้งหมด</option>
                        <option value="scienceandit">วิทยาศาสตร์และเทคโนโลยี</option>
                        <option value="arts">ศิลปศาสตร์และสังคมศาสตร์</option>
                        <option value="education">ศึกษาศาสตร์</option>
                        <option value="islamic">อิสลามศึกษา</option>
                     </select>
                     <button class="content-search-button px-2 rounded-right" type="submit">ค้นหา</button>
                  </form>
               </div>
               <div class="content-table bg-dark">
                  <table class="text-center table table-bordered">
                     <thead>
                        <tr>
                           <th>ลำดับ</th>
                           <th>ชื่อผู้จอง</th>
                           <th>เริ่ม</th>
                           <th>สิ้นสุด</th>
                           <th>ห้อง</th>
                           <th>ชื่อห้องประชุม</th>
                           <th>เพิ่มเติม</th>
                           <th>สถานะ</th>
                           <th>แก้ไข</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>นาย ฟัรดี อูเซ็ง</td>                           
                           <td>10/12/6408.00น.</td>
                           <td>10/12/6410.00น.</td>
                           <td>107-11</td>
                           <td>หอประชุมวันม.นอร์ มะทา</td>
                           <td><a href="">ดูเพิ่มเติม</a></td>
                           <td class="text-success">อนุมัติ</td>
                           <td><a href="../staff/editpeoplebooking.php" class="btn btn-warning">แก้ไข</a></td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>นาย นุรดิน เจ็ะเลาะห์</td>
                           <td>10/12/6408.00น.</td>
                           <td>10/12/6410.00น.</td>
                           <td>107-11</td>
                           <td>วิจัย</td>
                           <td><a href="">ดูเพิ่มเติม</a></td>
                           <td class="text-danger">ไม่อนุมัติ</td>
                           <td><a href="../staff/editpeoplebooking.php" class="btn btn-warning">แก้ไข</a></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
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