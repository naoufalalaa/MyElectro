<?php
if(isset($_SESSION['id'], $_SESSION['statut']) AND $_SESSION['statut']==='admin'){
    if(empty($_GET['id'])){
        header('location: profil.php?id='.$_SESSION['id']);
    }
    else{
        $getid=$_GET['id'];
        $userinfo=$bdd->prepare('SELECT * FROM administrateur WHERE id=?');
        $userinfo->execute(array($getid));
        $user=$userinfo->fetch();
        $name=$user['nom'].' '.$user['prenom'];
        $email=$user['email'];
        
    }
}
else{
    header('location : connect.php');
}
?>