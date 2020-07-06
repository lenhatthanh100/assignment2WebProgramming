<?php
    $content = $_POST['content'];
    if(strlen($content) < 1){
        // echo "!!!!!!!!!";
        echo "</br>";
        echo "<p style='color:red'>Không được bỏ trống phần trả lời !!!</p>";
    }
    else if(strlen($content) >2000){
        echo "</br>";
        echo "<p style='color:red'>Phần trả lời không được quá 2000 kí tự !!!</p>";
    }
    else{
        include '../../model/staff/replyQuestionModel.php';
    }  
?>