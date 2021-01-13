<?php
    require_once 'php/simple_functions.php';
session_start();

    $htmlPayment='';
    $paymentMethods = getPaymentMethods();
    $htmlPayment .= '<select name="payment_method" id="payment method">';
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

if (!empty($_POST['userMail'])) {
    if (!compareEmail($_POST['userMail'])) {
        $_SESSION['userEmail'] = $_POST['userMail'];
    } else {
        header("Location: registreren.php");
    }
}

if (!empty($_POST['userPassword']) && !empty($_POST['userPassword2'])) {
    if ($_POST['userPassword'] = $_POST['userPassword2']) {
        $_SESSION['userPassword'] = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
    } else {
        header("Location: registreren.php");
    }
}

if (!empty($_POST['userFirstname'])) {
$_SESSION['userFirstname'] = $_POST['userFirstname'];
}

if (!empty($_POST['userName'])) {
    $_SESSION['username'] = $_POST['userName'];
}

$_SESSION['userId'] = "newUser";

if(!empty($_POST['abonnement'])) {
    $_SESSION['userContract'] = $_POST['abonnement'];
}
?>

<!doctype html>

<html>

<head>
    <title>Fletnix - Login</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class = 'bg loginImg'>

    <header>
        <a href="homepage.php"> <img class = "logo" src="img/logo.png"> </a>
    </header>

    <main class="login blackbg">

        <div class="centertext">
            <h2>Kies uw betaalmethode</h2>
        </div>

        <form action="Login.php" method="post">

        <div class="centertext">
            <?= $htmlPayment ?>
        </div>

        <div class="centertext">
            <input name='userPayment' type="number" placeholder="Rekeningnummer">
        </div>
            
        <div class="centertext link">
            <input type="submit" class="buttonlink" name="Betalen">
        </div>

        </form> 

    </main>

</body>

</html>