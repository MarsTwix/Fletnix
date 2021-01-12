<?php
    require_once 'php/data_functions.php';
    require_once 'php/view_functions.php';

    $selectedGenres = getSelectedGenres();
    $data = searchMovies($selectedGenres, $_GET['regisseur'], $_GET['publicatiejaar'], $_GET['titel']);
    echo filterToHTML($data);
?>