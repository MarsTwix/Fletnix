<?php
require_once 'php/data_functions.php';
require_once 'php/simple_functions.php';
require_once 'php/view_functions.php';

session_start();

if (!empty($_POST['userPayment'])) {
    if (compareEmail($_SESSION['userEmail'])) {
        addUser($_SESSION['userEmail'], $_SESSION['userPassword'], $_SESSION['userFirstname'], $_SESSION['username'], $_SESSION['userContract'], $_POST['payment_method'], $_POST['userPayment'], $_SESSION['geslacht']);
    }
}


if (isset($_POST["email"])) {
    $email = $_POST["email"];
} else {
    $email = '';
}

if (isset($_POST["password"])) {
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
} else {
    $password = '';
}

if (empty($email) || empty($password)) {
    $error = "Email & Wachtwoord niet ingevoerd. ";
} else {
    if (compareEmail($email)) {
        if (checkPassword($password, $email)) {
            $SubscriptionEndDate = getSubscibDate($email);

            $_SESSION['email'] = $email;
            $_SESSION['Login'] = true;
            $_SESSION['EndDate'] = getSubscibDate($email);

            if (!empty($_SESSION['EndDate'])) {
                $_SESSION['ValidDate'] = checkSubscriptionDate($_SESSION['EndDate']);
            } elseif (empty($_SESSION['EndDate'])) {
                $_SESSION['ValidDate'] = true;
            } else {
                $_SESSION['ValidDate'] = false;
            }

            header("Location: filmoverzicht.php");
        } else {
            $error = "Wachtwoord incorrect";
        }
    } else {
        $error = "Email niet aanwezig in de database.";
    }
};
if (empty($_POST['Inloggen'])) {
    $error ='';
} else {
    $error = errorMSG($error);
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
        <?= $error?>
        <div class="centertext">
            <h2>Inloggen</h2>
        </div>
        <form action="Login.php" method="post">
            <div class="centertext">
                <input type="email" placeholder="E-mail" name="email">
            </div>

            <div class="centertext">
                <input type="password" placeholder="Wachtwoord" name="password">
            </div>
        
            <div class="centertext link ">
                <a href = "wachtwoord_vergeten.php">Wachtwoord vergeten</a>
            </div>
            
            <div class="centertext link ">
                <a href = "registreren.php">Registreren</a>
            </div>
            
            <div class="centertext">
                <input class = "buttonlink" type="submit" name="Inloggen" value="Inloggen">
            </div>
        </form> 
    </main>
</body>

</html>
