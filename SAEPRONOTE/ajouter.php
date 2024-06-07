<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajouter.css">
    <title>Ajouter</title>
</head>
<body>
<header> 
  
  <nav>
      <div class="menu">
    <img class="logo" src="image/Logo.png" alt="logo">
      


      </div>
      
  </nav>

</header>
    <div class="sidebar">
        <a href="#" onclick="showForm('professeurForm')">Ajouter des professeurs</a>
        <a href="#" onclick="showForm('eleveForm')">Ajouter des élèves</a>
        <a href="#" onclick="showForm('ressourceForm')">Ajouter des ressources</a>
    </div>
    <div class="content">
        <div id="professeurForm" class="form-container active">
            <h2>Ajouter des professeurs</h2>
            <form method="POST" action="">
                <input type="text" name="prof_nom" placeholder="Nom" required>
                <input type="text" name="prof_classe" placeholder="Classe" required>
                <input type="text" name="prof_prenom" placeholder="Prénom" required>
                <input type="text" name="prof_ressource" placeholder="Ressource" required>
                <button type="submit" name="submit_prof">Valider</button>
            </form>
        </div>
        <div id="eleveForm" class="form-container">
            <h2>Ajouter des élèves</h2>
            <form method="POST" action="">
                <input type="text" name="eleve_nom" placeholder="Nom" required>
                <input type="text" name="eleve_classe" placeholder="Classe" required>
                <input type="text" name="eleve_prenom" placeholder="Prénom" required>
                <button type="submit" name="submit_eleve">Valider</button>
            </form>
        </div>
        <div id="ressourceForm" class="form-container">
            <h2>Ajouter des ressources</h2>
            <form method="POST" action="">
                <input type="text" name="ressource_nom" placeholder="Nom de la ressource" required>
                <input type="text" name="ressource_type" placeholder="Type" required>
                <input type="text" name="ressource_description" placeholder="Description" required>
                <button type="submit" name="submit_ressource">Valider</button>
            </form>
        </div>
    </div>

    <script>
        function showForm(formId) {
            document.querySelectorAll('.form-container').forEach(function(form) {
                form.classList.remove('active');
            });
            document.getElementById(formId).classList.add('active');
        }
    </script>

    <?php
    
    // Inclure le fichier de configuration de la base de données
    require 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ajouter des professeurs
        if (isset($_POST['submit_prof'])) {
            $nom = $_POST['prof_nom'];
            $classe = $_POST['prof_classe'];
            $prenom = $_POST['prof_prenom'];
            $ressource = $_POST['prof_ressource'];

            $sql = "INSERT INTO professeurs (nom, classe, prenom, ressource) VALUES ('$nom', '$classe', '$prenom', '$ressource')";
            if ($conn->query($sql) === TRUE) {
                echo "Nouveau professeur ajouté avec succès";
            } else {
                echo "Erreur: " . $sql . "<br>" . $conn->error;
            }
        }

        // Ajouter des élèves
        if (isset($_POST['submit_eleve'])) {
            $nom = $_POST['eleve_nom'];
            $classe = $_POST['eleve_classe'];
            $prenom = $_POST['eleve_prenom'];

            $sql = "INSERT INTO eleves (nom, classe, prenom) VALUES ('$nom', '$classe', '$prenom')";
            if ($conn->query($sql) === TRUE) {
                echo "Nouvel élève ajouté avec succès";
            } else {
                echo "Erreur: " . $sql . "<br>" . $conn->error;
            }
        }

        // Ajouter des ressources
        if (isset($_POST['submit_ressource'])) {
            $nom = $_POST['ressource_nom'];
            $type = $_POST['ressource_type'];
            $description = $_POST['ressource_description'];

            $sql = "INSERT INTO ressources (nom, type, description) VALUES ('$nom', '$type', '$description')";
            if ($conn->query($sql) === TRUE) {
                echo "Nouvelle ressource ajoutée avec succès";
            } else {
                echo "Erreur: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    ?>
</body>
</html>

