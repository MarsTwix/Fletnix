<?php
    require_once 'php/simple_functions.php';
    $genres = getGenres();
    $selectedGenres = [];
    foreach($genres as $genre){
        if(isset($_GET[$genre])){
            $selectedGenres[]=$genre;
        }
    }
    $sql ='SELECT ';
    if(isset($selectedGenres)){
        foreach($selectedGenres as $genre){

        }
    }
?>