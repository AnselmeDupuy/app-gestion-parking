<?php   

function countLogs(PDO $pdo, ?string $search = null, int $perPage = 10, int $page = 1): array
{
    $offset = ($page - 1) * $perPage;

    $query = "SELECT COUNT(*) AS logCount FROM `logs`";
    $query2 = "SELECT * FROM `logs`";

    if ($search !== null) {
        $searchString = ' WHERE id LIKE :search OR user_id LIKE :search OR action LIKE :search OR created_at LIKE :search OR action_details LIKE :search OR client_ip LIKE :search OR user_agent LIKE :search';
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

        $logCount = $res->fetch(PDO::FETCH_ASSOC)['logCount'];
        $logs = $res2->fetchAll(PDO::FETCH_ASSOC);

        return [
            'logCount' => $logCount,
            'logs' => $logs,
        ];
    } catch (Exception $e) {
        error_log("Error in countLogs: " . $e->getMessage());
        return [
            'logCount' => 0,
            'logs' => [],
        ];
    }
}

?>