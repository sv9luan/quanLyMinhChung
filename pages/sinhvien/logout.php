<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<?php
if (isset($_SESSION['tenDangNhap']) && isset($_SESSION['hoTen']) && isset($_SESSION['vaiTro'])) {
    unset($_SESSION['tenDangNhap']);
    unset($_SESSION['hoTen']);
    unset($_SESSION['vaiTro']);
}
header("Location:index.php");
