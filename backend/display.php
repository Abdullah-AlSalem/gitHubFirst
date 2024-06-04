<?php
require("index.php");

if(isset($_POST["submit"])){
    $name = $_POST['name'];
    $salary = $_POST['salary'];

    // Prepare and execute INSERT query
    $sql = "INSERT INTO mariadb_table1 (name, salary) VALUES (:name, :salary)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':salary', $salary);

    // Insert data into database
    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
    }
}

?>

<table>
    <thead>
        <tr>
            <th>Id:</th>
            <th>Name:</th>
            <th>Salary:</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM mariadb_table1";

            $res = $conn->query($sql);

            if($res->rowCount()>0){
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    echo "
                        <tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['salary'] . "</td>
                        </tr>
                    ";
                }
            } else {
                echo "No records found";
            }
        ?>
    </tbody>
</table>
<br>
<br>
<form method="post">
    <label>Name:</label>
    <input type="text" id="name" name="name">
    <label>Salary:</label>
    <input type="number" id="salary" name="salary">
    <br>
    <button type="submit" name="submit">Submit</button>
</form>