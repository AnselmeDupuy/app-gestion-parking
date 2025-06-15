<?php

function getAllReservations(PDO $pdo, string $status = "waiting")
{
    try {
        $res = $pdo->prepare('SELECT reservations.*, users.firstName, users.surName, parkings.status AS parking_status 
        FROM `reservations` 
        JOIN `users` ON reservations.user_id = users.id 
        JOIN `parkings` ON reservations.parking_id = parkings.id
        WHERE reservations.status = :status
        ORDER BY reservations.start_time ASC');

        $res->bindValue(':status', $status, PDO::PARAM_STR);
        $res->execute();
        return $res->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}
