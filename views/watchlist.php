<?php 
	$title='Votre liste de Film';
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
			include("../db.php");?>
		<h1><?php echo $title; ?></h1>
		<ul class="posters">
		<?php
			
		//Association de la base de données
		
		$userid = $_SESSION['id'];

		$sql = "SELECT * FROM watchlist
				WHERE user= :userid";
		$stmt = $dbh -> prepare($sql);
		$stmt -> execute([":userid" => $userid]); //on la remplace ensuite dans $id.
		$watchlist = $stmt -> fetchAll(PDO::FETCH_COLUMN, "movie");

		$IdMovie = implode(",",$watchlist);

		if (!empty($watchlist)){
			$sql = "SELECT imdbId, id, title FROM movie_simple 
			WHERE id IN ($IdMovie)
			ORDER BY RAND() LIMIT 50";
			$stmt = $dbh -> query($sql); //execution de la requête
			$movies = $stmt -> fetchAll();
			foreach ($movies as $movie){
				echo
			'<li class="test">
				<a href="views/detail.php?id='.$movie["id"].'">
					<img src="../img/posters/' .$movie["imdbId"].'.jpg" class="img-poster" alt="'.$movie["title"].'">
					<div class="filmName"><p> '.$movie["title"];' </p></div>
				</a>   
			</li>';}
			}
		else{
			echo '<p>
					Aucun film sélectionné
				</p>';

		}
		?>


		<div class="autresfilms">
			<a class="btn btn-primary" href="../index.php" role="button">Voir d'autres films</a>
		</div>

		<?php include('../layer/footer.php');?>
	</body>
</html>

