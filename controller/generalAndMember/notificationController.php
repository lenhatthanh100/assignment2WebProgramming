<?php	
	$resultJson = null;
    $userObjectArr = null;
    $userObject = unserialize($_COOKIE["user"]);
    $idQuestioner = $userObject->id;
    $kindNotification = 3; //1->notAnswerd, 2->answerd, 3->messageFromSystem
    
    // Trường hợp câu của khách hàng chưa được trả lời
	if ($_GET['kindNotification'] == 'notAnswered') {
        $kindNotification = 1;
    }
    // Trường hợp câu hỏi của khách hàng
	else if ($_GET['kindNotification'] == 'answered') {
        $kindNotification = 2;
    }

	// Import model để xử lý
	include '../../model/generalAndMember/notificationModel.php';
	// Convert kết quả từ Json về PHP Object để dễ xử lý
	$questionObjectArr = json_decode($resultJson);

    // Phân loại việc trả kết quả về cho View
    if ($kindNotification == 1) {
		$stt = 1;
		echo "<p class='text-success'>Số tin nhắn đang chờ trả lời: ",count($questionObjectArr),"</p>";
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
					<td><button type='button' class='btn btn-primary btn-sm'>Xem chi tiết</button></td> 
				</tr>";
			$stt++;
		}
		echo 
			"</tbody>
		</table>";
	}
    elseif ($kindNotification == 2) {
		$stt = 1;
		echo "<p class='text-success'>Số tin nhắn của đã được trả lời: ",count($questionObjectArr),"</p>";
        echo
		"<table class='table table-hover'>
			<thead>
				<tr>
					<th>STT</th>
					<th>ID Câu hỏi</th>
					<th>Tiêu đề câu hỏi</th>
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
					<td>",$question->time_question,"</td>
					<td>",$question->name,"</td>
					<td>",$question->time_answer,"</td>
					<td><button type='button' class='btn btn-primary btn-sm'>Xem chi tiết</button></td> 
				</tr>";
			$stt++;
		}
		echo 
			"</tbody>
		</table>";
    }
    else {
        echo 'Sẽ xử lý sau, cái này có database khác, dự là có hình ảnh các thứ, nói chung là xịn xò :))';
    }	
?>