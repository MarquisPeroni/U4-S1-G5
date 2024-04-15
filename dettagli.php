<?php
include_once('config.php');

$mysqli = new mysqli($config['mysql_host'], $config['mysql_user'], $config['mysql_password'], 'gestione_libreria');
if($mysqli->connect_error) {
    die("Errore di connessione: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM libri";
$result = $mysqli->query($sql);

?>

<div class="container  ">
    <div class="row">
        <div class="col">

        
            <div class="card-deck d-flex gap-3 ">

                <?php
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="card mt-2">
                        <img class="card-img-top" src="<?php echo $row['immagine']; ?>" alt="immagine Card" style="height: 400px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['titolo']; ?></h5>
                                <p class="card-text">Author: <?php echo $row['autore']; ?></p>
                                <p class="card-text">Release Date <?php echo $row['anno_pubblicazione']; ?></p>
                                <p class="card-text">Genre: <?php echo $row['genere']; ?></p>
                                <a href="modifica.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Modify</a>
                                <a href="elimina.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
            </div>
        </div>
    </div>
</div>
