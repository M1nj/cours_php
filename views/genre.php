<?php
    include("../db.php");
    ini_set("display_errors",1);
    
    $genre = $_GET['genre']; //on récupère l'ID dans l'URL
    
    $sql = "SELECT * FROM movie_simple
            WHERE genres LIKE :genre 
            LIMIT 50"; //utiliser les deux points lorsque les données peuvent être manipulées par l'utilisateur.
    
    $stmt = $dbh -> prepare($sql);
    $stmt -> execute([":genre" => "%".$genre."%",]); //on la remplace ensuite dans $genre.
    $movies = $stmt -> fetchAll();
    
    $title='Détails du film'; 
?>

<head>
        <title><?php echo $title; ?></title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css" >
</head>

<?php include("../layer/header.php"); ?>

<body>
<?php 

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


echo '<h1>'.strtoupper($genre).'</h1>';
?>
<ul class="posters">
<?php
foreach ($movies as $movie){
    echo '
        <li>

            <a href="../views/detail.php?id='.$movie["id"].'">
                 <img src="../img/posters/' .$movie["imdbId"].'.jpg" class="img-poster" alt="'.$movie["title"].'">
                 <div class="filmName"><p> '.$movie["title"];' </p></div>
            </a>

           
        </li>';
    }

?>
</ul>
</body>

<?php include("..layer/footer.php"); ?>