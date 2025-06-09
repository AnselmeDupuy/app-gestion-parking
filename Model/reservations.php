<?php

function getAllReservations(PDO $pdo)
{
    try {
        $res = $pdo->query('SELECT reservations.*, users.firstName, users.surName FROM `reservations` JOIN `users` ON reservations.user_id = users.id ORDER BY `start_time` ASC');
        return $res->fetchAll();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}
