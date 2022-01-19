<?php if($row['r_img'] == ''){ ?>
                           <div class="upload-img">
                              <form method="post" enctype="multipart/form-data">
                                 <input type="hidden" name="room" value="<?php echo $row['room_Id']; ?>">
                                 <div class="upload-file">
                                    <label for="uploadimg" id="uploadimgg" class="shadow">
                                       <i class="fas fa-cloud-upload-alt mr-2"></i>
                                       <span id="label_span">อัพโหลดรูปห้อง</span>
                                    </label>
                                 </div>                                                   
                                 <input type="file" name="file" accept="image/*" id="uploadimg" class="d-none">
                                 <button type="submit" name="upload" id="submit" class="shadow">อัพโหลด</button>
                              </form>
                           </div>
                        <?php }else{ ?>
                           <img src="./img/uploads/<?php echo $row['r_img']; ?>" alt="">
                        <?php } ?>