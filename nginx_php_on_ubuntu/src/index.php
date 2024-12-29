<?php
$host = $_ENV["MYSQL_DB_HOST"] ?? "recipe_mysql";
$user = $_ENV["MYSQL_DB_USER"] ?? "recipe";
$pass = $_ENV["MYSQL_DB_PASSWORD"] ?? "password";
$db = $_ENV["MYSQL_DB_DATABASE"] ?? "recipe";

$connection = new mysqli($host, $user, $pass, $db);

if ($connection->connect_error) {
    die("connection failed: {$connection->connect_error}");
}

echo "connect success";

phpinfo();
