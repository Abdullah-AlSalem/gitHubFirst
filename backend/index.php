
    <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "88888888";
        $database = "mariadb_database";
        $port = 3308;

        try {
            $conn = new PDO("mysql:host=$servername;port=$port;dbname=$database", $username, $password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch(PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                // This is an AJAX request, return JSON response
                http_response_code(500); // Internal Server Error
                echo json_encode(['error' => 'Database connection error: ' . $e->getMessage()]);
                exit();
            } else {
                // This is not an AJAX request, output HTML
                echo "<br />\n<b>Warning</b>:  Database connection error in <b>C:\\xampp\\htdocs\\MyWebsite\\backend\\index.php</b>:<br />\n";
                echo $e->getMessage();
                // Output other HTML as needed...
            }
        }
?>

        
