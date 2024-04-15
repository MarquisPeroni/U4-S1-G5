<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $titolo = mysqli_real_escape_string($mysqli, $_POST['titolo']);
    $autore = mysqli_real_escape_string($mysqli, $_POST['autore']);
    $anno_pubblicazione = mysqli_real_escape_string($mysqli, $_POST['anno_pubblicazione']);
    $genere = mysqli_real_escape_string($mysqli, $_POST['genere']);
    $immagine = mysqli_real_escape_string($mysqli, $_POST['immagine']);

    $sql = "UPDATE libri SET titolo='$titolo', autore='$autore', anno_pubblicazione='$anno_pubblicazione', genere='$genere', immagine='$immagine' WHERE id=$id";

    if ($mysqli->query($sql) === TRUE) {
        echo "Dati aggiornati correttamente";
        header('Location: http://localhost/Backend/U4/U4-S1/U4-S1-G5/');
        exit;
    } else {
        echo "Errore nell'aggiornamento dei dati: " . $mysqli->error;
    }
}
?>