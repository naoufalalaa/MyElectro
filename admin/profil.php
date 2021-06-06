<?php
include_once '../controllers/connector.php';
$page='Profil';
include 'elements/head.php';
include 'elements/navbar.php';
$commande=$bdd->query('SELECT * FROM commandes order by date_commande desc');
?>
<h2 align="center">Commandes</h2>
<hr class="uk-divider-medium">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">PRODUIT</th>
      <th scope="col">USER</th>
      <th scope="col">ADRESSE</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while($c=$commande->fetch()){
        $panier=$bdd->query('SELECT * FROM panier WHERE id_pannier='.$c['id_panier']);
        $pan=$panier->fetch();
        $produit=$bdd->query('SELECT * FROM articles WHERE id='.$pan['id_prod']);
        $prod=$produit->fetch();
        $userinf=$bdd->query('SELECT * FROM membre WHERE id='.$c['id_user']);
        $user=$userinf->fetch();
        $date=strtotime($c['date_commande']);
        $time=date('d M h:i',$date)
  ?>
    <tr>
      <td><img src="../assets/articles/<?=$prod['id'] ?>.jpg" width="100px" alt=""></td>
      <td><?=$user['nom'] ?> <?=$user['prenom'] ?></td>
      <td><?=$user['email'] ?></td>
      <td><?=$time ?></td>
    </tr>
    <?php }?>
  </tbody>
</table>

<?php

include 'elements/footer.php';
?>