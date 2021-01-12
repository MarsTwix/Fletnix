<?php
    require_once 'php/simple_functions.php';
    require_once 'php/db_connectie.php';
    require_once 'php/view_functions.php';

    $genres = getGenres();
    $selectedGenres = [];
    foreach($genres as $genre){
        if(isset($_GET[$genre])){
            $selectedGenres[]=$genre;
        }
    }
    $lastWhere = false;
    $execute =[];
    $sql ='SELECT top 10 * FROM Movie';
    if(!empty($selectedGenres)){
        $sql .= " WHERE movie_id IN (SELECT movie_id FROM Movie_Genre WHERE";
        foreach($selectedGenres as $genre){
            if($selectedGenres[sizeof($selectedGenres)-1] == $genre)
            {
                $sql .= " genre_name = '$genre')";
            }
            else{
             $sql .= " genre_name = '$genre' OR";
            }
        }
        $lastWhere = true;
    }
    if(!empty($_GET['regisseur'])){
        if($lastWhere){
            $sql .= " AND";
        }
        else{
            $sql .= " WHERE";
        }
        $sql .= " movie_id IN (SELECT md.movie_id FROM Movie_Director AS md INNER JOIN Person AS p ON md.person_id = p.person_id WHERE firstname + ' ' + lastname like ?)";
        $lastWhere = true;
        $execute[] = "%{$_GET['regisseur']}%";
    }
    if(!empty($_GET['publicatiejaar'])){
        if($lastWhere){
            $sql .= " AND";
        }
        else{
            $sql .= " WHERE";
        }
        $sql .= " publication_year = ?";
        $lastWhere = true;
        $execute[] = "{$_GET['publicatiejaar']}";
    }
    if(!empty($_GET['titel'])){
        if($lastWhere){
            $sql .= " AND";
        }
        else{
            $sql .= " WHERE";
        }
        $sql .= " title like ?";
        $lastWhere = true;
        $execute[] = "%{$_GET['titel']}%";
    }
    global $dbh;
    $query = $dbh->prepare($sql);
    var_dump($sql);
    var_dump($execute);
    $query->execute($execute);
    $data = $query->fetchAll();
    $html = filterNaarHTML($data);
    echo $html;
?>