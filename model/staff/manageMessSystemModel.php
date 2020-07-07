<?php
    include '../../model/accessDatabase.php';
    $dateNow = (new \DateTime("now", new DateTimeZone('ASIA/Ho_Chi_Minh')))->format('H:i:s, d/m/Y');     
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Tạo bài viết mới
        $stmt = $conn->prepare("INSERT INTO message_system (id_creater, link_image, title, content, time_create)
        VALUES (:idCreater, :linkImage, :title, :longContent, :timeCreate)");// Chú ý phải sử dụng prepare statement để chống mã độc :))          
        $stmt->bindParam(':idCreater', $idCreater);
        $stmt->bindParam(':linkImage', $linkImage);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':longContent', $longContent);
        $stmt->bindParam(':timeCreate', $dateNow);
        $stmt->execute();    
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>