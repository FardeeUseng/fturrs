<!---------- start if click hamberger-menu ---------->

<script>
   $(document).ready(function(){
      $(".hamberger-menu").click(function(){
         $(".main-menu").toggle("slow")
      })
      
   })
</script>
<!---------- End if click hamberger-menu ---------->

<style>

   .main-manu-items li img{
      width:40px;
      height:40px;
   }
   .main-manu-items li{
      list-style:none;
      padding:23px 0px;
      height:90px;
      list-style: none;
      align-items: center;
      padding-left:20px;
   }
   .main-manu-items li h3{
      align-items:center;
      margin-left:17px;
      display:inline;
      color:#585858;
      font-size:26px;
   }
   .main-manu-items li a:hover{
      text-decoration:none;
   }
   .main-manu-items li a{
      display:flex;
      align-items:center;
   }

   .main-manu-items li:hover,.main-manu-items a h3:hover{
      background-color:#72916C;
      color:#F0F8FF;
   }

   /********** Start 1800px screen **********/

   @media screen and (min-width:1800px){
      .main-manu-items li img{
         width:55px;
         height:55px;
      }
      .main-manu-items li{
         padding:20px 0px;
         height:90px;
         padding-left:35px;
      } 
      .main-manu-items li h3{
         margin-left:35px;
         font-size:30px;
      }
   }
   /********** End 1800px screen **********/

   /********** Start 1200px screen **********/

   @media screen and (max-width:1200px){
      .main-manu-items li img{
         width:40px;
         height:40px;
      }
      .main-manu-items li{
         padding:15px 0px;
         height:70px;
         padding-left:20px;
      } 
      .main-manu-items li h3{
         margin-left:20px;
         font-size:20px;
      }
   }
   /********** End 1200px screen **********/

   /********** Start 767px screen **********/

   @media screen and (max-width:767px){
      .main-manu-items li img{
         width:35px;
         height:35px;
      }
      .main-manu-items li{
         height:65px;
         padding-left:15px;
      } 
   }
   /********** End 767px screen **********/

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
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
            min-height:380px;
         }
      <?php } ?>
      .main-manu-items li img{
         width:30px;
         height:30px;
      }
      .main-manu-items li{
         height:60px;
      }
      .main-manu-items li h3{
         margin-left:10px;
         font-size:20px;
      }
   }
   /********** End 576px screen **********/
</style>

<!---------- start main-manu ---------->

   <ul class="main-manu-items">
<?php if(isset($_SESSION['admin_login'])){ ?>
      <li><a href="index.php"><img src="img/menu-logo/calendar.png" alt=""><h3>ปฎิทินการจองห้อง</h3></a></li>
      <li><a href="bookingdetail.php"><img src="img/menu-logo/booking.png" alt=""><h3>ข้อมูลการจองห้อง</h3></a></li>
      <li><a href="checkroom.php"><img src="img/menu-logo/meeting-room.png" alt=""><h3>รายการห้องประชุม</h3></a></li>
      <li><a href="./user/bookingcheck.php"><img src="img/menu-logo/booking2.png" alt=""><h3>การจองห้องของคุณ</h3></a></li>
      <li><a href="./user/bookingroom.php"><img src="img/menu-logo/booking1.png" alt=""><h3>จองห้องประชุม</h3></a></li>
      <li><a href="./staff/bookingrequest.php"><img src="img/menu-logo/regulation.png" alt=""><h3>คำขอใช้ห้องประชุม</h3></a></li>
      <li><a href="./staff/bookingedit.php"><img src="img/menu-logo/edit.png" alt=""><h3>แก้ไขการจองห้อง</h3></a></li>
      <li><a href="./staff/addroom.php"><img src="img/menu-logo/insert1.png" alt=""><h3>เพิ่มห้องประชุม</h3></a></li>
      <li><a href="./staff/editroom.php"><img src="img/menu-logo/edit1.png" alt=""><h3>แก้ไขห้องประชุม</h3></a></li>
      <li><a href="./admin/addmember.php"><img src="img/menu-logo/staff.png" alt=""><h3>เพิ่มสมาชิก</h3></a></li>
      <li><a href="./admin/member.php"><img src="img/menu-logo/team.png" alt=""><h3>สมาชิก</h3></a></li>
<?php }elseif(isset($_SESSION['staff_login'])){ ?>
      <li><a href="index.php"><img src="img/menu-logo/calendar.png" alt=""><h3>ปฎิทินการจองห้อง</h3></a></li>
      <li><a href="bookingdetail.php"><img src="img/menu-logo/booking.png" alt=""><h3>ข้อมูลการจองห้อง</h3></a></li>
      <li><a href="checkroom.php"><img src="img/menu-logo/meeting-room.png" alt=""><h3>รายการห้องประชุม</h3></a></li>
      <li><a href="./user/bookingcheck.php"><img src="img/menu-logo/booking2.png" alt=""><h3>การจองห้องของคุณ</h3></a></li>
      <li><a href="./user/bookingroom.php"><img src="img/menu-logo/booking1.png" alt=""><h3>จองห้องประชุม</h3></a></li>
      <li><a href="./staff/bookingrequest.php"><img src="img/menu-logo/regulation.png" alt=""><h3>คำขอใช้ห้องประชุม</h3></a></li>
      <li><a href="./staff/bookingedit.php"><img src="img/menu-logo/edit.png" alt=""><h3>แก้ไขการจองห้อง</h3></a></li>
      <li><a href="./staff/addroom.php"><img src="img/menu-logo/insert1.png" alt=""><h3>เพิ่มห้องประชุม</h3></a></li>
      <li><a href="./staff/editroom.php"><img src="img/menu-logo/edit1.png" alt=""><h3>แก้ไขห้องประชุม</h3></a></li>
<?php }elseif(isset($_SESSION['user_login'])){ ?>
      <li><a href="index.php"><img src="img/menu-logo/calendar.png" alt=""><h3>ปฎิทินการจองห้อง</h3></a></li>
      <li><a href="bookingdetail.php"><img src="img/menu-logo/booking.png" alt=""><h3>ข้อมูลการจองห้อง</h3></a></li>
      <li><a href="checkroom.php"><img src="img/menu-logo/meeting-room.png" alt=""><h3>รายการห้องประชุม</h3></a></li>
      <li><a href="./user/bookingcheck.php"><img src="img/menu-logo/booking2.png" alt=""><h3>การจองห้องของคุณ</h3></a></li>
      <li><a href="./user/bookingroom.php"><img src="img/menu-logo/booking1.png" alt=""><h3>จองห้องประชุม</h3></a></li>
<?php }else{ ?>
      <li><a href="index.php"><img src="img/menu-logo/calendar.png" alt=""><h3>ปฎิทินการจองห้อง</h3></a></li>
      <li><a href="bookingdetail.php"><img src="img/menu-logo/booking.png" alt=""><h3>ข้อมูลการจองห้อง</h3></a></li>
      <li><a href="checkroom.php"><img src="img/menu-logo/meeting-room.png" alt=""><h3>รายการห้องประชุม</h3></a></li>
<?php } ?>
      <li><a href="aboutus.php"><img src="img/menu-logo/about-us.png" alt=""><h3>เกี่ยวกับเรา</h3></a></li>
   </ul>
<!---------- end main-manu ---------->