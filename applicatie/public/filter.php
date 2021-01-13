<?php
    require_once 'php/data_functions.php';
    require_once 'php/view_functions.php';
    session_start();

    $data = searchMovies($_SESSION['genres'], $_SESSION['regisseur'], $_SESSION['publicatiejaar'], $_SESSION['titel']);
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