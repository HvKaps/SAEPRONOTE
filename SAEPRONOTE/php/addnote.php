<?php
session_start();
include "HEADER_Prof.php"
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Ajout de note</title>
    <link href="../css/addnote.css" rel="stylesheet" type="text/css"/>
    <link href="../css/HEADER.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="ajout-de-note-prof">
    <h3>Ajout de note</h3>
    <div class="_2-columns">
        <div class="column">
            <h4>Saisie</h4>
            <form id="webflow-form" name="webflow-form" method="post" class="form">
  
                <div class="input-wrapper-2">
                    <input class="form-text-input-4 w-input" maxlength="256" name="ressource" placeholder="Ressource" type="text"/>
                </div>
                <div class="input-wrapper-2">
                    <input class="form-text-input-5 w-input" maxlength="256" name="etudiant" placeholder="Étudiant" type="text"/>
                </div>
                <div class="input-wrapper-2">
                    <input class="form-text-input-6 w-input" maxlength="256" name="note" placeholder="Note" type="text"/>
                </div>
                <div class="boutton">
                    <div class="column-2">
                        <input type="submit" name="submit_note" class="form-button w-button" value="Valider"/>
                    </div>
                    <div class="column-3">
                        <input type="reset" class="form-button w-button" value="Effacer"/>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<?php

$servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "VisualNote";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit_note'])) {

    $ressource = $_POST['ressource'];
    $etudiant = $_POST['etudiant'];
    $note = $_POST['note'];
    $enseignant_id = 1; 

    $sql = "INSERT INTO Notes (ID_enseignant, ID_etudiant, note, ressource)
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iids", $enseignant_id, $etudiant, $note, $ressource);
    if ($stmt->execute()) {
  
        header("Location: voirnote.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout de la note.";
    }
}


$conn->close();
?>
</body>
</html>
