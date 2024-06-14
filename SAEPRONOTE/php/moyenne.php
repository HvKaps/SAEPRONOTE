<?php
session_start();


$ID_etudiant = $_SESSION['ID_etudiant'];

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "VisualNote";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifier si une ressource est sélectionnée
$ressource = isset($_POST['ressource']) ? $_POST['ressource'] : '';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mes Notes</title>
</head>
<body>
    <h2>Mes Notes</h2>

    <!-- Formulaire de sélection de la ressource -->
    <form method="post" action="">
        <label for="ressource">Sélectionnez la ressource :</label>
        <select id="ressource" name="ressource">
            <option value="">Toutes</option>
            <option value="math" <?php if ($ressource == 'math') echo 'selected'; ?>>Math</option>
            <option value="anglais" <?php if ($ressource == 'anglais') echo 'selected'; ?>>Anglais</option>
            <option value="graphisme" <?php if ($ressource == 'graphisme') echo 'selected'; ?>>Graphisme</option>
            <!-- Ajoutez d'autres options de ressources si nécessaire -->
        </select>
        <input type="submit" value="Voir les notes"/>
    </form>

    <?php
    // Requête pour récupérer les notes de l'étudiant connecté pour la ressource sélectionnée
    $sql = "SELECT n.note, n.ressource, e.Nom, e.Prenom, e.Groupe
            FROM Notes n
            JOIN Etudiants e ON n.ID_etudiant = e.ID_etudiant
            WHERE n.ID_etudiant = ?";

    if ($ressource) {
        $sql .= " AND n.ressource = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("is", $ID_etudiant, $ressource);
    } else {
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("i", $ID_etudiant);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    // Affichage des résultats dans un tableau HTML
    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
            <th>Ressource</th>
            <th>Note</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Groupe</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ressource'] . "</td>";
            echo "<td>" . $row['note'] . "</td>";
            echo "<td>" . $row['Nom'] . "</td>";
            echo "<td>" . $row['Prenom'] . "</td>";
            echo "<td>" . $row['Groupe'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Aucune note trouvée pour la ressource sélectionnée.";
    }

    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
