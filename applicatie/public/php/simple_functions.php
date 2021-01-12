<?php
require_once 'php/data_functions.php';

function compareEmail($Data)
{
    $Database = checkEmail($Data);

    if ($Database == $Data) {
        return true;
    }

    return false;
}

function checkPassword($inputpassword, $email)
{
    $password = getPassword($email);
    
    if ($password == $inputpassword) {
        return true;
    }
    return false;
}


function checkSubscriptionDate($endDate)
{
    $currentTimeCode = mktime(0, 0, 0, 1, 1, 2016);

    $endDateArray = preg_split("/[-]/i", $endDate, 0, PREG_SPLIT_NO_EMPTY);

    $endDay = (int) $endDateArray[2];
    $endMonth = (int) $endDateArray[1];
    $endYear = (int) $endDateArray[0];

    $endTimeCode = mktime(0, 0, 0, $endDay, $endMonth, $endYear);

    $TimeDifference = $endTimeCode - $currentTimeCode;

    if ($TimeDifference >= 0) {
        echo "Account actief";
        return true;
    } else {
        echo "Account verlopen";
        return false;
    }
}

function contractDataByIndex($index){
    $data = getContractData();
    $contractData = [];
    for($i=0; $i<sizeof($data); $i++){
        for($j=0; $j<sizeof($data[$i]); $j++){
            $contractData[$j][] = $data[$i][$j];
        }
    }
    return $contractData[$index];
}

function getCountries(){
    return getAllData('Country');
}

function getPaymentMethods(){
    return getAllData('Payment');
}

function getGenres(){
    $data = getAllData('genre');
    $genre = [];
    foreach($data as $item){
        $genre[]=$item;
    }
    return $genre;
}

function getContracts(){
    
    return contractDataByIndex(0);
}

function getPrice(){
    return contractDataByIndex(1);
}

function getSelectedGenres(){
    $genres = getGenres();
    $selectedGenres = [];

    foreach($genres as $genre){
        if(isset($_GET[$genre])){
            $selectedGenres[]=$genre;
        }
    }
    return $selectedGenres;
}