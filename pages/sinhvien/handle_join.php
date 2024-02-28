<?php
if (isset($_GET['id'])) {
    $id_link = $_GET['id'];
    $mssv = $_SESSION['tenDangNhap'];
    $sql = "SELECT `mssv`, `hoatDongID` FROM `thamgia` WHERE mssv = '$mssv' AND hoatDongID = '$id_link'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if ($id_link != $row['hoatDongID'] && $mssv != $row['MSSV']) {
        $sql_insert = "INSERT INTO thamgia(MSSV, hoatDongID)VALUES ( '$mssv', '$id_link')";
        $result = mysqli_query($conn, $sql_insert);
        $_SESSION['success_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Chúc mừng!</strong> Bạn đã tham gia thành công.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
</button>
            </div>';
    } else {
        $_SESSION['error_message'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Lỗi!</strong> Hoạt động đã tồn tại.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
</button>
            </div>';
    }

    header('location:index.php?url=list_active');
}
