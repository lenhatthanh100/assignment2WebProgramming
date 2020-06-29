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
<?php $userObject = unserialize($_COOKIE["user"]); ?>
    <script>
    function profileOfUser() {
        alert("- Họ và tên: <?php echo $userObject->name ?> \n- ID: <?php echo $userObject->id ?> \n- Username: <?php echo $userObject->username ?> \n- Số điện thoại: <?php echo $userObject->phone_number ?> \n- Email: <?php echo $userObject->email ?> \n- Địa chỉ: <?php echo $userObject->address ?> \n- Quyền truy cập: Admin");
    }
    </script>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top nav-pills">
        <a class="navbar-brand" href="../img/home.php">
        <img class="logo" src="../img/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item mx-5">
                    <a class="nav-link titleOfNavbar" href="manageAccountView.php">Quản lý tài khoản</a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link titleOfNavbar" href="createAccountForStaffView.php">Tạo tài khoản cho nhân viên</a>
                </li>
                <li class="nav-item ml-5 pl-5">
                    <div class="mb-2">                
                        <span class="text-warning font-weight-bold mr-2" onclick="profileOfUser()"> <?php $userObject = unserialize($_COOKIE["user"]); echo $userObject->name; ?> </span>
                        <span class="badge badge-warning">Admin</span>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm" onclick="location.href='../../controller/signOut.php';">Đăng xuất</button>
                </li>
            </ul>
        </div>	  	    
    </nav>
</body>
</html>