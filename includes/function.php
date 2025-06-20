<?php

function cleanString(string $value): string
    {
        return trim(htmlspecialchars($value, ENT_QUOTES));
    }

function isAdmin(): bool 
    {
        return isset($_SESSION['group']) && $_SESSION['group'] === 'admin';
    }
    
function isUser(): bool
    {
        return isset($_SESSION['group']) && $_SESSION['group'] === 'user';
    }
    
function isGuest(): bool
    {
        return !isset($_SESSION['auth']);
    }


function controller(string $componentName, array $array): void 
    {
        if (in_array($componentName, $array)) {
                require "Controller/$componentName.php";
            } else {
            http_response_code(403);
            exit;
        }
    }

function getPrices(PDO $pdo)
{
    try {
        $res = $pdo->query('SELECT * FROM `pricing`');
        return $res->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        error_log('Error: ' . $e->getMessage());
        return false;
    }
}

function calculatePrice(string $startTime, string $endTime, float $pricePerHour): float 
    {
        $start = new DateTime($startTime);
        $end = new DateTime($endTime);
        $duration = $start->diff($end);

        $minutes = ($duration->days * 24 * 60) + ($duration->h * 60) + $duration->i;
        $hours = $minutes / 60;


        return round($hours * $pricePerHour, 2);
    }

function getDuration(string $startTime, string $endTime) : string
    {
        $start = new DateTime($startTime);
        $end = new DateTime($endTime);
        $total = $start->diff($end);

        $duration = $total->h."h";
        if($total->d > 0) {
            $duration = $total->d."day ".$duration;
        }
        if($total->y > 0) {
            $duration = $total->y."year ".$duration;
        }
        if($total->i > 0) {
            $duration .= $total->i;
        }
        
        return $duration;
    }   


?>