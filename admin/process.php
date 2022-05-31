<?php

require('../dbconnect.php');

if(isset($_POST['brow'])){
   $sql = "SELECT * FROM building";
   $result = mysqli_query($connect, $sql);
   $order = 1;

   $oupt = "";
   $oupt .= "<table class='table table-bordered table-hover'>";
   $oupt .= "<tr>
               <th class='text-center'>ลำดับ</th>
               <th>อาคาร</th>
            </tr>";
   while($row = mysqli_fetch_array($result)){
      $oupt .= "<tr>
                  <td class='text-center'>" . $order++ . "</td>
                  <td>{$row['bd_name']}</td>
               </tr>";
   }
   $oupt .= "</table>";
   echo $oupt;
   exit();
}

if(isset($_POST['rrow'])){
   $sql = "SELECT * FROM room LEFT JOIN building ON room.bd_Id = building.bd_Id";
   $result = mysqli_query($connect, $sql);
   $order = 1;

   $oupt = "";
   $oupt .= "<table class='table table-bordered table-hover'>";
   $oupt .= "<tr>
               <th class='text-center'>ลำดับ</th>
               <th>อาคาร</th>
               <th>ห้อง</th>
            </tr>";
   while($row = mysqli_fetch_array($result)){
      $oupt .= "<tr>
                  <td class='text-center'>" . $order++ . "</td>
                  <td>{$row['bd_name']}</td>
                  <td>{$row['r_name']}</td>
               </tr>";
   }
   $oupt .= "</table>";
   echo $oupt; 
   exit();
}

if(isset($_POST['arow'])){
   $sql = "SELECT * FROM admin";
   $result = mysqli_query($connect, $sql);
   $order = 1;

   $oupt = "";
   $oupt .= "<table class='table table-bordered table-hover'>";
   $oupt .= "<tr>
               <th class='text-center'>ลำดับ</th>
               <th>ชื่อผู้ดูแลระบบ</th>
            </tr>";
   while($row = mysqli_fetch_array($result)){
      $oupt .= "<tr>
                  <td class='text-center'>" . $order++ . "</td>
                  <td>{$row['ad_name']}</td>
               </tr>";
   }
   $oupt .= "</table>";
   echo $oupt; 
   exit();
}

if(isset($_POST['srow'])){
   $sql = "SELECT * FROM staff LEFT JOIN building ON staff.bd_Id = building.bd_Id";
   $result = mysqli_query($connect, $sql);
   $order = 1;

   $oupt = "";
   $oupt .= "<table class='table table-bordered table-hover'>";
   $oupt .= "<tr>
               <th class='text-center'>ลำดับ</th>
               <th>ชื่อผู้ดูแลห้อง</th>
               <th>อาคาร</th>
            </tr>";
   while($row = mysqli_fetch_array($result)){
      $oupt .= "<tr>
                  <td class='text-center'>" . $order++ . "</td>
                  <td>{$row['st_name']}</td>
                  <td>{$row['bd_name']}</td>
               </tr>";
   }
   $oupt .= "</table>";
   echo $oupt; 
   exit();
}

if(isset($_POST['urow'])){
   $sql = "SELECT * FROM users";
   $result = mysqli_query($connect, $sql);
   $order = 1;

   $oupt = "";
   $oupt .= "<table class='table table-bordered table-hover'>";
   $oupt .= "<tr>
               <th class='text-center'>ลำดับ</th>
               <th>ชื่อผู้ใช้งาน</th>
            </tr>";
   while($row = mysqli_fetch_array($result)){
      $oupt .= "<tr>
                  <td class='text-center'>" . $order++ . "</td>
                  <td>{$row['us_name']}</td>
               </tr>";
   }
   $oupt .= "</table>";
   echo $oupt; 
   exit();
}

if(isset($_POST['arrow'])){
   $sql = "SELECT * FROM reservation LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN building ON reservation.bd_Id = building.bd_Id WHERE reservation.rserv_status = 'approve'";
   $result = mysqli_query($connect, $sql);
   $order = 1;

   $oupt = "";
   $oupt .= "<table class='table table-bordered table-hover'>";
   $oupt .= "<tr>
               <th class='text-center'>ลำดับ</th>
               <th>ชื่ออาคาร</th>
               <th>ชื่อห้อง</th>
            </tr>";
   while($row = mysqli_fetch_array($result)){
      $oupt .= "<tr>
                  <td class='text-center'>" . $order++ . "</td>
                  <td>{$row['bd_name']}</td>
                  <td>{$row['r_name']}</td>
               </tr>";
   }
   $oupt .= "</table>";
   echo $oupt; 
   exit();
}

if(isset($_POST['pprow'])){
   $sql = "SELECT * FROM reservation LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN building ON reservation.bd_Id = building.bd_Id WHERE reservation.rserv_status = 'pendingApproval'";
   $result = mysqli_query($connect, $sql);
   $order = 1;

   $oupt = "";
   $oupt .= "<table class='table table-bordered table-hover'>";
   $oupt .= "<tr>
               <th class='text-center'>ลำดับ</th>
               <th>ชื่ออาคาร</th>
               <th>ชื่อห้อง</th>
            </tr>";
   while($row = mysqli_fetch_array($result)){
      $oupt .= "<tr>
                  <td class='text-center'>" . $order++ . "</td>
                  <td>{$row['bd_name']}</td>
                  <td>{$row['r_name']}</td>
               </tr>";
   }
   $oupt .= "</table>";
   echo $oupt; 
   exit();
}

if(isset($_POST['bookingDetail'])){
   $id = $_POST['id'];
   $sql = "SELECT * FROM reservation LEFT JOIN building ON reservation.bd_Id = building.bd_Id LEFT JOIN room ON reservation.room_Id = room.room_Id LEFT JOIN organization ON reservation.org_Id = organization.org_Id LEFT JOIN major ON reservation.major_Id = major.major_Id WHERE rserv_Id = $id";
   $result = mysqli_query($connect, $sql);
   $row = mysqli_fetch_array($result);

   $sex = "";
   if($row["rserv_status"] === "approve"){
      $sex .= "<p class='text-success'>อนุมัติ</p>";
   }elseif($row["rserv_status"] === "disapproved"){
      $sex .= "<p class='text-danger'>ไม่อนุมัติ</p>";
   }else{
      $sex .= "<p class='text-primary'>รอการอนุมัติ</p>";
   }
   $oupt = "";
   $oupt .= "<table class='table table-bordered table-hover'>";
   $oupt .= "<tr>
               <td><label>ชื่อผู้จอง</label></td>
               <td>{$row['peoplename']}</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>อาคาร</label></td>
               <td>{$row['bd_name']}</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>เลขห้อง</label></td>
               <td>{$row['r_code']}</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>ชื่อห้อง</label></td>
               <td>{$row['r_name']}</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>เริ่ม</label></td>
               <td>" . date("d-m-Y",strtotime($row["startdate"])). " / " .date("H:m",strtotime($row["starttime"])) . "</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>สิ้นสุด</label></td>
               <td>" . date("d-m-Y",strtotime($row["enddate"])). " / " .date("H:m",strtotime($row["endtime"])) . "</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>จุดประสงค์</label></td>
               <td>{$row['obj']}</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>สถานะ</label></td>
               <td>" . $sex . "</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>เบอร์โทร</label></td>
               <td>{$row['phone']}</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>จำนวนผู้เข้าร่วม</label></td>
               <td>{$row['numpeople']}</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>รหัสนักศึกษา/บุคลากร</label></td>
               <td>{$row['people_Id']}</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>สังกัดองค์กร/คณะ</label></td>
               <td>{$row['org_name']}</td>
            </tr>";
   $oupt .= "<tr>
               <td><label>หน่วยงาน/สาขา/ชมรม</label></td>
               <td>{$row['major_name']}</td>
            </tr>";
   $oupt .= "</table>";
   echo $oupt;
   exit();
}

?>