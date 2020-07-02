<?php
    include '../../model/accessDatabase.php';
    $a = $_POST['id'];
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM account WHERE id=:id");
        $stmt->bindParam(':id', $a);

        // use exec() because no results are returned
        $stmt->execute();
        echo "Record deleted successfully";
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>