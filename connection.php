<?php
try {
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=mmbase','root','');

} catch (PDOException $ex) {
    echo 'Erreur : ' .$ex;
    die();
}

?>