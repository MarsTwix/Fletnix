<?php
    require_once "php/data_functions.php";
    session_start();
    $customer = getCustomerData($_SESSION['email']);
?>

<!doctype html>

<html>

<head>
    <title>Fletnix - Account detail</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="bgcolor">
    <nav class="back">
        <a class="buttonlink" href="filmoverzicht.html">BACK</a>
    </nav>


    <main class="account">
        <div class="centertext">
            <?=$customer['customer_mail_address']?>
            </div>
            <div class="centertext link">
            <a class="buttonlink" href="account.html" >Email wijzigen</a>
            </div>
            <div class="centertext link">
            <a class="buttonlink" href="Wachtwoord_wijzigen.html" >Wachtwoord wijzigen</a>
        </div>

    </main>
</body>

</html>