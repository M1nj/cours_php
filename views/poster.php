<?php 
    $title = "Allocinoche";
    session_start();
?>

<ul class="posters">
<?php
//Association de la base de données
$sql = "SELECT imdbId, id, title FROM movie_simple 
        ORDER BY RAND() LIMIT 50";
$stmt = $dbh -> query($sql); //execution de la requête
$movies = $stmt -> fetchAll(); //récuperer toutes les lignes de la requête.
//var_dump($movies); //afficher les lignes

//$images= glob('img/posters/*.jpg', GLOB_BRACE);
foreach ($movies as $movie){
    echo '
    <li class="test">
        <a href="views/detail.php?id='.$movie["id"].'">
            <img src="img/posters/' .$movie["imdbId"].'.jpg" class="img-poster" alt="'.$movie["title"].'">
            <div class="filmName"><p> '.$movie["title"];' </p></div>
        </a>   
    </li>';
    }
?>
</ul>

<div class="autresfilms">
    <a class="btn btn-primary" href="index.php" role="button">Voir d'autres films</a>
</div>




