<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
 }
// Kiểm tra xem form đã được submit chưa
if (isset($_POST['btn_save'])) {
 // Lấy thông tin
     $khoaID = $_POST['khoaID'];
     $tenLop = $_POST['tenLop'];
     // Kiểm tra tài khoản đã tồn tại chưa
     $sql = "SELECT * FROM lop WHERE tenLop = '$tenLop'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
          $flg = false;
     } else {
          $sql = "INSERT INTO lop (tenLop, khoaID) VALUES ('$tenLop','$khoaID')";
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
                   <strong>Chúc mừng!</strong> Bạn đã thêm lớp mới thành công.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        } elseif ($flg == false) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Lỗi!</strong> Lớp đã tồn tại.
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
                    <a href="?url=list_class" class="btn btn-outline-primary">Lớp</a>
               </div>
               <h3 class="mb-4 text-center">Thêm lớp</h3>
               <form class="form-group" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4 mt-4">
                         <label for="khoaID" class="form-label">Khoa</label>
                         <select class="custom-select" id="khoaHocID" name="khoaID">
                              <<?php
                    $sql = "SELECT * FROM khoa";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?> <option value="<?php echo $row['khoaID'] ?>"><?php echo $row['tenKhoa'] ?></option>
                                   <?php } ?>
                         </select>
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="tenLop" class="form-label">Tên lớp</label>
                         <input type="text" name="tenLop" class="form-control" id="tenLop" required />
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