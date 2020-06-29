<?php 
    setcookie("user", "", time() - 3600, "/");
    header("location:../view/generalAndMember/homeView.php");
?>