<?php
require_once 'php/data_functions.php';

function compareEmail($Data) {
$Database = checkEmail($Data);

    if($Database == $Data) {
        return true;
    }

    return false;
}

function checkPassword($inputpassword, $email) {
    $password = getPassword($email);
    
        if($password == $inputpassword) {
            return true;
        }
        return false;
    }


function checkSubscriptionDate($endDate) {
$currentDate = date("Y-m-d");
$SubsribtEnd = date_create($endDate);

$diff = date_diff($currentDate, $SubsribtEnd);

}



?>