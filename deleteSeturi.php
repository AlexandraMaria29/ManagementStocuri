<?php

if ( isset($_GET["id_produs"]) ) {
    $id_produs = $_GET["id_produs"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "users";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM seturi WHERE id_produs=$id_produs";
    $connection->query($sql);
}

header("location: seturi.php");
exit;
?>