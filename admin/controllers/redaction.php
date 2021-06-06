<?php
if(isset($_POST['add'])) {
    if(!empty($_POST['titre']) AND !empty($_POST['price']) AND !empty($_POST['description']) AND !empty($_POST['contenu'])) {
       
     $titre = htmlspecialchars(ucfirst($_POST['titre']));
     $price = htmlspecialchars($_POST['price']);
     $description = htmlspecialchars(ucfirst($_POST['description']));
     $contenu = htmlspecialchars(ucfirst($_POST['contenu']));
     //AJOUTE categorie À LA BASE DE DONNÉES VÉRIFIE LE MEME ORTHOGRAPHE
       $ins = $bdd->prepare('INSERT INTO articles (titre, price,categorie, description, contenu, date_ajout) 
       VALUES (?, ?,?, ?, ?, NOW())');
       $ins->execute(array($titre, $price,ucfirst($_POST['categorie']), $description, $contenu));
       $lastid= $bdd->lastInsertId();
       
       if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
          if(exif_imagetype($_FILES['image']['tmp_name']) == 2) {
             //VERIFIE L'EXISTANCE DU FICHIER images
             $chemin = '../assets/articles/'.$lastid.'.jpg';
             move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
          } else {
             $message = 'Votre image doit être au format jpg';
          }
       }
       $i=1;
        while($i<=3){
            if(isset($_FILES['image'.$i]) AND !empty($_FILES['image'.$i]['name'])) {
                if(exif_imagetype($_FILES['image'.$i]['tmp_name']) == 2) {
                   //VERIFIE L'EXISTANCE DU FICHIER images
                   $chemin = '../assets/articles/'.$lastid.'p'.$i.'.jpg';
                   move_uploaded_file($_FILES['image'.$i]['tmp_name'], $chemin);
                } else {
                   $message = 'Votre image doit être au format jpg';
                }
             }
             $i++;
        }
       $message = 'Votre article a bien été posté';
    } else {
       $message = 'Veuillez remplir tous les champs';
    }
 }
 
?> 