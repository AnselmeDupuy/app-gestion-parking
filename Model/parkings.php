<?php 

function getFreeParkings(PDO $pdo)
{
    try{
        $res = $pdo->prepare('SELECT * FROM `parkings` WHERE `status` = :free');
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
    }
}

function countParkings(PDO $pdo)
{
    try {
        $res = $pdo->query('SELECT COUNT(*) FROM `parkings`');
        return $res->fetchAll();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
    }
}

function getAllParkings(PDO $pdo)
{
    try{
        $res = $pdo->prepare('SELECT * FROM `parkings`');
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
    }
}  

function getElectricParkings(PDO $pdo)
{
    try{
        $res = $pdo->prepare('SELECT * FROM `parkings` WHERE `type` = :electric');
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
    }
}

function getHandiParkings(PDO $pdo)
{
    try{
        $res = $pdo->prepare('SELECT * FROM `parkings` WHERE `type` = :handicapped');
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
    }
}




?>