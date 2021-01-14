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
    //TODO uitlog knop en alle pagina's bij de home page
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
    <main>
        <h2 class="back">Aanbevolen voor jou!</h2>
        <div class="filter-order">
            <a class="blackbg filter" href="Filmafspelen.php?movie=The lego movie"> 
                    <img class = 'centerimg' src="img/Lego.jpg"  height='180'> 
                    <h3 class = 'centertext'>Lego movie</h3> 
                </a>
                </div>
            <div>
                <h2 class="back">Nieuwste Films </h2>
            </div>
            <div class="filter-order">
                <a class="blackbg filter">
                    <img class = 'centerimg' src="img/the_minions.jpg" height='180'> 
                    <h3 class = 'centertext'>Despicable me 3</h3>
                </a>
                
                <a class="blackbg filter"> 
                    <img class = 'centerimg' src="img/Brandweer.jpg" height='180'>
                    <h3 class = 'centertext'>Brandweerman Sam</h3> 
                </a>

                <a class="blackbg filter"> 
                    <img class = 'centerimg' src="img/bee_movie.jpg"  height='180'> 
                    <h3 class = 'centertext'>Bee movie</h3> 
                </a>

                <a class="blackbg filter"> 
                    <img class = 'centerimg' src="img/frozen.jpg" height='180'> 
                    <h3 class = 'centertext'>Frozen</h3> 
                </a>
                <a class="blackbg filter"> 
                    <img class = 'centerimg' src="img/UP.jpg"  height='180'> 
                    <h3 class = 'centertext'>UP</h3> 
                </a>
                <a class="blackbg filter"> 
                    <img class = 'centerimg' src="img/Cars.jpg"  height='180'> 
                    <h3 class = 'centertext'>Cars</h3> 
                </a>
                <a class="blackbg filter"> 
                    <img class = 'centerimg' src="img/Avatarrr.jpg"  height='180'> 
                    <h3 class = 'centertext'>Avatar</h3>    
                </a>
                <a class="blackbg filter" > 
                    <img class = 'centerimg' src="img/Pingu.jpg"  height='180'> 
                    <h3 class = 'centertext'>Pingu</h3> 
                </a>
                <a class="blackbg filter"> 
                    <img class = 'centerimg' src="img/Lion_king.jpg"  height='180'> 
                    <h3 class = 'centertext'>Lion king</h3> 
                </a>
                <a class="blackbg filter"> 
                    <img class = 'centerimg' src="img/Lego.jpg"  height='180'> 
                    <h3 class = 'centertext'>Lego movie</h3> 
                </a>
                <a class="blackbg filter"> 
                    <img class = 'centerimg' src="img/Smurven.jpg"  height='180'> 
                    <h3 class = 'centertext'>De smurfen</h3> 
                </a>

            </div>
</main>
</body>

</html>