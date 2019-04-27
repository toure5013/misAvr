<?php 

include('bd.php');

$req = $bdd->prepare('SELECT * FROM `continents`');
$req->execute();

// $donne = $req->fetch();
// var_dump($donne);
// die();
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
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
  <!-- Start your project here-->

  <div class="container">
  <h2>Table des continents</h2>      
  <table class="table">
    <thead>
      <tr>
        <th>nom</th>
        <th>superficie</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
  <?php while($donne = $req->fetch()) :?> 
      <tr>
        <td><?=$donne['nom']?></td>
        <td><?=$donne['superficie']?></td>
        <td class="flex" style="display:flex"> 
          <form method="POST" action="pays.php"> 
            <input id="id" name="id" type="hidden" value="<?=$donne['id']?>">
            <input type="submit" class="btn btn-primary" name="submit" value="voir pays" >
          </form> 
       
          <form method="POST" action="villes.php"> 
            <input id="id" name="id" type="hidden" value="<?=$donne['id']?>">
            <input type="submit" class="btn btn-success" name="" value="Voir villes" >
          </form> 
          <form method="POST" action="habitants.php"> 
                      <input id="id" name="id" type="hidden" value="<?=$donne['id']?>">
                      <input type="submit" class="btn btn-danger" name="habitant" value="Voir habitants" >
          </form> 
        </td>
      </tr>
<?php endwhile; ?>



<!-- <tr>
         <td>Europe</td>
        <td>**********</td>
        <td>
            <button class="btn btn-primary">Voir pays</button>
             <button class="btn btn-success">Voir villes</button>
              <button class="btn btn-danger">Voir habitants</button>
        </td>
      
      </tr>
       <tr>
         <td>Asie</td>
        <td>**********</td>
        <td>
            <button class="btn btn-primary">Voir pays</button>
             <button class="btn btn-success">Voir villes</button>
              <button class="btn btn-danger">Voir habitants</button>
        </td>
      
      </tr> -->
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
