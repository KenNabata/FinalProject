<?php 
require_once 'constant/config.php';

if (isset($_POST['update'])) {
    
    $id = $_POST['id'];
    $name = $_POST['items'];
    $opening = $_POST['open'];
    $sin = $_POST['in'];
    $sout = $_POST['out'];
    $stock = $_POST['stock'];
   
    $sql = "UPDATE item SET items = :items, Opening_Stock = :open ,Total_Stock_In = :sin, Total_Stock_out = :sout, Remaining_Stock =  :stock  WHERE id = :id";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':items', $name);
        $stmt->bindParam(':open', $opening);
        $stmt->bindParam(':sin', $sin);
        $stmt->bindParam(':sout', $sout);
        $stmt->bindParam(':stock', $stock);
        $stmt->execute();

        echo "Record updated successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} 

if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $sql = "SELECT * FROM item WHERE id = :id";
    try {
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $id = $row['id'];
            $name = $row['items'];
            $opening = $row['Opening_Stock'];
            $sin = $row['Total_Stock_In'];
            $sout = $row['Total_Stock_out'];
            $stock = $row['Remaining_Stock'];
?>

<h2>User Update Form</h2>
<form action="" method="post">
    <fieldset>
        <legend>Personal information:</legend>
        Items:<br>
        <input type="text" name="items" value="<?php echo $name; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <br>
        Opening_Stock:<br>
        <input type="text" name="open" value="<?php echo $opening; ?>">
        <br><br>
        Total_Stock_In:<br>
        <input type="text" name="in" value="<?php echo $sin; ?>">
        <br><br>
        Total_Stock_out:<br>
        <input type="text" name="out" value="<?php echo $sout; ?>">
        <br><br>
        Remaining_Stock:<br>
        <input type="text" name="stock" value="<?php echo $stock; ?>">
        <br><br>
       
        <input type="submit" value="Update" name="update">
    </fieldset>
</form>
<?php
        } else { 
            header('Location: view.php');
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>
