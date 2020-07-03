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
    <script>
		$(document).ready(function(){
			$('#delete').click(function(event){
				event.preventDefault();
				$.ajax({
					url: "../../controller/admin/deleteAccountController.php",
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
	<!-- Nội dung xoá tài khoản -->
    <div class="container-fluid marginTop pt-5">
    
        <?php
            $a = $_GET['id'];
            echo "<p>Do you want delete Id = " , $a , "  ?? </p>";
            echo "<form method='post' accept-charset='utf-8' id='usrform'>";
			echo "<p><input type='hidden' name='id' placeholder='Id' value=$a></p>";
			echo "<input type='submit' id='delete' value='Xoá tài khoản'/>";
			echo "</br>";
			echo "</br>";
			// Click button No để quay về trang quản lý
			echo "<a href='manageAccountView.php'>Quay về trang quản lý</a>";
            echo "</form>"   
        ?>
    <div id="message"></div>
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