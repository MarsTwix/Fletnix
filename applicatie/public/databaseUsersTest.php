<?php
require_once 'php/data_functions.php';


$testresult = "Nog geen Email & Wachtwoord ingevoerd";

$email;
$password;


if(isset($_POST["email"])) {
$email = $_POST["email"];
};

if(isset($_POST["password"])) {
  $password = $_POST["password"];
  };

if(isset($email) && isset($password)) {
$testresult = "Email & Wachtwoord succesvol ingevoerd.";
} else {
$testresult = "Email & Wachtwoord niet ingevoerd.";
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

<h1>Test voor het vinden van users</h1>



<h1>Login Test</h1>

<form action="databaseUsersTest.php" method="post">
E-mail <input type="text" name="email"><br>
Password <input type="password" name="password"><br>
<input type="submit">
</form>

<p><?=$testresult?></p>
<p>Ingevoerde email is: <?=$_POST["email"]?></p>
<p>Ingevoerd wachtwoord is: <?=$_POST["password"]?></p>
<p>Email test: <?=$email?></p>
<p>Password test: <?=$password?></p>

</body>




</html>