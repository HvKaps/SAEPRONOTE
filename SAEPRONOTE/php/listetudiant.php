<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Liste des étudiants par niveau</title>
    <link href="../css/listetudiant.css" rel="stylesheet" type="text/css"/>
    <link href="../css/tableStyles.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<header>
    <nav>
        <div class="menu">
            <img class="logo" src="../image/Logo.png" alt="logo">
        </div>
    </nav>
</header>

<div class="etudiants-par-niveau">
    <h3>Liste des étudiants</h3>
    <form method="get" action="">
        <label for="niveau">Sélectionnez le niveau :</label>
        <select id="niveau" name="niveau">
            <option value="BUT1">BUT1</option>
            <option value="BUT2">BUT2</option>
            <option value="BUT3">BUT3</option>
        </select>
        <input type="submit" value="Voir les étudiants"/>
    </form>

<?php
if (isset($_GET['niveau'])) {
    $niveau = $_GET['niveau'];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "VisualNote";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Requête pour récupérer les étudiants du niveau spécifié
    $sql = "SELECT ID_etudiant, Nom, Prenom, Groupe 
            FROM Etudiants 
            WHERE Niveau = ?";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $niveau);
    $stmt->execute();
    $result = $stmt->get_result();

    // Affichage des résultats dans un tableau HTML
    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
            <th>ID Etudiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Groupe</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ID_etudiant'] . "</td>";
            echo "<td>" . $row['Nom'] . "</td>";
            echo "<td>" . $row['Prenom'] . "</td>";
            echo "<td>" . $row['Groupe'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Aucun étudiant trouvé pour le niveau sélectionné.";
    }

    // Fermer la connexion
    $conn->close();
}
?>
</div>
</body>
</html>
