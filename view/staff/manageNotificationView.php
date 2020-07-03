<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Quản lý thông báo</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
</head>
<body>
	<!-- Import thêm navbar -->
	<?php
	if(isset($_COOKIE["user"])) {
		$userObject = unserialize($_COOKIE["user"]);
		// Trường hợp tài khoản staff
		if ($userObject->kind_account == 2) {
			include 'navbarStaff.php';
		}
		// Trường hợp tài khoản member, admin dùng URL để truy cập
		else {
			header("location:../404.php");
		}	
	}
	// Trường hợp chưa đăng nhập dùng URL để truy cập
	else {
		header("location:../404.php");
	}	
	?>
	<!-- Dùng AJAX thay đổi danh sách thông báo -->
	<script>	
	function showNotificationList(str) {
	  	var xhttp;	  	 
	  	xhttp = new XMLHttpRequest();
	  	xhttp.onreadystatechange = function() {
	    	if (this.readyState == 4 && this.status == 200) {
	      		document.getElementById("notificationList").innerHTML = this.responseText;
	    	}
	  	};
	  	xhttp.open("GET", "../../controller/staff/manageNotificationController.php?kindNotification="+str, true);
	  	xhttp.send();	  		  	
	}
	</script>
	<!-- Nội dung quản lý thông báo -->
	<div class="container-fluid marginTop pt-5">
		<div class="form-group">
			<label class="text-primary font-weight-bold" for="manageNotificationSelect">Chọn tác vụ:</label>
			<select class="form-control" id="manageNotificationSelect" name="manageNotificationSelect" onchange="showNotificationList(this.value)">				
		    	<option value="notAnsweredOfMember" selected="selected">Tin nhắn của thành viên đang chờ trả lời</option>
		    	<option value="answeredOfMember">Tin nhắn của thành viên đã được trả lời</option>
		    	<option value="notAnsweredOfGeneral">Tin nhắn của khách lạ</option>		    	
				<option value="messageFromSystem">Tin nhắn từ hệ thống</option>
				<option value="newMessageFromSystem">Thêm tin nhắn từ hệ thống</option>
		  	</select>
		</div>
		<script type="text/javascript"> showNotificationList("notAnsweredOfMember"); </script>
    	<div id="notificationList"></div>
    </div>
	<!-- Import thêm footer -->
    <?php
	if(isset($_COOKIE["user"])) {
		$userObject = unserialize($_COOKIE["user"]);
		// Trường hợp tài khoản staff
		if ($userObject->kind_account == 2) {
			include 'footerStaff.php';
		}
		// Trường hợp tài khoản member, admin dùng URL để truy cập
		else {
			header("location:../404.php");
		}
	}
	// Trường hợp chưa đăng nhập dùng URL để truy cập
	else {
		header("location:../404.php");
	}	
	?>
</body>
</html>