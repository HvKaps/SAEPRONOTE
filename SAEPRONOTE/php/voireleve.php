<?php
session_start();
include "../php/HEADER_Prof.php";
$servername = "mysql-makine-enzo.alwaysdata.net";
$username = "341199";
$password = "9couronnes";
$dbname = "makine-enzo_visualnote";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT ID_etudiant, Nom, Prenom, Niveau, Groupe, promotion, classement FROM Etudiants";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir les Étudiants</title>
    <link rel="stylesheet" href="../css/consultereleve.css">
</head>
<body>

<div class="navbar">
    Liste des Étudiants
</div>
<div class="content">
    <table border="1">
        <thead>
            <tr>
                <th>ID Étudiant</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Niveau (BUT1)</th>
                <th>Groupe</th>
                <th>Promotion</th>
                <th>Rang</th>
              
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID_etudiant"] . "</td>";
                echo "<td>" . $row["Nom"] . "</td>";
                echo "<td>" . $row["Prenom"] . "</td>";
                echo "<td>" . $row["Niveau"] . "</td>";
                echo "<td>" . $row["Groupe"] . "</td>";
                echo "<td>" . $row["promotion"] . "</td>";
                echo "<td>" . $row["classement"] . "</td>";
               
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
   
</div>

</body>
</html>
