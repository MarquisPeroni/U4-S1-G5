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
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['titolo']; ?></h5>
                                <p class="card-text">Author: <?php echo $row['autore']; ?></p>
                                <p class="card-text">Release Date <?php echo $row['anno_pubblicazione']; ?></p>
                                <p class="card-text">Genre: <?php echo $row['genere']; ?></p>
                                <a href="modifica.php?id=<?php echo $row['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                <a href="elimina.php?id=<?php echo $row['id'];  ?>" onclick="return confermaElimina();"><i class="fas fa-trash-alt text-danger"></i></a>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
            
            </div>
        </div>
    </div>
</div>
<script>
    function confermaElimina() {
        return confirm('Vuoi eliminare questo libro?');
    }
</script>