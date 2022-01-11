<?php

   session_start();
   require('../dbconnect.php');
   // Start Access permission User, Staff and Admin

   if(!isset($_SESSION['user_login']) and !isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission User, Staff and Admin

   // Post data from Profileedit.php

   $id = $_POST['id'];
   $password = $_POST['password'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $sex = $_POST['sex'];
   $phone = $_POST['phonenum'];

   // Check Post
   if(empty($password)){
      $_SESSION['error_profile'] = "กรุณากรอกรหัสผ่าน";
      header('location:profileedit.php');
   }elseif(empty($name)){
      $_SESSION['error_profile'] = "กรุณากรอกชื่อ-นามสกุล";
      header('location:profileedit.php');
   }elseif(empty($email)){
      $_SESSION['error_profile'] = "กรุณากรอกอีเมล";
      header('location:profileedit.php');
   }elseif(empty($sex)){
      $_SESSION['error_profile'] = "กรุณาเลือกเพศ";
      header('location:profileedit.php');
   }elseif(empty($phone)){
      $_SESSION['error_profile'] = "กรุณากรอกเบอร์โทรศัพท์";
      header('location:profileedit.php');
   }else {
      
      // Update data
      if(isset($_SESSION['admin_login'])){
         $sql = "UPDATE admin SET ad_pass = '$password', ad_name = '$name', ad_email = '$email', ad_sex = '$sex', ad_phone = $phone WHERE admin_Id = $id";
         $result = mysqli_query($connect, $sql);
      }elseif(isset($_SESSION['staff_login'])){
         $sql = "UPDATE staff SET st_pass = '$password', st_name = '$name', st_email = '$email', st_sex = '$sex', st_phone = $phone WHERE staff_Id = $id";
         $result = mysqli_query($connect, $sql);
      }elseif(isset($_SESSION['user_login'])){
         $sql = "UPDATE users SET us_pass = '$password', us_name = '$name', us_email = '$email', us_sex = '$sex', us_phone = $phone WHERE users_Id = $id";
         $result = mysqli_query($connect, $sql);
      }
   }

   if($result){
      $_SESSION['editprofilesuccess'] = "แก้ไขข้อมูลสำเร็จ";
      header('location:profile.php');
   }


?>






<!-- <?php

   session_start();
   require('../dbconnect.php');
   // Start Access permission User, Staff and Admin

   if(!isset($_SESSION['user_login']) and !isset($_SESSION['staff_login']) and !isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission User, Staff and Admin

   // Post data from Profileedit.php

   $id = $_POST['id'];
   $password = $_POST['password'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $sex = $_POST['sex'];
   $phone = $_POST['phonenum'];

   // Check Post
   if(empty($password)){
      $_SESSION['error_profile'] = "กรุณากรอกรหัสผ่าน";
      header('location:profileedit.php');
   }elseif(empty($name)){
      $_SESSION['error_profile'] = "กรุณากรอกชื่อ-นามสกุล";
      header('location:profileedit.php');
   }elseif(empty($email)){
      $_SESSION['error_profile'] = "กรุณากรอกอีเมล";
      header('location:profileedit.php');
   }elseif(empty($sex)){
      $_SESSION['error_profile'] = "กรุณาเลือกเพศ";
      header('location:profileedit.php');
   }elseif(empty($phone)){
      $_SESSION['error_profile'] = "กรุณากรอกเบอร์โทรศัพท์";
      header('location:profileedit.php');
   }elseif(is_uploaded_file($_FILES['file']['tmp_name'])){
      if($_FILES['file']['error'] != 0){
         $_SESSION['error_profile'] = "อัปโหลดไฟลผิดพลาด";
         header('location:profileedit.php');
      }else{
         $file = $_FILES['file']['tmp_name'];
		   $content = addslashes(file_get_contents($file));
		   $name = $_FILES['file']['name'];
		   $type = $_FILES['file']['type'];
      }
   }else {
      
      // Update data
      if(isset($_SESSION['admin_login'])){
         $sql = "UPDATE admin SET ad_pass = '$password', ad_name = '$name', ad_email = '$email', ad_sex = '$sex', ad_phone = $phone, ad_profile = '$name$type' WHERE admin_Id = $id";
         $result = mysqli_query($connect, $sql);
      }elseif(isset($_SESSION['staff_login'])){
         $sql = "UPDATE staff SET st_pass = '$password', st_name = '$name', st_email = '$email', st_sex = '$sex', st_phone = $phone WHERE staff_Id = $id";
         $result = mysqli_query($connect, $sql);
      }elseif(isset($_SESSION['user_login'])){
         $sql = "UPDATE users SET us_pass = '$password', us_name = '$name', us_email = '$email', us_sex = '$sex', us_phone = $phone WHERE users_Id = $id";
         $result = mysqli_query($connect, $sql);
      }
   }

   if($result){
      $_SESSION['editprofilesuccess'] = "แก้ไขข้อมูลสำเร็จ";
      header('location:profile.php');
   }


?> -->