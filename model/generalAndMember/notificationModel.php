<?php
    include '../../model/accessDatabase.php';     
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($kindNotification == 1) {
            $stmt = $conn->prepare("SELECT * FROM contact WHERE id_questioner=:idQuestioner AND id_answerer=-1 ORDER BY id_question DESC");// Chú ý phải sử dụng prepare statement để chống mã độc :))
            $stmt->bindParam(':idQuestioner', $idQuestioner);
            $stmt->execute();
            $result = $stmt->fetchAll(); // Dùng fetchAll() để trả về mảng toàn bộ dữ liệu hoặc fetch() để lấy từng hàng        
            $resultJson = json_encode($result); // Convert kết quả sang dạng json
        }        
        else if ($kindNotification == 2) {
            $stmt = $conn->prepare("SELECT * FROM account, contact WHERE id_questioner=:idQuestioner AND id_answerer<>-1 AND id_answerer=id ORDER BY id_question DESC");// Chú ý phải sử dụng prepare statement để chống mã độc :))
            $stmt->bindParam(':idQuestioner', $idQuestioner);
            $stmt->execute();
            $result = $stmt->fetchAll(); // Dùng fetchAll() để trả về mảng toàn bộ dữ liệu hoặc fetch() để lấy từng hàng        
            $resultJson = json_encode($result); // Convert kết quả sang dạng json
        }
        else {
            // Sẽ xử lý sau, cái này có database khác, dự là có hình ảnh các thứ, nói chung là xịn xò :))
        }        
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>