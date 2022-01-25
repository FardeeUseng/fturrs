<style>
   .inform{
      background-color: #FF8C00;
      width:30px;
      height: 30px;
      border-radius:50%;
      position:absolute;
      top:605px;
      right:2px;
   }
   .inform p{
      display:flex;
      color:#585858;
      font-size:20px;
      justify-content:center;
      align-items:center;
   }
   .inform p:hover{
      background-color:#FFA500;
      cursor:context-menu;
   }

   /********** Start 1800px screen **********/

   @media screen and (min-width:1800px){
      .inform{
         width:40px;
         height: 40px;
         top:625px;
         right:20px;
      }
      .inform p{
         font-size:27px;
      }
   }
   /********** End 1800px screen **********/

   /********** Start 1200px screen **********/

   @media screen and (max-width:1200px){
      .inform{
         top:500px;
         right:5px;
      }
   }
   /********** End 1200px screen **********/

   /********** Start 768px screen **********/

   @media screen and (max-width:768px){
      .inform{
         top:473px;
         right:5px;
      }
   }
   /********** End 768px screen **********/

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
      .inform{
         top:445px;
         right:5px;
      }
   }
   /********** End 576px screen **********/
   
</style>

<?php

// If Starff Loign

if(isset($_SESSION['staff_login'])){
   $id = $_SESSION['staff_login'];
   $bd_Id = $_SESSION['bd_Id'];
   
      $numm_sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE reservation.bd_Id = $bd_Id AND reservation.rserv_status = 'pendingApproval'"; 
      $numm_result = mysqli_query($connect, $numm_sql);
      $numm_row = mysqli_num_rows($numm_result);

}

// If Admin Login

if(isset($_SESSION['admin_login'])){

   $numm_sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE reservation.rserv_status = 'pendingApproval'"; 
   $numm_result = mysqli_query($connect, $numm_sql);
   $numm_row = mysqli_num_rows($numm_result);

}

?>

<?php if($numm_row > 0){ ?>
   <div class="inform">
      <p class="shadow rounded-circle"><?php echo $numm_row; ?></p>
   </div>
<?php } ?>