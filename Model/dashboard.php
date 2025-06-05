<?php

function addReservation(PDO $pdo, int $userId, int $parkingId, string $startTime, string $endTime)
{
    try {
        $res = $pdo->prepare('INSERT INTO `reservations` (`user_id`, `parking_id`, `start_time`, `end_time`) VALUES (:user_id, :parking_id, :start_time, :end_time)');
        $res->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $res->bindValue(':parking_id', $parkingId, PDO::PARAM_INT);
        $res->bindValue(':start_time', $startTime, PDO::PARAM_STR);
        $res->bindValue(':end_time', $endTime, PDO::PARAM_STR);
        return $res->execute();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

function cancelReservation(PDO $pdo, int $reservationId)
{
    try {
        $res = $pdo->prepare('DELETE FROM `reservations` WHERE `id` = :id');
        $res->bindValue(':id', $reservationId, PDO::PARAM_INT);
        return $res->execute();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

function getReservationsByUser(PDO $pdo, int $userId)
{
    try {
        $res = $pdo->prepare(
            '                   SELECT reservations.*, cars.car_name, cars.license_plate
                                FROM `reservations` 
                                JOIN `cars` ON reservations.car_id  = cars.id  
                                WHERE reservations.user_id = :user_id 
                                ORDER BY `start_time` ASC');
        
        $res->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        error_log( 'Error: ' . $e->getMessage());
        return false;
    }
}

function getParkingSpotAvailable(PDO $pdo, string $startTime)
{
    try {
        $res = $pdo->prepare(
            'SELECT * FROM `parking` 
             WHERE `id` NOT IN (
                 SELECT `parking_id` FROM `reservations` 
                 WHERE `start_time` <= :start_time
             )');
        
        $res->bindValue(':start_time', $startTime, PDO::PARAM_STR);
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        error_log('Error: ' . $e->getMessage());
        return false;
    }
}