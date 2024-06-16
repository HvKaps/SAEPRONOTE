<?php
session_start();
include "HEADER.php";


$servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "VisualNote";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$enseignant_id = 1;


$sql = "SELECT n.ID_note, e.Nom, e.Prenom, n.ressource, n.note 
        FROM Notes n 
        JOIN Etudiants e ON n.ID_etudiant = e.ID_etudiant 
        WHERE n.ID_enseignant = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $enseignant_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Voir les notes attribuées</title>
    <link rel="stylesheet" href="../css/consultereleve.css">
    <link href="../css/HEADER.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="voir-les-notes">
    <h3>Notes attribuées</h3>
    <table>
        <thead>
            <tr>
                <th>ID Note</th>
                <th>Nom de l'étudiant</th>
                <th>Prénom de l'étudiant</th>
                <th>Ressource</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row["ID_note"] . '</td>
                            <td>' . $row["Nom"] . '</td>
                            <td>' . $row["Prenom"] . '</td>
                            <td>' . $row["ressource"] . '</td>
                            <td>' . $row["note"] . '</td>
                          </tr>';
                }
            } else {
                echo '<tr><td colspan="5">Aucune note attribuée trouvée.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php
$stmt->close();
$conn->close();
?>
</body>
</html>
