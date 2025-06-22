<?php

function getAllReservations(PDO $pdo, string $status = "waiting", ?string $search = null, int $perPage = 10, int $page = 1): array
{
    $offset = ($page - 1) * $perPage;

    $query = 'SELECT count(*) AS reservationCount 
    FROM reservations 
    JOIN `users` ON reservations.user_id = users.id 
    JOIN `parkings` ON reservations.parking_id = parkings.id 
    WHERE reservations.status = :status';

    $query2 = 'SELECT reservations.*, users.firstName, users.surName, parkings.status AS parking_status 
            FROM `reservations` 
            JOIN `users` ON reservations.user_id = users.id 
            JOIN `parkings` ON reservations.parking_id = parkings.id
            WHERE reservations.status = :status';

    if ($search !== null) {
        $searchString = ' AND (
        reservations.id LIKE :search 
        OR reservations.user_id LIKE :search 
        OR reservations.car_id LIKE :search
        OR reservations.parking_id LIKE :search 
        OR reservations.created_at LIKE :search 
        OR reservations.start_time LIKE :search 
        OR reservations.end_time LIKE :search
        OR users.firstName LIKE :search
        OR parkings.status LIKE :search)';
    $query .= $searchString;
    $query2 .= $searchString;
}

        $query2 .= " ORDER BY reservations.start_time ASC LIMIT :perPage OFFSET :offset";

    try {

        $res = $pdo->prepare($query);
        $res2 = $pdo->prepare($query2);

        
        if ($search !== null) {
            $res->bindValue(':search', "%$search%");
            $res2->bindValue(':search', "%$search%");
        }

        $res->bindValue(':status', $status, PDO::PARAM_STR);

        $res2->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $res2->bindValue(':offset', $offset, PDO::PARAM_INT);
        $res2->bindValue(':status', $status, PDO::PARAM_STR);

        $res->execute();
        $res2->execute();

        $reservationCount = $res->fetch(PDO::FETCH_ASSOC)['reservationCount'];
        $reservations = $res2->fetchAll(PDO::FETCH_ASSOC);

        return [
            'reservationCount' => $reservationCount,
            'reservations' => $reservations,
        ];
    } catch (Exception $e) {
        error_log("Error in Reservations: " . $e->getMessage());
        return [
            'reservationCount' => 0,
            'reservations' => [],
        ];
    }
}

function cancelReservation(PDO $pdo, int $reservationId)
{
    try {
        $query = 'UPDATE reservations SET status = "canceled" WHERE id = :reservationId';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':reservationId', $reservationId, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (Exception $e) {
        error_log("Error cancelling reservation: " . $e->getMessage());
        return false;
    }
}