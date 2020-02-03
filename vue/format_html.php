<!DOCTYPE html>
<html>

<head>
    <title><?= $titre ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="librairies/chouquette.css">
    <script type="text/javascript" src="librairies/jquery-3.4.1.min.js" defer></script>
    <script src="librairies/jqueryvalidation/dist/jquery.validate.min.js" defer></script> 
</head>

<body>
 <div id="fond"></div>
    <header >
     
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
      
</footer>

<?php if(isset($fenetreConnexion)){echo $fenetreConnexion;}?>

</body>
</html>

<script src="Vue/js/fenetreConnexion.js"defer></script>

