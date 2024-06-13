<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Ajout de note</title>
    <link href="../css/addnote.css" rel="stylesheet" type="text/css"/>
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
        <div class="column-4">
            <h4>Modification</h4>
            <form id="webflow-form" name="webflow-form" method="post" class="form">
                <div class="input-wrapper">
                    <input class="form-text-input w-input" maxlength="256" name="id_evaluation" placeholder="ID évaluation" type="text"/>
                </div>
                <div class="input-wrapper-2">
                    <input class="form-text-input-7 w-input" maxlength="256" name="classe_modif" placeholder="Classe" type="text"/>
                </div>
                <div class="input-wrapper-2">
                    <input class="form-text-input-8 w-input" maxlength="256" name="ressource_modif" placeholder="Ressource" type="text"/>
                </div>
                <div class="input-wrapper-2">
                    <input class="form-text-input-9 w-input" maxlength="256" name="etudiant_modif" placeholder="Étudiant" type="text"/>
                </div>
                <div class="input-wrapper-2">
                    <input class="form-text-input-10 w-input" maxlength="256" name="note_modif" placeholder="Note" type="text"/>
                </div>
                <div class="bouttons">
                    <div class="column-2">
                        <input type="submit" name="submit_modif" class="form-button w-button" value="Valider"/>
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

require '../config.php';


<?php
if (isset($_POST['submit_note'])) {
    $ressource = $_POST['ressource'];
    $etudiant = $_POST['etudiant'];
    $note = $_POST['note'];
    $enseignant_id = 1; 

    try {
      
        $conn = new PDO("mysql:host=localhost;dbname=VisualNote", "username", "password");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "INSERT INTO Notes (ID_enseignant, ID_etudiant, note, ressource)
                VALUES (:enseignant_id, :etudiant, :note, :ressource)";
        
        $stmt = $conn->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':enseignant_id', $enseignant_id, PDO::PARAM_INT);
        $stmt->bindParam(':etudiant', $etudiant, PDO::PARAM_INT);
        $stmt->bindParam(':note', $note, PDO::PARAM_STR);
        $stmt->bindParam(':ressource', $ressource, PDO::PARAM_STR);

        // Exécution de la requête préparée
        if ($stmt->execute()) {
         
            header("Location: voiranote.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout de la note.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

  
    $conn = null;
}
?>


</body>
</html>
