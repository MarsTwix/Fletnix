<?php
    require_once 'php/simple_functions.php';
    $htmlPayment='';
    $paymentMethods = getPaymentMethods();
    $htmlPayment .= '<select name="payment method" id="payment method">';
    foreach($paymentMethods as $paymentMethod){
        $htmlPayment .= "<option value=$paymentMethod>$paymentMethod</option>";
    }
    $htmlPayment .= '</select>';
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

<body class = 'bg loginImg'>

    <header>
        <a href="homepage.html"> <img class = "logo" src="img/logo.png"> </a>
    </header>

    <main class="login blackbg">

        <div class="centertext">
            <h2>Kies uw betaalmethode</h2>
        </div>
        <! -- maak er een optie van net als bij registreren met landen -->
        <div class="centertext">
            <?=$htmlPayment?>
        </div>
        <! -- check of het wel nummer zijn -->
        <div class="centertext">
            <input type="text" placeholder="Rekeningnummer">
        </div>
            
        <div class="centertext link">
            <a class="buttonlink"  href="filmoverzicht.php">Betalen</a>
        </div>

        </form> 
    </main>
</body>