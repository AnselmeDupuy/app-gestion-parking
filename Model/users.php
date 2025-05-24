<?php   
function getAll(PDO $pdo, ?string $search = null)
{
    try{
        $query = 'SELECT * FROM `users`';
        if ($search !== null) {
            $query .= ' WHERE id LIKE :search OR email LIKE :search OR firstName LIKE :search OR surName LIKE :search OR phone LIKE :search';
        }
        $res = $pdo->prepare($query);

        if ($search !== null) {
            $res->bindValue(':search', "%$search%");
        }
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
    }
}

function countUsers(PDO $pdo)
{
    try {
        $res = $pdo->query('SELECT COUNT(*) FROM `users`');
        return $res->fetch();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
    }
}

function toggle_enabled($pdo, $id)
{
    try {
        $res = $pdo->prepare('UPDATE `users` SET `is_active` = NOT `is_active` WHERE `id` = :id');
        $res->bindValue(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    } catch (Exception $e) {
        $errors[] = "get all users issue";
        logAction($pdo, 'toggle_enabled', 'Error: ' . $e->getMessage());
    }
}



?>