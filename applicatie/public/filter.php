<?php
    require_once 'php/simple_functions.php';
    $genres = getGenres();
    $selectedGenres = [];
    foreach($genres as $genre){
        if(isset($_GET[$genre])){
            $selectedGenres[]=$genre;
        }
    }
    $sql ='SELECT title FROM Movie';
    if(isset($selectedGenres)){
        $sql .= " WHERE movie_id IN (SELECT movie_id FROM Movie_Genre WHERE";
        foreach($selectedGenres as $genre){
            if($selectedGenres[sizeof($selectedGenres)-1] == $genre)
            {
                $sql .= " genre_name = $genre)";
            }
            else{
             $sql .= " genre_name = $genre AND";
            }
        }
    }
?>