<?php   
function getAll(PDO $pdo, ?string $search = null)
{
    try{
        $query = 'SELECT * FROM `logs`';
        if ($search !== null) {
            $query .= ' WHERE id LIKE :search OR user_id LIKE :search OR action LIKE :search OR created_at LIKE :search OR action_details LIKE :search OR client_ip LIKE :search OR user_agent LIKE :search';
        }
        $res = $pdo->prepare($query);

        if ($search !== null) {
            $res->bindValue(':search', "%$search%");
        }
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        $errors[] = "get all logs issue";
    }
}




?>