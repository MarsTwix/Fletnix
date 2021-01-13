<?php
require_once 'php/data_functions.php';
require_once 'php/simple_functions.php';


// Voer AUB eerst onderstaande query uit voordat het hashen van wachtwoorden start
//ALTER TABLE [Customer]
//ALTER COLUMN [password] VARCHAR(200) NOT NULL


$passwords = getAllPassword();

foreach($passwords AS $password) {
    echo $password[1];
    if(strlen($password[1]) >= 15) {
        hashDatabasePW($password[0], $password[1]);
    }
    echo "<br>";
}

?>

<!DOCTYPE HTML>
<html lang="nl">

<head>
    <title>Fletnix - Abonnementen</title>
    <link rel="stylesheet" href="style/normalize.css">
    <!-- <link rel="stylesheet" href="style/main.css"> -->
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>



</html>