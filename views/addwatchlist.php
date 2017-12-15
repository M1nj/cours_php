<?php 
    session_start();
    ini_set("display_errors",1);
    include("../db.php");

    $id = $_GET['id']; //on récupère l'ID dans l'URL
    $userid=$_SESSION['id'];

    $sql = "INSERT INTO watchlist 
    VALUES (:id, :userid)";

    $stmt = $dbh->prepare($sql);
    $stmt -> execute([
        ":id" =>  $id,
        ":userid" =>   $userid, 
    ]);
    header("Location: detail.php?id=".$id);
    
?>