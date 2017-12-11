<?php 
    $title = "Movies!";
?>


<div class="posters">

<?php

//Association de la base de données
include ("db.php");

$sql = "SELECT imdbId FROM movie_simple LIMIT 50";
$stmt = $dbh -> query($sql); //execution de la requête
$movies = $stmt -> fetchAll(); //récuperer toutes les lignes de la requête.
//var_dump($movies); //afficher les lignes

//$images= glob('img/posters/*.jpg', GLOB_BRACE);
foreach ($movies as $movie){
    echo '
        <li>
            <img src="img/posters/' .$movie["imdbId"].'.jpg" class="img-poster">
        </li>';
    }
?>
</div>


