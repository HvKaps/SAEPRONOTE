<?php session_start();?>
<!DOCTYPE html>


    <head>
        <meta charset="utf-8"/>
        <title>Connexion</title>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="Webflow" name="generator"/>
        <link href="index.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
    <?php //include "header.php";
 include "config.php";
// echo password_hash("admin", PASSWORD_DEFAULT);
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        

        $pdo = connexionDB();
    $username = $_POST['username'];
    $password = $_POST['password'];

        $stmt = $pdo->prepare('SELECT * FROM Administrateur WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $admin = $stmt->fetch();
    
        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['idAdmin'];
        
            header('Location: Acceuil_admin.php');
        
            exit;
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect";
        }
    }
       /* ------------------------------------------------------------------*/
      



/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier dans la table `Enseignants`
    $stmt = $conn->prepare("SELECT ID_enseignant, mdp, Role FROM Enseignants WHERE login = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            if ($role == 'enseignant') {
                header("Location: dashboard_enseignant.php");
            } 
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        // Vérifier dans la table `Etudiants`
        $stmt = $conn->prepare("SELECT ID_etudiant, Mot_de_passe FROM Etudiants WHERE Email = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'etudiant';

                header("Location: dashboard_etudiant.php");
                exit();
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Nom d'utilisateur incorrect.";
        }
    }
    $stmt->close();
    $conn->close();
}*/


    
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
                            <form id="connexion-form" name="connexion-form"  method="post" class="form-2" >
                                <div class="input-wrapper-3">
                                    <label for="name" class="form-block-label">Identifiant </label>
                                    <input class="form-text-input-11 w-input" maxlength="256" name="username"  placeholder="ex : Martin Dupont" type="text" id="name"/>
                                </div>
                                <div class="input-wrapper-3">
                                    <label for="name" class="form-block-label">Mot de passe </label>
                                    <input class="form-text-input-12 w-input" maxlength="256" name="password" placeholder="Mot de passe " type="password" id="name"/>
                                </div>
                                <input type="submit" data-wait="Please wait..." class="form-button-2 w-button" value="CONNEXION"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
