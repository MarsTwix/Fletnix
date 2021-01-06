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

<!doctype html>
<html>

<head>
    <title>Fletnix - Login</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="background-color:black;">

    <a class = "logo" href="homepage.html"> <img style="height: 100px;" src="img/logo.png"> </a>
    <div id="background">
        <img src="img/login_background.jpg" style="opacity: 0.4;" width="100%">
    </div>
     <header style="clear: both;"></header>

    <main class="center-screen" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 10px;">
        <h2>Inloggen</h2>

        <input type="email" placeholder="E-mail" name="email">
        <input type="Password" placeholder="Wachtwoord" name="password" style="margin-top: 10px;">
        <a href = "wachtwoord_vergeten.html" style="margin-bottom: 20px;">Wachtwoord vergeten</a>
        <a href = "registreren.html" style="margin-bottom: 20px;">Registreren</a>
        <a class="buttonlink" href = "filmoverzicht.html" style="margin-bottom: 20px;">Inloggen</a>
    </main>
</body>

</html>