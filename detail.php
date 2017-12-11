<?PHP
    ini_set("display_errors",1);
    
    include("db.php");
    $id = $_GET['id']; //on récupère l'ID dans l'URL

    $sql = "SELECT * FROM movie_simple
            WHERE id= ".$id;

    $stmt = $dbh -> query($sql);
    $movie = $stmt -> fetch();
    //var_dump($movie);        
?>
<body>
    <header></header>
    <main>
        
<h1>
    <?PHP echo $movie["title"]; ?>
</h1>
<p>
    <?PHP echo $movie["plot"]; ?>
</p>  
<?PHP
    echo '<img src="img/posters/' .$movie["imdbId"].'.jpg" class="img-poster">';
?>
    </main>
    <footer></footer>
</body>
