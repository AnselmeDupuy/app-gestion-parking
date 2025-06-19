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

function getCarsByUser(PDO $pdo, int $id, ?string $search = null, ?string $sortby = null)
{
    try{
        $query = 'SELECT * FROM `cars` WHERE `user_id` = :id';
        if ($search !== null) {
            $query .= ' AND id LIKE :search OR brand LIKE :search OR model LIKE :search OR color LIKE :search OR plate_number LIKE :search';
        }
        if($sortby !== null) {
            $query .= " ORDER BY $sortby";
        }
        $res = $pdo->prepare($query);
        if ($search !== null) {
            $res->bindValue(':search', "%$search%");
        }
        if ($sortby !== null) {
            $res->bindValue(':sortby', "%$sortby%");
        }
        $res->bindValue(':id', $id, PDO::PARAM_INT);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $errors[] = "get all users issue";
    }
}

function addCar(PDO $pdo, int $userId, string $licenPlate, string $carName)
{
    try{
        $res = $pdo->prepare('INSERT INTO `cars` (`user_id`, `license_plate`, `car_name`) VALUES (:user_id, :license_plate, :car_name)');
        $res->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $res->bindValue(':license_plate', $licenPlate, PDO::PARAM_STR);
        $res->bindValue(':car_name', $carName, PDO::PARAM_STR);
        return $res->execute();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
        echo 'Error: ' . $e->getMessage();
    }
}

function removeCar(PDO $pdo, int $carId)
{
    try{
        $res = $pdo->prepare('DELETE FROM `cars` WHERE `id` = :id');
        $res->bindValue(':id', $carId, PDO::PARAM_INT);
        return $res->execute();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
        echo 'Error: ' . $e->getMessage();
    }
}

function updateInfo(PDO $pdo, ?string $firstName, ?string $surName, ?string $email, ?string $phone, int $id) {
    $conditions = [];
    $params = [':id' => $id];

    if ($firstName !== null) {
        $conditions[] = '`first_name` = :first_name';
        
    }

    if ($surName !== null) {
        $conditions[] = '`sur_name` = :sur_name';
        $params[':sur_name'] = $surName;
    }

    if ($email !== null) {
        $conditions[] = '`email` = :email';
        $params[':email'] = $email;
    }

    if ($phone !== null) {
        $conditions[] = '`phone` = :phone';
        $params[':phone'] = $phone;
    }

    if (empty($conditions)) {
        return false;
    }
    
    $query = 'UPDATE `users` SET ' . implode(', ', $conditions) . ' WHERE `id` = :id';
    $stmt = $pdo->prepare($query);
    return $stmt->execute($params);
}

