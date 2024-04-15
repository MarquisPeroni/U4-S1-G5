<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno_di_pubblicazione = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];

    $sql = "UPDATE libri SET titolo='$titolo', autore='$autore', anno_pubblicazione='$anno_pubblicazione', genere='$genere' WHERE id=$id";

    if ($mysqli->query($sql) === TRUE) {
        echo "Dati aggiornati correttamente";
        header('Location: http://localhost/Backend/U4/U4-S1/U4-S1-G5/');
        exit;
    } else {
        echo "Errore nell'aggiornamento dei dati: " . $mysqli->error;
    }
}
?>