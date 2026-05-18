<?php

session_start();

$username = $_SESSION['username'] ?? null;

if (!$username) {
    echo "not logged in";
    exit;
}

echo "welcome {$username}";