<?php

    if (!empty($_POST['newMail']) && !empty($_POST['newMail2'])) {
        if ($_POST['newMail'] = $_POST['newMail2']) {
            if (!compareEmail($_POST['newMail'])) {
                alterUserData("customer_mail_address", $SESSION['email'], $_POST['newMail']);
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


        <form action="databaseUsersTest.php" method="post">
        <input name="newMail" type="text" placeholder="Email">
        <input type="newMail2" placeholder="Email opnieuw">
        <input type="submit">
        <a class="buttonlink" href = "accountdetail.html">wijzigen</a>
        </form>

    </main>

</body>


</html>