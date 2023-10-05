<?php
session_start();

if( isset( $_POST['login'] ) && isset( $_POST['password'] ) ) {
    $login = $_POST['login'];
    
    require_once 'db.php';

    $sql = 'SELECT * FROM users WHERE login=:login';
    $reponse = $bdd->prepare( $sql );
    $reponse->execute( [':login'=>$login] );

    if( $acces = $reponse->fetch(PDO::FETCH_ASSOC) ) {
        if( $_POST['password'] != $acces['password'] ) {
            $_SESSION['login'] = $login;
            header('Location:login.php?error=1&passerror=1&login='.$login);
            die;
        }
    } else {
        header('Location:login.php?error=1&loginerror=1');
        die;
    }

}

$_SESSION['login'] = $login;
header( "Location:index.php?error=0" );


