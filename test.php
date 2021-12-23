<?php
   require('dbconnect.php');

   $building = $_POST['building'];
   $staff = $_POST['staff'];
   $room = $_POST['roomname'];
   $coderoom = $_POST['coderoom'];
   $capacity = $_POST['roomcapacity'];
   $status = $_POST['roomstatus'];
   $roomimage = $_POST['roomimage'];
   $equipment = implode(',',$_POST['equipment']);

   $sql = "INSERT INTO room(bd_Id,staff_Id,r_name,r_capacity,r_img,r_status,r_code,r_equipment) VALUES($building,$staff,'$room',$capacity,'$roomimage','$status','$coderoom','$equipment')";
   $result = mysqli_query($connect,$sql);

   if($result){
      header('location:checkroom.php');
      exit(0);
   }else{
      echo mysqli_error($connect);
   }

   // $sql = "INSERT INTO room(bd_Id,staff_Id,r_name,r_capacity,r_status,r_code,r_equipment)VALUES(11,504,'ประชุม',80,'ใช้งานได้','109-10','โปรเจคเตอร์')";
   // $result = mysqli_query($connect,$sql);

   // if($result){
   //    echo "query success";
   // }else{
   //    echo "error";
   // }

   // $sql = "INSERT INTO building(bd_Id,bd_name)VALUES('14','อิสลามศึกษา')";
   // $result = mysqli_query($connect,$sql);

   // $sql = "INSERT INTO staff(bd_Id,st_user,st_pass,st_name,st_sex,st_email,st_phone)VALUES(11,'staff','staff11','staff','male','staff@gmail.com','0650505204')";
   // $result = mysqli_query($connect,$sql);

   // $sql = "INSERT INTO room(bd_Id,staff_Id,r_name,r_capacity,r_status,r_code,r_equipment)VALUES(11,502,'คอม',50,'ใช้งานได้','107-10','โปรเจคเตอร์')";
   // $result = mysqli_query($connect,$sql);
?>
