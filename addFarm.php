<?php
  $style = "createacc.css";
  include 'init.php';
  include "authentication.php";
  if(isset($_SESSION['verified_user_id'])){
  require 'topNav.php';
  if(isset($_POST['addFarmKey'])){
    $id = $_POST['addFarmKey'];
    }?>
  <div class="container requestTxt">
    <h1>Add farms to existing accounts</h1>
  </div>

  <!-- Request form start here-->
  <div class="container requestform">
  <div  alt="add Farm picture" class="addFarm"></div>
    <form action="add.php" method="POST">
      <div class="form-row">
      <input  type="hidden"  name="id" value="<?=$id?>" class="form-control formInpt">
        <div class="col-md-12">
          <input required type="text" name="farmDes" class="form-control formInpt" placeholder="Farm Destenation">
        </div>
        <div class="col-md-12">
          <input required type="text" name="soiltype" class="form-control formInpt" placeholder="Soil type">
        </div>
      </div>
      <input class="btn btn-primary requestBTN" name="addFarm"type="submit" value="Add">
    </form>
    </div>
  <!-- Request form end here-->

<?php  }else{
    header("location:login.php");
  }
