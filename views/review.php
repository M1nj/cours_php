<?php 
//traiter le form
        //récupérer les données
       // print_r($_POST);
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
                    :critic, NOW(), :idMovie)";

            $stmt = $dbh->prepare($sql);
            $stmt -> execute([
                ":title" => $title,
                ":username" => $name, 
                ":critic" => $critic,
                ":idMovie" => $id,
    
            ]);

            //afficher un message de succès
            //redirige
        }}
?>
<form class="form review" method="post">
    <div class="row"> 
        <div class="form-group col-3">
            <label>Pseudo</label>
            <input type="username" class="form-control" name="username" value=
            <?php  
                if(isset($_SESSION['isConnected'])){
                    echo $_SESSION['pseudo'];
                }
            ?>>
        </div>
        <div class="form-group col-9">
            <label>Titre de votre critique</label>
            <input type="text" name="title" class="form-control" placeholder="Entrez le titre de votre critique">
        </div>
    </div>
    <div class="row"> 
        <div class="form-group col-12">
            <label>Votre critique</label>
            <textarea  name="critic" class="form-control" placeholder="Entrez votre critique"></textarea>
        </div>
    </div>
    <div class="row col-3">
        <button type="submit" class="btn btn-primary">Envoyer ma critique</button>
    </div>
</form>

<?php 
    $sql = "SELECT * FROM review
            WHERE idMovie = :idMovie";
    $stmt = $dbh -> prepare($sql);
    $stmt -> execute([":idMovie" => $id]);
    $critics = $stmt -> FetchAll();

    foreach ($critics as $critic){
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