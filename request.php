<?php        
  $style = "request.css";
  session_start();

  include 'init.php';
  include 'navbar.php';
  include 'config.php';

  if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['recieveRequest'])){
    //if account already exists don't add
    // add to authentication
      $email =  $_POST["email"];
      $fullname = $_POST["fullname"];
      $phone = $_POST["phone"];
      $noOfFarms = $_POST['noOfFarms'];
      $time = $_POST['time'];
      $requestData = [
          "fullname" => $fullname,
          "email" => $email,
          "phone" =>$phone,
          'noOfFarms' => $noOfFarms,
          'time'=>$time,
      ];
      $ref_table = "request";
      $postRef = $database->getReference($ref_table)->push($requestData);
  
      if($postRef){
          $_SESSION['status'] = "Your request is sent successfully";
      }
      else{
        $_SESSION['status'] = "Your request is not sent successfully ";
      }
  }
  $noOfFarms = "unset"  ;
  if (isset($_POST['requestfarmsBTN'])) {
    $noOfFarms = $_POST['requestfarms'];
  }
  ?>
  <div class="container requestTxt">
  <?php
    if(isset($_SESSION['status'])){
      echo "
      <script>
      toastr.info('" . $_SESSION['status'] . "')
      </script>";
      unset($_SESSION['status']);}
    ?>

    <h1>Request our products</h1>

    For more detailed information, we encourage you to engage with us directly. Our experts will get back to you within one workday.
    If you have already started or are about to start using our management business and are interested in Plantera, please contact us by filling out the form below and get price details.
    If you want to monitor your farm or others, please contact us. Find the plan that suits you best on the Plantera pricing page.
  </div>

  <!-- Request form start here-->
  <div class="container requestform">
  <form action="request.php" method="POST">
      <div class="form-row">
        <div class="col-md-12">
          <input required type="text" name="fullname" class="form-control formInpt" placeholder="First and last name">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-12">
          <input required type="text" class="form-control formInpt" name="email" placeholder="Email">
        </div>
        <div class="col-md-12">
          <input required type="text" class="form-control formInpt" name="phone" placeholder="Phone">
        </div>
      </div>
      <div class="form-row">
        <div class=" col-md-12 ">
          <input  hidden required type="text" class="form-control formInpt" value="<?=$noOfFarms?>"name="noOfFarms" placeholder="How many farms do you want to install our system in">
        </div>
        <input type="hidden" name="time" value="<?=date("Y-m-d H:i:s");?>">
      </div>
      <input class="btn btn-primary requestBTN" name="recieveRequest" type="submit" value="Submit">
    </form>
    </div>
  <!-- Request form end here-->
