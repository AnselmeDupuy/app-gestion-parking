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



?>