<?php
// Vérifie si des données ont été soumises via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données soumises depuis le formulaire de modification
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $niveau = $_POST['niveau'];
    $groupe = $_POST['groupe'];
    $promotion = $_POST['promotion'];

    // Exemple de traitement de mise à jour (remplacez par votre propre logique)
    // Ici, nous affichons simplement les données, mais vous devez les traiter selon votre système de stockage
    echo "<h1>Modification de l'étudiant ID: $id</h1>";
    echo "<p>Nom: $nom</p>";
    echo "<p>Prénom: $prenom</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Mot de passe: $mot_de_passe</p>";
    echo "<p>Niveau: $niveau</p>";
    echo "<p>Groupe: $groupe</p>";
    echo "<p>Promotion: $promotion</p>";

    // Vous devez implémenter ici la logique de mise à jour dans votre système
    // Par exemple, mettre à jour une base de données, un fichier, etc.

    // Exemple de mise à jour fictive (remplacez par votre propre logique)
    // Supposons une mise à jour fictive dans une base de données
    // $sql = "UPDATE etudiants SET nom='$nom', prenom='$prenom', email='$email', mot_de_passe='$mot_de_passe', niveau='$niveau', groupe=$groupe, promotion=$promotion WHERE id=$id";
    // $result = mysqli_query($conn, $sql);

    // Vérification de la mise à jour réussie
    // if ($result) {
    //     echo "<p>Les informations de l'étudiant ont été mises à jour avec succès.</p>";
    // } else {
    //     echo "<p>Erreur lors de la mise à jour des informations de l'étudiant.</p>";
    // }
 // Ajout d'un bouton de redirection vers consulternote.php
    echo '<a href="consulternote.php" class="button">Retourner à la liste des étudiants</a>';
}
?>
