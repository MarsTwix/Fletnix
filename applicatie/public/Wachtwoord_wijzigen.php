<?php
session_start();

require_once 'php/data_functions.php';
require_once 'php/simple_functions.php';

//TODO als het niet klopt dan terug naar deze pagina + error dr bij

    if (!empty($_POST['newPassword']) && !empty($_POST['newPassword2'])) {
        if ($_POST['newPassword'] = $_POST['newPassword2']) {
            if (!compareEmail($_POST['newPassword'])) {
                alterUserData("password", $_SESSION['email'], password_hash($_POST['newPassword'], PASSWORD_DEFAULT));
            }
        }
    }
?>

<!doctype html>

<html>

<head>
    <title>Fletnix - Account info</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="filmbg bg">

    <nav class="back">
        <a class="buttonlink" href="account.php">BACK</a>
    </nav>

    <main class="center-screen filmbg bg">
        <h2 class="centertext">Wachtwoord wijzigen</h2>

        <form action="Wachtwoord_wijzigen.php" method="post"></form>
        <input name="newPassword" type="password" placeholder="Wachtwoord">
        <input name="newPassword2" type="password" placeholder="Herhaal Wachtwoord">
        <input type="submit">

        <a class="buttonlink" href = "account.php">wijzigen</a>
        
        </form>
    </main>
</body>

</html>