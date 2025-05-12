<?php   
function getAll(PDO $pdo)
{
    try{
        $res = $pdo->prepare('SELECT * FROM `logs`');
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        $errors[] = "get all logs issue";
    }
}




?>