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

</style>

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
               <?php if(isset($_SESSION['male'])){ ?>
                  <a href="../user/profile.php"><img style="width:85px;height:85px;margin-right:20px;" src="../img/menu-logo/boy1.png" alt=""></a>
               <?php }else{ ?>
                  <a href="../user/profile.php"><img style="width:85px;height:85px;margin-right:20px;" src="../img/menu-logo/gilr1.png" alt=""></a>
               <?php } ?>
               <a href="../index.php?logout='1'" class="btn btn-danger">ออกจารระบบ</a>
            </div>
         </div>
         <?php }else{ ?>
         <div class="header-signup-item justify-content-end d-flex pr-5 col-xl-4 m-0" style="width:100px;">
            <select class="form-select" aria-label="Default select example" onchange="location = this.value;" id="login">
               <option selected>เข้าสู่ระบบ</option>
               <option value="user_login.php">ผู้ใช้งานทั่วไป</option>
               <option value="staff_login.php">ผู้ดูแลห้อง</option>
               <option value="admin_login.php">ผู้ดูแลระบบ</option>
            </select>
            <a href="../register.php" class="text-right">สมัครสมาชิก</a>
         </div>
         <?php } ?>
      </div>
   </div>