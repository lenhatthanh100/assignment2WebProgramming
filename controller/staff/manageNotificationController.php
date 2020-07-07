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
        else if($_GET['kindNotification'] == 'addNewMessage'){
            $kindNotification = 6;
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
        else if ($kindNotification == 2) {
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
            $resultJson = null;
            include '../../model/staff/showMessSysModel.php';    
            $messObjectArr = json_decode($resultJson);
            $stt = 1;
            echo "<p class='text-success'>Số tin nhắn hiện tại: ",count($messObjectArr),"</p>";
            echo
            "<table class='table table-hover'>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID tin nhắn</th>
                        <th>Tiêu đề</th>
                        <th>Người tạo</th>
                        <th>Thời gian</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>";
            foreach ($messObjectArr as $mess) {
                echo 
                    "<tr>
                        <td>",$stt,"</td>
                        <td>",$mess->id_message_system,"</td>
                        <td>",$mess->title,"</td>  
                        <td>",$mess->name,"</td>                      
                        <td>",$mess->time_create,"</td>
                        <td><a href='detailMessSysView.php?id=$mess->id_message_system' class='btn btn-primary btn-sm'>Xem chi tiết</a></td> 
                    </tr>";
                $stt++;
            }
            echo 
                 "</tbody>
            </table>";
        }
        elseif($kindNotification == 5){
            echo '
            <div class="container">
                <h2><span class="badge badge-success mb-3">Tạo tin nhắn hệ thống mới</span></h2>
                <form class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label class="control-label font-weight-bold" for="titleForm">Tiêu đề bài viết</label>
                        <div class="ml-3">
                            <input type="text" class="form-control" name="titleForm" id="titleForm" placeholder="Nhập tiêu đề bài viết">
                        </div>			    
                    </div>
                    <div class="form-group">
                        <label class="control-label font-weight-bold" for="linkImageForm">Link hình ảnh minh họa</label>
                        <div class="ml-3">
                            <input type="text" class="form-control" name="linkImageForm" id="linkImageForm" placeholder="Nhập link hình ảnh minh họa">
                        </div>			    
                    </div>
                    <div class="form-group">
                        <label class="control-label font-weight-bold" for="longContentForm">Nội dung</label>
                        <div class="ml-3">
                            <textarea type="text" class="form-control" rows="10" name="longContentForm" id="longContentForm" placeholder="Nhập nội dung"></textarea>
                        </div>			    
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-success mt-3" value="addNewMessage" onclick="showNotificationList(this.value)">Gửi tin nhắn</button>
                    </div>
                </form>
            </div>
            ';
        }
        else if($kindNotification == 6){
            $idCreater = $_GET['idCreater'];    
            $title = $_GET['title'];
            $linkImage = $_GET['linkImage'];
            $longContent = $_GET['longContent'];
            $timeCreate = $_GET['timeCreate'];
            include '../../model/staff/manageMessSystemModel.php';
        }
    }    
    // Trường hợp thêm tin nhắn mới từ hệ thống
    else {
        echo '
        <div class="container">
            <h2><span class="badge badge-success mb-3">Tạo tin nhắn hệ thống mới</span></h2>
            <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <label class="control-label font-weight-bold" for="titleForm">Tiêu đề bài viết</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="titleForm" id="titleForm" placeholder="Nhập tiêu đề bài viết">
                    </div>			    
                </div>
                <div class="form-group">
                    <label class="control-label font-weight-bold" for="linkImageForm">Link hình ảnh minh họa</label>
                    <div class="ml-3">
                        <input type="text" class="form-control" name="linkImageForm" id="linkImageForm" placeholder="Nhập link hình ảnh minh họa">
                    </div>			    
                </div>
                <div class="form-group">
                    <label class="control-label font-weight-bold" for="longContentForm">Nội dung</label>
                    <div class="ml-3">
                        <textarea type="text" class="form-control" rows="10" name="longContentForm" id="longContentForm" placeholder="Nhập nội dung"></textarea>
                    </div>			    
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-success mt-3" value="addNewMessage" onclick="showNotificationList(this.value)">Gửi tin nhắn</button>
                </div>
            </form>
        </div>
        ';
    }
?>