<?php session_start();
include "../php/HEADER_Admin.php";
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

    <div class="navbar">
        Que voulez-vous faire ?
    </div>
    <div class="container">
        <div class="card" onclick="location.href='addprof.php'">Ajouter</div>
        <div class="card" onclick="location.href='../php/consultereleve.php'">Consulter Eleve</div>
        <div class="card" onclick="location.href='../php/liste_professeurs.php'">Consulter Professeurs</div>
    </div>
</body>
</html>
