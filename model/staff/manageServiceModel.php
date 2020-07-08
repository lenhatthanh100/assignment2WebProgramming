<?php
    include '../../model/accessDatabase.php';     
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Hiển thị danh sách bài viết
        if ($kindAction == 1) {
            $stmt = $conn->prepare("SELECT * FROM account, product WHERE id = id_creater ORDER BY id_product DESC");// Chú ý phải sử dụng prepare statement để chống mã độc :))          
            $stmt->execute();
            $result = $stmt->fetchAll(); // Dùng fetchAll() để trả về mảng toàn bộ dữ liệu hoặc fetch() để lấy từng hàng        
            $resultJson = json_encode($result); // Convert kết quả sang dạng json
        }
        // Tạo bài viết mới
        else if ($kindAction == 3) {
            $stmt = $conn->prepare("INSERT INTO product (id_creater, link_image, brand_product, name_product, short_content, long_content, time_create)
            VALUES (:idCreater, :linkImage, :brandProduct, :nameProduct, :shortContent, :longContent, :timeCreate)");// Chú ý phải sử dụng prepare statement để chống mã độc :))          
            $stmt->bindParam(':idCreater', $idCreater);
            $stmt->bindParam(':linkImage', $linkImage);
            $stmt->bindParam(':brandProduct', $brandProduct);
            $stmt->bindParam(':nameProduct', $nameProduct);
            $stmt->bindParam(':shortContent', $shortContent);
            $stmt->bindParam(':longContent', $longContent);
            $stmt->bindParam(':timeCreate', $timeCreate);
            $stmt->execute();
        }
        // Xóa bài viết   
        else {
            $stmt = $conn->prepare("DELETE FROM product WHERE id_product = :idProduct");// Chú ý phải sử dụng prepare statement để chống mã độc :))          
            $stmt->bindParam(':idProduct', $idProduct);
            $stmt->execute();            
        }        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>