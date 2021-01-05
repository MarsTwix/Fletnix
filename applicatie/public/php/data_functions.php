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

  $userMail = $userMail;
  $password = $password;
 
  $sql = "SELECT customer_mail_address, password  FROM Customer WHERE customer_mail_address = $userMail";

  $query = $dbh->prepare($sql);

  $query->execute(array(":title" => $titel));

  $query->fetchAll();

return $returnwaarde;
}

//zoekt of $input in $location staat
function checkEmail($email) {
  global $dbh;

  $sql = "SELECT customer_mail_address FROM Customer WHERE customer_mail_address = :email";

  $query = $dbh->prepare($sql);

  $query->execute(array(":email" => $email));
  $returnvalue = $query->fetchAll();
  return $returnvalue[0]['customer_mail_address'];
}

?>