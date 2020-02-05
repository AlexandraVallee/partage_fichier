<!DOCTYPE html>
<html>

<head>
    <title><?= $titre ?></title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="librairies/chouquette.css">
     <link rel="stylesheet" type="text/css" href="librairies/icomoon/style.css">
    <script type="text/javascript" src="librairies/jquery-3.4.1.min.js" defer></script>
    <script src="librairies/jqueryvalidation/dist/jquery.validate.min.js" defer></script> 
</head>

<body>
 <div id="fond"></div>
    <header >
      <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
          <h1><img src="librairies/img/chouquettepartage.png" width="50" height="50" class="d-inline-block align-top" alt=""> Partage'chou</h1>
        </a>
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


<?php if(isset($fenetreConnexion)){echo $fenetreConnexion;}?>

</body>
<footer>
  © Copyright      
</footer>
</html>

<script src="Vue/js/fenetreConnexion.js"defer></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

