<?php
    require_once 'php/data_functions.php';
    session_start();
    uitschrijven($_SESSION['email']);
    header('location: homepage.php');
?>