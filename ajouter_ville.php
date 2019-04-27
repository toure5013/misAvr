<?php 

include('bd.php');

// var_dump($_POST);
// die();
for($i=1; $i<3; $i++){
  $ville = 'ville' + $i;
  $req = $bdd->prepare('INSERT INTO `pays`( `nom`, `superficie`, `id_continent`) VALUES (?,?,?)');
  $req->execute([$_POST[$ville],0000,$_POST['id_contient']]);
}


$donne = $req->fetch();
// var_dump($donne);
// die();
?>
