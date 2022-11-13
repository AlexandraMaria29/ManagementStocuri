<!Doctype html>  
<html>     
<head>  
<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">       
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="tenul.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<title>     
Stoc Seturi
</title>  
</head>  
<body id="seturi"> 
<div class="topnav">
    <a class="active" href="mainPage.php">
    <span class="material-icons">
home
</span>
    </a>
    <a href="ochi.php">Ochi</a>
    <a href="buze.php">Buze</a>
    <a href="ten.php">Ten</a>
    <a href="seturi.php">Seturi</a>
    <div class="search-container">
      <form action="/action_page.php">
        <input type="text" placeholder="Cautare..." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <a href="signUp.php">
    <span class="material-icons">
logout
</span>
    </a>
  </div>

<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
   // header("location: index.php");
    exit;
}
include 'includeProducts.php';
$con=conectare_mysql();
?>
<div class="tableAlgn">
  <h2>Cantitate Seturi</h2>
<table id="productTable">
  <thead>
    <tr>
      <th>id_produs</th>
      <th>tip</th>
      <th>cantitate</th>
      <th>nume</th>
      <th>actiune</th>
    </tr>
    <p><a class="w3-button w3-light-grey" href="addSet.php">Adauga</a></p>
  </thead>
<tbody>
  <?php
  echo '<link rel="stylesheet" type="text/css" href="ten.css">';
  $sql="SELECT * FROM seturi";
  $result=$con->query($sql);

  if(!$result){
    die("Invalid: " .$con->error);
  }
  while($row=$result->fetch_assoc()){
  echo
  "<tr>
    <td>". $row["id_produs"]."</td>
    <td>". $row["tip"]."</</td>
    <td>". $row["cantitate"]."</</td>
    <td>". $row["nume"]."</</td>
    <td>
    <a class='w3-button w3-deep-purple' href='updateSeturi.php?id_produs=$row[id_produs]'>+/-</a>
    <a class='w3-button w3-deep-orange' href='deleteSeturi.php?id_produs=$row[id_produs]'>Sterge </a>
    </td>
  </tr>";
}
  ?>
</tbody>  
</table>
</div>
<div class="graphClass" style="padding-left: 300px;">
    <table class="graph">
      <caption>Statisica lunara Vanzari
          <small>seturi</small>
      </caption>
      <thead>
        <tr>
          <th scope="col">Produs</th>
          <th scope="col">Vanzari</th>
        </tr>
      </thead><tbody>
        <tr style="height:90%">
          <th scope="row">Palete</th>
          <td><span>90%</span></td>
        </tr>
        <tr style="height:33%">
          <th scope="row">Seturi Ochi</th>
          <td><span>33%</span></td>
        </tr>
        <tr style="height:10%">
          <th scope="row">Seturi ten</th>
          <td><span>10%</span></td>
        </tr>
        <tr style="height:48%">
          <th scope="row">Seturi buze</th>
          <td><span>48%</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>   
</html>  
