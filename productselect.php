<?php

include "conect.php";
$sql = "SELECT * FROM products";

$result = $conn->query($sql); 
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  $Titl=$row["numeProdus"]." ";
	  $Autor=$row["cantitate"]." ";
	  $Categ=$row["pret"]." ";
	  $Editu=$row["stoc"]." ";
	  echo "<div id=\"BookZon\"><ul id=\"categ-prod-list\"><li id=\"categ-prod-item\"><img src=\"De ce.jpg\" id=\"BookImgZon\"><p id=\"BookTextZon\">zas</p></li></ul></div>";}
  
}
?>