<?php
 require_once "php/data_functions.php";

 
    $htmlCountries='';
    $countries = getCountries();
    $htmlCountries .= '<select name="country" id="country">';
    foreach ($countries as $country) {
        $htmlCountries .= "<option value=$country>$country</option>";
    }
    $htmlCountries .= '</select>';

    $htmlContracts='';
    $contractData = getContractData();
    $i = 0;
    foreach ($contractData as $contract) {
        $htmlContracts .= "<input type='radio' id=$contract[0] name='abonnement' value = $contract[0]";
        if ($i == 0) {
            $htmlContracts .= " checked='checked'";
            $i++;
        }
        $htmlContracts .= '>';
        $htmlContracts .= "<label for='$contract[0]'>$contract[0] € $contract[1]";
        if ($contract[2] != '0') {
            $htmlContracts.="($contract[2]% OFF!)";
        }
        $htmlContracts.="</label>";
    }










?>

<!DOCTYPE html>

<html>

<head>
    <title>Fletnix - Registratie</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body class = 'bg loginImg'>
    <header>
    <a href="homepage.php"> <img class = "logo" src="img/logo.png" alt=""> </a>
    </header>

    <main class="registreren blackbg">
        <h2 class="centertext">Registreren</h2>
        <div class="centertext">

        <form action="Betalen.php" method="post">
        <input type="radio" id="man" name="geslacht" value="M" checked="checked">
            <label for="man">De heer</label>
            <input type="radio" id="vrouw" name="geslacht" value="F">
            <label for="F">Mevrouw</label>
        </div>
        <div class="centertext">
            <input required name="userFirstname" type="text" placeholder="Voornaam" >
            <input type="text" placeholder="tussenv.">
            <input required name="userName" type="text" placeholder="Achternaam">
        </div>
        <div class="centertext">
            <?=$htmlCountries?>
        </div>
        <div class="centertext">
            <input required name="userMail" type="email" placeholder="E-mail">
        </div>
        <div class="centertext">
            <input required  type="userPassword" placeholder="Wachtwoord">
            <input required  type="userPassword2" placeholder="Wachtwoord herhalen">
        </div>
        <div class="centertext">
            <h3><a href="abonnementen.php">Abonnementen:</a></h3>
            <?=$htmlContracts?>
        </div>
        <div class="centertext link">
        <a class = "login" href="Login.php">Al een account? Hier kan je inloggen!</a>
    </div>
        <div class="centertext link">
            <input type="submit" class="buttonlink">
        </div>
        </form>
    </main>

</body>

</html>