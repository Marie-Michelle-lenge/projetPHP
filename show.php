<?php 
session_start();
require_once('Database/connection.php');
if($_GET['id'] && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = 'SELECT * FROM mmtable WHERE id= :id';
    $data = $db->prepare($sql);
    $data->bindValue(':id', $id,PDO::PARAM_INT);
    $data->execute();
    $mmtable = $data->fetch();
    if(!$mmtable){
        header('Location: index.php');
        $_SESSION['message'] = "L'article est non trouvé";
    }
}else{
    header('Location(: index.php');
    $_SESSION['message'] = "Desolé! vous n'avez pas droit d'y acceder";

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Article <?= $article['name'] ?></title>
</head>
<body>
    <main class="container">
        <div class="col-mt-12 mt-5">
            <h1> Article n° <?=$mmtable['id'] ?><?=$mmtable['name'] ?></h1>
            <p>Name : <?= $mmtable['name']?> </p>
            <p>Price : <?= $mmtable['price']?> </p>
            <p>Stock : <?= $mmtable['stock']?> </p>
            <a href="index.php" class = "btn btn-danger"> Back</a>
        </div>
    </main>
</body>
</html>