<?php

if( strstr( $_SERVER['HTTP_HOST'], '51.178.86.116' ) ) {
    $dbname = 'etudiant1';
    $login = 'etudiant1';
    $password = 'etudiant1';
} else {
    $dbname = 'localhost';
    $login = 'root';
    $password = '';
}


// Connexion Ã  la base de donnÃ©es
try
{
    $db = new PDO('mysql:host=localhost:3306;dbname='.$dbname.';charset=utf8', $login, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On Ã©met une alerte Ã  chaque fois qu'une
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
