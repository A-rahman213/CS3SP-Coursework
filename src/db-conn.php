<?php
// db-conn.php - Used to connect to the database
$DB_HOST = getenv('DB_NAME') ?: 'db';
$DB_NAME = 'appdb';
$DB_USER = getenv('DB_USER');
$DB_PASS = getenv('DB_PASSWORD');
$DB_CHARSET = 'utf8mb4';

$dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=$DB_CHARSET";

try {
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch(PDOException $e){
    print "Failed to connect: " . $e->getMessage();
}