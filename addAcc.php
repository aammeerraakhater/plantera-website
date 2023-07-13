<?php        
  $style = "createacc.css";
  include 'init.php';
  include 'authentication.php';
  if(isset($_SESSION['verified_user_id'])){
  include 'topNav.php';
?>    

  <div class="container requestTxt">
    <h1>Create user's first account</h1>
  </div>
  <div class="container requestform">

  <?php
    if(isset($_SESSION['accStatus'])){
      echo "
      <script>
      toastr.info('" . $_SESSION['accStatus'] . "')
      </script>";
      unset($_SESSION['accStatus']);
   } 
    ?>
  <!-- Request form start here-->
  <!-- fullname  companysName email phone cityURL noOfFarms-->
    <div  alt="add Account picture" class="addAccount"></div>
    <form id="Requestform"  onsubmit="return validateForm();"action="add.php" method="POST">
      <div class="form-row">
        <div class="col-md-12">
          <input required type="text" name="fullname" class="form-control formInpt" placeholder="First and last name">
        </div>
      </div>

      <div class="form-row">
      <div class="col-md-12">
          <input required type="email" id="myform_email" name="email"  class="form-control  formInpt" placeholder="Email">
          <div id="email_error" class=" mb-2 error hidden">Please enter a valid email</div>
        </div>
        <div class="col-md-12">
          <input required type="tel" id="myform_phone" name="phone" class="form-control  formInpt" placeholder="Phone">
          <div id="phone_error" class="mb-2 error hidden">Please enter a valid phone number Ex: +201234567891</div>
        </div>
      </div>
      

      <div class="form-row">
      <div class=" col-md-12 ">
          <input required type="text" name="farmDes" class="form-control formInpt" placeholder="Farm's destenation">
        </div>
        <div class=" col-md-12 ">
          <input type="text" name="soilType" class="form-control formInpt" placeholder="Soil type">
        </div>
      </div>

      <input name="createUserAccBtn" class="btn btn-primary requestBTN" type="submit" value="Create">
    </form>
    </div></div>
  <!-- Request form end here-->

<?php  }else{

  }
