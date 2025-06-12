<?php

function getAllReservations(PDO $pdo)
{
    try {
        $res = $pdo->query('SELECT reservations.*, users.firstName, users.surName, parkings.status AS parking_status 
        FROM `reservations` 
        JOIN `users` ON reservations.user_id = users.id 
        JOIN `parkings` ON reservations.parking_id = parkings.id
        ORDER BY `start_time` ASC');
        return $res->fetchAll();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}
