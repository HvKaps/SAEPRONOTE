<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Professeurs</title>
    <link rel="stylesheet" href="consulternote.css">
</head>
<body>
<header>
   
</header>
<div class="navbar">
    <h1>Liste des Professeurs</h1>
</div>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Identifiant</th>
                <th>Rôle</th>
                <th>Profession</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Exemple de données des professeurs (remplacez par votre propre logique de récupération de données)
            $professeurs = [
                ['nom' => 'Al Salti', 'prenom' => 'Nadia', 'identifiant' => 'nalsalti', 'role' => 'teacher', 'profession' => 'enseignant'],
                ['nom' => 'Laroussi', 'prenom' => 'Reda', 'identifiant' => 'rlaroussi', 'role' => 'teacher', 'profession' => 'enseignant'],
                ['nom' => 'Boucetta', 'prenom' => 'Cherifa', 'identifiant' => 'cboucetta', 'role' => 'teacher', 'profession' => 'enseignant'],
                ['nom' => 'Louise-Alexandrine', 'prenom' => 'Patrick', 'identifiant' => 'plouisealexandrine', 'role' => 'teacher', 'profession' => 'enseignant'],
                ['nom' => 'Zaidi', 'prenom' => 'Fares', 'identifiant' => 'fzaidi', 'role' => 'teacher', 'profession' => 'enseignant'],
                ['nom' => 'Rachedi', 'prenom' => 'Abderrezak', 'identifiant' => 'rabderrezak', 'role' => 'teacher', 'profession' => 'enseignant'],
                ['nom' => 'Nguyen', 'prenom' => 'M, D,', 'identifiant' => 'mnguyen', 'role' => 'teacher', 'profession' => 'enseignant'],
                ['nom' => 'LHOCINE', 'prenom' => 'Abdel', 'identifiant' => 'alhocine', 'role' => 'teacher', 'profession' => 'enseignant'],
                ['nom' => 'Lesseur', 'prenom' => 'Nadine', 'identifiant' => 'nlesseur', 'role' => 'teacher', 'profession' => 'enseignant'],
            ];

            foreach ($professeurs as $professeur) {
                echo '<tr>';
                echo '<td>' . $professeur['nom'] . '</td>';
                echo '<td>' . $professeur['prenom'] . '</td>';
                echo '<td>' . $professeur['identifiant'] . '</td>';
                echo '<td>' . $professeur['role'] . '</td>';
                echo '<td>' . $professeur['profession'] . '</td>';
                echo '<td>';
                echo '<button type="button">Éditer</button> ';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <br>
    <button onclick="location.href='consulternote.php'">Retour</button>
</body>
</html>

