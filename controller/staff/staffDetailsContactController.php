<script>
		$(document).ready(function(){
			$('#reply').click(function(event){
				event.preventDefault();
				$.ajax({
					url: "../controller/staff/replyQuestionController.php",
					method: "post",
					data: $('form').serialize(),
					dataType: "text",
					success: function( strData ){
					document.getElementById("message").innerHTML = strData;
				}
				})
			})
		})
</script>


<?php	
	$resultJson = null;
    $idquestion = $_GET['id'];
	$kind = $_GET['kind'];
	

	include '../model/staff/staffDetailsContactModel.php';

	//Convert kết quả từ Json về PHP Object để dễ xử lý
	$detailsContact = json_decode($resultJson);
	if($kind == 2){
		echo "<div class='container'>";
		echo "<p><strong>Tiêu đề: </strong>" . $detailsContact[0]->title . "</p>";
		echo "<p><strong>Tên người hỏi: </strong>" . $detailsContact[0]->name_questioner . "</p>";
		echo "<p><strong>SĐT: </strong>" . $detailsContact[0]->phone_number . "</p>";
		echo "<p><strong>Email: </strong>" . $detailsContact[0]->email . "</p>";
		echo "<p><strong>Địa chỉ: </strong>" . $detailsContact[0]->address . "</p>";
		echo "<p><strong>Thương hiệu: </strong>" . $detailsContact[0]->brand . "</p>";
		echo "<p><strong>Loại sản phẩm: </strong>" . $detailsContact[0]->product . "</p>";
		echo "<p><strong>Câu hỏi: </strong>" . $detailsContact[0]->question . "</p>";
		echo "<p><strong>Ngày hỏi: </strong>" . $detailsContact[0]->time_question . "</p>";
		echo "<p><strong>Nhân viên trả lời: </strong>" . $detailsContact[0]->name . "</p>";
		echo "<p><strong>Câu trả lời: </strong>" . $detailsContact[0]->answer . "</p>";
		echo "<p><strong>Thời gian trả lời: </strong>" . $detailsContact[0]->time_answer . "</p>";
		echo "</div>";
	}
	else if($kind == 1){
		echo "<p><strong>Tiêu đề: </strong>" . $detailsContact[0]->title . "</p>";
		echo "<p><strong>Tên người hỏi: </strong>" . $detailsContact[0]->name_questioner . "</p>";
		echo "<p><strong>SĐT: </strong>" . $detailsContact[0]->phone_number . "</p>";
		echo "<p><strong>Email: </strong>" . $detailsContact[0]->email . "</p>";
		echo "<p><strong>Địa chỉ: </strong>" . $detailsContact[0]->address . "</p>";
		echo "<p><strong>Thương hiệu: </strong>" . $detailsContact[0]->brand . "</p>";
		echo "<p><strong>Loại sản phẩm: </strong>" . $detailsContact[0]->product . "</p>";
		echo "<p><strong>Câu hỏi: </strong>" . $detailsContact[0]->question . "</p>";
		echo "<p><strong>Ngày hỏi: </strong>" . $detailsContact[0]->time_question . "</p>";
		//Answer question
		echo "<form method='post' accept-charset='utf-8' id='usrform'>";
		echo "<p><input type='hidden' name='id' placeholder='Id' value=$idquestion></p>";
		echo "<input name='content' class='form-control' type='text' placeholder='Nhập câu trả lời ... '>";
		echo "</br>";
		echo "<input type='submit' id='reply' value='Trả lời'/>";
		echo "<div id='message'></div>";
	}
	else{
		echo "<p><strong>Tiêu đề: </strong>" . $detailsContact[0]->title . "</p>";
		echo "<p><strong>Tên người hỏi: </strong>" . $detailsContact[0]->name_questioner . "</p>";
		echo "<p><strong>SĐT: </strong>" . $detailsContact[0]->phone_number . "</p>";
		echo "<p><strong>Email: </strong>" . $detailsContact[0]->email . "</p>";
		echo "<p><strong>Địa chỉ: </strong>" . $detailsContact[0]->address . "</p>";
		echo "<p><strong>Thương hiệu: </strong>" . $detailsContact[0]->brand . "</p>";
		echo "<p><strong>Loại sản phẩm: </strong>" . $detailsContact[0]->product . "</p>";
		echo "<p><strong>Câu hỏi: </strong>" . $detailsContact[0]->question . "</p>";
		echo "<p><strong>Ngày hỏi: </strong>" . $detailsContact[0]->time_question . "</p>";
	}
	// foreach ($detailsContact as $details) {
	// 	echo $details->title;
	// }
	
?>