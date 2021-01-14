<?php
    require_once 'php/simple_functions.php';
    require_once 'php/view_functions.php';
    session_start();

    if(isset($_SESSION['Login'])) {
        if(!$_SESSION['Login']) {
            header("Location: Login.php");
        }
    } else {
        header("Location: Login.php");
    }

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

    $empty = true;
    if(!empty($_GET['regisseur'])){
        $_SESSION['regisseur'] = $_GET['regisseur'];
        $empty = false;
    }
    if(!empty($_GET['publicatiejaar'])){
        $_SESSION['publicatiejaar'] = $_GET['publicatiejaar'];
        $empty = false;
    }
    if(!empty($_GET['titel'])){
        $_SESSION['titel'] = $_GET['titel'];
        $empty = false;
    }
    $_SESSION['genres'] = getSelectedGenres();
    if(!empty($_SESSION['genres'])){
        $empty = false;
    }
    if(empty($_GET['zoeken'])){    
        $htmlError = '';
    }
    elseif($empty){
        $htmlError = errorMSG("Vul iets in of klik iets aan!");
    }
    else{
        header('location: filter.php');
    }
?>

<!doctype html>

<html>

<head>
    <title>Fletnix - Zoeken</title>
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
        <form action="zoeken.php" methode = "GET">
            <div class="centertext">
            <?=$htmlError?>
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