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

function getReservationsByUser(PDO $pdo, int $userId)
{
    try {
        $res = $pdo->prepare('SELECT * FROM `reservations` WHERE `user_id` = :user_id');
        $res->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}

function getReservationsByParking(PDO $pdo, int $parkingId)
{
    try {
        $res = $pdo->prepare('SELECT * FROM `reservations` WHERE `parking_id` = :parking_id');
        $res->bindValue(':parking_id', $parkingId, PDO::PARAM_INT);
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
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

function getAllReservations(PDO $pdo)
{
    try {
        $res = $pdo->query('SELECT * FROM `reservations`');
        return $res->fetchAll();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}