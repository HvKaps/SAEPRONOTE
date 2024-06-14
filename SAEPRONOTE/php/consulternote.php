<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter les Étudiants</title>
    <link rel="stylesheet" href="consulternote.css">
</head>
<body>
<header>
    
</header>
<div class="navbar">
    Liste des Étudiants
</div>
<div class="content">
    <table>
        <thead>
            <tr>
                <th>ID Étudiant</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Niveau (BUT1)</th>
                <th>Groupe</th>
                <th>Promotion (2024)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Exemple de données d'étudiants (remplacez par votre propre logique de récupération de données)
            $etudiants = [
                ['id' => 1, 'nom' => 'Dupont', 'prenom' => 'Jean', 'email' => 'jean.dupont@example.com', 'mot_de_passe' => 'password123', 'niveau' => 'BUT1', 'groupe' => 1, 'promotion' => 2024],
                ['id' => 2, 'nom' => 'Martin', 'prenom' => 'Marie', 'email' => 'marie.martin@example.com', 'mot_de_passe' => 'student123', 'niveau' => 'BUT1', 'groupe' => 1, 'promotion' => 2024],
                ['id' => 3, 'nom' => 'Durand', 'prenom' => 'Paul', 'email' => 'paul.durand@example.com', 'mot_de_passe' => 'mypassword', 'niveau' => 'BUT1', 'groupe' => 2, 'promotion' => 2024],
                ['id' => 4, 'nom' => 'Leroy', 'prenom' => 'Bart', 'email' => 'bart.leroy@example.com', 'mot_de_passe' => 'mmipass', 'niveau' => 'BUT1', 'groupe' => 2, 'promotion' => 2024],
                ['id' => 5, 'nom' => 'Moreau', 'prenom' => 'Lucas', 'email' => 'lucas.moreau@example.com', 'mot_de_passe' => 'butmmi', 'niveau' => 'BUT1', 'groupe' => 3, 'promotion' => 2024],
                ['id' => 6, 'nom' => 'Petit', 'prenom' => 'Leon', 'email' => 'leon.petit@example.com', 'mot_de_passe' => 'student123', 'niveau' => 'BUT1', 'groupe' => 3, 'promotion' => 2024],
                ['id' => 7, 'nom' => 'Roux', 'prenom' => 'Antoine', 'email' => 'antoine.roux@example.com', 'mot_de_passe' => 'student123', 'niveau' => 'BUT1', 'groupe' => 4, 'promotion' => 2024],
                ['id' => 8, 'nom' => 'Blanc', 'prenom' => 'Emma', 'email' => 'emma.blanc@example.com', 'mot_de_passe' => 'student123', 'niveau' => 'BUT1', 'groupe' => 4, 'promotion' => 2024],
                ['id' => 9, 'nom' => 'Fournier', 'prenom' => 'Léa', 'email' => 'lea.fournier@example.com', 'mot_de_passe' => 'student123', 'niveau' => 'BUT1', 'groupe' => 5, 'promotion' => 2024],
                ['id' => 10, 'nom' => 'Girard', 'prenom' => 'Jacky', 'email' => 'jacky.girard@example.com', 'mot_de_passe' => 'student123', 'niveau' => 'BUT1', 'groupe' => 6, 'promotion' => 2024],
            ];

            foreach ($etudiants as $etudiant) {
                echo '<tr>';
                echo '<td>' . $etudiant['id'] . '</td>';
                echo '<td>' . $etudiant['nom'] . '</td>';
                echo '<td>' . $etudiant['prenom'] . '</td>';
                echo '<td>' . $etudiant['email'] . '</td>';
                echo '<td>' . $etudiant['mot_de_passe'] . '</td>';
                echo '<td>' . $etudiant['niveau'] . '</td>';
                echo '<td>' . $etudiant['groupe'] . '</td>';
                echo '<td>' . $etudiant['promotion'] . '</td>';
                echo '<td>';
                echo '<form action="modifier.php" method="POST">';
                echo '<input type="hidden" name="id" value="' . $etudiant['id'] . '">';
                echo '<button type="submit">Modifier</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <button onclick="location.href='liste_professeurs.php'">Liste des Professeurs</button>
</div>
</body>
</html>
