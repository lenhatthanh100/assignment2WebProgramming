<?php	
	$resultJson = null;
    $userObjectArr = null;
    $kindNotification = 1; //1->notAnsweredOfMember, 2->answeredOfMember, 3->notAnsweredOfGeneral, 4->messageFromSystem, 5->newMessageFromSystem
    
    
    if ($_GET['kindNotification'] != 'newMessageFromSystem') {        
        // Trường hợp câu của khách hàng đã được trả lời
        if ($_GET['kindNotification'] == 'answeredOfMember') {
            $kindNotification = 2;
        }
        // Trường hợp câu hỏi của khách lạ
        else if ($_GET['kindNotification'] == 'notAnsweredOfGeneral') {
            $kindNotification = 3;
        }
        // Trường hợp tin nhắn từ hệ thống
        else if ($_GET['kindNotification'] == 'messageFromSystem') {
            $kindNotification = 4;
        }
        // Import model để xử lý
        include '../../model/staff/manageNotificationModel.php';
        // Convert kết quả từ Json về PHP Object để dễ xử lý
        $questionObjectArr = json_decode($resultJson);

        // Phân loại việc trả kết quả về cho View
        if ($kindNotification == 1) {
            $stt = 1;
            echo "<p class='text-success'>Số tin nhắn của thành viên đang chờ trả lời: ",count($questionObjectArr),"</p>";
            echo
            "<table class='table table-hover'>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID Câu hỏi</th>
                        <th>Tiêu đề câu hỏi</th>
                        <th>Hỏi bởi</th>
                        <th>Thời gian hỏi</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>";
            foreach ($questionObjectArr as $question) {
                echo 
                    "<tr>
                        <td>",$stt,"</td>
                        <td>",$question->id_question,"</td>
                        <td>",$question->title,"</td>
                        <td>",$question->name_questioner,"</td>                        
                        <td>",$question->time_question,"</td>
                        <td><a href='../../view/detailsContact.php?id=$question->id_question&kind=$kindNotification' class='btn btn-primary btn-sm'>Xem chi tiết</a></td> 
                    </tr>";
                $stt++;
            }
            echo 
                "</tbody>
            </table>";
        }
        elseif ($kindNotification == 2) {
            $stt = 1;
            echo "<p class='text-success'>Số tin nhắn của thành viên đã được trả lời: ",count($questionObjectArr),"</p>";
            echo
            "<table class='table table-hover'>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID Câu hỏi</th>
                        <th>Tiêu đề câu hỏi</th>
                        <th>Hỏi bởi</th>
                        <th>Thời gian hỏi</th>
                        <th>Trả lời bởi</th>
                        <th>Thời gian trả lời</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>";
            foreach ($questionObjectArr as $question) {
                echo 
                    "<tr>
                        <td>",$stt,"</td>
                        <td>",$question->id_question,"</td>
                        <td>",$question->title,"</td>
                        <td>",$question->name_questioner,"</td>
                        <td>",$question->time_question,"</td>
                        <td>",$question->name,"</td>
                        <td>",$question->time_answer,"</td>
                        <td><a href='../../view/detailsContact.php?id=$question->id_question&kind=$kindNotification' class='btn btn-primary btn-sm'>Xem chi tiết</a></td> 
                    </tr>";
                $stt++;
            }
            echo 
                "</tbody>
            </table>";
        }
        elseif ($kindNotification == 3) {
            $stt = 1;
            echo "<p class='text-success'>Số tin nhắn của khách lạ: ",count($questionObjectArr),"</p>";
            echo
            "<table class='table table-hover'>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID Câu hỏi</th>
                        <th>Tiêu đề câu hỏi</th>
                        <th>Thời gian hỏi</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>";
            foreach ($questionObjectArr as $question) {
                echo 
                    "<tr>
                        <td>",$stt,"</td>
                        <td>",$question->id_question,"</td>
                        <td>",$question->title,"</td>
                        <td>",$question->time_question,"</td>
                        <td><a href='../../view/detailsContact.php?id=$question->id_question&kind=$kindNotification' class='btn btn-primary btn-sm'>Xem chi tiết</a></td> 
                    </tr>";
                $stt++;
            }
            echo 
                "</tbody>
            </table>";
        }
        elseif ($kindNotification == 4) {
            echo 'Sẽ xử lý sau, cái này có database khác, dự là có hình ảnh các thứ, nói chung là xịn xò :))';
        }
    }    
    // Trường hợp thêm tin nhắn mới từ hệ thống
    else {
        $kindNotification = 5;
        echo 'Sẽ xử lý sau, cái này có database khác, dự là có hình ảnh các thứ, nói chung là xịn xò :))';
    }
?>