<?php 


if (strstr(("HTTP_HOST"), "51.178.86.117")){
    
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
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On Ã©met une alerte Ã  chaque fois qu'une
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
