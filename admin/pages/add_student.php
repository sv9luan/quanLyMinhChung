<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
 }
// Kiểm tra xem form đã được submit chưa
if (isset($_POST['btn_save'])) {
     // Lấy thông tin
     $MSSV = $_POST['MSSV'];
     $hoTen = $_POST['hoTen'];
     $email = $_POST['email'];
     $soDienThoai = $_POST['soDienThoai'];
     $lopID = $_POST['lopID'];
     // Kiểm tra tài khoản đã tồn tại chưa
     $sql = "SELECT * FROM sinhvien WHERE MSSV = '$MSSV'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
          $flg = false;
     } else {
          $sql = "INSERT INTO sinhvien (MSSV, hoTen, email, soDienThoai, lopID) VALUES ('$MSSV', '$hoTen', '$email', '$soDienThoai', '$lopID')";
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
                   <strong>Chúc mừng!</strong> Bạn đã thêm sinh viên mới thành công.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        } elseif ($flg == false) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Lỗi!</strong> Sinh viên đã tồn tại.
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
                    <a href="?url=list_student" class="btn btn-outline-primary">Sinh Viên</a>
               </div>
               <h3 class="mb-4 text-center">Thêm sinh viên</h3>
               <form class="form-group" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4 mt-4">
                         <label for="MSSV" class="form-label">Mã số sinh viên</label>
                         <input type="text" name="MSSV" class="form-control" id="MSSV" required />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="hoTen" class="form-label">Họ tên</label>
                         <input type="text" name="hoTen" class="form-control" id="hoTen" required />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" name="email" class="form-control" id="email" required />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="soDienThoai" class="form-label">Số điện thoại</label>
                         <input type="text" name="soDienThoai" class="form-control" id="soDienThoai" required />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="lopID" class="form-label">Lớp</label>
                         <select class="custom-select" id="lopID" name="lopID">
                              <<?php
                    $sql = "SELECT * FROM lop";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?> <option value="<?php echo $row['lopID'] ?>"><?php echo $row['tenLop'] ?></option>
                                   <?php } ?>
                         </select>
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