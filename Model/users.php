<?php   
function getAll(PDO $pdo)
{
    try{
        $res = $pdo->prepare('SELECT * FROM `users`');
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
    }
}




?>