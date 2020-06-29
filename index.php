<?php
    //Xác định điều hướng dựa theo cookie
    if(isset($_COOKIE["user"])) {
        $userObject = unserialize($_COOKIE["user"]);
        //Tài khoản member
        if ($userObject->kind_account == 1) {
			header("location:view/generalAndMember/homeView.php");
        }
        //Tài khoản staff
        elseif ($userObject->kind_account == 2) {
            header("location:view/staff/manageNewsView.php");
        }
        //Tài khoản admin
        else {
            header("location:view/admin/manageAccountView.php");
        }
    }
    //Chưa đăng nhập
    else {
        header("location:view/generalAndMember/homeView.php");
    }
?>