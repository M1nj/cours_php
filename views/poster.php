<?php 
    $title = "Movies!";
?>


<div class="posters">

<?php

//Association de la base de données
include ("db.php");

$sql = "SELECT imdbId FROM movie_simple ORDER BY RAND() LIMIT 50";
$stmt = $dbh -> query($sql); //execution de la requête
$movies = $stmt -> fetchAll(); //récuperer toutes les lignes de la requête.
//var_dump($movies); //afficher les lignes

//$images= glob('img/posters/*.jpg', GLOB_BRACE);
foreach ($movies as $movie){
    echo '
        <li>
            <a href="details.php?id='.$movie["imdbId"].'">
                <img src="img/posters/' .$movie["imdbId"].'.jpg" class="img-poster">
            </a>
        </li>';
    }
?>
</div>
<div class="autresfilms">
    <a class="btn btn-primary" href="index.php" role="button">Voir d'autres films</a>
</div>





