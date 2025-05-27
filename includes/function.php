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
        }
    }


?>