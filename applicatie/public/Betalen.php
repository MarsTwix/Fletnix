<?php
    require_once 'php/simple_functions.php';
    require_once 'php/view_functions.php';
    session_start();

    $htmlPayment='';
    $paymentMethods = getPaymentMethods();
    $htmlPayment .= '<select name="payment_method" id="payment method">';
    foreach($paymentMethods as $paymentMethod){
        $htmlPayment .= "<option value=$paymentMethod>$paymentMethod</option>";
    }
    $htmlPayment .= '</select>';
    if (!empty($_POST['userPassword']) && !empty($_POST['userPassword2'])) {
        if ($_POST['userPassword'] == $_POST['userPassword2']) {
            $_SESSION['userPassword'] = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
        } else {
            $_SESSION['error'] = errorMSG('Wachtwoorden zijn niet hetzelfde!');
            header("Location: registreren.php");
        }
    }
    

    if (!empty($_POST['userMail'])){
        if(compareEmail($_POST['userMail'])) {   
            $_SESSION['error'] = errorMSG('Email al in gebruik!');
            header("Location: registreren.php");
        }
        else{
            $_SESSION['userMail'] = $_POST['userMail'];
        }
    }

    if (!empty($_POST['userFirstname'])) {
        $_SESSION['userFirstname'] = $_POST['userFirstname'];
    }

    if (!empty($_POST['userLastname'])) {
        if(!empty($_POST['userMiddlename'])){
            $_SESSION['userLastname'] = $_POST['userMiddlename'] . ' ' . $_POST['userLastname'];
        }
        else{
            $_SESSION['userLastname'] = $_POST['userLastname'];
        }
        
    }
if(!empty($_POST['abonnement'])) {
    $_SESSION['userContract'] = $_POST['abonnement'];
}

if(!empty($_POST['geslacht'])) {
    $_SESSION['geslacht'] = $_POST['geslacht'];
}

if(!empty($_POST['country'])) {
    $_SESSION['country'] = $_POST['country'];
}

if(empty($_POST['Betalen'])){
    $error = '';
}
elseif(strlen($_POST['userPayment']) == 12){
    $error = errorMSG('Rekening nummer moet 12 nummers zijn!');
}
elseif(!empty($_POST['userPayment'])){
    addUser($_SESSION['userMail'], $_SESSION['userPassword'], $_SESSION['userFirstname'], $_SESSION['userLastname'],  $_SESSION['userContract'], $_POST['payment_method'], $_POST['userPayment'],  $_SESSION['country'], $_SESSION['geslacht']);
    header("location: Login.php");
}
    
?>

<!doctype html>

<html lang="nl">

<head>
    <title>Fletnix - Login</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class = 'bg loginImg'>

    <header>
        <a href="homepage.php"> <img class = "logo" src="img/logo.png" alt=""> </a>
    </header>

    <main class="login blackbg">
    <?=$error?>
        <div class="centertext">
            <h2>Kies uw betaalmethode</h2>
        </div>

        <form action="Betalen.php" method="post">

        <div class="centertext">
            <?= $htmlPayment ?>
        </div>

        <div class="centertext">
            <input name='userPayment' type="number" placeholder="Rekeningnummer">
        </div>
            
        <div class="centertext">
            <input type="submit" class="buttonlink" name="Betalen" value ='betalen'>
        </div>

        </form> 

    </main>

</body>

</html>