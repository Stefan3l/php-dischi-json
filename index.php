<?php 
session_start(); // Start the session


// Display message if exists
if (isset($_SESSION['message'])) {
  echo '<div class="alert alert-success text-center">' . $_SESSION['message'] . '</div>';
  unset($_SESSION['message']); // Clear the message after displaying it
}

require_once __DIR__ . '/server.php';


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>php-dischi-json</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mt-4">Lista Dischi</h1>
    <hr>

    <div class="container bg-light mt-4 p-4 rounded-3 shadow-lg">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        foreach ($dischi as $disco) {
          echo '<div class="col ">';
          echo '<div class="d-flex flex-column h-100 rounded-3 p-4 shadow-lg bg-gray">';
          echo '<img src="' . $disco['url_della_cover'] . '" alt="Copertina di ' . $disco['titolo'] . '" class="img-fluid" style="height: 300px; object-fit: cover;">';
          echo '<div class="text-center mt-3">';
          echo '<h2 class="fs-3 text-truncate" style="max-width: 100%;">' . $disco['titolo'] . '</h2>';
          echo '<h3 class=" fs-4">' . $disco['artista'] . '</h3>';
          echo '<p class="fs-5">' . $disco['anno_di_pubblicazione'] . '</p>';
          echo '<p class="fs-6 fw-bold">' . $disco['genere'] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        } 
        ?>
      </div>
    </div>
    <hr>
    <div class="container">
      <h1 class="text-center my-3"> Aggiungi un disco</h1>
      <form action="server.php" method="POST" class="bg-light p-4 rounded-3 shadow-lg mb-5">
        <div class="d-flex flex-column gap-2">
        <label class="fs-5 fw-bold" for="titolo">Inserisci il titolo:</label>
        <input type="text" id="titolo" name="titolo" class="form-control mb-3" placeholder="Titolo del disco" required>
        </div>
        <div class="d-flex flex-column gap-2">
        <label class="fs-5 fw-bold" for="artista">Inserisci il artista:</label>
        <input type="text" id="artista" name="artista" class="form-control mb-3" placeholder="Artista del disco" required>
        </div>
        <div class="d-flex flex-column gap-2">
        <label class="fs-5 fw-bold" for="url_della_cover">Inserisci il url_della_cover:</label>
        <input type="text" id="url_della_cover" name="url_della_cover" class="form-control mb-3" placeholder="url_della_cover del disco" required>
        </div>
        <div class="d-flex flex-column gap-2">
        <label class="fs-5 fw-bold" for="anno_di_pubblicazione">Inserisci il anno_di_pubblicazione:</label>
        <input type="number" id="anno_di_pubblicazione" name="anno_di_pubblicazione" min="1000" max="2025" value="1000" class="form-control mb-3" placeholder="anno_di_pubblicazione del disco" required>
        </div>
        <div class="d-flex flex-column gap-2">
        <label class="fs-5 fw-bold" for="genere">Inserisci il genere:</label>
        <input type="text" id="genere" name="genere" class="form-control mb-3" placeholder="Genere del disco" required>
        </div>
        <div class="d-flex justify-content-center mb-5">
          <button type="submit" class="btn btn-primary ">Aggiungi Disco</button>
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>