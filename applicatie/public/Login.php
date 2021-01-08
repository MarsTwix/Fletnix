<?php
require_once 'php/data_functions.php';
require_once 'php/simple_functions.php';

session_start();

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
    $SESSION['LoginError'] = "Email & Wachtwoord niet ingevoerd. ";
} else {
    if (compareEmail($email)) {
        if (checkPassword($password, $email)) {
            $SubscriptionEndDate = getSubscibDate($email);

            $SESSION['email'] = $email;
            $SESSION['Login'] = true;
            $SESSION['EndDate'] = getSubscibDate($email);

            if (!empty($SESSION['EndDate'])) {
                $SESSION['ValidDate'] = checkSubscriptionDate($SESSION['EndDate']);
            } elseif (empty($SESSION['EndDate'])) {
                $SESSION['ValidDate'] = true;
            } else {
                $SESSION['ValidDate'] = false;
            }

            //Doorsturen naar home pagina
            //header("Location: index.php");
        } else {
            $SESSION['LoginError'] = "Wachtwoord incorrect";
        }
    } else {
        $SESSION['LoginError'] = "Email niet aanwezig in de database.";
    }
};

if(!empty($SESSION['LoginError'])) {
    echo $SESSION['LoginError'];
} else {
    echo "Login succesvol";
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

<body style="background-color:black;">

    <a class = "logo" href="homepage.html"> <img style="height: 100px;" src="img/logo.png"> </a>
    <div id="background">
        <img src="img/login_background.jpg" style="opacity: 0.4;" width="100%">
    </div>
     <header style="clear: both;"></header>

    <main class="center-screen" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 10px;">
        <h2>Inloggen</h2>

        <form action="Login.php" method="post">
        <input type="email" placeholder="E-mail" name="email">
        <input type="password" placeholder="Wachtwoord" name="password" style="margin-top: 10px;">
<input type="submit" style="margin-bottom: 20px; margin-left: 33%; margin-right: auto;">
</form>
        <a href = "wachtwoord_vergeten.html" style="margin-bottom: 20px;">Wachtwoord vergeten</a>
        <a href = "registreren.html" style="margin-bottom: 20px;">Registreren</a>
        <a class="buttonlink" href = "filmoverzicht.html" style="margin-bottom: 20px;">Inloggen</a>
    </main>
</body>


<!-- Weergeven error tijdens inloggen, verwijder bij oplevering -->
<p><?php if(!empty($SESSION['LoginError'])) {
    echo $SESSION['LoginError'];
} else {
    echo "Login succesvol";
} ?></p>

</html>
