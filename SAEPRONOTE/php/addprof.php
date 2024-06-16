<?php
session_start();
include "HEADER.php";
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
    <a href="addprof.php" onclick="showForm('professeurForm')">Ajouter des professeurs</a>
    <a href="addetudiants.php" onclick="showForm('eleveForm')">Ajouter des élèves</a>
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
                <input type="submit" value="Ajouter">
            </form>
    </div>
    <div id="eleveForm" class="form-container">
        <h2>Ajouter des élèves</h2>
        <form method="POST" action="">
        <label for="nom">Nom:</label><br>
    <input type="text" id="nom" name="nom" required><br><br>
    
    <label for="prenom">Prenom:</label><br>
    <input type="text" id="prenom" name="prenom" required><br><br>
    
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    
    <label for="niveau">Niveau:</label><br>
    <input type="text" id="niveau" name="niveau" required><br><br>
    
    <label for="groupe">Groupe:</label><br>
    <input type="number" id="groupe" name="groupe" required><br><br>
    
    <label for="promotion">Promotion:</label><br>
    <input type="number" id="promotion" name="promotion"><br><br>
    
    <label for="role">Role:</label><br>
    <input type="text" id="role" name="role" required><br><br>
    
    
    <input type="submit" value="Ajouter">
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

$servername = "mysql-makine-enzo.alwaysdata.net";
$username = "341199";
$password = "9couronnes";
$dbname = "makine-enzo_visualnote";


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

 
    $sql = "INSERT INTO Enseignants (Nom, Prenom, login, mdp, Role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $Nom, $Prenom, $login, $mdp, $Role);

    if ($stmt->execute()) {
        echo "Ajout réussi";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
