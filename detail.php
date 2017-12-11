<?PHP
    ini_set("display_errors",1);
    
    include("db.php");
    $id = $_GET['id']; //on récupère l'ID dans l'URL

    $sql = "SELECT * FROM movie_simple
            WHERE id= ".$id;

    $stmt = $dbh -> query($sql);
    $movie = $stmt -> fetch();
    var_dump($movie);        
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>