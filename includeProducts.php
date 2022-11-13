<?php

//   // Informatii baza de date
// 	$host = "localhost"; //aici numele serverului
// 	$user = "root"; // aici userul
// 	$passw = ""; //parola
// 	$db_name = "vote"; // numele bazei de date
// 	// Create connection
// 	$conn =  mysqli_connect($host, $user, $passw, $db_name);

// 	// Check connection
// 	if (mysqli_connect_errno()) {
// 		echo "failed to connect:".mysqli_connect_error();
// 	 }
	
// 	 <?php



	 function conectare_mysql()
	  { // Informatii baza de date
		$host = "localhost"; //aici numele serverului
		$user = "root"; // aici userul
		$passw = ""; //parola
		$db_name = "users"; // numele bazei de date
		// Create connection
		$conn =  mysqli_connect($host, $user, $passw, $db_name);
	
		// Check connection
		if (mysqli_connect_errno()) {
			echo "failed to connect:".mysqli_connect_error();
		 }
		  else {  return $conn; }
	 }
	 
	 function cleanInput($input) {
	  // curatire pt. atacuri XSS cros site scripting 
	  $search = array(
		 '@<script[^>]?>.?</script>@si',   // Strip out javascript
		 '@<[\/\!]?[^<>]?>@si',            // Strip out HTML tags
		 '@<style[^>]?>.?</style>@siU',    // Strip style tags properly
		 '@<![\s\S]?--[ \t\n\r]>@'         // Strip multi-line comments
	   );
	   $output = preg_replace($search, '', $input);
	   return $output;
	   }
	 function curata($data)
	 { // curatire contra SQL Injection si XSS(cross site scripting)	
		 $data  = cleanInput($data); // curatire pt. atacuri XSS cros site scripting 
		 // a mySQL connection is required before using this function
		 // transforma caracterele speciale in escape (\x00, \n, \r, \, ', " and \x1a.) 
		 // $data = mysql_real_escape_string($data);
	  return $data;
	 }
	 ?>  
<!-- ?> -->