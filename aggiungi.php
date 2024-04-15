<?php 
    include_once('start.php'); 
    include_once('navbar.php'); 
?>

<div class="container my-3">
        <h1 class="text-center mx-auto my-5" style="background-color: rgba(0, 0, 0, 0.7); color: white; border-radius: 10px; max-width: 500px;">Aggiungi un libro</h1>
        <form method="post" action="addcontroller.php" enctype="multipart/form-data" class="my-3">
            <div class="mb-3">
                <label for="titolo" class="form-label fw-bold text-white">Title</label>
                <input type="text" class="form-control" id="titolo" placeholder="Titolo..." name="titolo">
            </div>
            <div class="mb-3">
                <label for="autore" class="form-label fw-bold text-white">Author</label>
                <input type="text" class="form-control" id="autore" placeholder="Autore..." name="autore">
            </div>
            <div class="mb-3">
                <label for="anno_di_pubblicazione" class="form-label fw-bold text-white">Release Date</label>
                <input type="text" class="form-control" id="anno_pubblicazione" placeholder="Anno di pubblicazione..." name="anno_pubblicazione">
            </div>
            <div class="mb-3">
                <label for="genere" class="form-label fw-bold text-white">Genre</label>
                <input type="tel" class="form-control" id="genere" placeholder="Genere..." name="genere">
            </div>
            <button type="submit" class="btn btn-dark">Add a Book</button>
        </form>
    </div>

<?php
    include_once('end.php');
?>