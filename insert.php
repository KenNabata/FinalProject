<?php

require_once 'constant/config.php';
try {
    $name = $_POST['item'];
    $opening = $_POST['open'];
    $sin = $_POST['in'];
    $sout = $_POST['out'];
    $stock = $_POST['stock'];
    

    $select_query = "SELECT * FROM item WHERE Opening_Stock = :open";
    $stmt1 = $conn->prepare($select_query);
    $stmt1->bindParam(':open', $opening);
    $stmt1->execute();

    if($stmt1->rowCount() > 0) {
        echo "User already exist!";
    }else {
        $sql = "INSERT INTO item(items, Opening_Stock ,Total_Stock_In, Total_Stock_out , Remaining_Stock) VALUES(:item, :open, :sin,:sout, :stock)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':item', $name);
        $stmt->bindParam(':open', $opening);
        $stmt->bindParam(':sin', $sin);
        $stmt->bindParam(':sout', $sout);
        $stmt->bindParam(':stock', $stock);
        $stmt->execute();
    
        echo "Data inserted";
    }

}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>