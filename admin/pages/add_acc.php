<?php
if (!isset($_SESSION['tenDangNhap'])) {
    header("Location:../index.php?url=login");
}
// Kiểm tra xem form đã được submit chưa
if (isset($_POST['btn_save'])) {
     // Lấy thông tin
     $MSSV = $_POST['MSSV'];
     $tenDangNhap = $_POST['tenDangNhap'];
     $matKhau = md5($_POST['matKhau']);
     $vaiTro = $_POST['vaiTro'];
     // Kiểm tra tài khoản đã tồn tại chưa
     $sql = "SELECT * FROM taikhoan WHERE tenDangNhap = '$tenDangNhap'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
          $flg = false;
     } else {
          $sql = "INSERT INTO taikhoan (tenDangNhap, matKhau, vaiTro, MSSV) VALUES ('$tenDangNhap', '$matKhau', '$vaiTro', '$MSSV')";
          $result = mysqli_query($conn, $sql);
          $flg = true;
     }
    
}
?>
<div class="container-fluid">
     <?php
    if (isset($flg)) {
        if ($flg) {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <strong>Chúc mừng!</strong> Bạn đã thêm tài khoản mới thành công.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        } elseif ($flg == false) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Lỗi!</strong> Tài khoản đã tồn tài.
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
                    <a href="?url=list_acc" class="btn btn-outline-primary">Tài Khoản</a>
               </div>
               <h3 class="mb-4 text-center text-primary text-uppercase">Thêm tài khoản</h3>
               <form class="form-group" method="post" enctype="multipart/form-data">
                    <div class="mb-4 mt-4">
                         <label for="MSSV" class="form-label">Mã số sinh viên</label>
                         <select class="custom-select" id="MSSV" name="MSSV">
                              <<?php
                         $sql = "SELECT * FROM sinhvien";
                         $result = mysqli_query($conn, $sql);
                         while ($row = mysqli_fetch_array($result)) {
                         ?> <option value="<?php echo $row['MSSV'] ?>"><?php echo $row['MSSV'] ?></option>
                                   <?php } ?>
                         </select>
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="tenDangNhap" class="form-label">Tên đăng nhập</label>
                         <input type="text" name="tenDangNhap" class="form-control" id="tenDangNhap" required />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="matKhau" class="form-label">Mật khẩu</label>
                         <input type="password" name="matKhau" class="form-control" id="matKhau" required />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="vaiTro" class="form-label">Vai trò</label>
                         <input type="text" name="vaiTro" class="form-control" id="vaiTro" value="sinhvien" required />
                         <!-- <section class="custom-select" id="vaiTro" name="vaiTro">
                              <option value="sinhvien">Sinh viên</option>
                              <option value="admin">Admin</option>
                         </section> -->
                    </div>
                    <div class="mb-4 text-center">
                         <button type="submit" name="btn_save" class="btn  background-pr text-white w-100">
                              Lưu
                         </button>
                    </div>
               </form>
          </div>
          <div class="col-3"></div>
     </div>

</div>