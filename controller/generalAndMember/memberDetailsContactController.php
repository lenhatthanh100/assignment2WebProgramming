<?php	
	$resultJson = null;
    $idquestion = $_GET['id'];
	$kind = $_GET['kind'];
	

	include '../model/generalAndMember/memberDetailsContactModel.php';

	//Convert kết quả từ Json về PHP Object để dễ xử lý
	$detailsContact = json_decode($resultJson);
	if($kind == 2){
		echo "
		<div class='container mt-3'>
		<h2>" . $detailsContact[0]->title ."</h2>
		<div class='media border p-3'>
			<div class='media-body'>
			<h4>" . $detailsContact[0]->name_questioner . " <small><i> Posted: " . $detailsContact[0]->time_question . "</i></small></h4>
			<p> <strong>SĐT: </strong>" . $detailsContact[0]->phone_number . "</p>
			<p> <strong>Email: </strong>" . $detailsContact[0]->email . "</p>
			<p> <strong>Địa chỉ: </strong>" .$detailsContact[0]->address ."</p>
			<p> <strong>Thương hiệu: </strong>" .$detailsContact[0]->brand . "<small><i> (" . $detailsContact[0]->product . ")</i></small></p>
			<p> <strong>Câu hỏi: </strong>" . $detailsContact[0]->question . "</p>
			<div class='media p-3 border' style='background-color: #EEEEEE'>
				<div class='media-body'>
				<h4>" . $detailsContact[0]->name . " <small><i> Posted: " . $detailsContact[0]->time_answer . "</i></small></h4>
				<p> <strong>Trả lời: </strong>".$detailsContact[0]->answer."</p>
				</div>
			</div>  
			</div>
		</div>
		</div>";
	}
	else if($kind == 1){
		echo "
		<div class='container mt-3'>
		<h2>" . $detailsContact[0]->title ."</h2>
		<div class='media border p-3'>
			<div class='media-body'>
			<h4>" . $detailsContact[0]->name_questioner . " <small><i> Posted: " . $detailsContact[0]->time_question . "</i></small></h4>
			<p> <strong>SĐT: </strong>" . $detailsContact[0]->phone_number . "</p>
			<p> <strong>Email: </strong>" . $detailsContact[0]->email . "</p>
			<p> <strong>Địa chỉ: </strong>" .$detailsContact[0]->address ."</p>
			<p> <strong>Thương hiệu: </strong>" .$detailsContact[0]->brand . "<small><i> (" . $detailsContact[0]->product . ")</i></small></p>
			<p> <strong>Câu hỏi: </strong>" . $detailsContact[0]->question . "</p>
			</div>
		</div>
		</div>";
	}
	else{
		echo "...";
	}
	// foreach ($detailsContact as $details) {
	// 	echo $details->title;
	// }
	
?>