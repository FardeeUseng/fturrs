<?php
   require("../dbconnect.php");
   
   $id = $_GET['id'];
   $sql = "DELETE FROM reservation WHERE rserv_Id = $id";
   $result = mysqli_query($connect, $sql);

   if($result){
      header("location:bookingcheck.php");
      exit();
   }else {
      echo "เกิดข้อผิดพลาด". mysqli_error($connect);
   }

?>