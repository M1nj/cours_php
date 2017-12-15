<?php 

//traiter le form
        //récupérer les données
       // print_r($_POST);
       $idMovie = $_GET["id"];

if (!empty($_POST)){
        $name = $_POST["username"];
        $title = $_POST["title"];
        $critic = $_POST["critic"];

        $error = "";

        //valide les données
            //nom renseigné ?
        if (empty($name)){
            $error = "veuillez renseigner votre username";
        }

        if (empty($title)){
            $error = "veuillez renseigner le titre de votre critique";
        }

        if (empty($critic)){
            $error = "veuillez renseigner votre critique";
        }
            
         /*   //date dans le futur ? 
        if ($date < date("Y-m-d")){
            $error = "blabla.";
        }  */
        
            //téléphone ?
            //nb de personne ?

        //si les données sont valides
        if ($error == ""){
            //ajout dans la bdd
            /*
            INSERT INTO booking 
            VALUES 
            (NULL, 'guillaume', '2018-01-01', 12, '0634444444', 'près de la fenêtre svp', NOW())
            */
            $sql = "INSERT INTO review 
                    VALUES (NULL, :title, :username, 
                    :critic, NOW(),:idMovie)";

            $stmt = $dbh->prepare($sql);
            $stmt -> execute([
                ":title" => $title,
                ":username" => $name, 
                ":critic" =>$critic,
                ":idMovie" => $idMovie,
            ]);

            //afficher un message de succès
            //redirige
            //header("Location: https://lingscars.com");
        }}

$sql = "SELECT * FROM review
        WHERE idMovie = :idMovie";
$stmt = $dbh -> prepare($sql);
$stmt -> execute([":idMovie" => $idMovie]);
$critics = $stmt -> FetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Réservation</title>
</head>

<body>
    <!-- afficher le formulaire --> 
    <form method="post" class="post_critique">

        <label>Votre pseudo</label>
        <input type="username" name="username" value=
        
        <?php  
        if(isset($_SESSION['isConnected'])){
            echo $_SESSION['pseudo'];
        }
        ?>>

        <label>Titre de votre critique</label>
        <input type="text" name="title">
<br/>
        <label>Votre critique</label>
        <textarea type="text" name="critic"></textarea>
<br/>
        <button class="btn btn-primary">Poster ma critique</button>
    </form>

<?php foreach ($critics as $critic){
    echo '<div class="card">';
    echo '<div class="card-header">[#'.$critic["id"].']    '.$critic["title"].'</div>';
    echo '<div class="card-body">
    <blockquote class="blockquote mb-0">
    <p>'.$critic["critic"].'</p>
    <span class="blockquote-footer">'.$critic["username"].'    ('. $critic['dateCreate'].')</span></blockquote>';
    echo '</div>';
    echo '</div>';
}
?>


</body>
</html>