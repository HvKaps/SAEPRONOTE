<!DOCTYPE html>
<html>
<head>
    <title>Vos Notes</title>
    <link rel="stylesheet" href="../css/consultereleve.css">
</head>
<body>
<?php
session_start();
include "HEADER_Eleve.php";


if (!isset($_SESSION['ID_etudiant']) || !is_int($_SESSION['ID_etudiant'])) {
    die("Vous devez être connecté pour voir vos notes.");
}

$student_id = (int) $_SESSION['ID_etudiant']; 

$servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "VisualNote";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT ID_note, ID_enseignant, note, ressource FROM Notes WHERE ID_etudiant = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();


if ($stmt->errno) {
    die("Error executing query: " . $stmt->error);
}

$result = $stmt->get_result();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Note ID: " . $row["ID_note"] . "<br>";
        echo "Enseignant ID: " . $row["ID_enseignant"] . "<br>";
        echo "Note: " . $row["note"] . "<br>";
        echo "Ressource: " . $row["ressource"] . "<br><br>";
    }
} else {
    echo "Aucune note trouvé pour cet étudiant.";
}


$stmt->close();
$conn->close();
?>
<h2>Vos Notes</h2>

<table >
    <thead>
        <tr>
            <th>ID Note</th>
            <th>ID Enseignant</th>
            <th>Note</th>
            <th>Ressource</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID_note"] . "</td>";
                echo "<td>" . $row["ID_enseignant"] . "</td>";
                echo "<td>" . $row["note"] . "</td>";
                echo "<td>" . $row["ressource"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Aucune notes.</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
