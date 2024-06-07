<?php
include 'config.php' ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.css" rel="stylesheet">
    <title>Connexion</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<header> 
  
    <nav>
        <div class="menu">
      <img class="logo" src="image/Logo.png" alt="logo">
        

  
        </div>
        
    </nav>

</header>
    <div class="login-form">
        <?php


        if (isset($_GET['login_err'])) {
            $err = htmlspecialchars($_GET['login_err']);

            switch ($err) {
                case 'password':
        ?>
                    <div class="alert">
                        <strong>Erreur</strong> mot de passe incorrect
                    </div>
                <?php
                    break;

                case 'already':
                ?>
                    <div class="alert">
                        <strong>Erreur</strong> compte non existant
                    </div>
        <?php
                    break;
            }
        }
        
        ?>
        <div class="body">
        <div class="image">
    <img src="image/illustration-concept-education_114360-7928.jpg.avif" alt="">
</div>
        
<div class="range">
<form action="connexion.php" method="post">
            <h2 class="text-center">Connexion</h2>
            <div class="form-group">
                <input type="text" name="identifiant" class="form-control" placeholder="ecrit ton identifant" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
            </div>
        </form>
        <p><a href="inscription.php" id="btninsc">Inscription</a></p>
    </div>
</div>
       

</div>
</body>

</html>