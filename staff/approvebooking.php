<?php

   require("../dbconnect.php");

   $id = $_GET["id"];
   $sql = "UPDATE reservation SET rserv_status = 'approve' WHERE rserv_Id = $id";
   $result = mysqli_query($connect, $sql);

   if($result){
      header("location:../bookingdetail.php");
      exit();
   }else{
      echo "เกิดข้อผิดพลาด" . mysqli_error($connect);
   }

?>