<?php
  print_r(PDO::getAvailableDrivers());

  // Naam van server
$hostname = 'host.docker.internal';
// Naam van database
$dbname = 'FLETNIX_DOCENT';
// Hier je eigen gebruikersnaam
$username = 'application';
// Hier je eigen password.
// Zet het wachtwoord in het echt nooit letterlijk in de broncode.
$pw = '1234';

// Connectie met de database ofwel de Database Handler (dbh).
$dbh = new PDO("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", $username, $pw);
// Tijdens het ontwikkelen is het handig om meteen ook de foutmeldingen vanuit de database te kunnen lezen.
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

// Resultaten per rij printen.
foreach($users as $row) {
  print_r($row);
}

print_r ("Geen errors in php p
       :)")
?>



