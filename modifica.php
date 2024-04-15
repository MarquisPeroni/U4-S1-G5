<?php 
include_once('start.php'); 
include_once('navbar.php'); 

include_once('config.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM libri WHERE id = $id";
    $result = $mysqli->query($sql);
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
?>
        <div class="container my-3">
            <h1 class="text-center">Modifica libro</h1>
            <form method="post" action="editcontroller.php" enctype="multipart/form-data" class="my-3">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <div class="mb-3">
                    <label for="titolo" class="form-label">Title</label>
                    <input type="text" class="form-control" id="titolo" placeholder="Titolo.." name="titolo" value="<?php echo $row['titolo']; ?>">
                </div>
                <div class="mb-3">
                    <label for="autore" class="form-label">Author</label>
                    <input type="text" class="form-control" id="autore" placeholder="Autore.." name="autore" value="<?php echo $row['autore']; ?>">
                </div>
                <div class="mb-3">
                    <label for="anno_pubblicazione" class="form-label">Release Date</label>
                    <input type="text" class="form-control" id="anno_pubblicazione" placeholder="Anno di pubblicazione.." name="anno_pubblicazione" value="<?php echo $row['anno_pubblicazione']; ?>">
                </div>
                <div class="mb-3">
                    <label for="genere" class="form-label">Genre</label>
                    <input type="tel" class="form-control" id="genere" placeholder="Genere.." name="genere" value="<?php echo $row['genere']; ?>">
                </div>
                <button type="submit" class="btn btn-dark">Update</button>
            </form>
        </div>
<?php
    } else {
        echo "Non è stato trovato alcun libro con l'ID fornito.";
    }
} else {
    echo "ID non valido";
}

include_once('end.php');
?>