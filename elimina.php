<?php
include_once('config.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM libri WHERE id = $id";

    if($mysqli->query($sql) === TRUE) {
        echo "Libro eliminato correttamente!";
    } else {
        echo "Error durante la eliminazione del libro: " . $mysqli->error;
    }

    header('Location: http://localhost/Backend/U4/U4-S1/U4-S1-G5/');
    exit;
} else {
    echo "ID non valido";
}
?>