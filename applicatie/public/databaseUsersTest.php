<?php
require_once 'php/data_functions.php';
require_once 'php/simple_functions.php';

$testresult = "Nog geen Email & Wachtwoord ingevoerd";

if (isset($_POST["Testemail"])) {
    $Testemail = $_POST["Testemail"];
} else {
    $Testemail = '';
}

if (isset($_POST["Testpassword"])) {
    $Testpassword = $_POST["Testpassword"];
} else {
    $Testpassword = '';
}

if (empty($Testemail) || empty($Testpassword)) {
    $testresult = "Email & Wachtwoord niet ingevoerd.";
} else {
    $testresult = "Email & Wachtwoord succesvol ingevoerd.";
    if (compareEmail($Testemail)) {
        echo "Email aanwezig in de database. ";
        if (checkPassword($Testpassword, $Testemail)) {
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

<h1>Login Test</h1>

<form action="databaseUsersTest.php" method="post">
E-mail <input type="text" name="Testemail"><br>
Password <input type="password" name="Testpassword"><br>
<input type="submit">
</form>

<p><?=$testresult?></p>
<p>Ingevoerde email is: <?=$Testemail?></p>
<p>Ingevoerd wachtwoord is: <?=$Testpassword?></p>

<p>Werkend Email: a.nunc@seddolor.com</p>
<p>Werkend PW bij Email: In</p>

</body>

</html>