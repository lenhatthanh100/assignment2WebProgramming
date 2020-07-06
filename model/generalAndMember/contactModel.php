<?php
    include '../../model/accessDatabase.php';
    $dateNow = (new \DateTime("now", new DateTimeZone('ASIA/Ho_Chi_Minh')))->format('H:i:s, d/m/Y');
    try {     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($question == "") {
            $stmt = $conn->prepare("INSERT INTO contact (id_question, id_questioner, name_questioner, phone_number, email, address, brand, product, title, time_question)
                VALUES (:idQuestion, :idQuestioner, :nameQuestioner, :phoneNumber, :email, :address, :brand, :product, :title, :timeQuestion)");// Chú ý phải sử dụng prepare statement để chống mã độc :)
            $stmt->bindParam(':idQuestion', $idQuestion);
            $stmt->bindParam(':idQuestioner', $idQuestioner);
            $stmt->bindParam(':nameQuestioner', $nameQuestioner);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':brand', $brand);
            $stmt->bindParam(':product', $product);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':timeQuestion', $dateNow);
        }
        else {
            $stmt = $conn->prepare("INSERT INTO contact (id_question, id_questioner, name_questioner, phone_number, email, address, brand, product, title, question, time_question)
                VALUES (:idQuestion, :idQuestioner, :nameQuestioner, :phoneNumber, :email, :address, :brand, :product, :title, :question, :timeQuestion)");// Chú ý phải sử dụng prepare statement để chống mã độc :))
            $stmt->bindParam(':idQuestion', $idQuestion);
            $stmt->bindParam(':idQuestioner', $idQuestioner);
            $stmt->bindParam(':nameQuestioner', $nameQuestioner);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':brand', $brand);
            $stmt->bindParam(':product', $product);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':question', $question);
            $stmt->bindParam(':timeQuestion', $dateNow);
        }        
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>