<?php
// Inclure des fichiers de configuration ou démarrer des sessions ici si nécessaire
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Que voulez-vous faire ?</title>
</head>
<body>
    <div class="navbar">
        Que voulez-vous faire ?
    </div>
    <div class="container">
        <div class="card" onclick="location.href='ajouter.php'">Ajouter</div>
        <div class="card">Modifier</div>
        <div class="card">Consulter</div>
    </div>
</body>
</html>
