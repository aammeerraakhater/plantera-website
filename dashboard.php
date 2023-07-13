<?php
  $style = "showaccs.css";
  $semanticstyle = "semantic.min.css";
  include 'init.php';
  include 'authentication.php';
  if(isset($_SESSION['verified_user_id'])){
    require 'topNav.php';
    ?>
       <?php
       if(isset($_SESSION['adminStatus'])){
         echo "
         <script>
         toastr.success('" . $_SESSION['adminStatus'] . "')
         </script>";
         unset($_SESSION['adminStatus']);}
       ?>
   
   <div id="layoutSidenav_content">
           <main>
           <div class="container-fluid">
               <h1 class="mt-4">Plantera admin-page</h1>
               <ol class="breadcrumb mb-4">
                   <li class="breadcrumb-item active">Dashboard</li>
               </ol>
               <div class="row">
                   <div class="col-xl-3 col-md-6">
                       <div class="card bg-primary text-white mb-4">
                           <div class="card-body">Farmers' accounts</div>
                           <div class="card-footer d-flex align-items-center justify-content-between">
                               <a class="small text-white stretched-link" href="showaccs.php">View Details</a>
   
                               <div class="small text-white"><i class="far fa-hand-point-right"></i></div>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-3 col-md-6">
                       <div class="card bg-success text-white mb-4">
                           <div class="card-body">Contact-us History</div>
                           <div class="card-footer d-flex align-items-center justify-content-between">
                               <a class="small text-white stretched-link" href="showRequests.php">View Details</a> 
                               <div class="small text-white"><i class="far fa-hand-point-right"></i></div>
                           </div>
                       </div>
                   </div>
               </div>
               </div>
           </div>
       </main>
       <?php
     }else{
      header("location:login.php");
  }

