<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/addprof.css">
    <title>Ajouter</title>
</head>
<body>
<header> 
    <nav>
        <div class="menu">
            <img class="logo" src="../image/Logo.png" alt="logo">
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
            <form action="" method="post">
                <label for="Nom">Nom:</label><br>
                <input type="text" id="Nom" name="Nom" required><br>
                <label for="Prenom">Prenom:</label><br>
                <input type="text" id="Prenom" name="Prenom" required><br>
                <label for="login">Login:</label><br>
                <input type="text" id="login" name="login" required><br>
                <label for="mdp">Mot de Passe:</label><br>
                <input type="password" id="mdp" name="mdp" required><br>
                <label for="Role">Role:</label><br>
                <select id="Role" name="Role">
                    <option value="enseignant">Enseignant</option>
                </select><br><br>
                <input type="submit" value="Add Teacher">
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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "VisualNote";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nom = $_POST['Nom'];
    $Prenom = $_POST['Prenom'];
    $login = $_POST['login'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT); 
    $Role = $_POST['Role'];

    $sql = "INSERT INTO Enseignants (Nom, Prenom, login, mdp, Role) VALUES ('$Nom', '$Prenom', '$login', '$mdp', '$Role')";

    if ($conn->query($sql) === TRUE) {
        echo "Ajout réussi";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
</body>
</html>
