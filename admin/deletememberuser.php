<?php

   session_start();
   require('../dbconnect.php');
      
   // Start Access permission Admin

   if(!isset($_SESSION['admin_login'])){
      $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
      header('location:../index.php');
   }
   // End Access permission Admin

   // Start If post from memberuser.php

   $id = $_GET['id'];
   $sql = "DELETE FROM users WHERE users_Id = $id";
   $result = mysqli_query($connect,$sql);

   if($result){
      header('location:member.php');
   }
   // End If post from memberuser.php
?>