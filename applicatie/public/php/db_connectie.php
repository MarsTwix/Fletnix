<?php
  // Naam van server
$hostname = 'host.docker.internal';
// Naam van database
$dbname = 'FLETNIX_DOCENT';
// Hier je eigen gebruikersnaam
$username = 'applicatie';
// Hier je eigen password.
// Zet het wachtwoord in het echt nooit letterlijk in de broncode.
$pw = '1234';

// Connectie met de database ofwel de Database Handler (dbh).
$dbh = new PDO("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", $username, $pw);
// Tijdens het ontwikkelen is het handig om meteen ook de foutmeldingen vanuit de database te kunnen lezen.
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>