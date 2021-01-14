<?php
$html = '';
$dir = new DirectoryIterator(dirname(__FILE__));
foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot() && strpos($fileinfo->getFilename(), '.') !== false) {
        $file = $fileinfo->getFilename();
        $html .= '<div class = "centertext">';
        $html .= "<h3><a href='{$file}''>$file</a></h3>";
        $html .= '</div>';
    }
}

?>
<!doctype html>

<html lang="nl">

<head>
    <title>Fletnix - Fletnix pages</title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body class="filmbg bg">
<div class = "centertext">
    <h1>Alle pagina's</h1>
</div>

<?=$html?>

</body>

</html>