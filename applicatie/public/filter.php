<?php
    require_once 'php/data_functions.php';
    require_once 'php/view_functions.php';
    session_start();
    if(!empty($_GET['regisseur'])){
        $_SESSION['regisseur'] = $_GET['regisseur'];
    }
    if(!empty($_GET['publicatiejaar'])){
        $_SESSION['publicatiejaar'] = $_GET['publicatiejaar'];
    }
    if(!empty($_GET['titel'])){
        $_SESSION['titel'] = $_GET['titel'];
    }
    $selectedGenres = getSelectedGenres();
    $data = searchMovies($selectedGenres, $_SESSION['regisseur'], $_SESSION['publicatiejaar'], $_SESSION['titel']);
    
    if(empty($_SESSION['page']) || empty($_POST['page'])){
        $_SESSION['page'] = 1;
        $_POST = ['page' => null];
        
    }
    elseif($_POST['page'] == 'Vorige' && $_SESSION['page'] > 1){
        $_SESSION['page']--;
    }
    elseif($_POST['page'] == 'Volgende' &&  $_SESSION['page'] < sizeof($data)/10){
        $_SESSION['page']++;
    }
    echo filterToHTML($data);
?>