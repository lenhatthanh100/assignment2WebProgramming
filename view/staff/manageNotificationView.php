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
	<!-- Nội dung quản lý thông báo -->
	<div class="container marginTop pt-5">
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <span>Tùy chọn tác vụ</span>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Trả lời tin nhắn từ khách hàng và thành viên</a>
                <a class="dropdown-item" href="#">Gửi thông báo cho toàn bộ thành viên</a>
            </div>
        </div>
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