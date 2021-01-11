<?php
require_once 'php/db_connectie.php';
// Een query net zoals we dat wel vaker in SQL doen.

$query = <<<EOD
DROP TABLE IF EXISTS fletnix_user;
CREATE TABLE fletnix_user (
    userID INT PRIMARY KEY IDENTITY(1,1),
    username VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO fletnix_user (username)
VALUES ('student')
EOD;
// Query uitvoeren.
$result = $dbh->exec($query);

// Alle users ophalen.
$users = $dbh->query('SELECT * from fletnix_user');

//Resultaten per rij printen.
foreach($users as $row) {
  print_r($row);
}

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 10; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}
echo "<br> random code: {$randomString} <br>";

header("Location: pages.php");

?>

<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <a href='homepage.html'>films.php</a> 
  <a href='databaseUsersTest.php'>databaseUsersTest</a>
  </body>
</html>


