<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Tạo tài khoản mới cho nhân viên</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Import controller để xử lý -->
	<?php include '../../controller/admin/createAccountForStaffController.php'; ?>
	<!-- Import thêm navbar -->
	<?php
	if(isset($_COOKIE["user"])) {
		$userObject = unserialize($_COOKIE["user"]);
		// Trường hợp tài khoản admin
		if ($userObject->kind_account == 3) {
			include 'navbarAdmin.php';
		}
		// Trường hợp tài khoản member, staff dùng URL để truy cập
		else {
			header("location:../404.php");
		}
	}
	// Trường hợp chưa đăng nhập dùng URL để truy cập
	else {
		header("location:../404.php");
	}
	?>
	<script>document.getElementById("createAccountForStaffView").setAttribute("class","nav-link titleOfNavbar active")</script>
	<!-- Nội dung Tạo tài khoản mới cho nhân viên -->
	<div class="container marginTop">
		<div class="container-fluid px-5 py-5">
			<h2 class="text-primary mb-3 ml-3">Tạo tài khoản cho nhân viên</h2>
			<form class="form-horizontal" method="POST">
				<div class="form-group">
			    	<label class="control-label col-sm-2 font-weight-bold" for="usernameForm">Tên đăng nhập</label>
			    	<div class="col-sm-10">
			      		<input type="text" class="form-control" name="usernameForm" id="usernameForm" placeholder="Nhập tên đăng nhập" value="<?php echo $username; ?>">
			      		<p class="text-danger"><?php echo $errUsername; ?></p>
			    	</div>
				</div>
				<div class="form-group">
			    	<label class="control-label col-sm-2 font-weight-bold" for="passwordForm">Mật khẩu</label>
			    	<div class="col-sm-10">
			      		<input type="password" class="form-control" name="passwordForm" id="passwordForm" placeholder="Nhập mật khẩu" value="<?php echo $password; ?>">
			      		<p class="text-danger"><?php echo $errPassword; ?></p>
			    	</div>
				</div>
				<div class="form-group">
			    	<label class="control-label col-sm-2 font-weight-bold" for="retypePasswordForm">Nhập lại mật khẩu</label>
			    	<div class="col-sm-10">
			      		<input type="password" class="form-control" name="retypePasswordForm" id="retypePasswordForm" placeholder="Nhập lại mật khẩu" value="<?php echo $retypePassword; ?>">
			      		<p class="text-danger"><?php echo $errRetypePassword; ?></p>
			    	</div>
				</div>
				<div class="form-group">
			    	<label class="control-label col-sm-2 font-weight-bold" for="nameForm">Họ và tên</label>
			    	<div class="col-sm-10">
			      		<input type="text" class="form-control" name="nameForm" id="nameForm" placeholder="Nhập họ và tên" value="<?php echo $name; ?>">
			      		<p class="text-danger"><?php echo $errName; ?></p>
			    	</div>
				</div>
            	<div class="form-group">
			    	<label class="control-label col-sm-2 font-weight-bold" for="phoneNumberForm">Số điện thoại</label>
			    	<div class="col-sm-10">
			      		<input type="number" class="form-control" name="phoneNumberForm" id="phoneNumberForm" placeholder="Nhập số điện thoại" value="<?php echo $phoneNumber; ?>">
			    		<p class="text-danger"><?php echo $errPhoneNumber; ?></p>
			    	</div>
				</div>
            	<div class="form-group">
			    	<label class="control-label col-sm-2 font-weight-bold" for="emailForm">Email</label>
			    	<div class="col-sm-10">
			    		<input type="text" class="form-control" name="emailForm" id="emailForm" placeholder="Nhập địa chỉ email" value="<?php echo $email; ?>">
			    		<p class="text-danger"><?php echo $errEmail; ?></p>
			    	</div>
			  	</div>
            	<div class="form-group">
			    	<label class="control-label col-sm-2 font-weight-bold" for="addressForm">Địa chỉ</label>
			   		<div class="col-sm-10">
			    		<input type="text" class="form-control" name="addressForm" id="addressForm" placeholder="Số nhà, tên đường, xã/phường, quận/huyện, tỉnh/thành phố" value="<?php echo $address; ?>">
			    		<p class="text-danger"><?php echo $errAddress; ?></p>
			    	</div>
			  	</div>
				<div class="form-group ml-3">
                	<p class="text-danger"><?php echo $returnMess; ?></p>
			    	<button type="submit" class="btn btn-success">Đăng ký</button>
				</div>
			</form>
		</div>
    </div>
	<!-- Import thêm footer -->
    <?php
	if(isset($_COOKIE["user"])) {
		$userObject = unserialize($_COOKIE["user"]);
		// Trường hợp tài khoản admin
		if ($userObject->kind_account == 3) {
			include 'footerAdmin.php';
		}
		// Trường hợp tài khoản member, staff dùng URL để truy cập
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
