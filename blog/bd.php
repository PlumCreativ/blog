<?php 


if (strstr($_SERVER['HTTP_HOST'], '51.178.86.117')){
    
    $name = "denys";
    $username = "denys";
    $password = "oem9Fi_j";
}else{

    $name = "blog";
    $username = "root";
    $password = "";
}

try
{
    $db = new PDO('mysql:host=localhost;dbname='.$name.';charset=utf8', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(Exception $e)
{
    echo('Erreur : '.$e->getMessage());
}
