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
		$id = $_POST['id']; 
		$userid = $_SESSION['id'];

		$sql = "SELECT * FROM watchlist
				WHERE movie = :id AND user= :userid";
		$stmt = $dbh -> prepare($sql);
		$stmt -> execute([":id" => $id, ":userid" => $userid]); //on la remplace ensuite dans $id.
		$watchlist = $stmt -> fetchAll();

		if (!empty($watchlist)){
			$sql = "SELECT imdbId, id, title FROM movie_simple 
			ORDER BY RAND() LIMIT 50";
			$stmt = $dbh -> query($sql); //execution de la requête
			$movies = $stmt -> fetchAll();
			echo
			'<li class="test">
				<a href="views/detail.php?id='.$movie["id"].'">
					<img src="img/posters/' .$movie["imdbId"].'.jpg" class="img-poster" alt="'.$movie["title"].'">
					<div class="filmName"><p> '.$movie["title"];' </p></div>
				</a>   
			</li>';
			}
		else{
			echo '<p>
					Aucun film sélectionné
				</p>';

		}
		include('../layer/footer.php');
		?>
		<div class="autresfilms">
			<a class="btn btn-primary" href="index.php" role="button">Voir d'autres films</a>
		</div>
	</body>
</html>

