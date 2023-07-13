<?php        
  $style = "createacc.css";
  include 'init.php';
  include 'authentication.php';
  if(isset($_SESSION['verified_user_id'])){
  include 'topNav.php';
// fullname  companysName email phone cityURL noOfFarms
if (isset($_POST['editAccBTN']) || isset($_POST['editUserBTN'])) {
  ////////////////// Load data first time ////////////////////
if(isset($_POST['editAccBTN'])){
  $uid = $_POST['editaccKey'];
  try {
    $user = $auth->getUser($uid);
  } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
      echo $e->getMessage();
      $_SESSION['accStatus'] = "Some error occured try again later";
      header("location:showacss.php");
  }
}
//////////////////////////////////////////////
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['editUserBTN'])){
  $uid = $_POST['id'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $name = $_POST['fullname'];
  try {
    $userEmail = $auth->getUserByEmail($email);
    $userNumber = $auth->getUserByPhoneNumber($phone);
  } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
    $e->getMessage();
  }
  if((isset($userEmail)&& $userEmail->uid !=$uid)||(isset($userNumber)&& $userNumber->uid !=$uid)){
    $_SESSION['EditaccStatus'] = "Email or phone number already exist to other account";
    try {
      $user = $auth->getUser($uid);
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        echo $e->getMessage();
        $_SESSION['accStatus'] = "Some error occured try again later";
        header("location:showaccs.php");
    }}
  else{
    $properties = [
      'displayName' => $name,
      'email' => $email,
      'phoneNumber' => $phone,
  ];
    try {
      $updatedUser = $auth->updateUser($uid, $properties);
      $_SESSION['accStatus'] = "Updated successfully";
      header("location:showaccs.php"); 
  } catch (Exeption $e) {
    $e->getMessage();
    }
  }
    
}


/////////////////////// Show toastr ///////////////////////////
if(isset($_SESSION['EditaccStatus'])){
  echo "
  <script>
  toastr.info('" . $_SESSION['EditaccStatus'] . "')
  </script>";
  unset($_SESSION['EditaccStatus']);
} 

?>
    

  <div class="container requestTxt">
    <h1>Edit and update user's account</h1>
  </div>
  <!-- Request form start here-->
  <!-- fullname  companysName email phone cityURL noOfFarms-->
  <div class="container requestform">
    <div  alt="add Account picture" class="addAccount"></div>
    <form id="Requestform" onsubmit="return validateForm();" action="editAcc.php"  method="POST">
      <div class="form-row">
      <input  type="hidden"  name="id" value="<?=$user->uid;?>" class="form-control formInpt">

        <div class="col-md-12">
          <input required type="text"  name="fullname" value="<?=$user->displayName;?>" class="form-control formInpt" placeholder="First and last name">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-12">
          <input required type="email" id="myform_email" name="email" value="<?=$user->email;?>" class="form-control formInpt" placeholder="Email">
          <div id="email_error" class=" mb-2 error hidden">Please enter a valid email</div>
        </div>
        <div class="col-md-12">
          <input required type="tel" id="myform_phone" name="phone" value="<?=$user->phoneNumber;?>" class="form-control formInpt" placeholder="Phone">
          <div id="phone_error" class="error hidden">Please enter a valid phone number Ex: +201234567891</div>
        </div>
      </div>

      <input class="btn btn-primary requestBTN" name='editUserBTN' type="submit" value="Update">
    </form>
        </div>
      <div class="container requestform deleteFarms">
        <p>Delete user's farm(s)</p>
      <table  class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Farm</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody id="myTable">

        <?php
        $key = $user->uid;
      $ref_table = 'users/'.$key;
        $farms = $database->getReference($ref_table)->getValue();
        if($farms){
            $names = $database->getReference($ref_table)->getChildKeys();
            $i=1;
              foreach ($farms as $farm) {
                ?>
                      <tr>
                      <th scope="row"><?=$i?></th>
                      <td><?=$names[$i-1]?></td>
                      <td>
                        
                      <form action="delete.php" method="post">
                      <input type="hidden" name="deleteFarmUID" value="<?=$key?>">
                      <input type="hidden" name="deleteFarmName" value="<?=$names[$i-1]?>">
                      <input class="btn btn-danger" name="deleteFarm" type="submit" value="Delete">
                      </form>
                      </td>
                      </tr>
                      <?php
                      $i++;
              }  
            }
            else{
                ?>
                <td style="color:red;">There is no farms assigned to this user</td>
                <?php
            }
?>
      </div>
        <?php
} else {
  $_SESSION['accStatus'] = "Please select a user";
  header("location:showacss.php");
}
  }else{
     header("location:login.php") ;
  }

