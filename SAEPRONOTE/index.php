<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Connexion</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Webflow" name="generator"/>
    <link href="css/index.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php

include "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pdo = connexionDB();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_id = null;
    $role = null;
    $ordre = null;

    // Vérifier les informations d'identification de l'administrateur
    $stmt = $pdo->prepare('SELECT * FROM Administrateur WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $user_id = $admin['idAdmin'];
        $role = $admin['Role'];
    }

    // Vérifier les informations d'identification de l'enseignant
    if (!$user_id) {
        $stmt = $pdo->prepare('SELECT * FROM Enseignants WHERE login = :login');
        $stmt->bindParam(':login', $username);
        $stmt->execute();
        $enseignant = $stmt->fetch();

        if ($enseignant && password_verify($password, $enseignant['mdp'])) {
            $user_id = $enseignant['ID_enseignant'];
            $role = $enseignant['Role'];
        }
    }

    // Vérifier les informations d'identification de l'étudiant
    if (!$user_id) {
        $stmt = $pdo->prepare('SELECT * FROM Etudiants WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $etudiant = $stmt->fetch();

        if ($etudiant && password_verify($password, $etudiant['password'])) {
            $user_id = $etudiant['ID_etudiant'];
            $role = $etudiant['Role'];
        }
    }

    if ($user_id && $role) {
        // Récupérer l'ordre en fonction du rôle
        $stmt = $pdo->prepare('SELECT Ordre FROM Compte WHERE Role = :role');
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        $compte = $stmt->fetch();

        if ($compte) {
            $ordre = $compte['Ordre'];
        }

        $_SESSION['user_id'] = $user_id;
        $_SESSION['role'] = $role;
        $_SESSION['ordre'] = $ordre;

        // Utiliser switch-case pour rediriger en fonction de l'ordre
        switch ($ordre) {
            case 1:
                header('Location: php/Acceuil_admin.php');
                break;
            case 2:
                header('Location: php/Accueil_prof.php');
                break;
            case 3:
                header('Location: php/Accueil_eleve.php');
                break;
            default:
                $error = "Rôle non reconnu";
                break;
        }
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect";
    }
}
?>
<header> 
    <nav>
        <div class="menu">
            <img class="logo" src="image/Logo.png" alt="logo">
        </div>
    </nav>
</header>
<div class="_2-columns-2">
    <div class="gauche">
        <img src="image/image illustration.webp" class="image"/>
    </div>
    <div class="gauche">
        <div class="contact-form">
            <div class="container">
                <div class="section-title">
                    <h2 class="get-in-touch">Connexion</h2>
                </div>
                <div class="form-wrapper w-form">
                    <form id="connexion-form" name="connexion-form" method="post" class="form-2">
                        <div class="input-wrapper-3">
                            <label for="username" class="form-block-label">Identifiant</label>
                            <input class="form-text-input-11 w-input" maxlength="256" name="username" placeholder="ex : Martin Dupont" type="text" id="username"/>
                        </div>
                        <div class="input-wrapper-3">
                            <label for="password" class="form-block-label">Mot de passe</label>
                            <input class="form-text-input-12 w-input" maxlength="256" name="password" placeholder="Mot de passe" type="password" id="password"/>
                        </div>
                        <input type="submit" data-wait="Please wait..." class="form-button-2 w-button" value="CONNEXION"/>
                    </form>
                </div>
                <?php if (isset($error)): ?>
                    <p><?php echo $error; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
