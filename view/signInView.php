<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Đăng nhập</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
</head>
<body>
	<!-- Import controller để xử lý -->
	<?php include '../controller/signInController.php'; ?>
	<!-- Import thêm navbar -->
    <?php include 'navbar.php'; ?>
	<!-- Form đăng nhập -->
	<div class="container marginTop">		
		<div class="container-fluid px-5 py-5">
			<h2 class="text-primary mb-3 ml-3">Đăng nhập</h2>
			<form class="form-horizontal" method="POST">
				<div class="form-group">
			    	<label class="control-label col-sm-2 font-weight-bold" for="email">Tên đăng nhập</label>
			    	<div class="col-sm-10">
			    		<input type="text" class="form-control" name="usernameForm" placeholder="Nhập tên đăng nhập" value="<?php echo $username; ?>">
			    		<p class="text-danger"><?php echo $errUsername; ?></p>
			    	</div>			    
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2 font-weight-bold" for="pwd">Mật khẩu</label>
			    	<div class="col-sm-10">
			    		<input type="password" class="form-control" name="passwordForm" placeholder="Nhập mật khẩu" value="<?php echo $password; ?>">
			    		<p class="text-danger"><?php echo $errPassword; ?></p>
			    	</div>			    
				</div>
				<div class="form-group">
			    	<div class="col-sm-offset-2 col-sm-10">
			      		<div class="checkbox">
			        		<label><input type="checkbox"> Tự động điền tên đăng nhập, mật khẩu cho lần đăng nhập sau</label>
			      		</div>
			      		<p class="text-danger"><?php echo $returnMess; ?></p>
			    	</div>
				</div>			  
				<div class="form-group">
			    	<button type="submit" class="btn btn-success ml-3">Đăng nhập</button>			      
				</div>
				<button type="button" class="btn btn-link" onclick="location.href='signUpView.php';">Bạn chưa có tài khoản, đăng ký ngay</button>			  
			</form>
		</div>
	</div>
	<!-- Import thêm footer -->
    <?php include 'footer.php'; ?>
</body>
</html>