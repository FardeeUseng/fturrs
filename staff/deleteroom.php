<?php

   require("../dbconnect.php");

   $id = $_GET['id'];
   $sql = "DELETE FROM room WHERE room_Id = $id ";
   $result = mysqli_query($connect, $sql);

   if($result){
      header("location:editroom.php");
      exit();
   }else{
      echo "ลบข้อมูลไม่สำเร็จ";
   }

?>