<?php        
  $style = "logIn.css";
  session_start();
  include 'init.php';
  include "config.php";

  if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["adminLogin"])){
      $email = $_POST["email"];
      $clearTextPassword = $_POST["password"];
      $uid = $_POST["uid"];

      try {
        $user = $auth->getUserByEmail($email);
        $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
      
        if($signInResult && $user->uid != $uid){
          $_SESSION['fraudadmin'] = "Please use right credentials ";
          header("location:login.php");
          exit();
        }
        $idTokenString = $signInResult->idToken();
        try{
          $verifiedIDToken = $auth->verifyIDToken($idTokenString);
          $uid = $verifiedIDToken->claims()->get('sub');

          $_SESSION['verified_user_id'] = $uid;
          $_SESSION['idTokenString'] = $idTokenString;

          $_SESSION['adminStatus'] = "You are now logged in";
          header('location:dashboard.php');
          exit();
        }catch(invalidToken $e){
          echo "The token is invalid". $e->getMessage();
        }
        catch (\InvalidArgumentExeption $e){
          echo "The token couldn't be parsed:".$e->getMessage();
        }

      }catch(\Kreait\Firebase\Exception\Auth\UserNotFound $e){
        $_SESSION['fraudadmin'] = "No email found";
        header("location:login.php");
        exit();
    }catch(Kreait\Firebase\Auth\SignIn\FailedToSignIn $e){
        $_SESSION['fraudadmin'] = "Please use right credentials ";
        header("location:login.php");
        exit();
    }
      }
  ?>

<div class="container">
  <?php
    if(isset($_SESSION['fraudadmin'])){
      echo "
      <script>
      toastr.info('" . $_SESSION['fraudadmin'] . "')
      </script>";
      unset($_SESSION['fraudadmin']);}
    ?>

      <div class="containerimg">
      </div>
      <div class="formcontainer">
    <form action="login.php" method="POST">
    <div class="form-group ">
    <label for="exampleInputEmail1">Email address</label>
    <input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">Enter your email address</small>
    </div>

    <div class="form-group ">
    <label for="exampleInputEmail1">ID</label>
    <input required type="password" name="uid" class="form-control" id="exampleInputEmail1" >
    <small id="emailHelp" class="form-text text-muted">Enter your id </small>
  </div>

    <div class="form-group ">
    <label for="exampleInputEmail1">Password</label>
    <input required type="password" name="password" class="form-control" id="exampleInputEmail1" >
    <small id="emailHelp" class="form-text text-muted">Enter your password </small>
  </div>

    <button name='adminLogin' type='submit' class="btn btn-primary btn-block btn-submit">Login </button>   
 </form>

      </div>
</div>
<!--  -->