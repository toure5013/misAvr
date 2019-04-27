<?php 

include('bd.php');


// var_dump($_POST);
  // die();
//Recuperer le contient
$id_pays = $_POST['id_pays'];
$req= $bdd->prepare('SELECT * FROM `pays` WHERE id_continent = ?'  );
$req->execute([$_POST['id'] ]);

$reqselect= $bdd->prepare('SELECT * FROM `pays` WHERE id_continent = ?'  );
$reqselect->execute([$_POST['id'] ]);


if(isset($_POST['modifier']) && !empty($_POST['ville']) && !empty($_POST['superficie'])){
  
  $reqinsert= $bdd->prepare('UPDATE `villes` SET `superficie`=? WHERE ville=? ' );
  $reqinsert->execute([$_POST['superficie'],_POST['superficie'] ]);

}


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

 
  <h2>Table des habitants de l'Afrique</h2>
<form class="form-group" method="POST" action="">
    <input class="form-control" name="superficie" placeholder="Entrez une Taille en km2">
    <div class="row">
        <div class="col-md-6">
            <select class="form-control" name="ville">
            <?php while($donneville = $reqselect->fetch()) :?> 
            <?php 
              $reqrecupville = $bdd->prepare('SELECT * FROM `villes` WHERE id_pays = ?'  );
              $reqrecupville->execute([ $donneville['id'] ]);
            ?> 
            <?php while($donnevi = $reqrecupville->fetch()) :?> 
            <option value="<?=$donnevi['nom']?>"><?=$donnevi['nom']?></option>
            <?php endwhile;?>
            <?php endwhile;?>
            </select>
        </div>
        <div class="col-md-6">  
                <input type="hidden"  name="id_pays" value="<?=$id_pays;?>">
                <input type="submit" name="modifier" class="btn btn-primary" value="Modifier la superficie">
        </div>
    </div>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th>nom</th>
        <th>superficie</th>
        <th>Pays</th>
      </tr>
    </thead>
    <tbody>
    <?php while($donne = $req->fetch()) :?> 
      <?php 
        $req1 = $bdd->prepare('SELECT * FROM `villes` WHERE id_pays = ?'  );
        $req1->execute([ $donne['id'] ]);
      ?> 
     <?php while($donneville = $req1->fetch()) :?> 
    <tr>
        <td><?=$donneville['nom']?></td>
        <td><?=$donneville['superficie']?></td>
      </tr>
      <?php endwhile;?> 
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
