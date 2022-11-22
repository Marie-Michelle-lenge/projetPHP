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
        $id = strip_tags($_GET['id']);
       $sql= 'DELETE FROM mmtable WHERE id=:id';
       $data = $db->prepare($sql);
       $data->bindValue(':id', $id,PDO::PARAM_INT);

       $data->execute();

       header('Location: index.php');
       $_SESSION['message'] = "votre article a été supprimé";

    }else{
        header('Location: index.php');
        $_SESSION['message'] = "L'article est non trouvé";
    }
}else{
    header('Location(: index.php');
    $_SESSION['message'] = "Desolé! vous n'avez pas droit d'y acceder";

}