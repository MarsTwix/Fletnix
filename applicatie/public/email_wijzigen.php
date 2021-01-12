<?php
session_start();

require_once 'php/data_functions.php';
require_once 'php/simple_functions.php';

$html = "<h3>start</h3>";

    if (!empty($_POST['newMail']) && !empty($_POST['newMail2'])) {
$html = "<h3>mail ingevoerd</h3>";
        if ($_POST['newMail'] = $_POST['newMail2']) {
           $html = "<h3>mail gelijk</h3>";
            if (!compareEmail($_POST['newMail'])) {
                alterUserData("customer_mail_address", $SESSION['email'], $_POST['newMail']);
                $html = "<h3>uitgevoerd</h3>";
            }
        }
    }

?>

<!doctype html>

<html>

<head>
    <title>Fletnix - Account detail</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="filmbg bg">
    <nav class="back">
        <a class="buttonlink" href="filmoverzicht.html">BACK</a>
    </nav>


        <form action="email_wijzigen.php" method="post">
        <input name="newMail" type="text" placeholder="Email">
        <input name="newMail2" type="text" placeholder="Email opnieuw">
        <input type="submit">
        <a class="buttonlink" href = "accountdetail.html">wijzigen</a>
        </form>

<?=$html?>

    </main>

</body>


</html>