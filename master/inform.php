<style>
   .inform{
      
      background-color: #FF8C00;
      width:40px;
      height: 40px;
      border-radius:50%;
      position:absolute;
      top:637px;
      right:40px;
   }
   .inform p{
      display:flex;
      color:#585858;
      font-size:25px;
      justify-content:center;
      align-items:center;
   }
   .inform p:hover{
      background-color:#FFA500;
      cursor:context-menu;
   }
</style>

<?php

if(isset($_SESSION['staff_login'])){
   $id = $_SESSION['staff_login'];
   $bd_Id = $_SESSION['bd_Id'];
   
      $numm_sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id WHERE reservation.bd_Id = $bd_Id AND reservation.rserv_status = 'pendingApproval'"; 
      $numm_result = mysqli_query($connect, $numm_sql);
      $numm_row = mysqli_num_rows($numm_result);

}

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