<?php

   require('../dbconnect.php');

   // Start If post from memberstaff.php

   $id = $_GET['id'];
   $sql = "DELETE FROM staff WHERE staff_Id = $id";
   $result = mysqli_query($connect,$sql);
   
   if($result){
      header('location:memberstaff.php');
   }else{
      echo "Error". mysqli_error($connect);
   }
   // End If post from memberstaff.php

?>