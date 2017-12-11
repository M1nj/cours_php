<?php 

  $title = "Movies!";

  //tableau pour les images
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

?>

<?php
// Activation de l'affichage des erreurs
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    if (isset($_GET['view']) && ctype_alnum($_GET['view'])){
        $view = $_GET['view'];
            }
    else {
        $view='home';
            }


// Génération de la vue demandée
// et récupération dans $content
// La vue doit définir $title
    ob_start();
    include 'views/' . $view . '.php';
    $content = ob_get_clean();

// Affichage de la page avec la vue
    include 'views/layout.php';
?>

    <h2><?php echo $book["title"]; ?></h2>
    <h2><?php echo $book2["title"]; ?></h2>
