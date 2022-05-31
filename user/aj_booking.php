<?php

   require('../dbconnect.php');

   if (isset($_POST['function']) && $_POST['function'] == 'building') {
      $id = $_POST['id'];
      $sql = "SELECT * FROM room WHERE bd_Id = $id ";
      $query = @mysqli_query($connect, $sql);
      foreach ($query as $value) {
         // echo '<option value="'.$value['room_Id'].'">'.$value['r_name'].'</option>';
         echo '<option value="'.$value['room_Id'].'">'.$value['r_name']. '(' . $value['r_code']. ')' . '</option>';
         
      }
   }

?>