<?php   
function getAll(PDO $pdo, ?string $search = null, ?string $sortby = null)
{
    try{
        $query = 'SELECT * FROM `logs`';
        if ($search !== null) {
            $query .= ' WHERE id LIKE :search OR user_id LIKE :search OR action LIKE :search OR created_at LIKE :search OR action_details LIKE :search OR client_ip LIKE :search OR user_agent LIKE :search';
        }
        if($sortby !== null) {
            $query .= " ORDER BY $sortby";
        }
        
        $res = $pdo->prepare($query);

        if ($search !== null) {
            $res->bindValue(':search', "%$search%");
        }

        if ($sortby !== null) {
            $res->bindValue(':sortby', "%$sortby%");
        }
        $res->execute();
        return $res->fetchAll();
    } catch (Exception $e) {
        $errors[] = "get all logs issue";
    }
}

function countLogs(PDO $pdo, ?string $search = null, int $perPage = 10, int $page = 1): array
{

    if($page !== 1) {
        $currentId = $page * $perPage - $perPage;
    }

    $query = "SELECT COUNT(*) AS logsCount FROM `logs`";
    $query2 = "SELECT * FROM `logs`";



    if ($search !== null) {
        $searchString = ' WHERE id LIKE :search OR user_id LIKE :search OR action LIKE :search OR created_at LIKE :search OR action_details LIKE :search OR client_ip LIKE :search OR user_agent LIKE :search';
        $query .= $searchString;
        $query2 .= $searchString;
    }

    $query .= " LIMIT :perPage";
    $query2 .= " LIMIT :perPage";


    if($page !== 1) {
        $query2 .= " OFFSET :idstart";
    }

    try {
        $res = $pdo->prepare($query);
        $res2 = $pdo->prepare($query2);

        if($page !== 1) {
            $res2->bindValue(':idstart', $currentId, PDO::PARAM_INT);
        }

        if ($search !== null) {
            $res->bindValue(':search', "%$search%");
            $res2->bindValue(':search', "%$search%");
        }

        $res->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $res2->bindValue(':perPage', $perPage, PDO::PARAM_INT);

        $res->execute();
        $res2->execute();
        $logCount = $res->fetch(PDO::FETCH_ASSOC)['logsCount'];
        $logs = $res2->fetchAll(PDO::FETCH_ASSOC);
        return [
            'logCount' => $logCount,
            'logs' => $logs
        ];
    } catch (Exception $e) {
        error_log("Error in countLogs: " . $e->getMessage());
        return [
            'logsCount' => 0,
            'logs' => []
        ];
    }
}

?>