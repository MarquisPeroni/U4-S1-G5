<?php
include_once('start.php'); 
include_once('config.php');
include_once('end.php'); 

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['titolo'])) {
        $errors[] = "Il campo Titolo è obbligatorio.";
    }
    if (empty($_POST['autore'])) {
        $errors[] = "Il campo Autore è obbligatorio.";
    }
    if (empty($_POST['anno_pubblicazione'])) {
        $errors[] = "Il campo Anno di pubblicazione è obbligatorio.";
    }
    if (empty($_POST['genere'])) {
        $errors[] = "Il campo Genere è obbligatorio.";
    }
    if (empty($_POST['immagine'])) {
        $errors[] = "Il campo Immagine è obbligatorio.";
    }

    if (empty($errors)) {
        $mysqli = new mysqli($config['mysql_host'], $config['mysql_user'], $config['mysql_password'], 'gestione_libreria');
        if($mysqli->connect_error) {
            die("Errore di connessione: " . $mysqli->connect_error);
        } 
        $titolo = $_POST['titolo'];
        $autore = $_POST['autore'];
        $anno_pubblicazione = $_POST['anno_pubblicazione'];
        $genere = $_POST['genere'];
        $immagine = $_POST['immagine'];

        $sql = "INSERT INTO libri (titolo, autore, anno_pubblicazione, genere, immagine) VALUES ('$titolo', '$autore', '$anno_pubblicazione', '$genere', '$immagine')";
        
        if ($mysqli->query($sql) === TRUE) {
            echo "I dati sono stati inseriti correttamente";
            exit(header('Location: http://localhost/Backend/U4/U4-S1/U4-S1-G5/'));
        } else {
            echo "Errore nell'inserimento dei dati: " . $mysqli->error;
        }

        $mysqli->close();
    } else {
        echo '<div class="alert alert-danger">';
        echo '<ul>';
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
        echo '<a href="index.php" class="btn btn-success">Torna alla Home</a>';
        echo '</div>';
    }
} else {
    echo "Nessun dato è stato inviato tramite il modulo";
}

?>
