<?php
include_once 'controllers/connector.php';
if(isset($_SESSION['id'])){
    header('location: profil.php');
}
else{
    if(isset($_POST['login'])){
        $email=htmlspecialchars($_POST['email']);
        $pass=htmlspecialchars(md5($_POST['password']));
        $userexist=$bdd->prepare('SELECT * FROM membre WHERE email=? AND password=?');
        $userexist->execute(array($email,$pass));
        $userex=$userexist->rowCount();
        if($userex>0){
            $user=$userexist->fetch();
            $_SESSION['statut']='membre';
            $_SESSION['id']=$user['id'];
            $_SESSION['name']=$user['nom'].' '.$user['prenom'];
            header('location: profil.php');
        }
        else{
            $error='<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Accès impossible!</strong> Vos identifiants sont faux .
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>';
        }
    }
}
?>