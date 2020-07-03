<?php
    include '../../model/accessDatabase.php';
    $a = $_POST['id'];
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM account WHERE id=:id");// Chú ý phải sử dụng prepare statement để chống mã độc :))
        $stmt->bindParam(':id', $a);

        // use exec() because no results are returned
        $stmt->execute();

        //Quay lại trang ManageAccount khi thực hiện xoá xong
        echo '<meta http-equiv="refresh" content="0; url=../../view/admin/manageAccountView.php">';
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>