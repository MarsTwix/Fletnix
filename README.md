<h1 align="center">
    WTUX project: Flatnix
</h1>

Logo is net als netflix maar dan een blauwe F. (being worked on...)

**Doelgroep**: Kinderen<br/>
**Genre**: animatie/tekenfilm


PHP $SESSION Variabelen

$SESSION['email'] : Bevat het email addres dat gebruikt is bij het inlogen, is al gechect met database.

$SESSION['Login'] : Bevat een boolean, als deze TRUE is klopt het ingevoerde wachtwoord. 

$SESSION['EndDate'] : Bevat de datum waarop het abonnement afloopt. !Deze Waarde kan soms leeg zijn omdat niet alle accounts een einddatum hebben.

$SESSION['ValidDate'] : Bevat een boolean, als deze TRUE is heeft het account een geldig abonnement. Check datum is 1-1-2016.
Als $SESSION['EndDate'] null is zal deze boolean automatisch true zijn.

$SESSION['LoginError'] : Bevat string die uitlegd wat er fout ging bij het inloggen. 