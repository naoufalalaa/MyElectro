<?php
if(isset($_GET['edit'])){
   $edit_id=$_GET['edit'];
   $produit=$bdd->query('SELECT * FROM articles WHERE id='.$edit_id );
   $prod=$produit->fetch();
   if(isset($_POST['edit'])) {
    $titre = htmlspecialchars(ucfirst($_POST['titre']));
    $price = htmlspecialchars($_POST['price']);
    $description = htmlspecialchars(ucfirst($_POST['description']));
    $contenu = htmlspecialchars(ucfirst($_POST['contenu']));
      
        $update = $bdd->prepare('UPDATE articles SET titre= ?, price= ?,categorie= ?, description= ?, contenu= ? WHERE id = ?');
        $update->execute(array($titre, $price,ucfirst($_POST['categorie']), $description, $contenu,$edit_id));
         $message = 'Votre article a bien été mis à jour !';
    
}
}
?>