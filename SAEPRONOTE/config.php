<?php
   function connexionDB(){
   $host = "mysql-makine-enzo.alwaysdata.net";
   $dbname = "makine-enzo_visualnote";
   $user ="341199";
   $pass ="9couronnes";
   try {
      
       $pdo = new PDO('mysql:host='. $host . ';dbname='. $dbname .';charset=utf8', $user, $pass);
     
       $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
       return $pdo;
    }
   catch(PDOException $e) {
       echo "Erreur : ".$e -> getMessage()."<br/>";
       
}
   }
?>