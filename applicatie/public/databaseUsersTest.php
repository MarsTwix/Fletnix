<?php
require_once 'php/data_functions.php';
require_once 'php/simple_functions.php';

session_start();

$html = "Geen wijziging uitgevoerd.";

$SubscriptionEndDate = 0;

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
    $testresult = "Email & Wachtwoord niet ingevoerd. ";
} else {
    $testresult = "Email & Wachtwoord succesvol ingevoerd. ";
    if (compareEmail($Testemail)) {
        echo "Email aanwezig in de database. ";
        if (checkPassword($Testpassword, $Testemail)) {
            echo "Wachtwoord correct ";

            $SubscriptionEndDate = getSubscibDate($Testemail);

            $SESSION['email'] = $Testemail;
            $SESSION['Login'] = true;
            $SESSION['EndDate'] = getSubscibDate($Testemail);


            if (!empty($SESSION['EndDate'])) {
                // $SESSION['ValidDate'] = checkSubscriptionDate($SESSION['EndDate']);
            } elseif (empty($SESSION['EndDate'])) {
                $SESSION['ValidDate'] = true;
            } else {
                $SESSION['ValidDate'] = false;
            }


            //header("Location: index.php");
        } else {
            echo "Wachtwoord incorrect";
        }
    } else {
        echo "Email niet aanwezig in de database.";
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

<h3>Login Test</h3>

<form action="databaseUsersTest.php" method="post">
E-mail <input type="text" name="Testemail"><br>
Password <input type="password" name="Testpassword"><br>

<h3>Werkende Login</h3>
<p>a.nunc@sitamet.com<br>nunc</p>

<h3>Wijziging Database gegevens</h3>
<select name="Payment">
  <option value="email">Email</option>
  <option value="password">Wachtwoord</option>
  <option value="endDate">Eind Datum</option>
  <option value="firstName">Firstname</option>
</select><br>
<select name="Gender">
  <option value="email">Email</option>
  <option value="password">Wachtwoord</option>
  <option value="endDate">Eind Datum</option>
  <option value="firstName">Firstname</option>
</select><br>
<select name="Payment">
  <option value="email">Email</option>
  <option value="password">Wachtwoord</option>
  <option value="endDate">Eind Datum</option>
  <option value="firstName">Firstname</option>
</select><br>
Nieuw gegeven <input type="text" name="newData"><br>
Bevestig nieuw gegeven <input type="text" name="dataConfirm"><br>
<input type="submit">
</form>
<?=$html?>

</body>

</html>