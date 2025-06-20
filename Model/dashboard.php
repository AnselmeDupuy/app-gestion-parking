<?php

function getReservationsByUserWaiting(PDO $pdo, int $userId)
{
    try {
        $res = $pdo->prepare(
            '                   SELECT reservations.*, cars.car_name, cars.license_plate, parkings.type
                                FROM `reservations`
                                JOIN `cars` ON reservations.car_id  = cars.id  
                                JOIN `parkings` ON reservations.parking_id = parkings.id
                                WHERE reservations.user_id = :user_id AND reservations.status ="waiting"
                                ORDER BY `start_time` ASC');
        
        $res->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log( 'Error: ' . $e->getMessage());
        return false;
    }
}

function getReservationsByUserConfirmed(PDO $pdo, int $userId)
{
    try {
        $res = $pdo->prepare(
            '                   SELECT reservations.*, cars.car_name, cars.license_plate
                                FROM `reservations`
                                JOIN `cars` ON reservations.car_id  = cars.id  
                                WHERE reservations.user_id = :user_id AND reservations.status ="confirmed"
                                AND reservations.end_time >= NOW()
                                ORDER BY `start_time` ASC');
        
        $res->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log( 'Error: ' . $e->getMessage());
        return false;
    }
}

function getParkingSpotAvailable(PDO $pdo, string $startTime, string $endTime, ?string $type = null, ?string $status = 'free')
{
    try {
        $query = 'SELECT count(*) AS count FROM `parkings` 
                    WHERE parkings.status = :status 
                    AND parkings.id NOT IN (
                    SELECT `parking_id` FROM `reservations` 
                    WHERE reservations.status = "waiting"
                    AND NOT (
                        reservations.end_time <= :start_time
                        OR reservations.start_time >= :end_time
                    )
                )';

        $query2 = 'SELECT * FROM `parkings` 
                    WHERE parkings.status = :status 
                    AND parkings.id NOT IN (
                    SELECT `parking_id` FROM `reservations` 
                    WHERE reservations.status = "waiting"
                    AND NOT (
                        reservations.end_time <= :start_time
                        OR reservations.start_time >= :end_time
                    )
                )';
        
        if ($type !== null) {
            $query .= ' AND parkings.type = :place_type';
            $query2 .= ' AND parkings.type = :place_type';
        }

        $res = $pdo->prepare($query);
        $res2 = $pdo->prepare($query2);

        $res->bindValue(':start_time', $startTime, PDO::PARAM_STR);
        $res2->bindValue(':start_time', $startTime, PDO::PARAM_STR);

        $res->bindValue(':end_time', $endTime, PDO::PARAM_STR);
        $res2->bindValue(':end_time', $endTime, PDO::PARAM_STR);

        $res->bindValue(':status', $status, PDO::PARAM_STR);
        $res2->bindValue(':status', $status, PDO::PARAM_STR);
        
        if ($type !== null) {
            $res->bindValue(':place_type', $type, PDO::PARAM_STR);
            $res2->bindValue(':place_type', $type, PDO::PARAM_STR);
        }

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

