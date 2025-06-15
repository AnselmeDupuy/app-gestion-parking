<?php

function reservationUpdate(PDO $pdo, int $reservationId) {
    try {
        $res = $pdo->prepare('UPDATE `reservations` SET `status` = "confirmed" WHERE `id` = :id');
        $res->bindValue(':id', $reservationId, PDO::PARAM_INT);
        return $res->execute();
    } catch (Exception $e) {
        $errors[] = " update reservations after payment issue";
        return false;
    }
}

function savePayment(PDO $pdo,int $reservationId,float $price, string $status){
        try {
        $res = $pdo->prepare("INSERT INTO `payments` (`reservation_id`, `price`, `status`) VALUES (:reservation_id, :price, :status)");
        $res->bindValue(':reservation_id', $reservationId, PDO::PARAM_INT);
        $res->bindValue(':price', $price, PDO::PARAM_STR);
        $res->bindValue(':status', $status, PDO::PARAM_STR);
        return $res->execute();
    } catch (Exception $e) {
        $errors[] = "add payment issue";
        return false;
    }
}

function cancelReservation(PDO $pdo, int $reservationId)
{
    try {
        $res = $pdo->prepare('UPDATE `reservations` SET `status` = "canceled" WHERE `id` = :id');
        $res->bindValue(':id', $reservationId, PDO::PARAM_INT);
        return $res->execute();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}


?>