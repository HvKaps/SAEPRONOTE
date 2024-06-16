<?php
session_start();
include "../php/HEADER_Eleve.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual Note</title>
    <link rel="stylesheet" href="../css/acceuil_prof_eleve.css">
</head>
<body>
    
    <main>
        <div class="intro">
            <h1>Bienvenue sur Visual Note</h1>
            <p>Vous pouvez à present consulter vos notes.</p>
            <a href="etudianote.php"><button>VOIR LES NOTES</button></a>
        </div>
        <div class="image-container">
            <img src="../image/illustration-concept-education_114360-7928.jpg.avif" alt="Visual">
        </div>
    </main>
</body>
</html>
