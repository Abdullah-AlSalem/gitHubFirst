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

    if(isset($_POST['name']) && isset($_POST['salary'])){

        $name = $_POST['name'];
        $salary = $_POST['salary'];

        $sql = "INSERT INTO mariadb_table1 (name, salary) VALUES (:name, :salary);";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':salary', $salary);
        $stmt->execute();

        echo json_encode(['success' => true]);    
        
        
    }

?>