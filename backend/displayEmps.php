<?php
    // Allow requests from any origin
    header("Access-Control-Allow-Origin: *");
    // Allow requests with credentials (e.g., cookies)
    header("Access-Control-Allow-Credentials: true");
    // Allow requests with the specified methods
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    // Allow requests with the specified headers
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    require("index.php");

    $query = "SELECT * FROM mariadb_table1;";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);  
?>
