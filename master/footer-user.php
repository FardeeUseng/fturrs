<style>

   /********** Start Footer **********/

   .footer{
      background-color:#BAC9B8;
   }
   .footer-link li img{
      width:35px;
      height:35px;
      border-radius:50%;
   }
   .footer-link li{
      list-style: none;
   }
   .footer-top{
      margin-top:20px;
      display:flex;
      height:70px;
      justify-content:center;
      align-items:center;
   }
   .footer-top h3{
      font-size:35px;
      color:#585858;
      font-weight:bold;
   }
   .footer-buttom{
      display:flex;
      height:74px;
      justify-content:center;
   }
   .footer-link{
      width:350px;
      height:70px;
      align-items:center;
      justify-content:space-between;
   }
   /********** End Footer **********/

   /********** Start 1800px screen **********/

   @media screen and (min-width:1800px){
      .footer-link li img{
         width:40px;
         height:40px;
      }
      .footer-top h3{
         font-size:40px;
      }
      .footer-top{
         margin-top:30px;
      }
   }
   /********** End 1800px screen **********/

   /********** Start 768px screen **********/

   @media screen and (max-width:768px){
      .footer-link li img{
         width:30px;
         height:30px;
      }
      .footer-top h3{
         font-size:30px;
      }
      .footer-top{
         margin-top:20px;
      }
   }
   /********** End 768px screen **********/

   /********** Start 576px screen **********/

   @media screen and (max-width:576px){
      .footer-link li img{
         width:25px;
         height:25px;
      }
      .footer-top h3{
         font-size:25px;
      }
      .footer-top{
         margin-top:20px;
      }
      .footer-link{
         width:200px;
         height:70px;
      }
   }
   /********** End 576px screen **********/

</style>

   <!---------- start Footer ---------->

   <div class="footer container-fluid">
      <div class="row">
         <div class="col-xl">
            <div class="footer-top">
            <h3>Fatoni University</h3>
         </div>
         <div class="footer-buttom">
            <ul class="footer-link d-flex">
               <li><a href="http://www.ftu.ac.th/2019/index.php/th/" target="_blank"><img src="../img/menu-logo/globe-grid.png" class="shadow"></a></li>
               <li><a href="https://web.facebook.com/FatoniUniversity" target="_blank"><img src="../img/menu-logo/facebook.png" class="shadow"></a></li>
               <li><a href="#" target="_blank"><img src="../img/menu-logo/instagram.png" class="shadow"></a></li>
               <li><a href="#" target="_blank"><img src="../img/menu-logo/twitter.png" class="shadow"></a></li>
               <li><a href="#" target="_blank"><img src="../img/menu-logo/youtube.png" class="shadow"></a></li>
            </ul>
         </div>
         </div>
      </div>
   </div>
   <!---------- End Footer ---------->