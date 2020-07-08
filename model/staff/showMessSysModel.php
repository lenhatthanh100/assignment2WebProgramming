<?php
    include '../../model/accessDatabase.php';     
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Hiển hị danh sách Tin nhắn hệ thống
        $stmt = $conn->prepare("SELECT * FROM account, message_system WHERE id = id_creater ORDER BY id_message_system DESC");// Chú ý phải sử dụng prepare statement để chống mã độc :))          
        $stmt->execute();
        $result = $stmt->fetchAll(); // Dùng fetchAll() để trả về mảng toàn bộ dữ liệu hoặc fetch() để lấy từng hàng        
        $resultJson = json_encode($result); // Convert kết quả sang dạng json     
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>