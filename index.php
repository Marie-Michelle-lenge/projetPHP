<?php 
    session_start();
    require_once('Database/connection.php'); 
    $sql = 'SELECT * FROM mmtable';
    $data = $db->prepare($sql);
    $data->execute();
    $mmtables = $data->fetchAll(PDO::FETCH_ASSOC);
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>

</head>
<body>
    <div class="contenaire">
       <div class="row">
        <section class="col-md mt-5">
             <?php 
                if($_SESSION['message']){
             ?>
            <div class="alert">
                <p class="alert alert-danger"> 
                    <?php 
                    echo$_SESSION['message'];
                    $_SESSION['message'] = "";
                     ?>
                </p>
            </div>
            <?php 
                 }
            
            ?>



            <h1>listes des articles</h1>
            <a href="create.php" class="btn btn-primary">ajouter un article </a>
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                
                </thead>
                <tbody>
                    <?php foreach($mmtables as $mmtable) { ?>
                    <tr>
                         <td> <?= $mmtable['id'] ?></td>
                         <td> <?= $mmtable['name'] ?></td>
                         <td> <?= $mmtable['price'] ?></td>
                         <td> <?= $mmtable['stock'] ?></td>
                         <td>
                            <a href="show.php?id=<?= $mmtable['id'] ?>" class="text-blue ">Voir</a>
                            <a href="edit.php?id=<?= $mmtable['id'] ?>" class="text-success">Edit</a>
                            <a href="delete.php?id=<?= $mmtable['id'] ?>" class="text-danger">Delete</a>
                         </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
       </div>
    </div>
</body>
</html>