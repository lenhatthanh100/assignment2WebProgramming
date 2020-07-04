<?php
    include '../../model/accessDatabase.php';
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Viết SQL query tại đây. Chú ý phải sử dụng prepare statement để chống mã độc :)
        // Trường hợp thay đổi thông tin cá nhân
        if ($kindAction == 3) {
            echo '<p>hello</p>';
        }
        // Trường hợp thay đổi mật khẩu
        else {
            echo 'nothing';
        }
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>