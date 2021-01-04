<?php
require_once 'php/db_connectie.php';
  function haalAlleFilmsOp() {
    global $dbh;
    $films = $dbh->query("SELECT top(10) * FROM Movie");
    return $films->fetchAll();
  }

function zoekFilmsOpTitel($titel) {
  global $dbh;
  
  $titel = "%{$titel}%";

  // Schrijf hier je query zonder meteen al de data in de string te zetten met behulp van placeholders zoals `:titel`.
  $sql = "SELECT TOP(10) * FROM Movie WHERE title like :title ORDER BY publication_year";

  $query = $dbh->prepare($sql);

  $query->execute(array(":title" => $titel));
  // Heb je nog een andere FETCH type nodig? bijv PDO::FETCH_OBJ?
  return $query->fetchAll();
}


function checkLogin($userMail, $password) {

  global $dbh;

  $returnwaarde = false;

  $userMail = "$userMail";
  $password = "$password";
 
  $sql = "SELECT customer_mail_address, password  FROM Customer WHERE customer_mail_address = $userMail";

  $query = $dbh->prepare($sql);

  $query->execute(array(":title" => $titel));

  $query->fetchAll();

// If statement die checkt of database wachtwoord gelijk is aan $password
// if() {
// $returnwaarde = true;
// } else {
// $returnwaarde = false;
// }

return $returnwaarde;
}

//zoekt of $input in $location staat
function checkExistence($input, $location) {

  global $dbh;

  $returnwaarde = false;

  $result;
  $cel = "$input";
  $grid = "$location";
 
  $sql = "SELECT input  FROM grid";

  $query = $dbh->prepare($sql);

$query->bind_param($cel, $grid);

  $query->execute();

  $query->fetchAll();
 
  $result = $query->fetchAll();

  if(isset($result)){
    return true;
  } else {
    return false;
  }

return null;
}

?>