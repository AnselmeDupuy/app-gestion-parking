<?php

function cleanString(string $value): string
    {
        return trim(htmlspecialchars($value, ENT_QUOTES));
    }

function isAdmin(): bool
    {
        return isset($_SESSION['admin']);
    }
    
function isUser(): bool
    {
        return isset($_SESSION['user']);
    }

function isGuest(): bool
    {
        return !isset($_SESSION['user']) && !isset($_SESSION['admin']);
    }

?>