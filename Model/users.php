<?php   

function countUsers(PDO $pdo, ?string $search = null, int $perPage = 10, int $page = 1): array
{
    $offset = ($page - 1) * $perPage;

    $query = "SELECT COUNT(*) AS usersCount FROM `users`";
    $query2 = "SELECT * FROM `users`";

    if ($search !== null) {
        $searchString = ' WHERE id LIKE :search OR firstName LIKE :search OR surName LIKE :search OR email LIKE :search OR phone LIKE :search OR group_id LIKE :search';
        $query .= $searchString;
        $query2 .= $searchString;
    }

    $query2 .= " LIMIT :perPage OFFSET :offset";

    try {
        $res = $pdo->prepare($query);
        $res2 = $pdo->prepare($query2);

        if ($search !== null) {
            $res->bindValue(':search', "%$search%");
            $res2->bindValue(':search', "%$search%");
        }

        $res2->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $res2->bindValue(':offset', $offset, PDO::PARAM_INT);

        $res->execute();
        $res2->execute();

        $usersCount = $res->fetch(PDO::FETCH_ASSOC)['usersCount'];
        $users = $res2->fetchAll(PDO::FETCH_ASSOC);

        return [
            'usersCount' => $usersCount,
            'users' => $users,
        ];
    } catch (Exception $e) {
        error_log("Error in usersCount: " . $e->getMessage());
        return [
            'usersCount' => 0,
            'users' => [],
        ];
    }
}

function toggle_enabled($pdo, $id)
{
    try {
        $res = $pdo->prepare('UPDATE `users` SET `is_active` = NOT `is_active` WHERE `id` = :id');
        $res->bindValue(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    } catch (Exception $e) {
        $errors[] = "update users is_active issue";
        return false;
    }
}

function deleteUser($pdo, $id)
{
    try {
        $res = $pdo->prepare('DELETE FROM `users` WHERE `id` = :id');
        $res->bindValue(':id', $id, PDO::PARAM_INT);
        $res->execute();
        return $res->rowCount();
    } catch (Exception $e) {
        error_log("error : " . $e->getMessage());
        $errors[] = "delete user issue";
        return false;
    }
}



?>