<?php
require_once 'php/data_functions.php';
    session_start();

    if(isset($_SESSION['Login'])) {
        if(!$_SESSION['Login']) {
            header("Location: Login.php");
        }
    } else {
        header("Location: Login.php");
    }


    $customer = getCustomerData($_SESSION['email']);
    $accountButton = "<a href = 'account.php'><h3>Welkom terug, {$customer['firstname']} {$customer['lastname']}!</h3></a>";

?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Fletnix - filmoverzicht</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class ="filmbg bg">
    <nav>
        <h1 class="centertext">FLETNIX</h1>
        <a class="buttonlink" href = "pages.php" >Alle Pagina's</a>
        <a class="buttonlink" href = "zoeken.php">Zoeken</a>
        <?= $accountButton?>
    </nav>

  <h2 class="back">Aanbevolen voor jou!</h2>
    <div class="lego_movie back">
        <a href="Filmafspelen.php"> <img src="img/Lego.jpg"  height="180" alt=""> </a>
    </div>
    <div>
        <h3 class="back">Nieuwste Films </h3>
    </div>
    <div class="films back">

        <a class="films"> <img src="img/the_minions.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Brandweer.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/bee_movie.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/frozen.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/UP.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Cars.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Avatarrr.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Pingu.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Lion_king.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Lego.jpg"  height="180" alt="no img"> </a>
        <a class="films">  <img src="img/Smurven.jpg"  height="180" alt="no img"> </a>

    </div>

    <div>
        <h3 class="back">Populair</h3>
    </div>

    <div class="films back">

        <a class="films"> <img src="img/the_minions.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Brandweer.jpg"  height="180" alt="no img"> </a>
        <a class="films"  > <img src="img/bee_movie.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/frozen.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/UP.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Cars.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Avatarrr.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Pingu.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Lion_king.jpg"  height="180" alt="no img"> </a>
        <a class="films"> <img src="img/Lego.jpg"  height="180" alt="no img"> </a>
        <a class="films">  <img src="img/Smurven.jpg"  height="180" alt="no img"> </a>

    </div>

</body>

</html>