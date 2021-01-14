<?php
    require_once 'php/data_functions.php';
    require_once 'php/view_functions.php';
    session_start();

    if(isset($_SESSION['Login'])) {
        if(!$_SESSION['Login']) {
            header("Location: Login.php");
        }
    } else {
        header("Location: Login.php");
    }

    $data = searchMovies($_SESSION['genres'], $_SESSION['regisseur'], $_SESSION['publicatiejaar'], $_SESSION['titel']);
    if(empty($_SESSION['page']) || empty($_POST['page'])){
        $_POST = ['page' => null];
    }
    
    elseif($_POST['page'] == 'Vorige' && $_SESSION['page'] > 1){
        $_SESSION['page']--;
    }
    elseif($_POST['page'] == 'Volgende' &&  $_SESSION['page'] < sizeof($data)/10){
        $_SESSION['page']++;
    }
    $html = filterToHTML($data);
    $resultaten = sizeof($data);
?>

<!doctype html>

<html lang="nl">

<head>
    <title>Fletnix - Filteren</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="filmbg bg">
    <div class='centertext back'><a class='buttonlink' href='zoeken.php'>BACK</a></div>  
    <?="<div class='centertext'><h2>{$resultaten} resultaten</h2></div>"?>
    <main class = "filter-order">
        
        <?=$html?>
    </main>
    <form class='centertext' action='filter.php' method='post'>
        <input class = 'buttonlink' type='submit' name='page' value='Vorige'>
        <input class = 'buttonlink' type='submit' name='page' value='Volgende'>
    </form>";
</body>

</html>