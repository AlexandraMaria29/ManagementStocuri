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

$id_produs = "";
$tip = "";
$cantitate = "";
$nume = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $id_produs = $_POST["id_produs"];
    $tip = $_POST["tip"];
    $cantitate = $_POST["cantitate"];
    $nume = $_POST["nume"];

    do {
        if ( empty($id_produs) || empty($tip) || empty($cantitate) || empty($nume) ) {
            $errorMessage = "Este necesara completarea tuturor campurilor";
            break;
        }

        // add new client to database
        $sql =  "INSERT INTO buzeprod (id_produs, tip, cantitate, nume) " .
                "VALUES ('$id_produs', '$tip', '$cantitate', '$nume')";
        $result = $con->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $id_produs = "";
        $tip = "";
        $cantitate = "";
        $nume = "";

        $successMessage = "Adaugat cu succes";

        header("location: buze.php");
        exit;

    } while (false);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tenul.css">
    <link rel="stylesheet" href="index.css">
    <title>My Shop</title>
  </head>
<body>
    <div class="container my-5">
        <h2>Adauga produs</h2>

        <?php
        if ( !empty($errorMessage) ) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_produs" value="<?php echo $id_produs; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tip</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tip" value="<?php echo $tip; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Cantitate</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cantitate" value="<?php echo $cantitate; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nume</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nume" value="<?php echo $nume; ?>">
                </div>
            </div>


            <?php
            if ( !empty($successMessage) ) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="w3-button w3-deep-purple">Trimite</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="w3-button w3-deep-orange" href="buze.php" role="button">Anuleaza</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>