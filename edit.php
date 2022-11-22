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
    if( $mmtable){
        if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['stock'])){
        $name =strip_tags($_POST['name']);
        $price =strip_tags($_POST['price']);
        $stock =strip_tags($_POST['stock']);
       $sql= 'UPDATE mmtable SET name=:name,price=:price,stock=:stock WHERE id=:id';
       $data = $db->prepare($sql);
       $data->bindValue(':id', $id,PDO::PARAM_INT);
       $data->bindValue(':name', $name,PDO::PARAM_STR);
       $data->bindValue(':price', $price,PDO::PARAM_STR);
       $data->bindValue(':stock', $stock,PDO::PARAM_STR);

       $data->execute();

       header('Location: index.php');
       $_SESSION['message'] = "votre article a été modifié";
        }

    }else{
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
    <title>edition </title>
</head>
<body>
    <main class="container">
    <div class="col-md-12">
            <h1>Edition de l'article <?= $mmtable['name'] ?></h1>
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name"  value="<?= $mmtable['name'] ?>"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Price</label>
                        <input type="text" id="price" name="price"  value="<?= $mmtable['price'] ?>"class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Stock</label>
                        <input type="text" id="stock" name="stock" value="<?= $mmtable['stock'] ?>" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="index.php" class="btn btn-danger">Back</a>
                    </div>
                    

                </form>
            </div>
        </div>
    </main>
</body>
</html>