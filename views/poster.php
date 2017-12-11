<?php 
    $title = "Movies!";
?>


<div class="posters">
<?php
$images= glob('img/posters/*.jpg', GLOB_BRACE);
foreach ($images as $image){
    echo '
        <li>
            <img src="' .$image. '" class="img-poster">
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




