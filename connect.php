<?php

    // Define database connection parameters
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "basic-fit";

    // Connect to the database using PDO
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }