<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Quản lý tài khoản</title>
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
	<script>
	function showAccountList(str) {
	  	var xhttp;	  	 
	  	xhttp = new XMLHttpRequest();
	  	xhttp.onreadystatechange = function() {
	    	if (this.readyState == 4 && this.status == 200) {
	      		document.getElementById("accountList").innerHTML = this.responseText;
	    	}
	  	};
	  	xhttp.open("GET", "../../controller/admin/manageAccountController.php?kindAccount="+str, true);
	  	xhttp.send();	  		  	
	}
	</script>	
	<!-- Nội dung quản lý tài khoản -->
	<div class="container-fluid marginTop pt-5">
		<div class="form-group">
			<label class="text-primary font-weight-bold" for="manageAccountSelect">Chọn loại tài khoản:</label>
			<select class="form-control" id="manageAccountSelect" name="manageAccountSelect" onchange="showAccountList(this.value)">
		    	<option value="member" selected="selected">Tài khoản thành viên</option>
		    	<option value="staff">Tài khoản nhân viên</option>
		  	</select>
		</div>
		<script type="text/javascript"> showAccountList("member"); </script>
    	<div id="accountList"></div>
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