<?php
require_once "php/data_functions.php";

function filterToHTML($films) {
    global $dbh;
    $resultaten = sizeof($films);
    $html ='';
    $html.= "<a class='buttonlink' href='zoeken.php'>BACK</a>";
    $html .=  "$resultaten resultaten";
    if($_SESSION['page']*10 > sizeof($films)-1){
      $max = sizeof($films);
    }
    else{
      $max = $_SESSION['page']*10;
    }
    for ($i = ($_SESSION['page']-1)*10; $i < $max ; $i++) {
      $uur = floor(intval($films[$i]['duration']) / 60);
      $min = intval($films[$i]['duration']) - 60;
      
      $html .= "<h2>" . $films[$i]['title'] . "</h2>";
      if($films[$i]['cover_image'] == null)
      {
        $html .= "<img src='../img/image-not-available.jpg' height='180'>";
      } 
      else{
        $html .= "<img src={$films[$i]['cover_image']} height='180'>";
      }
      $html .= "<p>Lengte: {$uur} uur en {$min} min </p>";
    }
    $html .= "<form class='centertext' action='filter.php' method='post'>";
    $html .= "<input class = 'buttonlink' type='submit' name='page' value='Vorige'>";
    $html .= "<input class = 'buttonlink' type='submit' name='page' value='Volgende'>";
    $html .= "</form>";
    return $html;
}

function contractsToHTML(){
  $i = 0;
  $ContractData = [
      'Abonnementen' => getContracts(),
      'Prijs per maand' => getPrice(),
      'Beeldkwaliteit' => ['Goed','Beter','Beste'],
      'Resolutie' => ['480p', '1080p', '4k+HDR'],
      'Aantal ingelogde apparaten' => ['1','2','4'],
      'Eindeloos veel series en films' => ['✓','✓','✓'],
      'Altijd opzegbaar' => ['✓','✓','✓']
  ];
  $html = '<table>';
  foreach($ContractData as $key => $value){
      $html .= '<tr>';
      $html .= '<td>';

      if($key == 'Abonnementen'){$html .= ' ';}
      else{$html .= "<h2>$key</h2>";}

      $html .= '</th>';
      foreach($value as $item){
          if($key == 'Abonnementen'){
              $html .= '<th class="abonnement item">';
              $html .= "<h2>$item</h2>";
          $html .= '</th>';
          }
          else{
              $html .= '<th class="abonnement item">';
              
              if($key == 'Prijs per maand'){
                
                  $contractData = getContractData();
                  
                  $html .= "<h3>€ $item";
                  if($contractData[$i][2] != '0'){
                    $html .= "({$contractData[$i][2]}% OFF!)";
                  }
                  
                  $html .= "</h3>";
                  $i++;
              }
              else{
                  $html .= "<h3>$item</h3>";
              }
              
              $html .= '</th>';
          }
          
      }
      $html .= '</tr>';
  }
  $html .= '</table>';
  return $html;
}


function errorMSG($error){
    $html =' <div class="error">';
    $html .= "<p>$error</p>";
    $html .= "</div>";
    return $html;
}
?>
