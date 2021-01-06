<?php
require_once 'php/data_functions.php';
require_once 'php/simple_functions.php';

$testresult = "Nog geen Email & Wachtwoord ingevoerd";

if (isset($_POST["email"])) {
    $email = $_POST["email"];
} else {
    $email = '';
}

if (isset($_POST["password"])) {
    $password = $_POST["password"];
} else {
    $password = '';
}

if (empty($email) || empty($password)) {
    $testresult = "Email & Wachtwoord niet ingevoerd.";
} else {
    $testresult = "Email & Wachtwoord succesvol ingevoerd.";
    if (compareEmail($email)) {
        echo "Email aanwezig in de database. ";
        if (checkPassword($password, $email)) {
            echo "Wachtwoord correct";
            header("Location: index.php");
        } else {
            echo "Wachtwoord incorrect";
        }
    } else {
        echo "Email niet aanwezig in de database.";
    }
};

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

<body> 

<h1>Test voor het vinden van users</h1>

<h1>Login Test</h1>

<form action="databaseUsersTest.php" method="post">
E-mail <input type="text" name="email"><br>
Password <input type="password" name="password"><br>
<input type="submit">
</form>

<p><?=$testresult?></p>
<p>Ingevoerde email is: <?=$email?></p>
<p>Ingevoerd wachtwoord is: <?=$password?></p>

</body>

</html>