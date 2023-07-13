<?php        
  $style = "home.css";
  include 'init.php';
  include 'navbar.php';

  ?>
    <?php
    if(isset($_SESSION['status'])){
      echo "
      <script>
      toastr.info('" . $_SESSION['status'] . "')
      </script>";
      unset($_SESSION['status']);}
    ?>

  <div class="headerImg">
  </div> 
  <div class="container">
  <div class="homeContent">
    <p class="homeTXT">
        <span class="homeHeader">Plantera</span><br>
        To plant a garden is to believe in tmrw.
    </p>
    <button type="button" class="btn homebtn">Download it now</button>
    </div>
  </div>
  <div class="fluid-container aims">
    <div class="row">
    <p class="pre">Plantera is an app that aims to help farmers with</p>
    </div>
    <div class="row aimss">
    <div class="col-md-4 col-xs-12 item aim">
    <img src="imgs/intro1.png" alt="seedling" class="img-responsive center-block mb-3">
      <p>farm automation</p>
    </div>
    <div class="col-md-4 col-xs-12 item aim">
    <img src="imgs/intro2.png" alt="seedling" class="img-responsive center-block mb-3">
      <p>Crop yield detection</p>
    </div>
    <div class="col-md-4 col-xs-12 item aim">
    <img src="imgs/intro3.png" alt="seedling" class="img-responsive center-block mb-3">
      <p>plant diseases diagnoses</p>
    </div>

    </div>
  </div>
