<?php
    require_once 'php/simple_functions.php';
    session_start();
    $_SESSION['page'] = 1;
    $_SESSION['regisseur'] = null;
    $_SESSION['publicatiejaar'] = null;
    $_SESSION['titel'] = null;
    $htmlGenre='';
    $genres = getGenres();
    $i = 0;
    foreach($genres as $genre){
        if($i == 0){
            $htmlGenre .= '<div class="centertext">';
        }
        $htmlGenre .= "<input type='checkbox' id=$genre name='$genre'>";
        $htmlGenre .= "<label for=$genre>$genre</label>";
        $i++;
        if($i == 3){
            $htmlGenre .= "</div>";
            $i = 0;
        }
    }
?>

<!doctype html>

<html>

<head>
    <title>Fletnix - Filteren</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="filmbg bg">

    <main class="login blackbg">
        <div class="centertext">
            <h1>Filteren</h1>
        </div>
        <form action="filter.php" methode = "GET">
            <div class="centertext">
                <h2>Genre:</h2>
            </div>
            <?= $htmlGenre?>
            <div class="centertext">
                <input type="text" placeholder="Regisseur" name = "regisseur">
            </div>
            <div class="centertext">
                <input type="number" placeholder="Publicatiejaar" name = "publicatiejaar">
            </div>
            <div class="centertext">
                <input type="text" placeholder="Zoeken naar titel" name = "titel">
            </div>
            <div class="centertext">
                <input class = "buttonlink" type="submit" name="zoeken" value="zoeken">
            </div>
        </form>
        

        <div class="centertext link">
            <a class="buttonlink" href="filmoverzicht.php">BACK</a>
        </div>
    </main>
</body>

</html>