<?php
require_once 'php/db_connectie.php';
require_once 'php/simple_functions.php';


  function haalAlleFilmsOp()
  {
      global $dbh;
      $films = $dbh->query("SELECT top(10) * FROM Movie");
      return $films->fetchAll();
  }

function zoekFilmsOpTitel($titel)
{
    global $dbh;
  
    $titel = "%{$titel}%";

    // Schrijf hier je query zonder meteen al de data in de string te zetten met behulp van placeholders zoals `:titel`.
    $sql = "SELECT TOP(10) * FROM Movie WHERE title like :title ORDER BY publication_year";

    $query = $dbh->prepare($sql);

    $query->execute(array(":title" => $titel));
    // Heb je nog een andere FETCH type nodig? bijv PDO::FETCH_OBJ?
    return $query->fetchAll();
}


function checkLogin($userMail, $password)
{
    global $dbh;

    $returnwaarde = false;

    $userMail = $userMail;
    $password = $password;
 
    $sql = "SELECT customer_mail_address, password  FROM Customer WHERE customer_mail_address = $userMail";

    $query = $dbh->prepare($sql);

    $query->execute(array(":title" => $titel));

    $query->fetchAll();

    return $returnwaarde;
}

//zoekt of $input in $location staat
function checkEmail($email)
{
    global $dbh;

    $sql = "SELECT customer_mail_address FROM Customer WHERE customer_mail_address = :email";

    $query = $dbh->prepare($sql);

    $query->execute(array(":email" => $email));
    $returnvalue = $query->fetchAll();
    if (empty($returnvalue)) {
        return null;
    } else {
        return $returnvalue[0]['customer_mail_address'];
    }
}

function getPassword($email)
{
    global $dbh;

    $sql = "SELECT password FROM Customer WHERE customer_mail_address = :email";

    $query = $dbh->prepare($sql);

    $query->execute(array(":email" => $email));
    $returnvalue = $query->fetchAll();
    if (empty($returnvalue)) {
        return null;
    } else {
        return $returnvalue[0]['password'];
    }
}

function getSubscibDate($email)
{
    global $dbh;

    $sql = "SELECT subscription_end FROM Customer WHERE customer_mail_address = :email";

    $query = $dbh->prepare($sql);

    $query->execute(array(":email" => $email));
    $returnvalue = $query->fetchAll();
    if (empty($returnvalue)) {
        return null;
    } else {
        return $returnvalue[0]['subscription_end'];
    }
}

function addUser($email, $password, $firstname, $lastname, $type, $card, $cardNumber, $gender)
{
    global $dbh;

    $sql = "INSERT INTO Customer (customer_mail_address, lastname, firstname, password, user_name, contract_type, payment_method, payment_card_number, country_name, subscription_start, gender, birth_date)
    VALUES (:email, :firstname, :lastname, :password, 'newUser', :type, :card, :cardNumber, 'Netherlands', GETDATE(), :gender, GETDATE())";

    $query = $dbh->prepare($sql);

    $query->execute(array(":email" => $email, ':password' => $password, ':firstname' => $firstname, ':lastname' => $lastname, ':type' => $type, ':card' => $card, ':cardNumber' => $cardNumber, ':gender' => $gender));

    return;
}

function alterUserData($item, $email, $newItem) {
    global $dbh;

    $sql = "UPDATE Customer SET $item = :newItem where customer_mail_address = :email";

    $query = $dbh->prepare($sql);

    $query->execute(array(":email" => $email, ":newItem" => $newItem));

    return;
}

function getAllData($table){
    global $dbh;

    $query = $dbh->query("SELECT * FROM $table");
    while($row = $query->fetch(PDO::FETCH_NUM)){
        $data[] = $row[0];
    }
    
    return $data;
}

function getContractData()
{
    global $dbh;

    $query = $dbh->query("SELECT * FROM Contract");
    $data = $query->fetchAll(PDO::FETCH_NUM);

    return $data;
}

function getCustomerData($email){
    global $dbh;

    $sql = "SELECT * FROM Customer WHERE customer_mail_address = :email";
    $query = $dbh->prepare($sql);
    $query->execute(array(':email' => $email));

    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    return $data[0];
}

function searchMovies($selectedGenres, $director, $year, $title){

    $lastWhere = false;
    $execute =[];

    $sql ='SELECT title, duration, cover_image, URL FROM Movie';

    if(!empty($selectedGenres)){
        $sql .= " WHERE movie_id IN (SELECT movie_id FROM Movie_Genre WHERE";
        foreach($selectedGenres as $genre){
            if($selectedGenres[sizeof($selectedGenres)-1] == $genre)
            {
                $sql .= " genre_name = '$genre')";
            }
            else{
             $sql .= " genre_name = '$genre' OR";
            }
        }
        $lastWhere = true;
    }

    if(!empty($director)){
        if($lastWhere){
            $sql .= " AND";
        }
        else{
            $sql .= " WHERE";
        }
        $sql .= " movie_id IN (SELECT md.movie_id FROM Movie_Director AS md INNER JOIN Person AS p ON md.person_id = p.person_id WHERE firstname + ' ' + lastname like ?)";
        $lastWhere = true;
        $execute[] = "%$director%";
    }

    if(!empty($year)){
        if($lastWhere){
            $sql .= " AND";
        }
        else{
            $sql .= " WHERE";
        }
        $sql .= " publication_year = ?";
        $lastWhere = true;
        $execute[] = "$year";
    }

    if(!empty($title)){
        if($lastWhere){
            $sql .= " AND";
        }
        else{
            $sql .= " WHERE";
        }
        $sql .= " title like ?";
        $lastWhere = true;
        $execute[] = "%$title%";
    }

    global $dbh;
    $query = $dbh->prepare($sql);
    $query->execute($execute);
    $data = $query->fetchAll();
    return $data;
}

function hashDatabasePW($activate) {
if($activate) {
    global $dbh;

    $sql = "UPDATE Customer SET password = :newItem where customer_mail_address = :email";

    $query = $dbh->prepare($sql);

    $query->execute(array(":email" => $email, ":newItem" => $newItem));

    return;




}


}