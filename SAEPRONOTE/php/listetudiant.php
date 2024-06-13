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
require '../config.php';


    $sql = "SELECT ID_etudiant, Nom, Prenom, Groupe 
            FROM Etudiants 
            WHERE Niveau = :niveau";

    $stmt = $conn->prepare($sql);
    
    $niveau = 'Niveau à spécifier'; 
    $stmt->bindParam(':niveau', $niveau, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Affichage des résultats dans un tableau HTML
    if (count($result) > 0) {
        echo "<table border='1'>
        <tr>
            <th>ID Etudiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Groupe</th>
        </tr>";

        foreach ($result as $row) {
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
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermeture de la connexion (facultatif)
$conn = null;

?>
</div>
</body>
</html>
