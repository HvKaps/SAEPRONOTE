<?php //connexion à la BD
function connexionDB(){
    $host = "localhost";
    $dbname = "visualNote";
    $user ="root";
    $pass ="";

    try {
        // Création d'un objet connexion
        $pdo = new PDO('mysql:host='. $host . ';dbname='. $dbname .';charset=utf8', $user, $pass);
        // Définition du niveau de gestion d'erreur
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
        echo "connexion reussi"
     }
    catch(PDOException $e) {
        echo "Erreur : ".$e -> getMessage()."<br/>";
}
}
?>
