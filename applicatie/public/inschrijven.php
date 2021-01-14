<?php
    require_once 'php/data_functions.php';
    session_start();
    inschrijven($_SESSION['email']);
    header('location: filmoverzicht.php');
?>