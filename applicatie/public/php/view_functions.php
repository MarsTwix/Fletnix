<?php
function filmsNaarHTMl($films) {
    global $dbh;
    $html = '';
    foreach ($films as $film) {
      $uur = floor(intval($film['duration']) / 60);
      $min = intval($film['duration']) - 60;
      $html .= "<h2>" . $film['title'] . "</h2>";
      $html .= "<p>Lengte: {$uur}:{$min} </p>";
      $html .= "<img src={$film['cover_image']} height='180'>";
    }
    return $html;
}
?>