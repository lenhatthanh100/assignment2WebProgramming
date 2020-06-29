<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Quản lý dịch vụ, sản phẩm</title>
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
	<!-- Nội dung quản lý dịch vụ, sản phẩm -->
	<div class="container marginTop pt-5">
        <h1 class="text-danger"> Chức năng chưa hiện thực </h1>
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