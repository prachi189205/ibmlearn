<?php
// Establish database connection first
$hostname = 'localhost';
$user_name = 'root';
$user_password = 'power2ranger5';
$db_name = 'course_db';
$port = 3308;

// Use PDO for database connection instead of mysqli
try {
    $conn = new PDO("mysql:host=$hostname;dbname=$db_name;port=$port", $user_name, $user_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function unique_id() {
    $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $rand = array();
    $length = strlen($str) - 1;
    for ($i = 0; $i < 20; $i++) {
        $n = mt_rand(0, $length);
        $rand[] = $str[$n];
    }
    return implode($rand);
}