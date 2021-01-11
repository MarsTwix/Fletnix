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

<body class = 'bg loginImg'>

    <header>
        <a href="homepage.html"> <img class = "logo" src="img/logo.png"> </a>
    </header>

    <main class="login blackbg">

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
                <a href = "wachtwoord_vergeten.html">Wachtwoord vergeten</a>
            </div>
            
            <div class="centertext link ">
                <a href = "registreren.html">Registreren</a>
            </div>
            
            <div class="centertext">
                <input class = "buttonlink" type="submit" name="Inloggen" value="Inloggen">
            </div>
        </form> 
    </main>
</body>


<!-- Weergeven error tijdens inloggen, verwijder bij oplevering -->
<p><?php if(!empty($SESSION['LoginError'])) {
    echo $SESSION['LoginError'];
} else {
    echo "Login succesvol";
} ?></p>

</html>
