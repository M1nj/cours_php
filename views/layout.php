<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?= $title ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href=style.css>
        <link rel="icon" type="image/png" href="favicon.png" />
    </head>
    
    <body>
<?php include'./layout/header.php';
      echo $content;
?>      

    </body>
</html>