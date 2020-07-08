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
	<!-- Nội dung thông báo -->
	<div class="container marginTop">
        <?php
            include '../../model/staff/detailMessSysModel.php';
            $mesObject = json_decode($resultJson);
            echo '            
            <h2 class="new font-weight-bold pt-5">',$mesObject[0]->title,'</h2>            
            <p class="text-secondary font-italic">',$mesObject[0]->time_create,'</p>
            <div>
                <img src="',$mesObject[0]->link_image,'" class="img-thumbnail mx-auto d-block" alt="tinTucMoiNhat">
            </div>
            <p class=mt-3>',nl2br($mesObject[0]->content),'</p>
            ';
        ?>
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