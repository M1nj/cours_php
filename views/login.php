<?php
    $title='Connexion';
    session_start();
    ini_set("display_errors",1);
    include("../db.php");

    //echo $_SESSION["views"];
    //$_SESSION["isConnected"]= true;

    // Hachage du mot de passe
    // $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if (!empty($_POST)){
        $pseudo = $_POST["pseudo"];
        $password = $_POST["password"];
        
        // Vérification des identifiants
        $sql = "SELECT * FROM users WHERE pseudo = :pseudo AND password = :password";
        $stmt = $dbh -> prepare($sql);

        //$stmt->execute(array(
        $stmt -> execute([":pseudo" => $pseudo, ":password" => $password,]);

        $resultat = $stmt->fetch();
        
        if (!$resultat)
        {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else
        {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $resultat['id'];
            $_SESSION["isConnected"]= true;
            echo header("Location: ../index.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?php echo $title; ?></title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css" >
    </head>
    
    <body>
    
        <?php include('../layer/header.php');?>

        <form class="form" method="post" action="login.php">

        <div class="formLogin">
            <label>Pseudo</label></br>
            <input type="username" name="pseudo">
            </br>

            <label class="mdpLogin">Mot de passe</label></br>
            <input type="password" name="password" />

            <div class="boutonForm2">
                <button>Je me connecte !</button>
            </div>
        </div>

        </form>
                
        <?php include'../layer/footer.php';?>
    </body>
</html>