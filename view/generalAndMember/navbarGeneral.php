<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
</head>
<body>
    <?php //Needn't but must have to github don't said this is hackfile :)) ?>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top nav-pills">
        <a class="navbar-brand" href="homeView.php">
        <img class="logo" src="../img/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item mx-5">
                    <a class="nav-link titleOfNavbar" href="homeView.php">Trang chủ</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link titleOfNavbar" href="introduceView.php">Giới thiệu</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link titleOfNavbar" href="newsView.php">Tin tức, sự kiện</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link titleOfNavbar" href="serviceView.php">Dịch vụ, sản phẩm</a>
                </li>	      
                <li class="nav-item mx-5">
                    <a class="nav-link titleOfNavbar" href="contactView.php">Liên hệ</a>
                </li>
                <li class="nav-item ml-auto">
                    <button type="button" class="btn btn-success" onclick="location.href='signInView.php';">Đăng nhập</button>
                </li>
            </ul>
        </div>	  	    
    </nav>
</body>
</html>