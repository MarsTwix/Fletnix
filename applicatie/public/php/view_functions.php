<?php
function filmsNaarHTMl($films) {
    global $dbh;
    $html = '';
    foreach ($films as $film) {
      $html .= "<h2>" . $film['title'] . "</h2>";
      $html .= "<p>Lengte: " . $film['duration'] . "</p>";
    }
    return $html;
}
?>