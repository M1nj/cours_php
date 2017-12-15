<?php
    $title='Détails du film';
    session_start();
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

        <?php 
            include('../layer/header.php');
        
            ini_set("display_errors",1);
            include("../db.php");
            $id = $_GET['id']; //on récupère l'ID dans l'URL

            $sql = "SELECT * FROM movie_simple
                    WHERE id = :id"; //utiliser les deux points lorsque les données peuvent être manipulées par l'utilisateur.

            $stmt = $dbh -> prepare($sql);
            $stmt -> execute([":id" => $id,]); //on la remplace ensuite dans $id.
            $movie = $stmt -> fetch();

            if (empty($movie)){
                include("404.php");
                die();
                } //Si le film n'a pas été trouvé, alors afficher une page 404.

            //var_dump($movie);      

            $genres = $movie["genres"];
            $list_genres = explode("/", $genres);
             //foreach ($list_genres as $list_genre){
                //echo $list_genre;
            //}
        ?>

        <main>
            <h1>
                <?PHP echo $movie["title"]; ?> (<?PHP echo $movie["year"]; ?>)
            </h1>
            <div class="movie">
                <div class="details-movie">
                    <?PHP
                        echo '<img src="../img/posters/' .$movie["imdbId"].'.jpg" class="img-poster">';
                    ?>
                    <div class="details">
                        <div class="detail">
                            <h2>Intrigue</h2>
                            <p>
                                <?PHP echo $movie["plot"]; ?>
                            </p> 
                        </div> 
                        <div class="realisateur-note">
                            <div class="detail">
                                <h2>Réalisateur</h2>
                                <p>
                                    <?PHP echo $movie["directors"]; ?>
                                </p>
                            </div>
                            <div class="detail">
                                <h2>Note</h2>
                                <p>
                                    <?PHP echo $movie["rating"]; ?>
                                </p> 
                            </div>
                        </div>
                        <?php 
                        if(!empty($_SESSION)){
                            $id = $_GET['id']; //on récupère l'ID dans l'URL
                            $userid = $_SESSION['id'];
                            
                            $sql = "SELECT * FROM watchlist
                                    WHERE movie = :id AND user= :userid"; //utiliser les deux points lorsque les données peuvent être manipulées par l'utilisateur.
                
                            $stmt = $dbh -> prepare($sql);
                            $stmt -> execute([
                                ":id" => $id,
                                 ":userid" => $userid
                                 ]); //on la remplace ensuite dans $id.
                            $watchlist = $stmt -> fetch();
                
                            if (empty($watchlist)){
                                echo'<div class="whatchlist">
                                        <button class="btn btn-primary">Ajouter à la Watchlist</button>
                                    </div>';
                                    $sql = "INSERT INTO watchlist 
                                    VALUES (:id, :userid)";
                
                                    $stmt = $dbh->prepare($sql);
                                    $stmt -> execute([
                                        ":id" =>  $id,
                                        ":userid" => $userid, 
                                    ]);
                                }
                                
                            else{
                                echo'<div class="whatchlist">
                                        <button class="btn btn-primary">Retirer de la Watchlist</button>
                                    </div>';

                            }
                        }
                        ?>
                        
                    </div>
                </div> 
                <div class="genre">
                    <?PHP foreach ($list_genres as $list_genre){
                        //echo '<a class="btn btn-primary drama" href="../index.php" role="button">';
                        echo '<a class="btn btn-primary '.strtolower($list_genre).'" href="../views/genre.php?genre='.strtolower($list_genre).'" role="button">';
                        echo $list_genre;
                        echo '</a>';
                        }; ?>

                    <div>
                        <?php 
                            $trailerId = $_GET["id"];
                            
                            $sql = "SELECT * FROM movie_simple
                            WHERE id = :trailerId";

                            $stmt = $dbh -> prepare($sql);
                            $stmt -> execute([':trailerId' => $trailerId]);
                            $trailer = $stmt -> fetch();

                            echo '<div class="video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/'.$trailer["trailerId"].'" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                                </div>';
                        ?>
                    </div>
                </div>
            </div>

            


<?php include("review.php") ?>

        
            </main>
        <div class="autresfilms">
            <a class="btn btn-primary" href="../index.php" role="button">Voir d'autres films</a>
        </div>
        <?php include'../layer/footer.php';?>

</body>
