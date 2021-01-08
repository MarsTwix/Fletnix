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
    $currentDate = mktime(0, 0, 0, 1, 1, 2016);
    $SubsribtEnd = date_create($endDate);

    $diff = date_diff($currentDate, $SubsribtEnd);

    if ($diff >= 0) {
        return true;
    } else {
        return false;
    }
}
