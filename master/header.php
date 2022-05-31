<script>
   // $(document).ready(function(){
   //    $("#headerRightProfile").mouseover(function(){
   //       $("#headerRightProfile").animate({"width" : "100px", "height" : "100px", "marginLeft" : "4px"},"slow")
   //    })
   //    $("#headerRightProfile").mouseout(function(){
   //       $("#headerRightProfile").animate({"width" : "85px", "height" : "85px", "marginLeft" : "10px"},"slow")
   //    })

   // })
</script>

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
      height:200px;
      background-color:#BAC9B8;
   }
   .header-logo-left img{
      width:100px;
      height:100px;
      border-radius:50%;
   }
   .header-logo-right h1{
      color:#585858;
      font-size:32px;
      font-weight:bold;
      margin-left:20px;
   }
   .header-logo-right a{
      text-decoration:none;
   }
   .header-signup-name a{
      color:#585858;
      font-size:16px;
      float:right;
   }
   .header-signup-name a:hover{
      color:#3C94EC;
      text-decoration:none;
   }
   .header-signup-item select {
      background-color:#3D5538;
      color:#E9F1E6;
      border-radius:5px;
      font-size:22px;
      width: 170px;
      height: 50px;
      padding-left:20px;
      margin-right:10px;
      border:none;
   }
   .header-signup-profile{
      display:flex;
      justify-content:center;
      align-items:center;
      margin-right:25px;
      background-color:#3D5538;
      width:80px;
      height:80px;
      border-radius:50%;
   }
   .logo-user-loaded img{
      width:80px;
      height:80px;
      border-radius:50%;
      margin-right:20px;
   }
   .float-right a{
      text-decoration:none;
      color:#585858;
   }
   .float-right a:hover{
      color:#3D5538;
   }
   .header-signup-user{
      padding-left:25px;
      padding-right:0px;
   }
   .header-signup-profile img{
      width:70px;
      height:70px;
      border-radius:50%;
   }
   .header-signup-item a{
      margin-top:10px;
      font-size:20px;
      color:#585858;
   }
   .header-signup-item a:hover{
      color:#3C94EC;
      text-decoration:none;
   }
   .header-logo-right-h2{
      display:none;
   }
   .hamberger-menu{
      display:none;
   }

   /********** Start 1800px screen **********/

   @media screen and (min-width:1800px){
      .header-container{
         height:220px;
      }
      .header-logo-left img{
         width:120px;
         height:120px;
      }
      .header-logo-right h1{
         font-size:45px;
         margin-left:0px;
      }
      .header-signup-name a{
         font-size:28px;
      }
      .header-signup-profile{
         width:100px;
         height:100px;
      }
      .header-signup-profile img{
         margin-top:9px;
         width:90px;
         height:90px;
      }
      .header-signup-item a{
         margin-top:5px;
         font-size:25px;
      }
      .header-signup-item a:hover{
         color:#3C94EC;
      }
   }
   /********** End 1800px screen **********/

   /********** Start 1200px screen **********/

   @media screen and (max-width:1200px){
      .header-container{
         height:150px;
      }
      .header-logo-left img{
         width:80px;
         height:80px;
         margin-left:-55px;
      }
      .header-logo-right h1{
         font-size:35px;
         margin-left:5px;
      }
      .header-signup-name a{
         font-size:20px;
         margin-left:-15px;
      }
      .header-signup-profile,.header-signup-profile img{
         width:70px;
         height:70px;
      }
      .header-logo-right-h1, .header-signup-name{
         display:none;
      }
      .hamberger-menu, .header-logo-right-h2 {
         display:block;
      }
      .header-signup-item select{
         width:125px;
         font-size:20px;
         padding:10px;
      }
      .hamberger-menu i{
         font-size:40px;
         margin-left:-7px;
         color:#585858;
         cursor:pointer;
      }
      
   }
   /********** End 1200px screen **********/

   /********** Start 768px screen **********/

   @media screen and (max-width:768px){
      .header-container{
         height:120px;
      }
      .hamberger-menu i{
         font-size:30px;
      }
      .header-logo-left img{
         width:60px;
         height:60px;
      }
      .header-logo-right h1{
         font-size:30px;
         margin-left:-30px;
      }
      .logo-user-loaded img, .header-signup-profile, .header-signup-profile img{
         width:55px;
         height:55px;
      }
      .header-signup-logout a{
         font-size:15px;
      }
      .header-signup-item a{
         margin-right: -35px;
         font-size:15px;
      }
      .header-signup-item select{
         font-size:18px;
         width:116px;
      }
   } 
   /********** End 768px screen **********/

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
      .header-container{
         height:100px;
      }
      .hamberger-menu i{
         font-size:30px;
      }
      .header-logo-left img{
         margin-left:-33px;
      }
      .header-logo-right h1{
         font-size:20px;
         margin-left:00px
      }
      .header-logo-right{
         margin:10px;
      }
      .header-signup-item{
         padding-right:50px;
      }
      .header-signup-item select{
         height:40px;
         width:100px;
         padding:0px;
      }
      .header-signup-logout-2 i{
         font-size:30px;
         color:#585858;
         margin-left:30px;
      }
      .header-signup-profile{
         margin-left:70px;
      }
      .logo-user-loaded img{
         margin-left:65px;
      }
      .header-signup-item a{
         margin-left:-10px;
         font-size:13px;
      }
   } 
   /********** End 576px screen **********/

</style>

   <!---------- start header ---------->

   <div class="container-fluid">
      <div class="header-container row d-flex align-items-center">
         <div class="header-logo col-xl-8 col-md-7 col-sm-7 col-5 m-0 row d-flex align-items-center">
            <div class="hamberger-menu col-md-2 col-sm-2 col-2">
               <i class="fas fa-bars"></i>
            </div>
            <div class="header-logo-left col-xl-2 col-md-2 col-sm-3 col-3 pl-5">
               <a href="index.php"><img src="img/Ftu_logo.png" class="shadow"></a>
            </div>
            <div class="header-logo-right col-xl-10 col-md-8 col-sm-7 col-5 d-none d-sm-block">
               <a href="index.php"><h1 class="header-logo-right-h1">FTU Room Reservation System</h1></a>
               <a href="index.php"><h1 class="header-logo-right-h2 d-none d-sm-block d-xl-none">FTU RRS</h1></a>
            </div>
         </div>
         <?php if(isset($_SESSION['name'])){?>
         <div class="header-sigup col-xl-4 col-md-5 col-sm-5 col-7 m-0 row d-flex">
            <div class="header-signup-name d-xl-flex justify-content-end align-items-center col-xl-5">
               <a href="user/profile.php"><?php echo $_SESSION['name']; ?></a>
            </div>
            <div class="header-signup-user col-xl-3 col-md-5 col-sm-4 col-6 d-flex justify-content-center align-items-center">
               <?php if(isset($_SESSION['us_prof'])){ ?>
                  <div class="logo-user-loaded">
                     <a href="user/profile.php"><img src="img/profiles/<?php echo $_SESSION['us_prof']; ?>" class="shadow"></a>
                  </div>
               <?php }else{ ?>
                  <?php if($_SESSION['male'] == "male"){ ?>
                     <div class="header-signup-profile shadow">
                        <a href="user/profile.php"><img id="headerRightProfile" src="img/menu-logo/boy1.png"></a>
                     </div>
                  <?php }else{ ?>
                     <div class="header-signup-profile shadow">
                        <a href="user/profile.php"><img id="headerRightProfile" src="img/menu-logo/gilr1.png"></a>
                     </div>
                  <?php } ?>
               <?php } ?>
            </div>
            <div class="header-signup-logout d-sm-flex d-none d-sm-block align-items-center col-xl-4 col-md-7 col-sm-8 col-6">
               <a href="index.php?logout='1'" class="btn btn-danger px-1" onclick="return confirm('ยืนยันออกจากระบบ?')">ออกจากระบบ</a>
            </div>
            <div class="header-signup-logout-2 d-flex d-sm-none align-items-center col-xl-4 col-md-7 col-sm-8 col-6">
               <a href="index.php?logout='1'" onclick="return confirm('ยืนยันออกจากระบบ?')"><i class="fas fa-sign-out-alt"></i></a>
            </div>
         </div>
         <?php }else{ ?>
         <div class="header-signup-item justify-content-end align-items-center d-flex col-xl-4 col-md-5 col-sm-5 col-7 m-0">
            <select class="form-select" aria-label="Default select example" onchange="location = this.value;" id="login">
               <option selected>เข้าสู่ระบบ</option>
               <option value="user_login.php">ผู้ใช้งานทั่วไป</option>
               <option value="staff_login.php">ผู้ดูแลห้อง</option>
               <option value="admin_login.php">ผู้ดูแลระบบ</option>
            </select>
            <a href="register.php" class="text-right mb-md-2">สมัครสมาชิก</a>
         </div>
         <?php } ?>
      </div>
   </div>
   <!---------- end header ---------->