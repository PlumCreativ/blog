<?php
session_start();

require_once("bd.php");
$sql = 'SELECT * FROM users2 WHERE pseudo=:login';
$reponse = $bdd->prepare( $sql );
$reponse->execute( [':login'=>$login] );

if( $acces = $reponse->fetch(PDO::FETCH_ASSOC) ) {
    if( sodium_crypto_pwhash_str_verify( $acces['password'], $_POST['password'] ) ) {
        $_SESSION['login'] = $login;
        $_SESSION['photo'] = $acces['photo'];
        header('Location:index.php?error=0');
        die;
    } else {
        $_SESSION['login'] = $login;
        header('Location:login.php?error=1&passerror=1&login='.$login);
        die;
    }
} else {
    header('Location:login.php?error=1&loginerror=1');
    die;
}



header( "Location:index.php?error=0" );


