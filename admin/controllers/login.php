<?php
include_once '../../controllers/connector.php';
if(isset($_SESSION['id'], $_SESSION['statut']) AND $_SESSION['statut']==='admin'){
    header('location: ../profil.php');
}
else{
    if(isset($_POST['connect'])){
        $email=htmlspecialchars($_POST['email']);
        $pass=htmlspecialchars($_POST['pass']);
        $verify=$bdd->prepare('SELECT * FROM administrateur WHERE email=? and password=?');
        $verify->execute(array($email,$pass));
        $user=$verify->fetch();
        $exist=$verify->rowCount();
        if($exist==1){
            $_SESSION['id']= $user['id'];
            $_SESSION['statut']='admin';
            $_SESSION['nom']=$user['nom'];
            $_SESSION['prenom']=$user['prenom'];
            $_SESSION['email']=$user['email'];
            header('location: ../profil.php');
        }
        else{
            header('location: index.php');
        }
    }
}
?>