<?php
require_once 'php/view_functions.php';
    $html = filmOverzichtPreviewToHTML();
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Fletnix - filmoverzicht (preview)</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class ="filmbg bg">
    <nav>
        <h1 class="centertext">FLETNIX</h1>
        <a class="buttonlink" href = "homepage.php">Homepage</a>
        <a class="buttonlink" href = "abonnementen.php">Abonneren</a>
    </nav>
    <main>
    <div>
        <div>
            <h2>Aanbevolen voor jou!</h2>
        </div>

        <div class="filter-order">
            <a class="blackbg filter" href="abonnementen.php"> 
                    <img class = 'centerimg' src="img/Lego.jpg"  height='180'> 
                    <h3 class = 'centertext'>Lego movie</h3> 
                </a>
                </div>

            <div>
                <h2>Nieuwste Films </h2>
            </div>

            <div class="filter-order">
                <a class="blackbg filter" href="abonnementen.php">
                    <img class = 'centerimg' src="img/the_minions.jpg" height='180'> 
                    <h3 class = 'centertext'>Despicable me 3</h3>
                </a>
                
                <a class="blackbg filter" href="abonnementen.php"> 
                    <img class = 'centerimg' src="img/Brandweer.jpg" height='180'>
                    <h3 class = 'centertext'>Brandweerman Sam</h3> 
                </a>

                <a class="blackbg filter" href="abonnementen.php"> 
                    <img class = 'centerimg' src="img/bee_movie.jpg"  height='180'> 
                    <h3 class = 'centertext'>Bee movie</h3> 
                </a>

                <a class="blackbg filter" href="abonnementen.php"> 
                    <img class = 'centerimg' src="img/frozen.jpg" height='180'> 
                    <h3 class = 'centertext'>Frozen</h3> 
                </a>
                <a class="blackbg filter" href="abonnementen.php"> 
                    <img class = 'centerimg' src="img/UP.jpg"  height='180'> 
                    <h3 class = 'centertext'>UP</h3> 
                </a>
                <a class="blackbg filter" href="abonnementen.php"> 
                    <img class = 'centerimg' src="img/Cars.jpg"  height='180'> 
                    <h3 class = 'centertext'>Cars</h3> 
                </a>
                <a class="blackbg filter" href="abonnementen.php"> 
                    <img class = 'centerimg' src="img/Avatarrr.jpg"  height='180'> 
                    <h3 class = 'centertext'>Avatar</h3>    
                </a>
                <a class="blackbg filter" href="abonnementen.php"> 
                    <img class = 'centerimg' src="img/Pingu.jpg"  height='180'> 
                    <h3 class = 'centertext'>Pingu</h3> 
                </a>
                <a class="blackbg filter" href="abonnementen.php"> 
                    <img class = 'centerimg' src="img/Lion_king.jpg"  height='180'> 
                    <h3 class = 'centertext'>Lion king</h3> 
                </a>
                <a class="blackbg filter" href="abonnementen.php"> 
                    <img class = 'centerimg' src="img/Lego.jpg"  height='180'> 
                    <h3 class = 'centertext'>Lego movie</h3> 
                </a>
                <a class="blackbg filter" href="abonnementen.php"> 
                    <img class = 'centerimg' src="img/Smurven.jpg"  height='180'> 
                    <h3 class = 'centertext'>De smurfen</h3> 
                </a>
            </div>
            <?= $html?>
</div>
</main>
</body>

</html>