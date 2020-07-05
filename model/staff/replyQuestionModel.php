<?php
    include '../../model/accessDatabase.php';
    $userObject = unserialize($_COOKIE["user"]);
    $idStaff = $userObject->id;
    $idquestion = $_POST['id'];
    $content = $_POST['content'];
    $dateNow = (new \DateTime())->format('H:i:s, d/m/Y');
    try{     
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serverUsername, $serverPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("UPDATE contact SET answer=:answer, id_answerer=:id_answerer, time_answer=:time_answer WHERE id_question = $idquestion");// Chú ý phải sử dụng prepare statement để chống mã độc :))
        $stmt->bindParam(':answer', $content);
        $stmt->bindParam(':id_answerer', $idStaff);
        $stmt->bindParam(':time_answer', $dateNow);
        
        $stmt->execute();

        //Quay lại trang ManageAccount khi thực hiện xoá xong
        echo '<meta http-equiv="refresh" content="0; url=../view/staff/manageNotificationView.php">';
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>