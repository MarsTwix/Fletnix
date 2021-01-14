<?php
    require_once "php/data_functions.php";
    require_once "php/view_functions.php";
    session_start();

    if(isset($_SESSION['Login'])) {
        if(!$_SESSION['Login']) {
            header("Location: Login.php");
        }
    } else {
        header("Location: Login.php");
    }

    $customer = getCustomerData($_SESSION['email']);
    $html = accountToHTML();
?>

<!doctype html>

<html lang="nl">

<head>
<title>Fletnix - Account</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body class="filmbg bg">
    <?=$html?>
</body>