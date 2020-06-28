<?php
    include 'accessDatabase.php';
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM account WHERE username=:username");// Chú ý phải sử dụng prepare statement để chống mã độc :))
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetchAll(); // Dùng fetchAll() để trả về mảng toàn bộ dữ liệu hoặc fetch() để lấy từng hàng        
        if (count($result)>0) {
            $returnMess = "Tên đăng nhập '".$username."' đã được sử dụng, hãy sử dụng tên khác";
        }
        else {
            $stmt = $conn->prepare("INSERT INTO account (username, password, name, phone_number, email, address, kind_account)
            VALUES (:username, :password, :name, :phoneNumber, :email, :address, 1)");// Chú ý phải sử dụng prepare statement để chống mã độc :))
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->execute();
            $returnMess = "Đăng ký thành công";
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>