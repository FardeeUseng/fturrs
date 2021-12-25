<?php

   require('../dbconnect.php');

   // Start If post from memberuser.php

   $id = $_GET['id'];
   $sql = "DELETE FROM users WHERE users_Id = $id";
   $result = mysqli_query($connect,$sql);

   if($result){
      header('location:member.php');
   }
   // End If post from memberuser.php
?>