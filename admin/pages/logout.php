<?php
if (isset($_SESSION['tenDangNhap'])) {
    unset($_SESSION['tenDangNhap']);
    // echo $_SESSION['tenDangNhap'];
}
header("Location:../index.php?url=login");