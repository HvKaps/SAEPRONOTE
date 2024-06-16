<?php
session_start();
include "exit.php";
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
    <header>
        <a href="acceuil_eleve.php">
            <img class="logo" src="../image/Logo.png" alt="logo">
        </a>
        <nav>
            <ul>
                <li><a href="etudianote.php">Relevé</a></li>
                <li><a href="../index.php" name="deco"><img class="exit" src="../image/logout.png" alt="Deconnexion"></a></li>
                
            </ul>
        </nav>
    </header>
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
