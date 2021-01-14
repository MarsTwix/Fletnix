<?php
session_start();
session_destroy();
header("Location: filmoverzicht_preview.php");
?>