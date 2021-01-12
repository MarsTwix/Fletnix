<?php
require_once "php/data_functions.php";

function filterToHTML($films) {
    global $dbh;
    $html = '';
    foreach ($films as $film) {
      $uur = floor(intval($film['duration']) / 60);
      $min = intval($film['duration']) - 60;
      $html .= "<h2>" . $film['title'] . "</h2>";
      if($film['cover_image'] == null)
      {
        $html .= "<img src='../img/image-not-available.jpg' height='180'>";
      } 
      else{
        $html .= "<img src={$film['cover_image']} height='180'>";
      }
      $html .= "<p>Lengte: {$uur} uur en {$min} min </p>";
      
    }
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
