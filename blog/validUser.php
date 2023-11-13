<?php
session_start();
require_once("bd.php");
?>
    <html lang="fr">
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/style.css" />
    </head>


    <body>

<?php
include_once( 'header.php');

$strInfo = '';
$isThumbOk = false;
$photoName = false;
$errorThumb = false;
if( isset( $_FILES['photo'] ) && !empty( $_FILES['photo']['name'] ) ) {
    $taillMax = 2097152;
    if( $_FILES['photo']['size'] < $taillMax ) {
        $infoFichier = pathinfo( $_FILES['photo']['name'] );
        //$extension_upload = $infoFichier['extension']; OR $extension_upload = $_FILES['photo']['extension']
        $extension_upload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
        $extension_autorisees = [ 'jpg', 'jpeg', 'png' ];
        if( in_array( $extension_upload, $extension_autorisees ) ) {
            //$photoName = basename( $_FILES['photo']['name'] );
            $photoName = $_FILES['photo'];
            //move_uploaded_file( $_FILES['photo']['tmp_name'], 'images/' . $photoName );
            $upload = 'images/' . $_SESSION['photo'] .'.'. $extension_upload;
            $result = move_uploaded_file( $photoName['tmp_name'], $upload );
            if( $result ) {
            $strInfo = "La photo a bien été envoyé";
            }else{
                $errorThumb = true;
                $strInfo = 'Erreur pendant l\'importation';
            }
        } else {
            $strInfo = "Erreur ! Le format de la photo n'est pas autorisé: (jpg, jpeg, png)";
            header("'Location: createUserStep2.php?invalidphoto=1'");
            $errorThumb = true;
        }
    } else {
        $strInfo = "La photo ne doit pas dépasser les 128Ko";
        header("'Location: createUserStep2.php?invalidphoto=1'");
        $errorThumb = true;
    }
} else {
    $strInfo = "Erreur lors du tranfert de la photo";
    header("'Location: createUserStep2.php?invalidphoto=1'");
    $errorThumb = true;
}

die ? $errorThumb : $strInfo;

$idUser = $_POST['idUser'];
$req = $db->prepare( 'UPDATE users2 SET photo=:photo WHERE id=:id ');
$setUpdate = $req->execute([
        ':photo'        => $_SESSION['id'] . $extension_upload,
        ':id'           => $_SESSION['id'],
]);
if( !$setUpdate ) {
    echo 'Erreur lors de la mise à jour !';
    die;
} else {
    $_SESSION['photo'] = $photoName;
    header( "Location:index.php?error=0" );
}


?>



