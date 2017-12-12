<?php
    $title='Détails du film';
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

        <?php include'../layer/header.php';?>
        <?PHP
            ini_set("display_errors",1);
            include("../db.php");
            $id = $_GET['id']; //on récupère l'ID dans l'URL

            $sql = "SELECT * FROM movie_simple
                    WHERE id = :id"; //utiliser les deux points lorsque les données peuvent être manipulées par l'utilisateur.

            $stmt = $dbh -> prepare($sql);
            $stmt -> execute([":id" => $id,]); //on la remplace ensuite dans $id.
            $movie = $stmt -> fetch();

            if (empty($movie)){
                include("../views/404.php");
                die();
                } //Si le film n'a pas été trouvé, alors afficher une page 404.

            //var_dump($movie);        
        ?>
        
        <main>
            <h1>
                <?PHP echo $movie["title"]; ?>
            </h1>
            <div class="details-movie">
                <?PHP
                    echo '<img src="../img/posters/' .$movie["imdbId"].'.jpg" class="img-poster">';
                ?>
                <p>
                    <?PHP echo $movie["plot"]; ?>
                </p> 
            </div> 
        </main>
        <div class="autresfilms">
            <a class="btn btn-primary" href="../index.php" role="button">Voir d'autres films</a>
        </div>
        <?php include'../layer/footer.php';?>

</body>
