<?php 

include('bd.php');

// var_dump($_POST );
// die();

$req = $bdd->prepare('SELECT * FROM `pays` WHERE id_continent = ?'  );
$req->execute([$_POST['id'] ]);


$id_continent = $_POST['id'];
// $nom = "Cote d'Ivoire";


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Action 1</a>
                    <a class="dropdown-item" href="#">Action 2</a>
                </div>
            </li>
        </ul>

    </div>
</nav>
  <!-- Start your project here-->
  <div class="container">
  <h2>Table des villes de l'Afrique</h2>
<form class="form" method="POST" action="ajouter_ville.php">
    <input class="from-control" name="ville1" placeholder="Entrez un nom">
     <input class="from-control" name="ville2" placeholder="Entrez un nom">
      <input class="from-control" name="ville3" placeholder="Entrez un nom">
      <input type="hidden" placeholder="Entrez un nom" name="id_continent" value="<?=$id_continent?>"> 
      <button type="submit" class="btn btn-primary">Ajouter 3 villes</button>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th>nom</th>
        <th>superficie</th>
        <th>Nombre de villes</th>
      </tr>
    </thead>
    <tbody>
    <?php while($donne = $req->fetch()) :?> 
    <?php 
      $nom = $donne['nom'];
      $req_compte = $bdd->prepare('SELECT COUNT(id) FROM `pays` WHERE nom = ?'  );
      $req_compte->execute([$nom]);
      $rep_compte = $req_compte->fetch();
      
      // var_dump($rep_compte);
      // die();
    ?>
      <tr>
        <td><?=$donne['nom']?></td>
        <td><?=$donne['superficie']?></td>
        <td> <?=$rep_compte [0]?> </td>
      
      </tr>
<?php endwhile;?> 
     
      
      
      </tr>
    </tbody>
  </table>
</div>
  
  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
