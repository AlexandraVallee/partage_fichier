<!DOCTYPE html>
<html>

<head>
    <title><?= $titre ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="librairies/chouquette.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="librairies/jquery-3.4.1.min.js" defer></script>
    <script src="librairies/jqueryvalidation/dist/jquery.validate.min.js" defer></script> 
</head>

<body>
 <div id="fond"></div>
    <header >
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><h1><img src="librairies/img/chouquettepartage.png" width="50" height="50" class="d-inline-block align-top" alt=""> Partage'chou</h1></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="#">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Se connecter</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">S'inscrire</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Ajouter une image</a>
              </li>
            </ul>    
          </div>
        </nav>
    </header>

<div>
    <nav class="menu"> 
      <?= $nav ?> 
    </nav>
    <div class="principal">      
        <main>
          <?= $contenu ?>
        </main>      
    </div>
</div>
<footer>
  © Copyright      
</footer>

<?php if(isset($fenetreConnexion)){echo $fenetreConnexion;}?>

</body>
</html>

<script src="Vue/js/fenetreConnexion.js"defer></script>

