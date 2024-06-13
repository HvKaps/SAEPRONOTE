<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Voir les notes</title>
    <link href="../css/addnote.css" rel="stylesheet" type="text/css"/>
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

<div class="ajout-de-note-prof">
    <h3>Notes attribuées</h3>

<?php

require '../config.php';

$enseignant_id = 1; 
$sql = "SELECT 
            Etudiants.Nom AS NomEtudiant, 
            Etudiants.Prenom AS PrenomEtudiant, 
            Groupes.Nom_groupe AS Groupe, 
            Notes.note AS Note,
            Notes.ressource AS Ressource
        FROM Notes
        JOIN Etudiants ON Notes.ID_etudiant = Etudiants.ID_etudiant
        JOIN Groupes ON Etudiants.Groupe = Groupes.ID_groupe
        WHERE Notes.ID_enseignant = :enseignant_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':enseignant_id', $enseignant_id, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($result) > 0) {
    echo "<table border='1'>
    <tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Groupe</th>
    <th>Note</th>
    <th>Ressource</th>
    </tr>";

    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['NomEtudiant']) . "</td>";
        echo "<td>" . htmlspecialchars($row['PrenomEtudiant']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Groupe']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Note']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Ressource']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucune note pour le moment.";
}

?>
</div>
</body>
</html>
