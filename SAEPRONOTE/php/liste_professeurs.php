<?php
session_start();
include "../php/HEADER_Admin.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Professeurs</title>
    <link rel="stylesheet" href="../css/consultereleve.css">
</head>
<body>
<header>
    <div class="navbar">
        <h1>Liste des Professeurs</h1>
    </div>
</header>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "VisualNote";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID_enseignant, Nom, Prénom, Rôle FROM Enseignants";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>
            <thead>
                <tr>
                    <th>ID_enseignant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Rôle</th>
                </tr>
            </thead>
            <tbody>';
    while($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row["ID_enseignant"] . '</td>
                <td>' . $row["Nom"] . '</td>
                <td>' . $row["Prénom"] . '</td>
                <td>' . $row["Rôle"] . '</td>
              </tr>';
    }
    echo '</tbody>
        </table>';
} else {
    echo "0 results";
}

$conn->close();
?>

<br>
<button onclick="location.href='consultereleve.php'">Retour</button>
</body>
</html>
