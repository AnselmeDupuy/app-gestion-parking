<?php

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
            'SELECT count(*) AS count FROM `parkings` 
             WHERE `id` NOT IN (
                 SELECT `parking_id` FROM `reservations` 
                 WHERE `start_time` = :start_time
             )');
        $res2 = $pdo->prepare(
            'SELECT * FROM `parkings` 
             WHERE `id` NOT IN (
                 SELECT `parking_id` FROM `reservations` 
                 WHERE `start_time` = :start_time
             )');

        $res->bindValue(':start_time', $startTime, PDO::PARAM_STR);
        $res2->bindValue(':start_time', $startTime, PDO::PARAM_STR);

        $res->execute();
        $res2->execute();

        $count = $res->fetch(PDO::FETCH_ASSOC)['count'];
        $freeSpots = $res2->fetchAll(PDO::FETCH_ASSOC);
        return [
            'count' => $count,
            'parkings' => $freeSpots
        ];
    } catch (Exception $e) {
        error_log('Error: ' . $e->getMessage());
        return false;
    }
}