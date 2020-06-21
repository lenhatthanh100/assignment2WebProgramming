<?php
$username = $password = "";
$errUsername = $errPassword = "";
$validUsername = $validPassword = false;
$returnMess = "";
// Kiểm tra dữ liệu xem có hợp lệ không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["usernameForm"])) {
        $errUsername = "Không được bỏ trống tên đăng nhập";
    }
    else {
        $validUsername = true;
    }
    if (empty($_POST["passwordForm"])) {
        $errPassword = "Không được bỏ trống mật khẩu";
    }
    else {
        $validPassword = true;
    }
    if ($validUsername == true and $validPassword == true) {
        $username = $_POST["usernameForm"];
        $password = $_POST["passwordForm"];
        if ($username == "lenhatthanh" and $password == "123456") {
            $returnMess = "Đăng nhập thành công!";
        }
        else {
            $returnMess = "Tên đăng nhập/ Mật khẩu sai";
        }
        // So trùng mới database, import model để xử lý
    }
}
?>