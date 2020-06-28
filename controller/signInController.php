<?php
$username = $password = "";
$errUsername = $errPassword = "";
$validUsername = $validPassword = false;
$returnMess = "";
$resultJson = null;
$userObjectArr = null;
$userObject = null;
// Kiểm tra dữ liệu xem có hợp lệ không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["usernameForm"])) {
        $errUsername = "Không được bỏ trống tên đăng nhập";
    }
    else {
        $username = $_POST["usernameForm"];
        $validUsername = true;        
    }
    if (empty($_POST["passwordForm"])) {        
        $errPassword = "Không được bỏ trống mật khẩu";
    }
    else {
        $password = $_POST["passwordForm"];
        $validPassword = true;
    }
    if ($validUsername == true and $validPassword == true) {
        // So trùng với database, import model để xử lý        
        include '../model/signInModel.php';
        $userObjectArr = json_decode($resultJson); // Convert từ json về php object
        //Trường hợp thu được hơn 1 tài khoản từ câu lệnh SELECT
        if (count($userObjectArr) > 1) {
            $returnMess = "Lỗi database, thu được quá nhiều record";
        }        
        else {            
            //Trường hợp đúng tên đăng nhập và mật khẩu
            if (count($userObjectArr) == 1) {
                $userObject = $userObjectArr[0];
                if ($userObject->kind_account == 1) {
                    $returnMess = "Chào mừng ".$userObject->name." bạn được truy cập với đặc quyền member";
                }
                elseif ($userObject->kind_account == 2) {
                    $returnMess = "Chào mừng ".$userObject->name." bạn được truy cập với đặc quyền staff";
                }
                else {
                    $returnMess = "Chào mừng ".$userObject->name." bạn được truy cập với đặc quyền admin";
                }
            }
            //Trường hợp sai tên đăng nhập hoặc mật khẩu
            else {
                $returnMess = "Tên đăng nhập/ Mật khẩu sai";
            }  
        }              
    }
}
?>