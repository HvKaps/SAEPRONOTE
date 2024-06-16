<?php session_start();?>
<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Acceuil_admin.css">
    <title>Que voulez-vous faire ?</title>
</head>
<body>
<header> 
  
  <nav>
      <div class="menu">
        <a href="php/Acceuil_admin.php">
        <img class="logo" src="../image/Logo.png" alt="logo">
        </a>
   
      


      </div>
      
  </nav>

</header>
    <div class="navbar">
        Que voulez-vous faire ?
    </div>
    <div class="container">
        <div class="card" onclick="location.href='addprof.php'">Ajouter</div>
        <div class="card" onclick="location.href='../php/traitement_modifier.php'">Modifier</div>
        <div class="card" onclick="location.href='liste_professeurs.php'">Consulter</div>
    </div>
</body>
</html>
