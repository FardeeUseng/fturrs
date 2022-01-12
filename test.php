<?php

require("dbconnect.php");
   $sql = "SELECT * FROM building";
   $result = mysqli_query($connect, $sql);

   while($row = mysqli_fetch_array($result)){
      $name[] = $row['bd_name'];
   }
   // echo $name['0'];
   // if(is_array($name)){
   //    echo "OK";
   // }
   // print_r($name);

   // foreach($name as $names){
   //    echo "$names";
   // }
   // echo $name[0];
   $sql2 = "SELECT * FROM building";
   $result2 = mysqli_query($connect, $sql2);
   $row2 = mysqli_fetch_array($result2);
   $bd = $row2['bd_name'];
   // echo "$bd";
   // if(is_string($bd)){
   //    echo "OK";
   // }

   foreach($name as $value){
      if($value == $bd){
         echo $value . "1";
      }else{
         echo $value;
      }
      
   }


   
?>