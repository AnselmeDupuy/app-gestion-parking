<?php

function addReservation(PDO $pdo, int $userId, int $carId, string $startTime, string $endTime, int $parkingId)
{
    try {
        $res = $pdo->prepare('INSERT INTO `reservations` (`user_id`, `car_id`, `start_time`, `end_time`, `status`, `parking_id`) 
        VALUES (:user_id, :car_id, :start_time, :end_time, \'waiting\', :parking_id)');
        
        $res->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $res->bindValue(':car_id', $carId, PDO::PARAM_INT);
        $res->bindValue(':start_time', $startTime, PDO::PARAM_STR);
        $res->bindValue(':end_time', $endTime, PDO::PARAM_STR);
        $res->bindValue(':parking_id', $parkingId, PDO::PARAM_INT);
        return $res->execute();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}


