<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php //include "header.php";
 include "config.php";
// echo password_hash("admin", PASSWORD_DEFAULT);
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        

        $pdo = connexionDB();
    $username = $_POST['username'];
    $password = $_POST['password'];

        $stmt = $pdo->prepare('SELECT * FROM Administrateur WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $admin = $stmt->fetch();
    
        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['idAdmin'];
        
            header('Location: CONNEXION/connexion.php');
        
            exit;
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect";
        }

    }
    ?>
<center>
    <h1>Page de connexion</h1>
    <form  method="POST">
        <table>
            <tr>
                <td>
                    Login
                </td>
                <td><input type="text" id="log" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" id="pass" name="password">
                </td>
                
            </tr>
            <tr>
                <td><input type="submit" value="Valider"></td>
                <td><input type="reset" value="Effacer"></td>
            </tr>
        </table>
    </form>
    
    
    </center>
</body>
</html>