<?php
    require_once 'php/data_functions.php';
    require_once 'php/view_functions.php';
    
    if(isset($_SESSION['Login'])) {
        if(!$_SESSION['Login']) {
            header("Location: Login.php");
        }
    } else {
        header("Location: Login.php");
    }


    $title = $_GET['movie'];
    $id = getMovieID($title);
    $duration = getMovieInfo($id, 'duration');
    $description = getMovieInfo($id, 'description');
    $year = getMovieInfo($id, 'publication_year');
    $url = getMovieInfo($id, 'URL');
    $genres = getMovieGenres($id);
    $directors = getMovieDirectors($id);
    $casts = getMovieCasts($id);
    $roles = getCastsRoles($id);
    $html = filmAfspelenToHTML($title, $duration, $description, $year, $url, $genres, $directors, $casts, $roles);
?>
<!DOCTYPE html>
<html lang="nl">


    <head>
        <title>Fletnix - Film afspelen</title>
        <link rel="stylesheet" href="style/main.css">
        <link rel="icon" href="img/logo.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>

    <body class="filmbg">
    <nav class="back">
        <a class="buttonlink" href="filmoverzicht.php">BACK</a>
    </nav>
    <?=$html?>
</body>

</html>