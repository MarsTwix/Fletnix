<?php
  require_once 'php/data_functions.php';
  require_once 'php/view_functions.php';

  if(isset($_GET['titel'])){
    $titel = $_GET['titel'];
    $resultaten = zoekFilmsOpTitel($titel);
  }

  if(empty($resultaten)){
    $html = 'Geen resultaten';
  }

  else{
    $html = filmsNaarHTMl($resultaten);
  }
?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle films</title>
  </head>
  <body>
    <h1>Zoeken</h1>
    <form method="GET" action="">
      <div>
        <label for="titel">Titel: </label>
        <input type="text" name="titel" id="titel">
      </div>
      <input type="submit" value="Zoek">
    </form>
        <?=$html?>
  </body>
</html>
