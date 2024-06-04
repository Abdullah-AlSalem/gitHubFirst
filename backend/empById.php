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
 
 
    $data = json_decode(file_get_contents("php://input"));

    if (isset($data->id)) {
        $id = $data->id;

        $query = "SELECT * FROM mariadb_table1 WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($results);
    } else {
        // echo json_encode(array('message' => 'ID not provided'));
        $query = "SELECT * FROM mariadb_table1;";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($results);
    }

?>