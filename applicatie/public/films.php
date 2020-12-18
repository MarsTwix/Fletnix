<?php
  require_once 'php/data_functions.php';
  require_once 'php/view_functions.php';

  // Data ophalen
  $films = haalAlleFilmsOp();

  // HTML-broncode maken
  $html = filmsNaarHTML($films);

?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle films</title>
  </head>
  <body>

    <h1>Overzicht van alle films</h1>
    <?= $html ?>
  </body>
</html>
