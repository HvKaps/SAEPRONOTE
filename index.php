<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion</title>
</head>

<body>

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

                case 'email':
                ?>
                    <div class="alert">
                        <strong>Erreur</strong> email incorrect
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

        <form action="connexion.php" method="post">
            <h2 class="text-center">Connexion</h2>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
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
   
</body>

</html>