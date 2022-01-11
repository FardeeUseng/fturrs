<?php

   require('../dbconnect.php');

   if (isset($_POST['function']) && $_POST['function'] == 'building') {
      $id = $_POST['id'];
      $sql = "SELECT * FROM staff WHERE bd_Id = $id ";
      $query = mysqli_query($connect, $sql);
      foreach ($query as $value) {
         echo '<option value="'.$value['staff_Id'].'">'.$value['st_name'].'</option>';
         
      }
   }

?>