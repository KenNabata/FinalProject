<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <style>
        table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #ddd;
}
    
    </style>
    
</head>
<body>
    <?php

require_once 'constant/config.php';
    try {
        $stmt = $conn->prepare("SELECT id,items, Opening_Stock ,Total_Stock_In, Total_Stock_out , Remaining_Stock FROM item");
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo "<table><tr><th>ID</th><th>items</th><th>Opening_Stock</th><th>Total_Stock_In</th><th>Total_Stock_out</th><th>Remaining_Stock</th><th>Action</th></tr>";
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["items"]."</td>
                        <td>".$row["Opening_Stock"]."</td>
                        <td>".$row["Total_Stock_In"]."</td>
                        <td>".$row["Total_Stock_out"]."</td>
                        <td>".$row["Remaining_Stock"]."</td>
                        
                        <td>
                            <a class='btn btn-info' href='update.php?id=". $row['id'] ."'>Edit</a>&nbsp;
                            <a class='btn btn-danger' href='delete.php?id=". $row['id'] ."'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</body>
</html>
