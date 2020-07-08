<?php
    include '../model/accessDatabase.php';
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Trường hợp thay đổi thông tin cá nhân
        if ($kindAction == 3) {
            $stmt = $conn->prepare("UPDATE account
            SET name = :name, phone_number= :phoneNumber, email = :email, address = :address
            WHERE id = :id;");// Chú ý phải sử dụng prepare statement để chống mã độc :))
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            // Lấy dữ liệu user về để cập nhật cookie
            $stmt = $conn->prepare("SELECT * FROM account WHERE id= :id");// Chú ý phải sử dụng prepare statement để chống mã độc :))
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(); // Dùng fetchAll() để trả về mảng toàn bộ dữ liệu hoặc fetch() để lấy từng hàng        
            $resultJson = json_encode($result); // Convert kết quả sang dạng json
        }
        // Trường hợp thay đổi mật khẩu
        else {
            $stmt = $conn->prepare("UPDATE account
            SET password = :newPassword
            WHERE id = :id;");// Chú ý phải sử dụng prepare statement để chống mã độc :))
            $stmt->bindParam(':newPassword', $newPassword);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>