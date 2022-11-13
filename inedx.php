<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: signUp.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">       
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>

    <body background="sparkle.png">
    <div class="container">
        <h1>Welcome to our Stock Management App</h1>
        <img src="login2.png"/>
    <form method="POST" action="#">
      <div>
         <input  type="text" name="username" placeholder="Enter your email">
      </div>
      <div>
         <input  type="password" name="password" placeholder="Password">
      </div>
      <input type="submit" name="submit" value="LOGIN" class="btn-login">
   </form>

  </div>
    </body>
</html>