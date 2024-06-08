<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Voir les notes</title>
    <link href="../css/ajout.css" rel="stylesheet" type="text/css"/>
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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "VisualNote";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


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
        WHERE Notes.ID_enseignant = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $enseignant_id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Groupe</th>
    <th>Note</th>
    <th>Ressource</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['NomEtudiant'] . "</td>";
        echo "<td>" . $row['PrenomEtudiant'] . "</td>";
        echo "<td>" . $row['Groupe'] . "</td>";
        echo "<td>" . $row['Note'] . "</td>";
        echo "<td>" . $row['Ressource'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucune note pour le moment.";
}

$conn->close();
?>
</div>
</body>
</html>
