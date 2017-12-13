<?php
$title='Accueil';
?>
<h1><?php echo $title; ?></h1>
<section>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis massa lorem, aliquam ut ultricies et, feugiat id urna. Donec sed tempor enim. Etiam suscipit iaculis porttitor. Nullam tempor diam quis dapibus vehicula. Curabitur in tincidunt elit. Nunc accumsan pulvinar lacus. Duis tristique commodo commodo. Donec eu magna lobortis, tincidunt nisi eu, porta eros. Proin quis lorem ipsum. Proin cursus arcu at aliquam posuere. Sed eu scelerisque diam. Ut hendrerit egestas massa non auctor. Praesent ut lobortis quam.</p>
</section>

<?php 
include("db.php");

$sql = "SELECT * FROM genre ORDER BY name";
$stmt = $dbh -> query($sql); //execution de la requête
$genres = $stmt -> fetchAll(); //récuperer toutes les lignes de la requête.
//var_dump($movies); //afficher les lignes

    echo '<div class=liste_genre>';
foreach ($genres as $list_genre){
    //echo '<a class="btn btn-primary drama" href="../index.php" role="button">';
    echo '<a class="btn btn-primary '.strtolower($list_genre["name"]).'" href="../views/genre.php?genre='.strtolower($list_genre["name"]).'" role="button">';
    echo $list_genre["name"];
    echo '</a>';
    }
    echo '</div>';
?>

<<?php include("poster.php"); ?>