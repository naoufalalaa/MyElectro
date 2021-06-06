<?php
include_once 'controllers/connector.php';
if(isset($_SESSION['id'])){
    header('location: profil.php');
}
if(isset($_POST['sign'])){
    $nom=htmlspecialchars(ucfirst($_POST['nom']));
    $prenom=htmlspecialchars(ucfirst($_POST['prenom']));
    $email=htmlspecialchars($_POST['email']);
    $pass=htmlspecialchars(md5($_POST['password']));
    $age=htmlspecialchars($_POST['age']);
    $insr=$bdd->prepare('INSERT INTO membre (nom,prenom,email,password,age,date_creation) VALUES( ?,?,?,?,?,NOW() )');
    $insr->execute(array($nom,$prenom,$email,$pass,$age));
    $lastid=$bdd->lastInsertId();
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
        if(exif_imagetype($_FILES['avatar']['tmp_name'])==2){
            $chemin='assets/avatar/'.$lastid.'.jpg';
            move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
        }
        else{
            $message='<div class="alert alert-warning" role="alert">
                          Votre image doit être au format .jpg
                        </div> ';
        }
    }
}
?>
