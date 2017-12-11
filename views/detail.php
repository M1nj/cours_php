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
                    WHERE id= ".$id;

            $stmt = $dbh -> query($sql);
            $movie = $stmt -> fetch();
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
<div>
            <h2>Intrigue</h2>
            <p>
            <?PHP echo $movie["plot"]; ?>
            </p> 
</div>      
<div>  
            <h2>Date de sortie</h2>
                <p>
                    <?PHP echo $movie["year"]; ?>
                </p> 
</div>
<br>
<div>
            <h2>Genre</h2>
                <p>
                    <?PHP echo $movie["genres"]; ?>
                </p>
</div> 
<br>
<div>
            <h2>Réalisateur</h2>
                <p>
                    <?PHP echo $movie["directors"]; ?>
                </p>
</div> 
<br>
<div>
            <h2>Note</h2>
                <p>
                    <?PHP echo $movie["rating"]; ?>
                </p> 
</div>

            </div> 
        </main>
        <div class="autresfilms">
            <a class="btn btn-primary" href="../index.php" role="button">Voir d'autres films</a>
        </div>
        <?php include'../layer/footer.php';?>

</body>
