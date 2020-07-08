<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Thông báo</title>
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
		// Trường hợp tài khoản member
		if ($userObject->kind_account == 1) {
			include 'navbarMember.php';
		}
		// Trường hợp tài khoản staff, admin dùng URL để truy cập
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
	<script>document.getElementById("notificationView").setAttribute("class","nav-link titleOfNavbar active")</script>
	<script>
	function showNotificationList(str) {
	  	var xhttp;
	  	xhttp = new XMLHttpRequest();
	  	xhttp.onreadystatechange = function() {
	    	if (this.readyState == 4 && this.status == 200) {
				document.getElementById("notificationList").classList.remove("loader");	// Xóa class để dừng icon loading
	      		document.getElementById("notificationList").innerHTML = this.responseText;
	    	}
			else {
				// Xóa nội dung và thêm class để tạo icon loading
				document.getElementById("notificationList").innerHTML = "";
				document.getElementById("notificationList").classList.add("loader");
			}
	  	};
	  	xhttp.open("GET", "../../controller/generalAndMember/notificationController.php?kindNotification="+str, true);
	  	xhttp.send();
	}
	</script>
	<!-- Nội dung thông báo -->
	<div class="container-fluid marginTop pt-5">
		<div class="form-group">
			<label class="text-primary font-weight-bold" for="notificationSelect">Chọn tác vụ:</label>
			<select class="form-control" id="notificationSelect" name="notificationSelect" onchange="showNotificationList(this.value)">
		    	<option value="notAnswered" selected="selected">Tin nhắn đang chờ trả lời</option>
		    	<option value="answered">Tin nhắn đã được trả lời</option>
		    	<option value="messageFromSystem" >Tin nhắn từ hệ thống</option>
		  	</select>
		</div>		
    	<div id="notificationList"></div>
		<script type="text/javascript"> showNotificationList("notAnswered"); </script>
    </div>
	<!-- Import thêm footer -->
    <?php
	if(isset($_COOKIE["user"])) {
		$userObject = unserialize($_COOKIE["user"]);
		// Trường hợp tài khoản member
		if ($userObject->kind_account == 1) {
			include 'footerMember.php';
		}
		// Trường hợp tài khoản staff, admin dùng URL để truy cập
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
