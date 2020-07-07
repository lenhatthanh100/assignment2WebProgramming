<?php
    include '../../model/accessDatabase.php';     
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Hiển thị danh sách sản phẩm
        if ($kindAction == 1) {
            $stmt = $conn->prepare("SELECT * FROM product ORDER BY id_product DESC;");// Chú ý phải sử dụng prepare statement để chống mã độc :))          
            $stmt->execute();
            $result = $stmt->fetchAll(); // Dùng fetchAll() để trả về mảng toàn bộ dữ liệu hoặc fetch() để lấy từng hàng        
            $resultJson = json_encode($result); // Convert kết quả sang dạng json
        }
        // Hiển thị chi tiết sản phẩm
        else {
            $stmt = $conn->prepare("SELECT * FROM product WHERE id_product=:idProduct;");// Chú ý phải sử dụng prepare statement để chống mã độc :))          
            $stmt->bindParam(':idProduct', $idProduct);
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