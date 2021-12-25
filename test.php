<?php
   require('dbconnect.php');

   if($_POST){
      $email = $_POST['email'];
   $password = $_POST['password'];
   $name = $_POST['name'];
   $phone = $_POST['phonenumber'];

   if($_POST){
   $sql = "UPDATE users SET us_pass = '$password',us_name = '$name',us_email = '$email', us_phone = '$phone' WHERE users_Id = 100" ;
   $row = mysqli_query($connect,$sql);
   }
   }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo @$row['id']; ?>">
                        <div class="addroom-email d-flex">
                           <h3>อีเมล : </h3>
                           <input style="margin-left:181px;width:690px;" type="email" name="email" placeholder="Email" value="" require>
                        </div>  
                        <div class="addroom-password d-flex">
                           <h3>Password : </h3>
                           <input style="margin-left:103px;width:690px;" type="text" name="password" placeholder="password" value="" require>
                        </div>
                        <div class="addroom-confirmpassword d-flex">
                           <h3>ยืนยันรหัสผ่าน : </h3>
                           <input style="margin-left:35px;width:690px;" type="text" name="confirmpassword" placeholder="ยืนยันรหัสผ่าน" value="" require>
                        </div>
                        <div class="addroom-name d-flex">
                           <h3>ชื่อ-นามสกุล : </h3>
                           <input style="margin-left:63px;width:690px;" type="text" name="name" value="" placeholder="ชื่อ-นามสกุล" require>
                        </div>                 
                        <div class="addroom-phonenumber d-flex">
                           <h3>เบอร์โทร : </h3>
                           <input style="margin-left:123px;width:690px;padding-left:20px;" type="number" name="phonenumber" placeholder="เบอร์โทร" value="" require>
                        </div>                          
                        <div class="addroom-sex d-flex">
                           <h3>เพศ : </h3>
                           <select name="sex"  style="margin-left:200px;width:690px;">

                           </select>
                        </div>    

                        
                        <div class="addroom-button mt-3">
                           <button type="submit">แก้ไข</button>
                           <button type="reset">ยกเลิก</button>
                        </div>
                     </form>  
</body>
</html>
