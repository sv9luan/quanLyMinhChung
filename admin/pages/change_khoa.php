<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
 }
// Kiểm tra xem form đã được submit chưa
if (isset($_POST['btn_save'])) {
     // Lấy thông tin
     $khoaHocID = $_POST['khoaHocID'];
     $tenKhoa = $_POST['tenKhoa'];
     // Kiểm tra tài khoản đã tồn tại chưa
     $sql = "SELECT * FROM khoa WHERE tenKhoa = '$tenKhoa'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
          $flg = false;
     } else {
          $sql = "INSERT INTO khoa (tenKhoa, khoaHocID) VALUES ('$tenKhoa', '$khoaHocID')";
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
                   <strong>Chúc mừng!</strong> Bạn đã thêm  thành công.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        } elseif ($flg == false) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Lỗi!</strong> Thêm không thành công.
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
                    <a href="?url=list_class" class="btn btn-outline-primary">Khoa</a>
               </div>
               <h3 class="mb-4 text-center">Thêm khoa</h3>
               <form class="form-group" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4 mt-4">
                         <label for="khoaHocID" class="form-label">Khoá học</label>
                         <select class="custom-select" id="khoaHocID" name="khoaHocID">
                              <<?php
                    $sql = "SELECT * FROM khoahoc";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?> <option value="<?php echo $row['khoaHocID'] ?>"><?php echo $row['khoaHoc'] ?></option>
                                   <?php } ?>
                         </select>
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="tenKhoa" class="form-label">Tên khoa</label>
                         <input type="text" name="tenKhoa" class="form-control" id="tenKhoa" required />
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