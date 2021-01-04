<?php
// Deze file bevat side-effects en dus geen nieuwe functie declaraties (zoals beschreven in PSR-1).
// `echo` is een voorbeeld van een side-effect.

require_once 'data_functies.php';
require_once 'view_functies.php';

// Data ophalen
$films = haalAlleFilmsOp();
// Evt. kan je hier een `var_dump()` doen om te kijken wat er in de data zit.

// HTML-broncode maken
$html = filmsNaarHTML($films);

// Weergeven in browser
echo $html;

// Of in één keer
echo filmsNaarHTML(haalAlleFilmsOp());
?>
<html>
  <!-- Of inline -->
  <body>
    <?=filmsNaarHTML(haalAlleFilmsOp())?>
  </body>
</html>