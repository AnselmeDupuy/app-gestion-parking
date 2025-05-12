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
?>