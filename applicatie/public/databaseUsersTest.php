<?php
require_once 'php/data_functions.php';
require_once 'php/simple_functions.php';

session_start();

$testresult = "Nog geen Email & Wachtwoord ingevoerd";

if (isset($_POST["Testemail"])) {
    $Testemail = $_POST["Testemail"];
} else {
    $Testemail = '';
}


if (isset($_POST["Testpassword"])) {
    $Testpassword = $_POST["Testpassword"];
} else {
    $Testpassword = '';
}

if (empty($Testemail) || empty($Testpassword)) {
    $SESSION['LoginError'] = "Email & Wachtwoord niet ingevoerd. ";
} else {
    if (compareEmail($Testemail)) {
        if (checkPassword($Testpassword, $Testemail)) {
            $SubscriptionEndDate = getSubscibDate($Testemail);

            $SESSION['email'] = $Testemail;
            $SESSION['Login'] = true;
            $SESSION['EndDate'] = getSubscibDate($Testemail);

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
?>

<!DOCTYPE HTML>
<html lang="nl">

<head>
    <title>Fletnix - Abonnementen</title>
    <link rel="stylesheet" href="style/normalize.css">
    <!-- <link rel="stylesheet" href="style/main.css"> -->
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body> 

<h1>Login Test</h1>

<form action="databaseUsersTest.php" method="post">
E-mail <input type="text" name="Testemail"><br>
Password <input type="password" name="Testpassword"><br>
<input type="date"name="DatumChecker"></input><br>
<input type="submit">
</form>

</body>

</html>