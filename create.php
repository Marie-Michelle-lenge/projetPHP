<?php
session_start();

require_once('Database/connection.php');
if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['stock'])){
    $name = strip_tags($_POST['name']);
    $price = strip_tags($_POST['price']);
    $stock = strip_tags($_POST['stock']);

    $sql = 'INSERT INTO mmtable( name,price,stock) VALUE (:name, :price, :stock)';

    $mmtable = $db->prepare($sql);

    $mmtable->bindValue('name',$name,PDO::PARAM_STR);
    $mmtable->bindValue('price',$price,PDO::PARAM_STR);
    $mmtable->bindValue('stock',$stock,PDO::PARAM_STR);

    $mmtable->execute();
    $_SESSION['message']= "votre article a été sauvegardé dans la base de donné";
    header('Location: index.php');
}else{
    $_SESSION['message']="remplissez tous les champs svp!!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>create</title>
</head>
<body>
    <main class="contenaire mt-5 ">
        <div class="col-md-12">
            <h1>Creation d'un article</h1>
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Price</label>
                        <input type="text" id="price" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Stock</label>
                        <input type="text" id="stock" name="stock" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="index.php" class="btn btn-danger">Back</a>
                    </div>
                    

                </form>
            </div>
        </div>
    </main>
</body>
</html>