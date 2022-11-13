<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
   // header("location: index.php");
    exit;
}
include 'include.php';
$con=conectare_mysql();
 
// Include config file

 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
        $email=htmlspecialchars($email);

    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
        $password=htmlspecialchars($password);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        //$sql = "SELECT id, email, password FROM utilizatori WHERE email = ?";
        //Parola=1234 pana acum
        $password_md5=md5($password);
        $sql="INSERT INTO utilizatori (email, password) VALUES ( '$email',' $password_md5')";

 if($con->query($sql)=== TRUE){
     header('Location: mainPage.php');
 }
 else{
    echo "Nu a mers";
 }
        

        }
    
    
    // Close connection
    mysqli_close($link);
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
         <input  type="text" name="email" placeholder="Enter your email">
      </div>
      <div>
         <input  type="password" name="password" placeholder="Password">
      </div>
      <input type="submit" name="submit" value="LOGIN" class="btn-login">
   </form>

  </div>
    </body>
</html>