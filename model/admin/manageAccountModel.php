<?php
    include '../../model/accessDatabase.php';     
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM account WHERE kind_account=:kindAccount ORDER BY id DESC");// Chú ý phải sử dụng prepare statement để chống mã độc :))
        $stmt->bindParam(':kindAccount', $kindAccount);
        $stmt->execute();
        $result = $stmt->fetchAll(); // Dùng fetchAll() để trả về mảng toàn bộ dữ liệu hoặc fetch() để lấy từng hàng        
        $resultJson = json_encode($result); // Convert kết quả sang dạng json
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>