<?php 
    $title = "Movies!";
?>


<div class="posters">

<?php

//Association de la base de données
include ("db.php");

$sql = "SELECT imdbId FROM movie_simple LIMIT 49";
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



  /*tableau pour les images
  $colors = ["jaune", "vert", "bleu"];
  
      foreach($colors as $color){
          echo $color . '</br>';
      }

      $book = [
            "title" => "blablabla",
            "year" => 2006,
            "author" => "Johnny"
        ];

        $book2 = [
            "title" => "yeah",
            "year" => 2015,
            "author" => "Alphonse"
        ];

        $books = [$book, $book2];


        
            <h2><?php echo $book["title"]; ?></h2>
            <h2><?php echo $book2["title"]; ?></h2>
            */
        


?>




