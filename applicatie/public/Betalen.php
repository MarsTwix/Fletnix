<?php
    require_once 'php/simple_functions.php';
session_start();

    $htmlPayment='';
    $paymentMethods = getPaymentMethods();
    $htmlPayment .= '<select name="payment method" id="payment method">';
    foreach($paymentMethods as $paymentMethod){
        $htmlPayment .= "<option value=$paymentMethod>$paymentMethod</option>";
    }
    $htmlPayment .= '</select>';


if($_POST['geslacht'] = "man") {
    $_SESSION['geslacht'] = "M";
} else {
    $_SESSION['geslacht'] = "F";
}

$_SESSION['land'] = "Netherlands";

if(!empty($_POST['userEmail'])) {
if(!checkEmail($_POST['userEmail'])) {
    $_SESSION['userEmail'] = $_POST['userEmail'];
} else {
    header("Location: registreren.php");
}

if(!empty($_POST['userPassword']) && !empty($_POST['userPassword2']) ) {
if($_POST['userPassword'] = $_POST['userPassword2']) {
    $_SESSION['userPassword'] = $_POST['userPassword'];
} else {
    header("Location: registreren.php");
}

if (!empty($_POST['userFirstname'])) {
$_SESSION['userFirstname'] = $_POST['userFirstname'];
}

if (!empty($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];
}





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
        <a href="homepage.php"> <img class = "logo" src="img/logo.png"> </a>
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
            <input type="number" placeholder="Rekeningnummer">
        </div>
            
        <div class="centertext link">
            <a class="buttonlink"  href="filmoverzicht.php">Betalen</a>
        </div>

        </form> 
    </main>
</body>