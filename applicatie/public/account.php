<?php
    require_once "php/data_functions.php";
    session_start();

    if(isset($_SESSION['Login'])) {
        if(!$_SESSION['Login']) {
            header("Location: Login.php");
        }
    } else {
        header("Location: Login.php");
    }

    $customer = getCustomerData($_SESSION['email']);
   
    //TODO uitlog knop en alle pagina's bij de home page
    //TODO als je op een uitgeschreven account komt ga je hier heen en kan je opnieuw inschrijven en anders kan je uitschrijven.
?>

<!doctype html>

<html lang="nl">

<head>
<title>Fletnix - Account</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body class="filmbg bg">
    <nav class="back">
<a class="buttonlink" href="filmoverzicht.php">BACK</a>
    </nav>

<main class="account">
        <div class="centertext">
            <?="<h2>Welkom terug, {$customer['firstname']}</h2>"?>
            </div>
            <div class="centertext_link">
            <a class="buttonlink" href="email_wijzigen.php" >Email wijzigen</a>
            </div>
            <div class="centertext_link">
            <a class="buttonlink" href="Wachtwoord_wijzigen.php" >Wachtwoord wijzigen</a>
        </div>
    </main>
</body>