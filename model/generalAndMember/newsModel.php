<?php
    include '../../model/accessDatabase.php';     
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Hiển thị danh sách bài viết
        if ($kindAction == 1) {
            $stmt = $conn->prepare("SELECT * FROM news ORDER BY id_news DESC;");// Chú ý phải sử dụng prepare statement để chống mã độc :))          
            $stmt->execute();
            $result = $stmt->fetchAll(); // Dùng fetchAll() để trả về mảng toàn bộ dữ liệu hoặc fetch() để lấy từng hàng        
            $resultJson = json_encode($result); // Convert kết quả sang dạng json
        }
        // Hiển thị chi tiết bài viết
        else {
            $stmt = $conn->prepare("SELECT * FROM news WHERE id_news=:idNews;");// Chú ý phải sử dụng prepare statement để chống mã độc :))          
            $stmt->bindParam(':idNews', $idNews);
            $stmt->execute();
            $result = $stmt->fetch(); // Dùng fetchAll() để trả về mảng toàn bộ dữ liệu hoặc fetch() để lấy từng hàng        
            $resultJson = json_encode($result); // Convert kết quả sang dạng json
        }      
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>