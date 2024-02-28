<?php
if (!isset($_SESSION['tenDangNhap'])) {
     header("Location:../index.php?url=login");
 }
// Kiểm tra xem form đã được submit chưa
if (isset($_POST['btn_save'])) {
     // Lấy thông tin
     $tenHoatDong = $_POST['tenHoatDong'];
     $thoiGian = $_POST['thoiGian'];
     $soLuong = $_POST['soLuong'];
     $diaDiem = $_POST['diaDiem'];
     $moTa = $_POST['moTa'];
     $trangThai = $_POST['trangThai'];
     // Kiểm tra tài khoản đã tồn tại chưa
     $sql = "SELECT * FROM hoatdong WHERE tenHoatDong = '$tenHoatDong'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
          $flg = false;
     } else {
          $sql = "INSERT INTO hoatdong (tenHoatDong, thoiGian, soLuong, diaDiem, moTa, trangThai) 
          VALUES ('$tenHoatDong', '$thoiGian', '$soLuong', '$diaDiem', '$moTa', '$trangThai')";
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
                   <strong>Chúc mừng!</strong> Bạn đã thêm hoạt động mới thành công.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        } elseif ($flg == false) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>Lỗi!</strong> Hoạt động đã tồn tại.
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
                    <a href="?url=list_active" class="btn btn-outline-primary">Hoạt Động</a>
               </div>
               <h3 class="mb-4 text-center">Thêm hoạt động</h3>
               <form class="form-group" action="" method="post" enctype="multipart/form-data">
                    <div class="mb-4 mt-4">
                         <label for="tenHoatDong" class="form-label">Tên hoạt động</label>
                         <input type="text" name="tenHoatDong" class="form-control" id="tenHoatDong" required />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="thoiGian" class="form-label">Thời gian</label>
                         <input type="date" name="thoiGian" class="form-control" id="thoiGian" required />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="soLuong" class="form-label">Số lượng</label>
                         <input type="number" name="soLuong" class="form-control" id="soLuong" min="1" required />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="diaDiem" class="form-label">Địa điểm</label>
                         <input type="text" name="diaDiem" class="form-control" id="diaDiem" required />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="moTa" class="form-label">Mô tả</label>
                         <input type="text" name="moTa" class="form-control" id="moTa" required />
                    </div>
                    <div class="mb-4 mt-4">
                         <label for="trangThai" class="form-label">Trạng thái</label>
                         <input type="text" name="trangThai" class="form-control" id="trangThai" value="1" />
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