<?php

    function getUserById(PDO $pdo, int $id)
    {
        try{
            $res = $pdo->prepare('SELECT * FROM `users` WHERE `id` = :id');
            $res->bindParam(':id', $id, PDO::PARAM_INT);
            $res->execute();
            return $res->fetch();
        } catch (Exception $e) {
            $errors[] = "get all users issue";
        }
    }

?>