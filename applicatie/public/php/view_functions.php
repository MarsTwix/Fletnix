<?php
require_once "php/data_functions.php";

function filterToHTML($films) {
    global $dbh;
    $resultaten = sizeof($films);
    $html ='';
    if($_SESSION['page']*80 > sizeof($films)-1){
      $max = sizeof($films);
    }
    else{
      $max = $_SESSION['page']*80;
    }
    for ($i = ($_SESSION['page']-1)*80; $i < $max ; $i++) {
      $uur = floor(intval($films[$i]['duration']) / 60);
      $min = intval($films[$i]['duration']) - 60;
      $html .= '<a href = "Filmafspelen.php?movie=' . $films[$i]['title'] . '" class =" blackbg filter">';
      $html .= "<h3 class = 'centertext'>" . $films[$i]['title'] . "</h3>";
      if($films[$i]['cover_image'] == null)
      {
        $html .= "<img class = 'centerimg' src='../img/image-not-available.jpg' width='100px'>";
      } 
      else{
        $html .= "<img class = 'centerimg' src='../img/{$films[$i]['cover_image']}' width='100px'>";
      }
      $html .= "<p class = 'centertext'>Lengte: {$uur} uur en {$min} min </p>";
      $html .= '</a>';
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

function filmAfspelenToHTML($title, $duration, $description, $year, $url, $genres, $directors, $casts, $roles){
  $uur = floor(intval($duration) / 60);
  $min = intval($duration) - 60;
  $html = '';
  $html .= '<div class="videoPlayerGrid"> <div class="moviePlayer">';
  $html .= "<video src='img/$url' preload='auto' width='100%'' height='100%'' controls></video>";
  $html .= '</div> <div class="movieTitle">';
  $html .= "<h1>$title</h1>";
  $html .= '<h3>Full movie</h3> </div><div class="movieInfo"> <div class="wit" > <ul>';
  $html .= "<li>Speelduur: {$uur} uur en {$min} min</li>";
  $html.='<li>Genre: ';
  for($i = 0; $i < sizeof($genres); $i++){
    if($i == sizeof($genres)-1){
      $html .= "{$genres[$i]}";
    }
    else{
      $html .= "{$genres[$i]}/";
    }
  }
  $html.="<li>Release: $year</li>";
  $html .= '<li>Hoofdpersonen: <ul>';
  for($i = 0; $i < sizeof($casts); $i++){
    $html .= "<li>{$casts[$i]}";
    if(!empty($roles[$i])){
      $html .= " {$roles[$i]}";
    }
    $html .= '</li>';
  }
  $html .= '</ul>';
  $html .= '<li>Regiseurs: <ul>';
  foreach($directors as $director){
    $html .= "<li>$director";
    $html .= '</li>';
  }
  $html .= '</ul></ul></div></div><div class="movieDiscription"><h3>Korte Samenvatting, Spoiler Warning!</h3>';
  $html .= "<p>$description</p>";
  $html .= '</div></div>';
  return $html;
}

function filmOverzichtToHTML(){
  $TopMovies = getTopMovies();
  $html = '';
  $html .= '<div><h2>Populair</h2></div>';
  $html.= '<div class="filter-order">';
  foreach($TopMovies as $movie_id){
    $movie = getMovieInfo($movie_id[0], 'title');
    $movieImg = getMovieInfo($movie_id[0], 'cover_image');
    $html .= "<a class='blackbg filter' href='Filmafspelen.php?movie=$movie'>";
    if($movieImg == null)
    {
      $html .= "<img class = 'centerimg' src='../img/image-not-available.jpg' height='180px'>";
    } 
    else{
      $html .= "<img class = 'centerimg' src='../img/$movieImg' height='180px'>";
    }
    $html .= "<h3 class = 'centertext'>$movie</h3> ";
}
  $html .= '</a></div>';
  $genres = getGenres();
  foreach($genres as $genre){
    $movies = getGenreTop($genre);
    if(empty($movies)){
      $movies = getGenreMovies($genre);
    }
    $html .= "<div><h2>$genre</h2></div>";
    $html.= '<div class="filter-order">';
    foreach($movies as $movie_id){
      $movie = getMovieInfo($movie_id[0], 'title');
      $movieImg = getMovieInfo($movie_id[0], 'cover_image');
      $html .= '<a class="blackbg filter" href="Filmafspelen.php?movie='. $movie .'">';
      if($movieImg == null)
      {
        $html .= "<img class = 'centerimg' src='../img/image-not-available.jpg' height='180px'>";
      } 
      else{
        $html .= "<img class = 'centerimg' src='../img/$movieImg' height='180px'>";
      }
      $html .= "<h3 class = 'centertext'>$movie</h3> ";
    }
    $html .= '</a></div>';
  }
  return $html;
}

function filmOverzichtPreviewToHTML(){
  $TopMovies = getTopMovies();
  $html = '';
  $html .= '<div><h2>Populair</h2></div>';
  $html.= '<div class="filter-order">';
  foreach($TopMovies as $movie_id){
    $movie = getMovieInfo($movie_id[0], 'title');
    $movieImg = getMovieInfo($movie_id[0], 'cover_image');
    $html .= "<a class='blackbg filter' href='abonnementen.php'>";
    if($movieImg == null)
    {
      $html .= "<img class = 'centerimg' src='../img/image-not-available.jpg' height='180px'>";
    } 
    else{
      $html .= "<img class = 'centerimg' src='../img/$movieImg' height='180px'>";
    }
    $html .= "<h3 class = 'centertext'>$movie</h3> ";
}
  $html .= '</a></div>';
  $genres = getGenres();
  foreach($genres as $genre){
    $movies = getGenreTop($genre);
    if(empty($movies)){
      $movies = getGenreMovies($genre);
    }
    $html .= "<div><h2>$genre</h2></div>";
    $html.= '<div class="filter-order">';
    foreach($movies as $movie_id){
      $movie = getMovieInfo($movie_id[0], 'title');
      $movieImg = getMovieInfo($movie_id[0], 'cover_image');
      $html .= '<a class="blackbg filter" href="abonnementen.php">';
      if($movieImg == null)
      {
        $html .= "<img class = 'centerimg' src='../img/image-not-available.jpg' height='180px'>";
      } 
      else{
        $html .= "<img class = 'centerimg' src='../img/$movieImg' height='180px'>";
      }
      $html .= "<h3 class = 'centertext'>$movie</h3> ";
    }
    $html .= '</a></div>';
  }
  return $html;
}

function accountToHTML(){
  $_SESSION['EndDate'] = getSubscibDate($_SESSION['email']);
  $html = '';
  if(empty($_SESSION['EndDate']))
  {
    $html.= '<nav class="back"><a class="buttonlink" href="filmoverzicht.php">BACK</a></nav>';
  }
  
  $html.='<main class="account"><div class="centertext">';
  $html .="<h2>Welkom bij uw account instellingen</h2>";
  $html.='</div><div class="centertext_link"><a class="buttonlink" href="email_wijzigen.php" >Email wijzigen</a></div><div class="centertext_link"><a class="buttonlink" href="Wachtwoord_wijzigen.php" >Wachtwoord wijzigen</a></div><div class="centertext_link">';
  if(empty($_SESSION['EndDate'])){
    $html .='<a class="buttonLogOut" href="uitschrijven.php" >Uitschrijven</a>';
  }
  else{
    $html .='<a class="buttonlink" href="inschrijven.php" >inschrijven</a>';
  }
  $html.='</div></main>';
  return $html;
}

?>
