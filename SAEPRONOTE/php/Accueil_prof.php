<?php
session_start();
include "../php/HEADER_Prof.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual Note</title>
    <link rel="stylesheet" href="../css/acceuil_prof_eleve.css">
</head>

    <main>
        <div class="intro">
            <h1>Bienvenue sur Visual Note</h1>
            <p>Vous pouvez à present ajouter de notes aux étudiants.</p>
            <a href="../php/listetudiant.php"><button>VOIR LA LISTE D'ETUDIANT</button></a>
        </div>
        <div class="image-container">
            <img src="../image/illustration-concept-education_114360-7928.jpg.avif" alt="Visual">
        </div>
    </main>
</body>
</html>
