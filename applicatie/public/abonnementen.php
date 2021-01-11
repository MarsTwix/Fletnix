<?php
    require_once 'php/view_functions.php';
    $html = contractsToHTML();
?>

<!doctype html>

<html>

<head>
    <title>Fletnix - Abonnementen</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="bgcolor">
    <header>
        <a href="homepage.html"> <img class = "logo" src="img/logo.png"> </a>
    </header>
    <main>
        <div>
            <h2 class="centertext">Abonnementen</h2>
        </div>
        <div class="abonnementen">
            <?=$html?>
        </div>
        <div class="centertext link">
            <a class="buttonlink"  href="registreren.php">Registreren</a>
        </div>
    </main>
</body>

</html>