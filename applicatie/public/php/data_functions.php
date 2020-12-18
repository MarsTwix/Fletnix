<?php
require_once 'php/db_connectie.php';
  function haalAlleFilmsOp() {
    global $dbh;
    $films = $dbh->query("SELECT top(10) * FROM Movie");
    return $films->fetchAll();
  }

$titel;
if (!empty($_GET['titel'])) {
  // Om films te zoeken waar de titel lijkt op %bla%
  $titel = '%';
  $titel .= htmlspecialchars($_GET['titel']);
  $titel .= '%';
}

function zoekFilmsOpTitel($titel) {
  global $dbh;
  
  // Schrijf hier je query zonder meteen al de data in de string te zetten met behulp van placeholders zoals `:titel`.
  $sql = 'SELECT TOP(10) * FROM Movie WHERE title like :title ORDER BY publication_year';

  $query = $dbh->prepare($sql);
  $query->execute(array(':titel' -> $titel));
  // Heb je nog een andere FETCH type nodig? bijv PDO::FETCH_OBJ?
  return $query->fetchAll();
}
?>