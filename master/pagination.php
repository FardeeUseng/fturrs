<style>

   #page-link-number{
      background-color:#BAC9B8; 
      color:#585858;
   }

   #page-link-number:hover{
      background-color:#d9e3d8;
      color:white;
   }

   #page-link{
      background-color:#3D5538;
      color:white;
   }

   #page-link:hover{
      background-color:#BAC9B8;
      color:#585858;
   }

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
      #page-link-number1, #page-link-number2{
         display:none;
      }
   }
   /********** End 576px screen **********/

</style>

<!---------- Start Page navigation ---------->

   <nav aria-label="Page navigation">
      <ul class="pagination mt-3">
         <li class="page-item <?=$page == 1 ? 'disabled' : '' ?>" id="page-link-number1">
            <a class="page-link" id="page-link" href="?page=1" tabindex="-1">หน้าแรก</a>
         </li>
         <li class="page-item <?=$page > 1 ? '' : 'disabled' ?>">
         <a class="page-link" id="page-link-number" href="?page=<?=$page-1?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
         </a>
         </li>
         <?php for($i=1; $i <= $page_total; $i++): ?>
            <?php if($page <= 2): ?>
               <?php if($i <= 5): ?>
                  <li class="page-item <?=$page == $i ? 'disabled' : '' ?>"><a class="page-link" <?=$page == $i ? 'style="background-color:#3D5538;color:white"' : '' ?> id="page-link-number" href="?page=<?=$i?>"><?=$i?></a></li>
               <?php endif ?>
            <?php elseif($page > 2): ?>
               <?php if($i <= $page+2 && $i >= $page-2): ?>
                  <li class="page-item <?=$page == $i ? 'disabled' : '' ?>"><a class="page-link" <?=$page == $i ? 'style="background-color:#3D5538;color:white"' : '' ?> id="page-link-number" href="?page=<?=$i?>"><?=$i?></a></li>
               <?php endif ?>
            <?php endif ?>

         <?php endfor ?>
         <li class="page-item <?= $page < $page_total ? '' : 'disabled' ?>">
            <a class="page-link" id="page-link-number" href="?page=<?=$page+1?>" aria-label="Next">
               <span aria-hidden="true">&raquo;</span>
               <span class="sr-only">Next</span>
            </a>
         </li>
         <li class="page-item <?= $page >= $page_total ? 'disabled' : '' ?>" id="page-link-number2">
            <a class="page-link" id="page-link" href="?page=<?=$page_total?>">หน้าสุดท้าย</a>
         </li>
      </ul>
   </nav>
<!---------- End Page navigation ---------->