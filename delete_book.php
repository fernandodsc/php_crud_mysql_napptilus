<?php 
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM book WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if (!$result) {

   
    die("Algo salió mal...");
}

//redireccionamos
header("Location: list.php");
}


?>