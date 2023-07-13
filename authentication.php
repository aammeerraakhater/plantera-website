<?php 
use Firebase\Auth\Token\Exception\InvalidToken;
session_start();
include 'config.php';
if(isset($_SESSION['verified_user_id'])){
    $uid = $_SESSION['verified_user_id'];
    $idTokenString = $_SESSION['idTokenString'];
    try{
        $verifiedIdToken = $auth->verifyIdToken($idTokenString);
    }catch(InvalidToken $e){
        echo 'The token is invalid:' .$e->getMessage();
        $_SESSION['adminStatus'] = "Token Invalid/Expired. Login again";
        header("location: logout.php");
        exit();
    }catch (\InvalidArgumentExeption $e){
        echo 'The token could not be parsed:'.$e->getMessage();
    }}
    else{
    $_SESSION['adminStatus'] = "Login to access dashboard";
    header("location: login.php");
    exit();
}