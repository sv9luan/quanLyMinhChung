<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
}
// Kiểm tra xem form đã được submit chưa
if (isset($_POST['btn_save'])) {
     // Lấy thông tin
     $khoaHoc = $_POST['khoaHoc'];

     // Kiểm tra tài khoản đã tồn tại chưa
     $sql = "SELECT * FROM khoahoc WHERE khoaHoc = '$khoaHoc'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
          $flg = false;
     } else {
          $sql = "INSERT INTO khoahoc (khoaHoc, khoaHocID) VALUES ('$khoaHoc')";
          $result = mysqli_query($conn, $sql);
          $flg = true;
     }
    
}
?>
<div class="container-fluid mt-3">
     <?php
    if (isset($flg)) {
        if ($flg) {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>Chúc mừng!</strong> Bạn đã thêm khoá học mới thành công.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        } elseif ($flg == false) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Lỗi!</strong> Khoá học này đã tồn tại.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        }
    }
    ?>
     <div class="row">
          <div class="col-3"></div>
          <div class="col-6">
               <div class="mb-4">
                    <a href="?url=list_course" class="btn btn-outline-primary">Khoá Học</a>
               </div>
               <h3 class="mb-4 text-center">Thêm khoá học</h3>
               <form class="form-group" action="" method="post" enctype="multipart/form-data">

                    <div class="mb-4 mt-4">
                         <label for="khoaHoc" class="form-label">Khoá học</label>
                         <input type="text" name="khoaHoc" class="form-control" id="khoaHoc" required />
                    </div>
                    <div class="mb-4 text-center">
                         <button type="submit" name="btn_save" class="btn background-pr text-white w-100">
                              Lưu
                         </button>
                    </div>
               </form>
          </div>
          <div class="col-3"></div>
     </div>
</div>