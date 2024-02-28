<?php if (!isset($_SESSION['tenDangNhap'])) {
    header("Location:../index.php?url=login");
}
?>
<div class="all-active mt-3">
     <h1 class="text-center">Quản trị <br> Dự tính thống kê</h1>
</div>