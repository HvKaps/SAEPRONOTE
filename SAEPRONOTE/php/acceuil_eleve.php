<?php
session_start();
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
                <li><a href="#">Relevé</a></li>
                <li><a href="Modules.php">Module</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Classe</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="intro">
            <h1>Bienvenue sur Visual Note</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat.</p>
            <a href="Modules.php
            "><button>VOIR LES MODULES</button></a>
        </div>
        <div class="image-container">
            <img src="../image/illustration-concept-education_114360-7928.jpg.avif" alt="Visual">
        </div>
    </main>
</body>
</html>
